<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    use HasFactory;

    protected $table = 'donasi'; // Nama tabel sesuai dengan yang ada di database

    protected $primaryKey = 'ID_DONASI'; // Primary key tabel

    public $timestamps = false;  // Nonaktifkan timestamps jika tidak ada kolom created_at dan updated_at

    protected $fillable = [
        'NAMA_PENDONASI',
        'ALAMAT_PENDONASI',
        'NO_TLPN_PENDONASI',
        'FOTO_BUKTI_TRANSFER'
    ];
    

    public function masyarakat()
{
    return $this->belongsTo(Masyarakat::class, 'ID_MASYARAKAT');
}

}
