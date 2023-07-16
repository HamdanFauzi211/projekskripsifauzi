<!DOCTYPE html>
<html>
<head>
    <title>Hasil Akhir Penilaian Siswa</title>
</head>
<body>
    <h1>Hasil Akhir Penilaian Siswa</h1>

    <h2>Siswa: {{ $siswa->nama }}</h2>

    @if($hasilAkhir)
        <table>
            <thead>
                <tr>
                    <th>Siswa ID</th>
                    <th>Interpretasi Akhir ID</th>
                    <th>Jadwal Penilaian ID</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $hasilAkhir->siswa_id }}</td>
                    <td>{{ $hasilAkhir->interpretasi_akhir_id }}</td>
                    <td>{{ $hasilAkhir->jadwal_penilaian_id }}</td>
                </tr>
            </tbody>
        </table>
    @else
        <p>Belum ada hasil akhir penilaian untuk siswa ini.</p>
    @endif
</body>
</html>
