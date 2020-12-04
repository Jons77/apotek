<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vitamin;

use App\Exports\ExportVitamin;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class VitaminController extends Controller
{
    public function index(){
        $batas = 5;
        $jumlah_vitamin = Vitamin::count();
        $vitamin = Vitamin::orderBy('id', 'desc')->paginate($batas);
        $no=$batas * ($vitamin->currentPage() - 1);
        return view('vitamin.index', compact('vitamin', 'no', 'jumlah_vitamin'));
    }

    public function create(){
        return view('vitamin.create');
    }

    public function store(Request $request){
        $request->validate([
            'kode' => 'required|numeric',
            'nama_vitamin' => 'required|unique:obat',
            'harga' => 'required|numeric',
            'supplier' => 'required'
        ]);

        $vitamin = new Vitamin;
        $vitamin->id = $request->kode;
        $vitamin->nama_vitamin = $request->nama;
        $vitamin->harga = $request->harga;
        $vitamin->jenis = $request->jenis;
        $vitamin->fungsi = $request->fungsi;
        $vitamin->ukuran = $request->ukuran;
        $vitamin->tgl_exp = $request->tgl_exp;
        $vitamin->tgl_prod = $request->tgl_prod;
        $vitamin->supplier = $request->supplier;
        $vitamin->save();
        return redirect('/vitamin')->with('pesan','Data Berhasil Disimpan');
    }

    public function edit($id){
        $vitamin = Vitamin::find($id);
        return view('vitamin.edit', compact('vitamin'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'kode' => 'required|numeric',
            'nama_vitamin' => 'required|unique:obat',
            'harga' => 'required|numeric',
            'supplier' => 'required'
        ]);

        $vitamin = Vitamin::find($id);
        $vitamin->id = $request->kode;
        $vitamin->nama_vitamin = $request->nama;
        $vitamin->harga = $request->harga;
        $vitamin->jenis = $request->jenis;
        $vitamin->fungsi = $request->fungsi;
        $vitamin->ukuran = $request->ukuran;
        $vitamin->tgl_exp = $request->tgl_exp;
        $vitamin->tgl_prod = $request->tgl_prod;
        $vitamin->supplier = $request->supplier;
        $vitamin->save();
        return redirect('/vitamin')->with('pesan','Data Berhasil Disimpan');
    }
    public function destroy($id){
        $vitamin = Vitamin::find($id);
        $vitamin->delete();
        return redirect('/vitamin')->with('pesan','Data Berhasil Dihapus');
    }

    public function search(Request $request){
        $batas = 5;
        $cari = $request->kata;
        
        $vitamins = Vitamin::where('nama_vitamin', 'like', "%" . $cari . "%")
        ->orwhere('id', 'like', "%" . $cari . "%")
        ->orwhere('supplier', 'like', "%" . $cari . "%");

        $vitamin = $vitamins->paginate($batas);

        $jumlah_vitamin = $vitamins->get()->count();
        $no = $batas * ($vitamin->currentPage() - 1);
        return view('vitamin.search', compact('vitamin', 'no', 'cari', 'jumlah_vitamin'));
    }

    public function exportVitamin(){
        return Excel::download(new exportVitamin, 'vitamin.xlsx');
    }

    public function pdfVitamin(){
        $vitamin = Vitamin::all();
        return view('vitamin.pdfVitamin', compact('vitamin'));
    }
}
