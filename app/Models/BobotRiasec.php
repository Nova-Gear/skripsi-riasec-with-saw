<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BobotRiasec extends Model
{
    use HasFactory;

    protected $table = 'bobot_riasec';
    protected $fillable = ['Tipe', 'A1', 'A2', 'A3', 'A4', 'A5', 'A6'];

}
