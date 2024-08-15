<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Welcome to my website">
    <meta name="author" content="Alfian Hidayat">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/vendor/fontawesome-free-6.4.2-web/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
</head>

<body>
    <div class="container py-3 d-print-none">
        <div class="d-flex align-items-center justify-content-between bg-light rounded-lg shadow-sm p-1">
            <a class="btn btn-outline-secondary border-0 font-weight-bold" href="<?= base_url('transaksi'); ?>"><i class="fas fa-angle-left"></i><span class="ml-2"></span>Back</a>
            <div class="d-none d-lg-inline px-3">
                Print by: <span class="font-weight-bold"><?= user()->fullname; ?></span>
            </div>
        </div>
    </div>

    <div class="container py-2">
        <div class="print-letterhead">
            <img src="<?= base_url('assets/img/my-clinic.webp'); ?>" alt="My Clinic" class="print-company-logo">
            <div class="print-company-info">
                <div class="print-company-name">My Clinic</div>
                <div class="print-company-address">123 Main Street, Suite 101</div>
                <div class="print-company-address">City, State 12345</div>
                <div class="print-contact-info">Phone: (123) 456-7890 | Email: info@myclinic.com</div>
            </div>
        </div>

        <div class="print-divider"></div>

        <h2 class="font-weight-bold text-center">Financial Report</h2>
        <div class="text-center mb-4"><?= date('d F Y', strtotime($tanggal_awal)); ?> - <?= date('d F Y', strtotime($tanggal_akhir)); ?></div>

        <div class="table-responsive">
            <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">ID</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Medical Staff Name</th>
                        <th scope="col">Service Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Cost</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php $totalCost = 0; // Inisialisasi total biaya 
                    ?>
                    <?php foreach ($report as $r) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= date('d-m-Y', strtotime($r['created_at'])); ?></td>
                            <td><?= $r['id'] ?></td>
                            <td><?= $r['nama_pasien'] ?></td>
                            <td><?= $r['nama_tenaga_medis'] ?></td>
                            <td><?= $r['nama_pelayanan'] ?></td>
                            <td><?= $r['jenis_pelayanan'] ?></td>
                            <td><?= 'Rp ' . number_format($r['biaya'], 0, ',', ',') ?></td>
                        </tr>
                        <?php $totalCost += $r['biaya'];
                        ?>
                    <?php endforeach; ?>
                    <tr>
                        <th colspan="7" scope="row" class="text-center">Total Cost</th>
                        <td><?= 'Rp ' . number_format($totalCost, 0, ',', ',') ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>

</html>