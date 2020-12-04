<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model{
 protected $table = 'obat';
 protected $primaryKey = 'id';
 protected $fillable = ['id', 'nama', 'harga', 'jenis', 'tgl_exp', 'supplier'];
 protected $dates = ['tgl_exp'];
}