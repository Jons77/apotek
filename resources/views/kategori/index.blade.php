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
                <a class="navbar-brand">Data Kategori</a>
                <form action="{{ route('kategori.search') }}" method="get"> @csrf <input type="text" name="kata" 
                    placeholder="Search"></form>
                </nav>
                <br>
                <div class="panel-heading">
                        <a href="{{ route('kategori.create') }}" class="btn btn-success pull-right" 
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
                                <th>No Kategori</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php $no = $kategori->firstItem() - 1; ?>
                            @foreach ($kategori as $data)
                        <?php $no++ ; ?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->nama_kategori }}</td>
                                <td>  
                                <form action="{{ route('kategori.destroy' , $data->id) }}" method="post">
                                        @csrf                                  
                                        <a href="{{ route('kategori.edit', $data->id) }}" 
                                        class="btn btn-primary pull-right" style="margin-top; -8px">Edit</a>
                                        <button class="btn btn-danger pull-right"  
                                        onClick="return confirm('Apakah anda yakin 
                                        menghapus data?')">Delete</button>
                                </form>                                
                            </tr>
                            @endforeach
                         </tbody>
                    </table>
                    <div>Jumlah Kategori: {{ $jumlah_kategori }}</div>        
                    <div>{{ $kategori->links() }}</div>        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection