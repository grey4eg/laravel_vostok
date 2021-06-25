<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    // таблица в БД
    protected $table = 'peoples';

    // разрешенные столбцы
    protected $fillable = [
      'Lastname',
      'FirstName',
      'Secondname',
      'Secondname',
      'Debt',
      'StateFee',
      'created_at',
      'updated_at',
    ];

}
