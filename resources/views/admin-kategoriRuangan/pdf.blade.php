<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    #gedung {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #gedung td,
    #gedung th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #gedung tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #gedung tr:hover {
        background-color: #ddd;
    }

    #gedung th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
</style>
</style>

<body>
    <h3 align="center">Data Kategori Ruangan</h3>
    <table id="gedung" align="center" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @php $no=1; @endphp
            @foreach($kategori_ruangan as $row)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $row->nama_kategori }}</td>
                <td>{{ $row->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>