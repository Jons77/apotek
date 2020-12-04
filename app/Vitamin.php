<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Vitamin extends Model
{
    protected $table = 'vitamin';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'nama_vitamin', 'harga', 'jenis', 'fungsi', 'ukuran','tgl_exp','tgl_prod', 'supplier'];
    protected $dates = ['tgl_exp', 'tgl_prod'];
    
}
