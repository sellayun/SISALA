<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simulasi extends Model
{
    use HasFactory;

    protected $table = 'simulasi';
    
    public $timestamps = false;

    protected $fillable = [
        'id',
        'email',
        'judul',
        'problem_number',
        'mode',
        'advection_scheme',
        'number_of_iterations',
        'smoothing_parameter',
        'number_read',
        'time_start',
        'days',
        'prtd1',
        'prtd2',
        'switch',
        'iskp',
        'jskp',
        'logical_for_inertial_ramp',
        'z0b',
        'data_a',
        'data_b',
        'data_c',
        'data_d',
        'status',
        'workdir',
        'id_simulasi',
        'hapus',
    ];

    public $incrementing = true;
}
