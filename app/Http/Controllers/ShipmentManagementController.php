<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShipmentStatus;
use App\Models\Order;
use Illuminate\Pagination\Paginator;

// サービスの読み込み
use App\Services\ShipmentStatusService;

class ShipmentManagementController extends Controller
{
    public function index($shipment_status_code)
    {
        // セッションに現在のステータスを格納
        session()->put('active_shipment_status_code', $shipment_status_code);
        // 選択されたステータスの情報を取得
        $active_status = ShipmentStatus::where('shipment_status_code', $shipment_status_code)->first();
        // 全ステータスを取得
        $ShipmentStatusService = new ShipmentStatusService();
        $shipment_statuses = $ShipmentStatusService->getAllStatus();
        // 変更プルダウンに表示するステータスを取得
        $change_target_statuses = $ShipmentStatusService->getChangeTargetStatus($active_status);
        // 選択されたステータスの受注を取得
        $orders = Order::where('shipment_status_code', $shipment_status_code)->paginate(30);
        return view('shipment_management.index', compact('shipment_statuses', 'orders', 'active_status', 'change_target_statuses'));
    }

    public function shipment_status_change(Request $request)
    {
        // チェックされたデータを取得
        $change_target = $request->chk;
        $change_status = $request->change_status_select;
        $ShipmentStatusService = new ShipmentStatusService();
        $ShipmentStatusService->changeStatus($change_target, $change_status);
        // 現在のステータスにリダイレクト
        $active_shipment_status_code = session()->get('active_shipment_status_code');
        return redirect()->route('shipment_mgt.index', ['shipment_status_code' => $active_shipment_status_code]); 
    }
}
