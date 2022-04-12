<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShipmentStatus;
use App\Models\Order;
use Illuminate\Pagination\Paginator;

class ShipmentManagementController extends Controller
{
    public function index($shipment_status_code)
    {
        // 選択されたステータスの情報を取得
        $active_status = ShipmentStatus::where('shipment_status_code', $shipment_status_code)->first();
        // ステータス一覧を取得
        $shipment_statuses = ShipmentStatus::orderBy('sort_no')->get();
        // 選択されたステータスの受注を取得
        $orders = Order::where('shipment_status_code', $shipment_status_code)->paginate(30);
        return view('shipment_management.index', compact('shipment_statuses', 'orders', 'active_status'));
    }
}
