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
                LAPORAN TAHUNAN CALON SANTRI<br>
                Tahun Ajaran: {{ $calon_santri->first()->TA }}</h3>
        </header>
    </header>
    <hr>

    <center>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Nama Santri</th>
                <th>No Whatsapp</th>
                <th>Program Akademik Pilihan</th>
                <th>Status</th>
            </tr>
            @php
                $totalSantri = 0;
                $totalDiterima = 0;
                $totalDitolak = 0;
            @endphp
            @foreach ($calon_santri as $index => $item)
                <tr>
                    <th>{{ $index + 1 }}</th>
                    <td>{{ $item->nama_lengkap }}</td>
                    <td>{{ $item->no_wa }}</td>
                    <td>{{ $item->program->nama_program }}</td>
                    <td>{{ $item->status }}</td>
                </tr>
                @php
                    $totalSantri += 1;
                    if ($item->status == 'Diterima') {
                        $totalDiterima += 1;
                    } elseif ($item->status == 'Ditolak') {
                        $totalDitolak += 1;
                    }
                @endphp
            @endforeach

            <tr>
                <td colspan="4" style="text-align: center">Total Santri</td>
                <td>{{ $totalSantri }}</td>
            </tr>
            <tr>
                <td colspan="4" style="text-align: center">Total Santri Yang Diterima</td>
                <td>{{ $totalDiterima }}</td>
            </tr>
            <tr>
                <td colspan="4" style="text-align: center">Total Santri Yang Ditolak</td>
                <td>{{ $totalDitolak }}</td>
            </tr>
        </table>
    </center>

    <p class="pimpinan" style="justify-content: right">
        <span class="mengetahui">Mengetahui,</span><br>
        Pimpinan Pondok Pesantren<br>
        <br><br>
        Muhammad Rizky Asyura, BA
    </p>

</body>

</html>
