<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaEkstra extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa_ekstra';

    protected $fillable = [
        'user_id',
        'ekstra_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ekstrakulikuler()
    {
        return $this->belongsTo(Ekstra::class);
    }
}