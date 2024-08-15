<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-start mb-4">
        <a class="btn btn-outline-secondary border-0 mr-2" href="<?= base_url('tenaga-medis'); ?>"><i class="fas fa-angle-left"></i></a>
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <th>Medical Personnel Data</th>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td>:</td>
                    <td><?= $tenaga_medis['id'] ?></td>
                </tr>
                <tr>
                    <td>Medical Personnel Name</td>
                    <td>:</td>
                    <td><?= $tenaga_medis['nama'] ?></td>
                </tr>
                <tr>
                    <td>Birth</td>
                    <td>:</td>
                    <td><?= $tenaga_medis['tempat_lahir'] . ', ' . date('d-m-Y', strtotime($tenaga_medis['tanggal_lahir'])) ?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>:</td>
                    <td><?= $tenaga_medis['jenis_kelamin'] ?></td>
                </tr>
                <tr>
                    <td>Religion</td>
                    <td>:</td>
                    <td><?= $tenaga_medis['agama'] ?></td>
                </tr>
                <tr>
                    <td>Position</td>
                    <td>:</td>
                    <td><?= $tenaga_medis['jabatan'] ?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>:</td>
                    <td><?= $tenaga_medis['alamat'] ?></td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td>:</td>
                    <td><?= $tenaga_medis['no_telepon'] ?></td>
                </tr>
            </table>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>