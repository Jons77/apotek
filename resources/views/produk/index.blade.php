@extends('layout.master')
@section('content')
<div class="container">
    @if(Session::has('pesan'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('pesan') }}
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand">Data Produk</a>
                <form action="{{ route('produk.search') }}" method="get"> @csrf <input type="text" name="kata" 
                    placeholder="Search"></form>
                </nav>
                <br>
                <div class="panel-heading">
                        <a href="{{ route('produk.create') }}" class="btn btn-success pull-right" 
                        style="margin-top; -8px">Tambah Data</a>
                        <a href="{{ route('excel') }}" class="btn btn-success pull-right" 
                        style="margin-top; -8px">Export Excel</a>
                        <a href="{{ route('cetakPdfObat') }}" class="btn btn-info pull-right" target="_blank"
                        style="margin-top; -8px">Cetak PDF</a><br>
                        <br>
                </div>
                <br>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Produk</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Fungsi</th>
                                <th>Kategori</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php $no = $produk->firstItem() - 1; ?>
                            @foreach ($produk as $data)
                        <?php $no++ ; ?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->nama_produk }}</td>
                                <td>{{ $data->harga }}</td>
                                <td>{{ $data->fungsi }}</td>
                                <td>{{ $data->kategori->nama_kategori }}</td>
                                <td>{{ $data->stok}}</td>
                                <td>  
                                <form action="{{ route('produk.destroy' , $data->id) }}" method="post">
                                        @csrf                                  
                                        <a href="{{ route('produk.edit', $data->id) }}" 
                                        class="btn btn-primary pull-right" style="margin-top; -8px">Edit</a>
                                        <button class="btn btn-danger pull-right"  
                                        onClick="return confirm('Apakah anda yakin 
                                        menghapus data?')">Delete</button>
                                </form>                                
                            </tr>
                            @endforeach
                         </tbody>
                    </table>
                    <div>Jumlah Produk: {{ $jumlah_produk }}</div>        
                    <div>{{ $produk->links() }}</div>        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection