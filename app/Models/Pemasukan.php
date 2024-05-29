<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;

    protected $table = 'pemasukan';
    protected $primaryKey = 'id_pemasukan';
    protected $fillable = [
        'id_pemasukan',
        'id_mitra',
        'tgl_pemasukan',
        'id_user',
        'total_harga',
        'keterangan'
    ];

    public function mitra() {
        return $this->belongsTo(Mitra::class, 'id_mitra', 'id_mitra');
    }

    public function detail() {
        return $this->hasMany(DetailPemasukan::class, 'id_pemasukan', 'id_pemasukan');
    }

    public function user() {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    //relasi produk
    public function produk() {
        return $this->belongsToMany(Produk::class, 'detail_pemasukan', 'id_pemasukan', 'id_produk')->withPivot('id_produk', 'harga_barang_masuk');
    }

}
