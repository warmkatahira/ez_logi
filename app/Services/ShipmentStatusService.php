<?php

namespace App\Services;

use App\Models\Order;
use App\Models\ShipmentStatus;
use App\Consts\ShipmentStatusConst;

class ShipmentStatusService
{
    // 全ステータスを取得
    public function getAllStatus()
    {
        return ShipmentStatus::orderBy('sort_no')->get();
    }

    // 現在表示しているステータスに合わせて変更プルダウンに表示するステータスを取得
    public function getChangeTargetStatus($active_status)
    {
        $status = ShipmentStatusConst::INSPECTED_STATUS_LIST;
        if($active_status['shipment_status_code'] == ShipmentStatusConst::UNALLOCATED_CODE || $active_status['shipment_status_code'] == ShipmentStatusConst::SUSPEND_CODE){
            $status = ShipmentStatusConst::UNALLOCATED_STATUS_LIST;
        }
        if($active_status['shipment_status_code'] == ShipmentStatusConst::ALLOCATED_CODE){
            $status = ShipmentStatusConst::ALLOCATED_STATUS_LIST;
        }
        if($active_status['shipment_status_code'] == ShipmentStatusConst::WAIT_PRINT_CODE){
            $status = ShipmentStatusConst::WAIT_PRINT_STATUS_LIST;
        }
        if($active_status['shipment_status_code'] == ShipmentStatusConst::WAIT_INSPECTION_CODE){
            $status = ShipmentStatusConst::WAIT_INSPECTION_STATUS_LIST;
        }
        if($active_status['shipment_status_code'] == ShipmentStatusConst::INSPECTED_CODE){
            $status = ShipmentStatusConst::INSPECTED_STATUS_LIST;
        }
        return $status;
    }

    // 出荷ステータスを変更
    public function changeStatus($change_target, $change_status)
    {
        foreach($change_target as $key => $val ){
            $order = Order::where('shipment_mgt_no', $key)->first();
            $order->shipment_status_code = $change_status;
            $order->save();
        }
    }
}