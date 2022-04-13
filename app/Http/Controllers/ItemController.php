<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Stock;
use DB;
use Rap2hpoutre\FastExcel\FastExcel;
use Carbon\Carbon;

class ItemController extends Controller
{
    public function top()
    {
        return view('item.top');
    }

    public function item_master_import(Request $request)
    {
        // 選択したデータを保存
        $select_file = $request->file('item_master_import');
        $uploaded_file = $select_file->getClientOriginalName();
        $orgName = 'item_master.csv';
        $spath = storage_path('app/');
        $path = $spath.$select_file->storeAs('public/import',$orgName);
        // データの情報を取得
        $all_line = (new FastExcel)->import($path);
        // テーブルをクリア
        Item::query()->delete();
        Stock::query()->delete();
        // 取得したデータの分だけループ
        foreach ($all_line as $line) {
            // UTF-8形式に変換
            $line = mb_convert_encoding($line, 'UTF-8', 'ASCII, JIS, UTF-8, SJIS-win');
            // order_btob_importsテーブルに追加
            $param = [
                'item_code' => $line['商品コード'],
                'integrate_jan_code' => $line['代表JAN'],
                'individual_jan_code' => $line['個別JAN'],
                'brand_name' => $line['ブランド'],
                'item_name_1' => $line['商品名01'],
                'item_name_2' => $line['商品名02'],
                'jan_start_position' => $line['JAN_Start_Position'],
                'lot_start_position' => $line['Lot_Start_Position'],
                'lot_length' => $line['Lot_Length'],
                's_power_code' => $line['S-POWERコード'],
                's_power_code_start_position' => $line['S-POWER_Start_Position'],
                'location' => $line['ロケーション'],
                'stock_category' => $line['在庫区分'],
                'item_category' => $line['商品区分'],
                'maker_category' => $line['発注先'],
                'qr_inspection_enabled' => $line['QR検品不可フラグ'],
            ];
            Item::insert($param);
            $param = [
                'item_code' => $line['商品コード'],
                'stock_quantity' => 100,
                'stock_allocated_quantity' => 0,
            ];
            Stock::insert($param);
        }
        session()->flash('alert_success', '商品マスタを取り込みました。');
        return redirect()->route('item.top');
    }

    public function item_list()
    {
        $items = Item::paginate(30);;
        return view('item.item_list', compact('items'));
    }
}
