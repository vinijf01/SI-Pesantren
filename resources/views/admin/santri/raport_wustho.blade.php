<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kop Surat</title>
    <style>
        body {
            margin-left: 80px;
            margin-right: 80px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        table {
            font-size: 10px;
            width: 100%;
            border-collapse: collapse;
        }

        h3 {
            text-align: center;
            padding-bottom: 0%;
        }

        h4 {
            text-align: center;
        }

        header {
            text-align: center;
        }

        .logo {
            float: left;
            /* margin-right: 20px; */
        }

        hr {
            border: 2px solid black;
            margin-bottom: 20px
        }

        .pimpinan {
            text-align: left;
            font-size: 9px;
            margin-top: 20px;

            /* Menambahkan properti text-indent untuk mengatur indentasi pada baris pertama */
            text-indent: 0.5cm;
            float: right;
        }

        .pimpinan .mengetahui {
            font-weight: bold;

        }

        .pimpinan {
            line-height: 1.5;
        }
    </style>
</head>

<body>
    <header>
        <header>
            <img src="{{ asset('assets/img/logo/LogoABA.png') }}" class="logo" width="100" height="80">
            <h3>PONDOK PESANTREN ABDURRAHMAN BIN AUF<br>
                LAPORAN DATA SANTRI PKPPS TINGKAT WUSTHO<br>
                Tahun Ajaran: {{ $santri->isNotEmpty() ? $santri->first()->TA : 'Data tidak ditemukan' }}</h3>
        </header>
    </header>
    <hr>

    <center>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Nama Santri</th>
                <th>ID Santri</th>
                <th>Jenis Kelamin</th>
                <th>No Whatsapp</th>
            </tr>
            @php
                $totalSantri = 0;
            @endphp
            @foreach ($santri as $index => $item)
                <tr>
                    <th>{{ $index + 1 }}</th>
                    <td>{{ $item->nama_lengkap }}</td>
                    <td>{{ $item->id_santri }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->no_wa }}</td>
                </tr>
                @php
                    $totalSantri += 1;
                @endphp
            @endforeach

            <tr>
                <td colspan="4" style="text-align: center">Total Santri</td>
                <td>{{ $totalSantri }}</td>
            </tr>
        </table>
    </center>

    <p class="pimpinan">
        <span class="mengetahui">Mengetahui,</span><br>
        Pimpinan Pondok Pesantren<br>
        <br><br>
        Muhammad Rizky Asyura, BA
    </p>

</body>

</html>
