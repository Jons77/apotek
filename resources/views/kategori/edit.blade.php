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
    <form action="{{ route('kategori.update' , $kategori->id)}}" method="post">
        @csrf
        
        <div class="form-group row">
            <label for="kode" class="col-sm-2 col-form-label">ID Kategori</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="kode" name="kode" value="{{$kategori->id}}">
            </div>            
        </div>
        <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Kategori</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama" value="{{$kategori->nama_kategori}}">
            </div>
        </div>

        <div><button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('kategori.index') }}" class="btn btn-danger" style="margin-top; -8px">Cancel</a>
        </div>
  </div>
    </form>
</div>
@endsection