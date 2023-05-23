<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukm extends Model
{
    use HasFactory;

    protected $table = 'ukm';

    protected $fillable = [
        'name', 'detail', 'image',
    ];

    public function isJoinedBy(User $user)
    {
        return $this->mahasiswaUkms()
            ->where('user_id', $user->id)
            ->exists();
    }

    public function mahasiswaUkms()
    {
        return $this->hasMany(MahasiswaUkm::class);
    }
}
