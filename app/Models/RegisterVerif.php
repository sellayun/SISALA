<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterVerif extends Model
{
    use HasFactory;

    protected $table = 'registerverif';
    
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
