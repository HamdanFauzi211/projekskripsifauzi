<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>PAUD LITTLE CARE YOGYAKARTA</title>
    <!-- Masukkan bagian head yang dibutuhkan, seperti link CSS, favicon, dll. -->
    <!-- ... -->

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <!-- Masukkan bagian header yang dibutuhkan, seperti logo, navigasi, dll. -->
        <!-- ... -->
    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <!-- Masukkan bagian sidebar yang dibutuhkan -->
        <!-- ... -->
    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Halaman Hasil Pengukuran Tumbuh Kembang Anak</h5>
                            <h5 class="card-title text-center">{{ $penilaian->first()->siswa->nama }}</h5>

                            <table class="table datatable">
                                <thead>
                                    <tr>
                                    <th scope="col">Tanggal Pengukuran</th>
                                    <th scope="col">Hari Pengukuran</th>
                                    <th scope="col">Item Perintah</th>
                                    <th scope="col">Skor</th>
                                    <th scope="col">Predikat</th>
                                    </tr>
                                </thead>
                                <body>
                                    @foreach ($penilaian as $nilai)
                                    <tr>
                                    <td>{{ $nilai->jadwalpenilaian->tanggal }}</td>
                                    <td>{{ $nilai->jadwalpenilaian->nama_jadwal }}</td>
                                    <td>{{ $nilai->itemperintah->perintah }}</td>
                                    <td>{{ number_format((float)$nilai->skor, 2, '.', '') }}</td>
                                    <td>{{ $nilai->nilai }}</td>
                                    </tr>
                                    @endforeach
                                </body>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <!-- Masukkan bagian footer yang dibutuhkan, seperti hak cipta, dll. -->
        <!-- ... -->
    </footer><!-- End Footer -->

    <!-- Masukkan script JS yang dibutuhkan -->
    <!-- ... -->

</body>

</html>