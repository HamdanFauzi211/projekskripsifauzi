<!-- Hero Start -->
<div class="container-fluid py-5 mb-5">
    <div class="container py-5">
        <div class="row justify-content-start">
            <div class="col-lg-12 text-center text-lg-start">
                <h1 class="display-4 mb-md-4 text-center">Halaman Grafik </h1>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<canvas id="barChart" width="400" height="200"></canvas>

<!-- Appointment Start -->
<!-- <div class="container-fluid my-5 py-5" style="background-color:#354F8E;">
    <div class="container py-5">
        <div class="row gx-5">
            <div class="col-lg-12">
                @foreach ($getAllChart as $gkey => $gval)
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$gkey}}" aria-expanded="false" aria-controls="collapse{{$gkey}}">
                            {{$gval->title}}
                        </button>
                        </h2>
                        <div id="collapse{{$gkey}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <canvas id="chart{{$gkey}}" class="rounded shadow" height="100px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div> -->
<!-- Appointment End -->

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<!-- CHARTS -->
@foreach ($getAllChart as $gkey => $gval)
<script>
    console.log('message','chart{{$gkey}}')
    var ctx = document.getElementById('chart{{$gkey}}').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'pie',
        // The data for our dataset
        data: {
            labels:  {!!json_encode($gval->labels)!!} ,
            datasets: [
                {
                    label: 'Jumlah',
                    backgroundColor: {!! json_encode($gval->colours)!!} ,
                    data:  {!! json_encode($gval->dataset)!!} ,
                },
            ]
        },
        // Configuration options go here
        options: {
            scales: {
                y: {
                    beginAtZero: true, // Mulai dari 0
                    min: 1, // Nilai minimal 1
                    max: 10, // Nilai maksimal 10
                    ticks: {
                        stepSize: 1 // Langkah antar nilai 1
                    },
                    scaleLabel: {
                        display: false
                    }
                }
            },
            legend: {
                labels: {
                    // This more specific font property overrides the global property
                    fontColor: '#122C4B',
                    fontFamily: "'Muli', sans-serif",
                    padding: 25,
                    boxWidth: 25,
                    fontSize: 14,
                }
            },
            layout: {
                padding: {
                    left: 10,
                    right: 10,
                    top: 0,
                    bottom: 10
                }
            }
        }
    });
</script>

<script>
        // Mengambil data JSON dari API menggunakan Fetch API
        fetch('/admin/json_grafik')
            .then(response => response.json())
            .then(dataJSON => {

                // Fungsi untuk mendapatkan ID dari URL menggunakan Regex
            function getIdFromURL() {
                const url = window.location.href;
                const regex = /\/admin\/hasilgrafikanak\/(\d+)/;
                const match = url.match(regex);
                if (match && match[1]) {
                    return match[1];
                }
                return null;
            }

            // Mendapatkan ID dari URL
            const siswaId = getIdFromURL();
            // Menyaring data berdasarkan siswa_id = 127
            var dataSiswa127 = dataJSON.filter(function(item) {
                return item.siswa_id == siswaId;
            });

            // Menghitung jumlah interpretasi akhir berdasarkan kesimpulan dan tanggal jadwal penilaian
            var result = {};
            dataSiswa127.forEach(function(item) {
                var key = item.tanggal_jadwal;
                result[key] = result[key] || {};
                var kesimpulan = '';
                if (item.interpretasi_akhir_id == 1) {
                    kesimpulan = 'Normal';
                } else if (item.interpretasi_akhir_id == 2) {
                    kesimpulan = 'Suspect';
                } else if (item.interpretasi_akhir_id == 3) {
                    kesimpulan = 'Untestable';
                }
                result[key][kesimpulan] = result[key][kesimpulan] ? result[key][kesimpulan] + 1 : 1;
            });

            // Mengambil data untuk labels (tanggal jadwal) dan datasets (jumlah interpretasi akhir per kesimpulan)
            var labels = Object.keys(result);
            var datasets = [];
            var kesimpulans = Array.from(new Set(dataSiswa127.map(item => {
                if (item.interpretasi_akhir_id == 1) {
                    return 'Normal';
                } else if (item.interpretasi_akhir_id == 2) {
                    return 'Suspect';
                } else if (item.interpretasi_akhir_id == 3) {
                    return 'Untestable';
                }
            })));

            // Tentukan warna untuk setiap kesimpulan
            var warna = {
                'Normal': 'rgba(54, 162, 235, 0.2)', // Biru
                'Suspect': 'rgba(255, 165, 0, 0.2)', // Orange
                'Untestable': 'rgba(255, 0, 0, 0.2)' // Merah
            };

            kesimpulans.forEach(function(kesimpulan) {
                var data = labels.map(function(label) {
                    return result[label][kesimpulan] || 0;
                });
                datasets.push({
                    label: kesimpulan,
                    data: data,
                    backgroundColor: warna[kesimpulan],
                    borderColor: warna[kesimpulan],
                    borderWidth: 1
                });
            });

            // Mengubah tanggal ke format hari, dd/mm/yyyy menjadi hari, dd/mm/yyyy dan membalik urutan tanggal
            var labelsWithDay = labels.map(function(label) {
                var dateParts = label.split('-');
                var year = dateParts[0];
                var month = dateParts[1];
                var day = dateParts[2];
                var date = new Date(year, month - 1, day); // Month in JavaScript starts from 0 (January is 0)
                var dayNames = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                var dayName = dayNames[date.getDay()];
                return dayName + ', ' + day + '/' + month + '/' + year;
            }).reverse(); // Memperbalik urutan tanggal

            // Membuat grafik batang dengan Chart.js
            var ctx = document.getElementById('barChart').getContext('2d');
            var barChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labelsWithDay, // Menggunakan labelsWithDay yang sudah diperbarui
                    datasets: datasets
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true, // Mulai dari 0
                            min: 1, // Nilai minimal 1
                            max: 10, // Nilai maksimal 10
                            ticks: {
                                stepSize: 1 // Langkah antar nilai 1
                            }
                        }
                    }
                }
            });
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
    </script>

@endforeach
