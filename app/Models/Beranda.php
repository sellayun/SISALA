<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beranda extends Model
{
    use HasFactory;

    protected $table = 'beranda';
    
    public $timestamps = false;

    protected $fillable = [
        'id',
        'foto',
        'judul',
        'deskripsi',
    ];

    public $incrementing = true;
}
