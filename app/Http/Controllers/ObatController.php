<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Obat;

use App\Exports\ExportObat;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class ObatController extends Controller
{
    public function index(){
        $batas = 5;
        $jumlah_obat = Obat::count();
        $obat = Obat::orderBy('id', 'desc')->paginate($batas);
        $no=$batas * ($obat->currentPage() - 1);
        return view('obat.index', compact('obat', 'no', 'jumlah_obat'));
    }

    public function create(){
        return view('obat.create');
    }

    public function store(Request $request){
        $request->validate([
            'kode' => 'required|numeric',
            'nama' => 'required|unique:obat',
            'harga' => 'required|numeric',
            'supplier' => 'required'
        ]);

        $obat = new Obat;
        $obat->id = $request->kode;
        $obat->nama = $request->nama;
        $obat->harga = $request->harga;
        $obat->jenis = $request->jenis;
        $obat->tgl_exp = $request->tgl_exp;
        $obat->supplier = $request->supplier;
        $obat->save();
        return redirect('/obat')->with('pesan','Data Berhasil Disimpan');
    }

    public function edit($id){
        $obat = Obat::find($id);
        return view('obat.edit', compact('obat'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'kode' => 'required|numeric',
            'nama' => 'required|unique:obat',
            'harga' => 'required|numeric',
            'supplier' => 'required'
        ]);

        $obat = Obat::find($id);
        $obat->id = $request->kode;
        $obat->nama = $request->nama;
        $obat->harga = $request->harga;
        $obat->jenis = $request->jenis;
        $obat->tgl_exp = $request->tgl_exp;
        $obat->supplier = $request->supplier;
        $obat->update();
        return redirect('/obat')->with('pesan','Data Berhasil Diupdate');
    }

    public function destroy($id){
        $obat = Obat::find($id);
        $obat->delete();
        return redirect('/obat')->with('pesan','Data Berhasil Dihapus');
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

    
