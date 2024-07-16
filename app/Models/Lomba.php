<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lomba extends Model
{
    use HasFactory;

    protected $table = 'lomba';  // Nama tabel Anda

    protected $primaryKey = 'ID_LOMBA';  // Primary key dari tabel

    public $timestamps = false;  // Nonaktifkan timestamps jika tidak ada kolom created_at dan updated_at

    protected $fillable = [
        'NAMA_LOMBA',
        'gambar',
    ];

    public function masyarakat()
    {
        return $this->hasMany(Pendaftaran::class, 'ID_LOMBA');
    }
}
