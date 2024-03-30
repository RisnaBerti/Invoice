<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPemasukan extends Model
{
    use HasFactory;

    protected $table = 'detail_pemasukan';
    protected $primaryKey = 'id_detail_pemasukan';
    protected $fillable = [
        'id_detail_pemasukan',
        'id_pemasukan',
        'id_mitra',
        'janis_pemasukan',
        'nama_barang_masuk',
        'harga_barang_masuk',
        'saldo',
        'keterangan',
        'subtotal'
    ];

    public function pemasukan()
    {
        return $this->belongsTo(Pemasukan::class, 'id_pemasukan', 'id_pemasukan');
    }

    public function mitra()
    {
        return $this->belongsTo(Mitra::class, 'id_mitra', 'id_mitra');
    }

}
