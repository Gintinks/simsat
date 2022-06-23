<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sampah extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'nama_sampah',
        'jenis_sampah',
        'berat_sampah',
        'berat_sampah_ke_tpa',
        'berat_sampah_diolah',
    ];
}
