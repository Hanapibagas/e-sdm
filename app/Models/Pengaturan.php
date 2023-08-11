<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_dinas',
        'alamat_dinas',
        'nama_kadis',
        'jabatan_kadis',
        'foto_kadis',
        'image_background',
        'primary_color',
        'running_text'
    ];
}
