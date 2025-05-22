<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>KARTU RENCANA STUDI (KRS)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .title {
            text-align: center;
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .info-table, .krs-table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table td {
            padding: 4px;
        }

        .krs-table th, .krs-table td {
            border: 1px solid #000;
            padding: 4px;
            text-align: center;
        }

        .krs-table th {
            font-weight: bold;
            background-color: rgb(40, 153, 161);

        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .total-row td {
            font-weight: bold;
        }

        .ip-section p {
            margin: 4px 0;
        }

        .signature {
            margin-top: 50px;
            font-size: 12px;
        }

        .signature div {
            display: inline-block;
            width: 32%;
            text-align: center;
            vertical-align: top;
        }
    </style>
</head>
<body>  

    <div style="overflow: hidden; margin-bottom: 10px;">
    <div style="float: left; width: 60px;">
    <img src="{{ public_path('image/PNC.PNG') }}" style="width: 100px;">
    </div>
    <div style="text-align: center; line-height: 1.4;">
    <div style="font-size: 16px; font-weight: bold;">
        KEMENTERIAN PENDIDIKAN TINGGI, SAINS, DAN TEKNOLOGI<br>
        POLITEKNIK NEGERI CILACAP
    </div>
    <div style="font-size: 10px; margin-top: 4px;">
        Jalan Dr. Soetomo No. 1 Sidakaya - CILACAP 53212 Jawa Tengah<br>
        Telepon: (0282) 533329, Fax: (0282) 537992 www.pnc.ac.id Email: sekretariat@pnc.ac.id
    </div>
</div>

</div>
<hr>

    <div class="title">KARTU RENCANA STUDI (KRS)</div>

    <table class="info-table" style="margin-bottom: 10px;">
        <tr>
            <td style="width: 150px;">N A M A</td>
            <td style="width: 10px;">:</td>
            <td>{{ $krsData['nama_mahasiswa'] }}</td>
        </tr>
        <tr>
            <td>N P M</td>
            <td>:</td>
            <td>{{ $krsData['npm'] }}</td>
        </tr>
        <tr>
            <td>PROGRAM STUDI</td>
            <td>:</td>
            <td>{{ $krsData['nama_prodi'] }}</td>
        </tr>
        <tr>
            <td>SEMESTER / KELAS</td>
            <td>:</td>
            <td>{{ $krsData['semester'] }} / {{ $krsData['nama_kelas'] }}</td>
        </tr>
    </table>

    <table class="krs-table">
        <thead>
            <tr class="bg-cyan-500">
                <th>NO</th>
                <th>KODE MK</th>
                <th class="text-left">MATA KULIAH</th>
                <th>SKS</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalSks = 0;
            @endphp
            @foreach ($krsData['matkuls'] as $index => $matkul)
                @php
                    $totalSks += $matkul['sk'];s
                @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $matkul['kode_matkul'] }}</td>
                    <td class="text-left">{{ $matkul['nama_matkul'] }}</td>
                    <td>{{ $matkul['sks'] }}</td>
                </tr>
            @endforeach
            <tr class="total-row bg-gray-200">
                <td colspan="3" class="text-right">JUMLAH SKS</td>
                <td>{{ $totalSks }}</td>
            </tr>
        </tbody>
    </table>

    <div class="ip-section">
        <p>Indeks Prestasi Semester Lalu : ........</p>
        <p>Indeks Prestasi Komulatif       : ......</p>
    </div>

    <br><br><br><br>
    <div class="signature">
        <div>
            <br>
            Mengetahui,<br>
            Koordinator Prodi<br><br><br><br><br><br>
            ___________________
        </div>
        <div>
            <br><br>
            Dosen Wali<br><br><br><br><br><br>
            ___________________
        </div>
        <div>
            Cilacap, ........................<br><br>
            Mahasiswa<br><br><br><br><br><br>
            ___________________
        </div>
    </div>

</body>
</html>
