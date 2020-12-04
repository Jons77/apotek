<!DOCTYPE html>
<head>
    <title>Cetak PDF Data Obat</title>
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
    <h2 align="center">Cetak Data Obat</h2>
        <table>
            <thead>
                <tr>
                    <th style="width: 5%">No.</th>
                    <th style="width: 12%">Kode Obat</th>
                    <th style="width: 16.66%">Nama Obat</th>
                    <th style="width: 10%">Harga</th>
                    <th style="width: 12%">Jenis</th>
                    <th style="width: 14%">Expired.</th>
                    <th style="width: 14%">Supplier</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($obat as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ number_format ($data->harga), 0, ',', ',' }}</td>
                    <td>{{ $data->jenis }}</td>
                    <td>{{ $data->tgl_exp->format('d/m/Y') }}</td>
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