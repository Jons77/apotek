<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;

class POSController extends Controller{

    public function __construct(){
     $this->middleware('kasir');
    }
    
    public function index(){
        $tittle = 'Penjualan Produk';
        return view('pos.index', compact('tittle'));
    }

    public function get_produk($id){
        $dt = Produk::find($id);
        return $dt->toJSON();
    }
}
?>