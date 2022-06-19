<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

// class User extends Authenticatable
class User extends Model
{
    use HasFactory;
    // use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'user';
    
    public $timestamps = false;

    protected $fillable = [
        'id',
        'foto',
        'nama',
        'email',
        'nim',
        'phone',
        'password',
        'level',
        'status',
        'verif',
        'tanggal',
    ];
}
