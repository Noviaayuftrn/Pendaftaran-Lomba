<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    use HasFactory;

    protected $table = 'donatur';


    protected $fillable = [
        'ID_DONASI',
        'NAMA_DONATUR',
        'ALAMAT_DONATUR',
        'NO_TELPON',
    ];
}
