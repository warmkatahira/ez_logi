<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    // 主キーカラムを変更
    protected $primaryKey = 'item_code';
    // オートインクリメント無効化
    public $incrementing = false;
    // Laravel 6.0+以降なら指定
    protected $keyType = 'string';

    Public function stock()
    {
        // stockモデルのデータを引っ張てくる
        return $this->hasOne('App\Models\Stock', 'item_code');
    }
}
