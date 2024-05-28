<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    protected $fillable = [
        'nama_produk',
        'harga_produk',
        'stok_produk',
        'deskripsi_produk'
    ];

    public function getHargaProdukAttribute($value)
    {
        return "Rp. " . number_format($value, 0, ',', '.');
    }

    public function setHargaProdukAttribute($value)
    {
        $this->attributes['harga_produk'] = str_replace(['Rp.', '.'], '', $value);
    }

    
}
