<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
<style>
#gedung {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#gedung td, #gedung th {
  border: 1px solid #ddd;
  padding: 8px;
}

#gedung tr:nth-child(even){background-color: #f2f2f2;}

#gedung tr:hover {background-color: #ddd;}

#gedung th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</style>
<body >
    <h3 align="center">Data Ruangan</h3>
    <table id="gedung" align="center" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Ruangan</th>
                <th>Kategori Ruangan</th>
                <th>Gedung</th>
                <th>Kapasitas</th>
                <th>Status</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @php $no=1; @endphp
            @foreach($ruangan as $row)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $row->nama_ruangan }}</td>
                <td>{{ $row->kategoriRuangan->nama_kategori }}</td>
                <td>{{ $row->gedung->nama_gedung }}</td>
                <td>{{ $row->kapasitas }}</td>
                <td>{{ $row->status }}</td>
                <td>{{ $row->harga }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>