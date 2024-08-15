<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="d-flex align-items-center justify-content-start">
            <a class="btn btn-outline-secondary border-0 mr-2" href="<?= base_url('master'); ?>"><i class="fas fa-angle-left"></i></a>
            <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        </div>
        <a class="btn btn-success" href="<?= base_url('master/print/' . $master['id']); ?>" target="_blank"><i class="fas fa-print"></i><span class="ml-2 d-none d-lg-inline">Print</span></a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-borderless">
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
                <tr>
                    <td>Phone Number</td>
                    <td>:</td>
                    <td><?= $master['no_telepon_pasien'] ?></td>
                </tr>
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
        </div>
    </div>

</div>

<?= $this->endSection(); ?>