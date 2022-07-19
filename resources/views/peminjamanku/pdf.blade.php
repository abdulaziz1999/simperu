<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
    BODY{
        filter: grayscale(1);
    }
    .inv_heading{
        display: block;
        font-family: sans-serif;
        text-align: start;
        color: #FEA116;
        background: #0F172B;
        font-weight: 800;
        font-size: 2rem;
        padding: 1rem;
        border-radius: .5rem; 
    }
    tr:nth-child(even) {background: #CCC}
    tr:nth-child(odd) {background: #FFF}
    th,td {
        padding: .8rem;
        text-align: start;
    }
    table{
        width: 100%;
    }
</style>
</style>
<body >
    <h1 class="inv_heading">
        SIMPERU
    </h1>
    <table>
        @if (count($invoice))
        @foreach ($invoice as $inv)
        <tr>
            <th>Nomer Order</th>
            <td colspan="4">
                BOOKINGORDER-{{$inv->id}}
            </td>
        </tr>
            <tr>
                <th>Gedung</th>
                <td colspan="4">
                    {{$inv->nama_gedung}}
                </td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td colspan="4">
                    {{$inv->alamat}}
                </td>
            </tr>
            <tr>
                <th>Ruangan</th>
                <td colspan="4">
                    {{$inv->nama_ruangan}}
                </td>
            </tr>
            <tr>
                <th>Kapasitas</th>
                <td colspan="4">
                    {{$inv->kapasitas}}
                </td>
            </tr>
            <tr>
                <th>
                    Tanggal Pinjam
                </th>
                <td colspan="4">
                    {{$inv->tgl_pinjam}}
                </td>
            </tr>
            <tr>
                <th>
                    Tanggal Selesai
                </th>
                <td colspan="4">
                    {{$inv->tgl_selesai}}
                </td>
            </tr>
            <tr>
                <th>
                    Waktu mulai
                </th>
                <td colspan="4">
                    {{$inv->jam_mulai}}
                </td>
            </tr>
            <tr>
                <th>
                    Waktu selesai
                </th>
                <td colspan="4">
                    {{$inv->jam_selesai}}
                </td>
            </tr>
            <tr>
                <th>Harga</th>
                <td colspan="4">
                    {{$inv->harga}}
                </td>
            </tr>
            <tr>
                <th colspan="5">Total Harga</th>
            </tr>
            <tr>
                <th colspan="5">
                    {{$inv->jumlah_transaksi}}
                </th>
            </tr>
            @endforeach
            @endif
        </table>
    </body>
</html>