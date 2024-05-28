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
        'id_produk',
        'jumlah_barang_masuk',
        'subtotal',
        'saldo',
        'bayar'
    ];

    public function pemasukan()
    {
        return $this->belongsTo(Pemasukan::class, 'id_pemasukan', 'id_pemasukan');
    }

    public function mitra()
    {
        return $this->belongsTo(Mitra::class, 'id_mitra', 'id_mitra');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk' , 'id_produk');
    }

}
