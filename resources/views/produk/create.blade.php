@extends('layout.master')
@section('content')
<div class="container">
   <h2>Tambah Produk</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error) 
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif    
    <form action="{{ route('produk.store') }}" method="post">
        @csrf
        
        <div class="form-group row">
            <label for="kode" class="col-sm-2 col-form-label">Kode Produk</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="kode" name="kode">
            </div>            
        </div>
        <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Produk</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
        </div>
        <div class="form-group row">
            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="harga" name="harga">
            </div>
        </div>
        <div class="form-group row">
            <label for="exp" class="col-sm-2 col-form-label">Fungsi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="fungsi" name="fungsi">
            </div>
        </div>
        <div class="form-group row">
            <label for="supplier" class="col-sm-2 col-form-label">Kategori</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="kategori" name="kategori">
            </div>
        </div>
        <div class="form-group row">
            <label for="supplier" class="col-sm-2 col-form-label">Stok</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="stok" name="stok">
            </div>
        </div>
        <div><button type="submit" class="btn btn-primary">Simpan</button></div>
  </div>
    </form>
</div>
@endsection