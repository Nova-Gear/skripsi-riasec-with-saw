<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstra extends Model
{
    use HasFactory;
    protected $table = 'ekstra';
    protected $fillable = ['name','description'];

    public function isJoinedBy(User $user)
    {
        return $this->mahasiswaEkstras()
            ->where('user_id', $user->id)
            ->exists();
    }

    public function mahasiswaEkstras()
    {
        return $this->hasMany(MahasiswaEkstra::class);
    }
}
