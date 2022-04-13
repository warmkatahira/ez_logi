<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ShipmentStatus;

class ShipmentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShipmentStatus::create([
            'shipment_status_code' => 'reception',
            'shipment_status_name' => '受付',
            'sort_no' => 1,
        ]);
        ShipmentStatus::create([
            'shipment_status_code' => 'suspend',
            'shipment_status_name' => '保留',
            'sort_no' => 2,
        ]);
        ShipmentStatus::create([
            'shipment_status_code' => 'unallocated',
            'shipment_status_name' => '未引当',
            'sort_no' => 3,
        ]);
        ShipmentStatus::create([
            'shipment_status_code' => 'allocated',
            'shipment_status_name' => '引当済み',
            'sort_no' => 4,
        ]);
        ShipmentStatus::create([
            'shipment_status_code' => 'wait_print',
            'shipment_status_name' => '印刷待ち',
            'sort_no' => 5,
        ]);
        ShipmentStatus::create([
            'shipment_status_code' => 'wait_inspection',
            'shipment_status_name' => '検品待ち',
            'sort_no' => 6,
        ]);
        ShipmentStatus::create([
            'shipment_status_code' => 'inspected',
            'shipment_status_name' => '検品済み',
            'sort_no' => 7,
        ]);
        ShipmentStatus::create([
            'shipment_status_code' => 'shipped',
            'shipment_status_name' => '出荷済み',
            'sort_no' => 8,
        ]);
    }
}
