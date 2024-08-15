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

        <div class="print-date"><?= date('l, d F Y'); ?></div>

        <table class="table table-borderless my-5">
            <tr>
                <th>Medical Record</th>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>ID</td>
                <td>:</td>
                <td><?= $master['id'] ?></td>
            </tr>
            <tr>
                <td>Registration Date</td>
                <td>:</td>
                <td><?= date('l, d F Y', strtotime($master['created_at'])) . ' | ' . date('H:i', strtotime($master['created_at'])) ?></td>
            </tr>
            <tr>
                <td>Services Name</td>
                <td>:</td>
                <td><?= $master['nama_pelayanan'] ?></td>
            </tr>
            <tr>
                <td>Type of Services</td>
                <td>:</td>
                <td><?= $master['jenis_pelayanan'] ?></td>
            </tr>
            <tr>
                <td>BPJS Number</td>
                <td>:</td>
                <td><?= $master['no_bpjs'] ?></td>
            </tr>
            <tr>
                <td>Cost</td>
                <td>:</td>
                <td><?= 'Rp ' . number_format($master['biaya'], 0, ',', ',') ?></td>
            </tr>
            <tr>
                <th>Patient Data</th>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td><?= $master['nik'] ?></td>
            </tr>
            <tr>
                <td>Patient Name</td>
                <td>:</td>
                <td><?= $master['nama_pasien'] ?></td>
            </tr>
            <tr>
                <td>Birth</td>
                <td>:</td>
                <td><?= $master['tempat_lahir_pasien'] . ', ' . date('d F Y', strtotime($master['tanggal_lahir_pasien'])) ?></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>:</td>
                <td><?= $master['jenis_kelamin_pasien'] ?></td>
            </tr>
            <tr>
                <td>Religion</td>
                <td>:</td>
                <td><?= $master['agama_pasien'] ?></td>
            </tr>
            <tr>
                <td>Occupation</td>
                <td>:</td>
                <td><?= $master['pekerjaan'] ?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td>:</td>
                <td><?= $master['alamat_pasien'] ?></td>
            </tr>
            <tr>
                <td>Phone Number</td>
                <td>:</td>
                <td><?= $master['no_telepon_pasien'] ?></td>
            </tr>
            <tr>
                <th>Medical Staff</th>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>NIP</td>
                <td>:</td>
                <td><?= $master['nip'] ?></td>
            </tr>
            <tr>
                <td>Medical Staff Name</td>
                <td>:</td>
                <td><?= $master['nama_tenaga_medis'] ?></td>
            </tr>
            <tr>
                <td>Position</td>
                <td>:</td>
                <td><?= $master['jabatan'] ?></td>
            </tr>
        </table>

        <div class="row">
            <div class="col-9"></div>
            <div class="col-3 text-center">
                <p class="mb-5">Medical Staff,</p>
                <p class="mt-5 font-weight-bold"><?= $master['nama_tenaga_medis'] ?></p>
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