<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;

//use App\Exports\ExportObat;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class ProdukController extends Controller
{
    public function index(){
        $batas = 5;
        $jumlah_produk = Produk::count();
        $produk = Produk::orderBy('id_produk', 'desc')->paginate($batas);
        $no=$batas * ($produk->currentPage() - 1);
        return view('produk.index', compact('produk', 'no', 'jumlah_produk'));
    }

    public function create(){
        return view('produk.create');
    }

    public function store(Request $request){
        $produk = new Produk;
        $produk->id_produk = $request->kode;
        $produk->nama_produk = $request->nama;
        $produk->harga = $request->harga;
        $produk->fungsi = $request->fungsi;
        $produk->kategori_id = $request->kategori;
        $produk->stok = $request->stok;
        $produk->save();
        return redirect('/produk')->with('pesan','Data Berhasil Disimpan');
    }

    public function edit($id_produk){
        $id_produk = Produk::find($id_produk);
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, $id_produk){
        $request->validate([
            'kode' => 'required|numeric',
            'nama' => 'required|unique:produk',
            'harga' => 'required|numeric',
        ]);

        $produk = new Produk;
        $produk->id_produk = $request->kode;
        $produk->nama_produk = $request->nama;
        $produk->harga = $request->harga;
        $produk->fungsi = $request->fungsi;
        $produk->kategori_id = $request->kategori;
        $produk->stok = $request->stok;
        $produk->save();
        return redirect('/produk')->with('pesan','Data Berhasil Diupdate');
    }

    public function destroy($id_produk){
        $produk = Produk::find($id_produk);
        $produk->delete();
        return redirect('/produk')->with('pesan','Data Berhasil Dihapus');
    }

    //public function search(Request $request){
      //  $batas = 5;
        //$cari = $request->kata;
        
        //$obats = Obat::where('nama', 'like', "%" . $cari . "%")
        //->orwhere('id', 'like', "%" . $cari . "%")
        //->orwhere('supplier', 'like', "%" . $cari . "%");

        //$obat = $obats->paginate($batas);

        //$jumlah_obat = $obats->get()->count();
        //$no = $batas * ($obat->currentPage() - 1);
        //return view('obat.search', compact('obat', 'no', 'cari', 'jumlah_obat'));
    //}

   // public function exportObat(){
     //   return Excel::download(new exportObat, 'obat.xlsx');
    //}

    //public function pdfObat(){
     //   $obat = Obat::all();
      //  return view('obat.pdfObat', compact('obat'));
    //}
}

    

