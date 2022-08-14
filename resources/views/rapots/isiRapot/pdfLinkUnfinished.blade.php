<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rapot {{ $siswas['users']['name'] }}</title>
    <style>
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        .columns {
            float: left;
            width: 50%;
            text-align: center;
        }
    </style>
</head>
<body>
    <div >
        @if ($nilai['semester']%2 == 0)
            <h2 style="text-align: center">Rapot Semester Genap Tahun Pelajaran 2020/2021</h2>
        @else
            <h2 style="text-align: center">Rapot Semester Ganjil Tahun Pelajaran 2020/2021</h2>
        @endif
    </div>
    <table style="width: 100%; margin-top:50px;">
        <tr>
            <td style="width: 25%">
                <p style="padding:0px; margin:0px">Nama Sekolah</p>
            </td>
            <td style="width: 65%;">: SMAN 1 BATU AMPAR</td>
            <td style="width: 22%">
                <p style="padding:0px; margin:0px">Kelas</p>
            </td>
            <td style="width: 15%">
                <p style="padding:0px; margin:0px">: {{ $kelas['kelas'] }}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p style="padding:0px; margin:0px">Alamat</p>
            </td>
            <td>: JL. BENGKIRAI RT. 02</td>
            <td>
                <p style="padding:0px; margin:0px">Semester</p>
            </td>
            <td>
                @if ($nilai['semester']%2 == 0 )
                    <p style="padding:0px; margin:0px">: {{ $nilai['semester'] }} (Dua)</p>
                @else
                    <p style="padding:0px; margin:0px">: {{ $nilai['semester'] }} (Satu)</p>
                @endif
            </td>
        </tr>
        <tr>
            <td>
                <p style="padding:0px; margin:0px">Nama</p>
            </td>
            <td>: {{ $siswas['users']['name'] }}</td>
            <td>
                <p style="padding:0px; margin:0px">Tahun Pelajaran</p>
            </td>
            <td>: 2020/2021</td>
        </tr>
        <tr>
            <td>
                <p style="padding:0px; margin:0px">Nomor Induk/NISN</p>
            </td>
            <td>: {{ $siswas['nipd'] }} / {{ $siswas['nis'] }}</td>
        </tr>
    </table>
    <hr style="height:1px; border:none; color:#333; background-color:#333;" />
    <h4> A. Nilai Rapot</h4>
    <table style="width: 100%; border-collapse: collapse; border: 1px solid black; font-size: 0.9rem">
        <thead>
            <tr>
                <th style="border: 1px solid black;">No</th>
                <th style="border: 1px solid black;">Mata Pelajran</th>
                <th style="border: 1px solid black;">Nilai</th>
                <th style="border: 1px solid black;">Predikat</th>
                <th style="border: 1px solid black;">Deskripsi</th>
            </tr>
        </thead>
        <tbody style="text-align: center;">
            @php
                $no=1;
            @endphp
            @foreach ($nilaiDetails as $item)
                @foreach ($item['nilaiDetails'] as $itemDetails)
                    @if ($itemDetails['mapel'] != null)
                        <tr>
                            <td style="border: 1px solid black; text-align: center"">{{ $no++ }}</td>
                            <td style="border: 1px solid black; text-align: left">{{ $itemDetails['mapel']['mata_pelajaran'] }}</td>
                            <td style="border: 1px solid black; text-align: center">{{ $itemDetails['nilai_akhir'] }}</td>
                            <td style="border: 1px solid black; text-align: center">{{ $itemDetails['nilai_huruf'] }}</td>
                            <td style="border: 1px solid black; text-align: center">{{ $itemDetails['deskripsi'] }}</td>
                        </tr>
                    @endif
                @endforeach
            @endforeach
        </tbody>
    </table>
    <h4> B. Ketidakhadiran</h4>
    <h5>Data Belum Diisi!</h5>
    {{-- <table style="border-collapse: collapse; width: 50%; border: 1px solid black;">
        <tr style="border: 1px solid black;">
            <td style="width: 33%">Sakit</td>
            <td style="width: 2%; text-align: center">:</td>
            <td style="width: 15%">
                @if ($nilai['sakit'] == 0 || $nilai['sakit'] == '')
                0 hari
                @else
                {{ $nilai['sakit'] }} hari
                @endif
            </td>
        </tr>
        <tr style="border: 1px solid black;">
            <td style="width: 33%; border-top:1px solid black; border-bottom:1px solid black">Izin</td>
            <td style="width: 2%; text-align: center; border-top:1px solid black; border-bottom:1px solid black">:</td>
            <td style="width: 15%; border-top:1px solid black; border-bottom:1px solid black">
                @if ($nilai['izin'] == 0 || $nilai['izin'] == '')
                0 hari
                @else
                {{ $nilai['izin'] }} hari
                @endif
            </td>
        </tr>
        <tr style="border: 1px solid black;">
            <td style="width: 33%;">Tanpa Keterangan</td>
            <td style="width: 2%; text-align: center">:</td>
            <td style="width: 15%">
                @if ($nilai['tanpa_keterangan'] == 0 || $nilai['tanpa_keterangan'] == '')
                0 hari
                @else
                {{ $nilai['tanpa_keterangan'] }} hari
                @endif
            </td>
        </tr>
    </table> --}}
    <h4> C. Catatan Wali Kelas</h4>
    <h5>Data Belum Diisi!</h5>
    {{-- <table style="border-collapse: collapse; width: 100%; border: 1px solid black;">
        <tr>
            <td style="border: 1px solid black;">{{ $nilai['catatan_wali_kelas'] }}<br><br></td>
        </tr>
    </table> --}}
    <h4> D. Tanggapan Orang Tua/Wali</h4>
    <h5>Data Belum Diisi!</h5>
    {{-- <table style="border-collapse: collapse; width: 100%; border: 1px solid black;">
        <tr>
            <td style="border: 1px solid black;"><br><br><br></td>
        </tr>
    </table> --}}
    <div class="row">
        <div class="columns">
            <p style="margin-bottom: 0px">Mengetahui</p>
            <p style="margin: 0px">Orang Tua/Wali,</p>
            <p style="margin-top: 4em">.........................................</p>

        </div>
        <div class="columns">
            <p style="margin-bottom: 0px">Kutai Timur, {{ \Carbon\Carbon::now()->format('d F Y') }}</p>
            <p style="margin: 0px">Wali Kelas,</p>
            <p style="font-weight: bold; text-decoration: underline; margin-top:4em; margin-bottom: 0px">{{ ($guru !=null)?$guru['users']['name'] :"Wali Kelas"}}</p>
            <span>{{ ($guru !=null)?$guru['users']['name'] :"NIP Wali Kelas"}}</span>
        </div>
    </div>
    <table style="width: 100%; text-align: center;">
        <tr><td style="padding-top: 20px;">Mengetahui</td></tr>
        <tr><td style="padding-bottom: 50px">Kepala Sekolah,</td></tr>
        <tr><td style="font-weight: bold; text-decoration: underline">Polo Admini, S. Pd.</td></tr>
        <tr><td style="">NIP. 197108032006042021</td></tr>
    </table>
</body>
</html>