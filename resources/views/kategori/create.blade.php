@extends('layout.master')
@section('content')
<div class="container">
   <h2>Tambah Kategori</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error) 
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif    
    <form action="{{ route('kategori.store') }}" method="post">
        @csrf
        
        <div class="form-group row">
            <label for="kode" class="col-sm-2 col-form-label">ID Kategori</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="kode" name="kode">
            </div>            
        </div>
        <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Kategori</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
        </div>
        <div><button type="submit" class="btn btn-primary">Simpan</button></div>
  </div>
    </form>
</div>
@endsection