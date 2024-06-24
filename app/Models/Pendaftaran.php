<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'masyarakat';  // Ganti dengan nama tabel Anda

    protected $primaryKey = 'ID_MASYARAKAT';  // Primary key dari tabel

    public $timestamps = false;  // Nonaktifkan timestamps jika tidak ada kolom created_at dan updated_at

    protected $fillable = [
        'NAMA',
        'UMUR',
        'ALAMAT',
        'JENIS_KELAMIN',
        'NOMOR_TELPON',
        'TANGGAL_PENDAFTARAN',
    ];

    public function lomba()
    {
        return $this->hasMany(Lomba::class, 'ID_MASYARAKAT');
    }
}
