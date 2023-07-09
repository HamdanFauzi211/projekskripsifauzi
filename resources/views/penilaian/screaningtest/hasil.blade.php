<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>PAUD LITTLE CARE YOGYAKARTA</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/img/logolittlepedia.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="shortcut icon" href="/assets/img/logolittlepedia2.png">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a class="logo d-flex align-items-center">
                <img src="/assets/img/logolittlepedia.png" alt="">

            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>Kevin Anderson</h6>
                        <span>Web Designer</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                            <i class="bi bi-gear"></i>
                            <span>Account Settings</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                            <i class="bi bi-question-circle"></i>
                            <span>Need Help?</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->
            </ul>
        </nav><!-- End Icons Navigation -->
    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="{{ url('/dataanak') }}">
                            <i class="bi bi-circle"></i><span>Data Anak</span>
                        </a>
                    </li>

                    <li>
                        <a href="forms-elements.html">
                            <i class="bi bi-circle"></i><span>Data Tumbuh Kembang Anak</span>
                        </a>
                    </li>

                    <li>
                        <a href="forms-elements.html">
                            <i class="bi bi-circle"></i><span>Data Status Gizi Anak</span>
                        </a>
                    </li>


                    <li>
                </ul>
            </li><!-- End Forms Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="tables-general.html">
                            <i class="bi bi-circle"></i><span>General Tables</span>

                        </a>
                    </li>
                    <li>
                        <a href="tables-data.html">
                            <i class="bi bi-circle"></i><span>Data Tables</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Tables Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-register.html">
                    <i class="bi bi-card-list"></i>
                    <span>Register</span>
                </a>
            </li><!-- End Register Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-login.html">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Login</span>
                </a>
            </li><!-- End Login Page Nav -->
        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>

                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Sistem Pengukuran Tumbuh Kembang Anak</h5>

                            <!-- General Form Elements -->
                            @php
                                $motorik_kasar = $data->where('aspek_perkembangan_id', 1);
                                $total_motorik_kasar = min($motorik_kasar->pluck('penilaian.0.skor')->sum(), 100);
                            @endphp
                            <div class="row mb-3">
                                <h5>Motorik Kasar</h5>
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Item Perintah</th>
                                            <th scope="col">Skor</th>
                                        </tr>
                                    </thead>

                                    <body>
                                        @foreach ($motorik_kasar as $d)
                                            <tr>
                                                <td>{{ $d->perintah }}</td>
                                                <td>{{ number_format((float)$d->penilaian->get(0)->skor, 2, '.', '') }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th scope="col">Total</th>
                                            <td> {{number_format((float)$total_motorik_kasar, 2, '.', '')}} </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Kesimpulan</th>
                                            <td>
                                                @if ($total_motorik_kasar >= 50)
                                                    "Normal"
                                                @else
                                                    "Caution/Peringatan"
                                                @endif
                                            </td>
                                        </tr>
                                </table>
                            </div>

                            @php
                                $motorik_halus = $data->where('aspek_perkembangan_id', 2);
                                $total_motorik_halus = min($motorik_halus->pluck('penilaian.0.skor')->sum(), 100);
                            @endphp
                            <div class="row mb-3">
                                <h5>Motorik Halus</h5>
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Item Perintah</th>
                                            <th scope="col">Skor</th>
                                        </tr>
                                    </thead>
                                    <body>
                                        @foreach ($motorik_halus as $d)
                                            <tr>
                                                <td>{{ $d->perintah }}</td>
                                                <td>{{ number_format((float)$d->penilaian->get(0)->skor, 2, '.', '') }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th scope="col">Total</th>
                                            <td> {{number_format((float)$total_motorik_halus, 2, '.', '')}} </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Kesimpulan</th>
                                            <td>
                                                @if ($total_motorik_halus >= 50)
                                                    "Normal"
                                                @else
                                                    "Caution/Peringatan"
                                                @endif
                                            </td>
                                        </tr>
                                </table>
                            </div>

                            @php
                                $bicara_dan_bahasa = $data->where('aspek_perkembangan_id', 3);
                                $total_bicara_dan_bahasa = min($bicara_dan_bahasa->pluck('penilaian.0.skor')->sum(), 100);
                            @endphp
                            <div class="row mb-3">
                                <h5>Bicara dan Bahasa</h5>
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Item Perintah</th>
                                            <th scope="col">Skor</th>
                                        </tr>
                                    </thead>
                                    <body>
                                        @foreach ($bicara_dan_bahasa as $d)
                                            <tr>
                                                <td>{{ $d->perintah }}</td>
                                                <td>{{ number_format((float)$d->penilaian->get(0)->skor, 2, '.', '') }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th scope="col">Total</th>
                                            <td> {{number_format((float)$total_bicara_dan_bahasa, 2, '.', '')}} </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Kesimpulan</th>
                                            <td>
                                                @if ($total_bicara_dan_bahasa >= 50)
                                                    "Normal"
                                                @else
                                                    "Caution/Peringatan"
                                                @endif
                                            </td>
                                        </tr>
                                </table>
                            </div>

                            @php
                                $sosial_dan_kemandirian = $data->where('aspek_perkembangan_id', 4);
                                $total_sosial_dan_kemandirian = min($sosial_dan_kemandirian->pluck('penilaian.0.skor')->sum(), 100);
                            @endphp
                            <div class="row mb-3">
                                <h5>Sosial dan Kemandirian</h5>
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Item Perintah</th>
                                            <th scope="col">Skor</th>
                                        </tr>
                                    </thead>
                                    <body>
                                        @foreach ($sosial_dan_kemandirian as $d)
                                            <tr>
                                                <td>{{ $d->perintah }}</td>
                                                <td>{{ number_format((float)$d->penilaian->get(0)->skor, 2, '.', '') }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th scope="col">Total</th>
                                            <td> {{number_format((float)$total_sosial_dan_kemandirian, 2, '.', '')}} </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Kesimpulan</th>
                                            <td>
                                                @if ($total_sosial_dan_kemandirian >= 50)
                                                    "Normal"
                                                @else
                                                    "Caution/Peringatan"
                                                @endif
                                            </td>
                                        </tr>
                                </table>
                            </div>
                            <a href="{{route('penilaian.screening.hasil.kesimpulan.index', ['jadwal_penilaian_id' =>$jadwal_penilaian_id, 'siswa_id' => $siswa_id])}}" class="btn btn-primary">Tarik Kesimpulan</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="/assets/vendor/echarts/echarts.min.js"></script>
    <script src="/assets/vendor/quill/quill.min.js"></script>
    <script src="/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>

</body>

</html>
