<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'nama_produk', 'harga', 'fungsi', 'kategori_id', 'stok'];

    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }
}
