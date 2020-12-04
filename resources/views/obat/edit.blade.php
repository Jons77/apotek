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
    <form action="{{ route('obat.update' , $obat->id)}}" method="post">
        @csrf
        
        <div class="form-group row">
            <label for="kode" class="col-sm-2 col-form-label">Kode Obat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="kode" name="kode" value="{{$obat->id}}">
            </div>            
        </div>
        <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Obat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama" value="{{$obat->nama}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="harga" name="harga" value="{{$obat->harga}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="jenis" class="col-sm-2 col-form-label">Jenis</label>
            <div class="col-sm-10">
            <select class="form-control" id="jenis" name="jenis">
                <option selected value="{{$obat->jenis}}">{{$obat->jenis}}
                <option>--Pilih Jenis Obat--</option>
                <option>Bedak</option>
                <option>Cair</option>
                <option>Tablet</option>
                <option>Koyo</option>
                <option>Lotion</option>
                </option>
            </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="exp" class="col-sm-2 col-form-label">Expired</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="tgl_exp" name="tgl_exp" value="{{$obat->tgl_exp}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="supplier" class="col-sm-2 col-form-label">Supplier</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="supplier" name="supplier" value="{{$obat->supplier}}">
            </div>
        </div>
        <div><button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('obat.index') }}" class="btn btn-danger" style="margin-top; -8px">Cancel</a>
        </div>
  </div>
    </form>
</div>
@endsection