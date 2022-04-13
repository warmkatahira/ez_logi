<?php

namespace App\Consts;

class ShipmentStatusConst
{
    // 個別のステータス情報を定義
    // --------------------------------------------
    const RECEPTION_CODE = 'reception';
    const RECEPTION_NAME = '受付';
    // --------------------------------------------
    const UNALLOCATED_CODE = 'unallocated';
    const UNALLOCATED_NAME = '未引当';
    // --------------------------------------------
    const ALLOCATED_CODE = 'allocated';
    const ALLOCATED_NAME = '引当済み';
    // --------------------------------------------
    const WAIT_PRINT_CODE = 'wait_print';
    const WAIT_PRINT_NAME = '印刷待ち';
    // --------------------------------------------
    const WAIT_INSPECTION_CODE = 'wait_inspection';
    const WAIT_INSPECTION_NAME = '検品待ち';
    // --------------------------------------------
    const INSPECTED_CODE = 'inspected';
    const INSPECTED_NAME = '検品済み';
    // --------------------------------------------
    const SUSPEND_CODE = 'suspend';
    const SUSPEND_NAME = '保留';
    // --------------------------------------------
    const SHIPPED_CODE = 'shipped';
    const SHIPPED_NAME = '出荷済み';
    // --------------------------------------------

    // ステータス毎に表示するリストを定義
    // --------------------------------------------
    const UNALLOCATED_STATUS_LIST = [
        [
            'shipment_status_code' => self::RECEPTION_CODE,
            'shipment_status_name' => self::RECEPTION_NAME,
        ],
    ];
    // --------------------------------------------
    const ALLOCATED_STATUS_LIST = [
        [
            'shipment_status_code' => self::RECEPTION_CODE,
            'shipment_status_name' => self::RECEPTION_NAME,
        ],
        [
            'shipment_status_code' => self::UNALLOCATED_CODE,
            'shipment_status_name' => self::UNALLOCATED_NAME,
        ],
    ];
    // --------------------------------------------
    const WAIT_PRINT_STATUS_LIST = [
        [
            'shipment_status_code' => self::RECEPTION_CODE,
            'shipment_status_name' => self::RECEPTION_NAME,
        ],
        [
            'shipment_status_code' => self::UNALLOCATED_CODE,
            'shipment_status_name' => self::UNALLOCATED_NAME,
        ],
        [
            'shipment_status_code' => self::ALLOCATED_CODE,
            'shipment_status_name' => self::ALLOCATED_NAME,
        ],
    ];
    // --------------------------------------------
    const WAIT_INSPECTION_STATUS_LIST = [
        [
            'shipment_status_code' => self::RECEPTION_CODE,
            'shipment_status_name' => self::RECEPTION_NAME,
        ],
        [
            'shipment_status_code' => self::UNALLOCATED_CODE,
            'shipment_status_name' => self::UNALLOCATED_NAME,
        ],
        [
            'shipment_status_code' => self::ALLOCATED_CODE,
            'shipment_status_name' => self::ALLOCATED_NAME,
        ],
        [
            'shipment_status_code' => self::WAIT_PRINT_CODE,
            'shipment_status_name' => self::WAIT_PRINT_NAME,
        ],
    ];
    // --------------------------------------------
    const INSPECTED_STATUS_LIST = [
        [
            'shipment_status_code' => self::RECEPTION_CODE,
            'shipment_status_name' => self::RECEPTION_NAME,
        ],
        [
            'shipment_status_code' => self::UNALLOCATED_CODE,
            'shipment_status_name' => self::UNALLOCATED_NAME,
        ],
        [
            'shipment_status_code' => self::ALLOCATED_CODE,
            'shipment_status_name' => self::ALLOCATED_NAME,
        ],
        [
            'shipment_status_code' => self::WAIT_PRINT_CODE,
            'shipment_status_name' => self::WAIT_PRINT_NAME,
        ],
        [
            'shipment_status_code' => self::WAIT_INSPECTION_CODE,
            'shipment_status_name' => self::WAIT_INSPECTION_NAME,
        ],
    ];
    // --------------------------------------------
}