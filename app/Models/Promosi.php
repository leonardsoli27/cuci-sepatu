<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promosi extends Model
{
    use HasFactory;
    protected $table = 'promosi';
    protected $fillable = [
        'id_promosi',
        'nama',
        'deskripsi',
        'status',
        'gambar'
    ];
}
