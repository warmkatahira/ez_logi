<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Rap2hpoutre\FastExcel\FastExcel;
use Carbon\Carbon;
use App\Models\OrderBtobImport;
use App\Models\OrderBtocImport;
use App\Models\Order;
use App\Models\OrderDetail;


class OrderController extends Controller
{
    public function top()
    {
        return view('order.top');
    }

    public function data_import_index()
    {
        return view('order.data_import');
    }

    public function data_import_import(Request $request)
    {
        // 現在の日時を取得
        $nowDate = new Carbon('now');
        // 選択したデータを保存
        $select_file = $request->file($request->import_type);
        $uploaded_file = $select_file->getClientOriginalName();
        $orgName = 'order_data_' . $request->import_type . '.csv';
        $spath = storage_path('app/');
        $path = $spath.$select_file->storeAs('public/import',$orgName);
        // 出荷区分を取得
        $shipment_category = $request->shipment_category;
        // データの情報を取得
        $all_line = (new FastExcel)->import($path);
        // 受注番号の重複を取り除いた配列を作る変数を準備
        $mall_order_no_unique = [];
        // 「B to B」か「B to C」によって処理を分岐
        if(preg_match('/btob/', $request->import_type)){
            // テーブルをクリア
            OrderBtobImport::query()->delete();
            // 取得したデータの分だけループ
            foreach ($all_line as $line) {
                // UTF-8形式に変換
                $line = mb_convert_encoding($line, 'UTF-8', 'ASCII, JIS, UTF-8, SJIS-win');
                // order_btob_importsテーブルに追加
                $param = [
                    'mall_order_no' => str_replace(' ', '', $line['受注番号']),
                    'order_name' => $line['会社名'],
                    'delivery_name' => $line['配送先 会社名'],
                    'delivery_postal_code' => $line['配送先 郵便番号'],
                    'delivery_prefectures' => $line['配送先 都道府県'],
                    'delivery_address' => $line['配送先 住所'],
                    'delivery_tel_no' => $line['配送先 電話番号'],
                    'order_item_name_1' => $line['商品名'],
                    'order_item_name_2' => $line['セット名'],
                    'shipment_quantity' => $line['合計受注数'],
                    'order_item_code' => $line['品番'],
                    'order_item_jan_code' => $line['JANコード'],
                    'order_item_unit_price' => $line['単価'],
                    'delivery_date' => empty($line['配送希望日']) == true ? Null : $line['配送希望日'],
                    'delivery_time' => empty($line['配送希望時間']) == true ? Null : $line['配送希望時間'],
                    'order_note' => $line['連絡事項'],
                ];
                OrderBtobImport::insert($param);
                // 重複を除いた受注番号配列を作成
                $mall_order_no_unique[$line['受注番号']] = $line['受注番号'];
            }
            // 受注番号単位で出荷管理番号を採番
            $count = 0;
            foreach($mall_order_no_unique as $mall_order_no){
                $count++;
                $shipment_mgt_no = 'ID-' . $nowDate->format('YmdHis') . sprintf('%03d', $count);
                OrderBtobImport::where('mall_order_no', $mall_order_no)->update(['shipment_mgt_no' => $shipment_mgt_no]);
            }
            // 出荷管理番号連番を採番
            $shipment_mgt_no_sn_target = DB::select("
                SELECT
                    order_btob_imports.data_import_sn,
                    @rownum := IF(@prev_group_id = shipment_mgt_no, @rownum + 1, 1) AS shipment_mgt_no_sn,
                    @prev_group_id := shipment_mgt_no AS shipment_mgt_no
                FROM
                    order_btob_imports,
                    (select @rownum := 0) hoge,
                    (select @prev_group_id := '') fuga
                ORDER BY
                    shipment_mgt_no ASC");
            foreach($shipment_mgt_no_sn_target as $target){
                OrderBtobImport::where('data_import_sn', $target->data_import_sn)->update(['shipment_mgt_no_sn' => $target->shipment_mgt_no_sn]);
            }
            // 受注済みのデータが含まれていないか確認
            $ordered_match = OrderBtobImport::Join('orders', 'order_btob_imports.mall_order_no', '=', 'orders.mall_order_no')
                            ->select('order_btob_imports.mall_order_no')
                            ->get();
            // 含まれている場合は、処理を中断 
            if($ordered_match->count() != 0){
                session()->flash('alert_danger','受注済みのデータが含まれている為、受注データ取込を中断しました。');
                return redirect()->route('order.data_import.index');
            }
            // orders/order_detailsテーブルにデータを追加
            $all_line = OrderBtobImport::all();
            
            // 配列を準備
            $orders_array = [];
            $order_details_array = [];
            // 配列に追加する情報を格納
            foreach ($all_line as $line) {
                $order_param = [
                    'mall_order_no' => $line['mall_order_no'],
                    'order_name' => $line['order_name'],
                    'delivery_name' => $line['delivery_name'],
                    'delivery_postal_code' => $line['delivery_postal_code'],
                    'delivery_prefectures' => $line['delivery_prefectures'],
                    'delivery_address' => $line['delivery_address'],
                    'delivery_tel_no' => $line['delivery_tel_no'],
                    'delivery_date' => $line['delivery_date'],
                    'delivery_time' => $line['delivery_time'],
                    'order_note' => $line['order_note'],
                    'shipment_mgt_no' => $line['shipment_mgt_no'],
                    'data_filename' => $uploaded_file,
                    'data_import_date' => $nowDate->format('Y/m/d'),
                    'data_import_time' => $nowDate->format('H:i:s'),
                    'shipment_category' => $shipment_category,
                    'mall_category' => 'bakugai',
                    'order_category' => '初回',
                    'shipment_status_code' => 'new_order',
                    'mall_name' => 'カラコン卸サイトbakugai',
                    'shipment_method' => '佐川急便',
                ];
                $orders_array[$line['shipment_mgt_no']] = $order_param;
                $order_detail_param = [
                    'order_detail_id' => $line['shipment_mgt_no'] .'-'. $line['shipment_mgt_no_sn'],
                    'shipment_mgt_no' => $line['shipment_mgt_no'],
                    'shipment_mgt_no_sn' => $line['shipment_mgt_no_sn'],
                    'order_item_code' => $line['order_item_code'],
                    'order_item_jan_code' => $line['order_item_jan_code'],
                    'order_item_name_1' => $line['order_item_name_1'],
                    'order_item_name_2' => $line['order_item_name_2'],
                    'shipment_quantity' => $line['shipment_quantity'],
                    'order_item_unit_price' => $line['order_item_unit_price'],
                ];
                $order_details_array[] = $order_detail_param;
            }
            // 配列毎インサートしてテーブルに追加
            Order::insert($orders_array);
            OrderDetail::insert($order_details_array);
        }
        if(preg_match('/btoc/', $request->import_type)){
            dd('B to C',$request);
        }


        
        session()->flash('alert_success',count($mall_order_no_unique) . '件の受注データを取り込みました。');
        return redirect()->route('order.data_import.index');
    }
}