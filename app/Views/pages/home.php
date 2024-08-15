<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-start mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <?= session()->getFlashdata('message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Medical Records</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $master; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book-medical fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Patients Data</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahPasien; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hospital-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Medical Personel Data</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahTenagaMedis; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-doctor fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Medical Services</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahLayanan; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hand-holding-medical fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center mb-3">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Earnings</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= 'Rp ' . number_format($biayaPelayanan['total_biaya'], 0, ',', ','); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Spline Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-dark">Earnings Overview</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div id="splineChartContainer" style="height: 350px; width: 100%;"></div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                    <h6 class="m-0 font-weight-bold text-dark">Type of Services</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div id="pieChartContainer" style="height: 350px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    // Fungsi untuk menggambar grafik spline
    function renderSplineChart() {
        // Data bulan dan biaya dari PHP
        var bulanLabels = <?php echo $bulanLabels; ?>;
        var biayaData = <?php echo $biayaData; ?>;

        // Data parameter vertikal
        var vertikalLabels = <?php echo $vertikalLabels; ?>;

        // Membuat objek grafik
        var chart = new CanvasJS.Chart("splineChartContainer", {
            animationEnabled: true,
            axisY: {
                tickValues: vertikalLabels,
                gridThickness: 0,
                prefix: "Rp "
            },
            axisX: {
                title: "Year",
                interval: 1
            },
            data: [{
                type: "spline",
                dataPoints: []
            }]
        });

        // Mengisi dataPoints dengan data bulan dan biaya
        for (var i = 0; i < bulanLabels.length; i++) {
            chart.options.data[0].dataPoints.push({
                x: new Date(bulanLabels[i]),
                y: biayaData[i]
            });
        }

        // Menggambar grafik
        chart.render();
    }

    function renderPieChart() {
        // Data 'jenisPelayanan' yang Anda ambil dari database
        var data = <?php echo json_encode($jenisPelayanan); ?>;

        // Membuat array untuk menyimpan data point di chart
        var chartData = [];
        for (var i = 0; i < data.length; i++) {
            chartData.push({
                label: data[i].jenis_pelayanan,
                y: parseInt(data[i].jumlah)
            });
        }

        // Membuat chart CanvasJS doughnut
        var chart = new CanvasJS.Chart("pieChartContainer", {
            animationEnabled: true,
            colorSet: ["#4e73df", "#1cc88a"],
            data: [{
                type: "doughnut",
                showInLegend: true,
                legendText: "{label}",
                indexLabelFontSize: 14,
                indexLabel: "{label} - #percent%",
                dataPoints: chartData,
            }]
        });

        chart.render();
    }

    window.onload = function() {
        renderSplineChart()
        renderPieChart()
    }
</script>

<?= $this->endSection(); ?>