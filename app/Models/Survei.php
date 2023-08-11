<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survei extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_lengkap',
        'email',
        'jenis_klm',
        'jawab1',
        'jawab2',
        'jawab3',
    ];
}
