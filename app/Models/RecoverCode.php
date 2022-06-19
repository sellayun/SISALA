<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecoverCode extends Model
{
    use HasFactory;

    protected $table = 'recovercode';
    
    public $timestamps = false;

    protected $fillable = [
        'id',
        'email',
        'code',
        'datecreate',
        'expire',
        'status',
    ];

    public $incrementing = true;
}
