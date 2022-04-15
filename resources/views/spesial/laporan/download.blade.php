<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        h1 {
            text-align: center;
        }

        table {
            width: 100%;
        }
    </style>
</head>

<body>
    <h1 class="text-center">Laporan Pengaduan Masyarakat</h1>
    <hr />
    <table border="1">
        <tr>
            <th>No</th>
            <th>Tanggal Pengaduan</th>
            <th>Pelapor</th>
            <th>No. Telepon</th>
            <th>Isi Laporan</th>
        </tr>
        @foreach($data as $row)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $row->tanggal_pengaduan }}</td>
            <td>{{ $row->user->nama }}</td>
            <td>{{ $row->user->telp }}</td>
            <td>{{ $row->isi_laporan}}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>