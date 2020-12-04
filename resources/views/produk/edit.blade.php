@extends('layout.master')
@section('content')
<div class="container">
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error) 
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif    
   <h2>Edit Data</h2>
    <form action="{{ route('produk.update' , $produk->id_produk)}}" method="post">
        @csrf
        
        <div class="form-group row">
            <label for="kode" class="col-sm-2 col-form-label">Kode Produk</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="kode" name="kode" value="{{$produk->id_produk}}">
            </div>            
        </div>
        <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Produk</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama" value="{{$produk->nama_produk}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="harga" name="harga" value="{{$produk->harga}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="harga" class="col-sm-2 col-form-label">Fungsi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="fungsi" name="fungsi" value="{{$produk->fungsi}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="supplier" class="col-sm-2 col-form-label">Kategori</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="kategori" name="kategori" value="{{$produk->kategori}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="harga" class="col-sm-2 col-form-label">Stok</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="stok" name="stok" value="{{$produk->stok}}">
            </div>
        </div>
        <div><button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('produk.index') }}" class="btn btn-danger" style="margin-top; -8px">Cancel</a>
        </div>
  </div>
    </form>
</div>
@endsection