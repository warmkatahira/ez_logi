<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderBtocImport extends Model
{
    use HasFactory;
    // 主キーカラムを変更
    protected $primaryKey = 'data_import_sn';
}
