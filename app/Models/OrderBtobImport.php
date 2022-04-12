<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderBtobImport extends Model
{
    use HasFactory;
    // 主キーカラムを変更
    protected $primaryKey = 'data_import_sn';
}
