<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;
    protected $table = 'profil';
    protected $fillable = [
        'id_profil',
        'nama',
        'tentang_kami',
        'visi',
        'misi',
        'alamat',
        'no_hp',
        'email',
        'status',
        'gambar'
    ];
}
