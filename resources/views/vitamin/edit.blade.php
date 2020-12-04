@extends('layout.master')
@section('content')
<div class="container">
   <h2>Update Vitamin</h2>
   @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error) 
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif    
    <form action="{{ route('vitamin.update' , $vitamin->id)}}" method="post">
        @csrf
        
        <div class="form-group row">
            <label for="kode" class="col-sm-2 col-form-label">Kode vitamin</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="kode" name="kode" value="{{$vitamin->id}}">
            </div>            
        </div>
        <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama vitamin</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama" value="{{$vitamin->nama_vitamin}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="harga" name="harga" value="{{$vitamin->harga}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="jenis" class="col-sm-2 col-form-label">Jenis</label>
            <div class="col-sm-10">
            <select class="form-control" id="jenis" name="jenis">
            <option selected value="{{$vitamin->jenis}}">{{$vitamin->jenis}}
                <option>--Pilih Jenis Vitamin--</option>
                <option>Cair</option>
                <option>Tablet</option>
            </option>
            </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="fungsi" class="col-sm-2 col-form-label">Fungsi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="fungsi" name="fungsi" value="{{$vitamin->fungsi}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="Ukuran" class="col-sm-2 col-form-label">Ukuran</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="ukuran" name="ukuran" value="{{$vitamin->ukuran}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="exp" class="col-sm-2 col-form-label">Expired</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="tgl_exp" name="tgl_exp" value="{{$vitamin->tgl_exp}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="produksi" class="col-sm-2 col-form-label">Produksi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="tgl_prod" name="tgl_prod" value="{{$vitamin->tgl_prod}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="supplier" class="col-sm-2 col-form-label">Supplier</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="supplier" name="supplier" value="{{$vitamin->supplier}}">
            </div>
        </div>
        <div><button type="submit" class="btn btn-primary">Simpan</button></div>
  </div>
    </form>
</div>
@endsection