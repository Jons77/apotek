<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContohController extends Controller{
    public function welcome(){
        return view('welcome');
    }
    public function index(){
        return view('obat.index');
    }
    public function about(){
        return view('profil.about');
    }
    public function contactus(){
        return view('contact.contactus');
    }
    public function datavitamin(){
        return view('vitamin.index');
    }
    public function produk(){
        return view('produk.index');
    }
    public function kategori(){
        return view('kategori.index');
    }
}
