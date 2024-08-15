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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
</head>

<body>
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
        <div class="print-date"><?= date('l, d F Y', strtotime($master['created_at'])) . ' | ' . date('H:i', strtotime($master['created_at'])) ?></div>

        <table class="table table-borderless my-1">
            <tr>
                <th>Medical Record</th>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>ID</td>
                <td>:</td>
                <td><?= $master['id'] ?></td>
                <td>Services Name</td>
                <td>:</td>
                <td><?= $master['nama_pelayanan'] ?></td>
            </tr>
            <tr>
                <td>Type of Services</td>
                <td>:</td>
                <td><?= $master['jenis_pelayanan'] ?></td>
                <td>BPJS Number</td>
                <td>:</td>
                <td><?= $master['no_bpjs'] ?></td>
            </tr>
            <tr>
                <td>Cost</td>
                <td>:</td>
                <td><?= 'Rp ' . $master['biaya'] ?></td>
            </tr>
            <tr>
                <th>Patient Data</th>
                <td></td>
                <td></td>
                <th>Medical Staff</th>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td><?= $master['nik'] ?></td>
                <td>NIP</td>
                <td>:</td>
                <td><?= $master['nip'] ?></td>
            </tr>
            <tr>
                <td>Patient Name</td>
                <td>:</td>
                <td><?= $master['nama_pasien'] ?></td>
                <td>Medical Staff Name</td>
                <td>:</td>
                <td><?= $master['nama_tenaga_medis'] ?></td>
            </tr>
            <tr>
                <td>Birth</td>
                <td>:</td>
                <td><?= $master['tempat_lahir_pasien'] . ', ' . date('d F Y', strtotime($master['tanggal_lahir_pasien'])) ?></td>
                <td>Position</td>
                <td>:</td>
                <td><?= $master['jabatan'] ?></td>
            </tr>
        </table>

        <div class="row align-items-center">
            <div class="col-9">
                <h5 class="h5 font-weight-bold">Total Cost: <span>Rp <?= $master['jenis_pelayanan'] == 'BPJS' ? '0' : $master['biaya']; ?></span></h5>
            </div>
            <div class="col-3 text-center">
                <p class="mb-5">Adminitration Staff,</p>
                <p class="mb-2 font-weight-bold"><?= user()->fullname ?></p>
            </div>
        </div>
    </div>

    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>

</html>