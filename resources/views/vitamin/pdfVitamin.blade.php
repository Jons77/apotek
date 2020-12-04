<!DOCTYPE html>
<head>
    <title>Cetak PDF Data Vitamin</title>
</head>
<body>
    <style type="text/css">
        body{
            font-family: sans-serif;
        }
        table{
            margin: 20px auto;
            border-collapse: collapse;
        }
        table th, table td{
            border: 1px solid #3c3c3c;
            padding: 3px 8px;
        }
        a {
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }
        .tengah{
            text-align: center;
        }
    </style>
    <h2 align="center">Cetak Data Vitamin</h2>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode Vitamin</th>
                    <th>Nama Vitamin</th>
                    <th>Harga</th>
                    <th>Jenis</th>
                    <th>Fungsi</th>
                    <th>Ukuran</th>
                    <th>Expired</th>
                    <th>Produksi</th>
                    <th>Supplier</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($vitamin as $data)
                <tr>
                                <td>{{  $loop->iteration }}</td>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->nama_vitamin}}</td>
                                <td>{{ number_format ($data->harga), 0, ',', ',' }}</td>
                                <td>{{ $data->jenis }}</td>
                                <td>{{ $data->fungsi }}</td>
                                <td>{{ $data->ukuran }}</td>
                                <td>{{ $data->tgl_exp->format('d/m/Y') }}</td>
                                <td>{{ $data->tgl_prod->format('d/m/Y') }}</td>
                                <td>{{ $data->supplier }}</td>
                </tr>
            @endforeach    
            </tbody>
        </table>
        <script type="text/javascript">
            window.print();
        </script>
</body>
</html>