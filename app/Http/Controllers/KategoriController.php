<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

//use App\Exports\ExportObat;
//use Maatwebsite\Excel\Facades\Excel;
//use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    public function index(){
        $batas = 5;
        $jumlah_kategori = Kategori::count();
        $kategori= Kategori::orderBy('id', 'desc')->paginate($batas);
        $no=$batas * ($kategori->currentPage() - 1);
        return view('kategori.index', compact('kategori', 'no', 'jumlah_kategori'));
    }

    public function create(){
        return view('kategori.create');
    }

    public function store(Request $request){            
        $kategori = new Kategori;
        $kategori->id = $request->kode;
        $kategori->nama_kategori = $request->nama;
        $kategori->save();
        return redirect('/kategori')->with('pesan','Data Berhasil Disimpan');
    }

    public function edit($id){
        $kategori = Kategori::find($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id){ 
        $kategori = new Kategori;
        $kategori->id = $request->kode;
        $kategori->nama_kategori = $request->nama;
        $kategori->update();
        return redirect('/kategori')->with('pesan','Data Berhasil Diupdate');
    }

    public function destroy($id){
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect('/kategori')->with('pesan','Data Berhasil Dihapus');
    }

    public function search(Request $request){
        $batas = 5;
        $cari = $request->kata;
        
        $obats = Obat::where('nama', 'like', "%" . $cari . "%")
        ->orwhere('id', 'like', "%" . $cari . "%")
        ->orwhere('supplier', 'like', "%" . $cari . "%");

        $obat = $obats->paginate($batas);

        $jumlah_obat = $obats->get()->count();
        $no = $batas * ($obat->currentPage() - 1);
        return view('obat.search', compact('obat', 'no', 'cari', 'jumlah_obat'));
    }

    public function exportObat(){
        return Excel::download(new exportObat, 'obat.xlsx');
    }

    public function pdfObat(){
        $obat = Obat::all();
        return view('obat.pdfObat', compact('obat'));
    }
}

    
