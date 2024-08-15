<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <form action="<?= base_url('transaksi/printReport'); ?>" method="post" class="form-inline d-none d-lg-inline">
            <input type="date" name="tanggal_awal" class="form-control" required>
            <input type="date" name="tanggal_akhir" class="form-control ml-2" required>
            <button type="submit" class="btn btn-success ml-2"><i class="fas fa-print"></i><span class="ml-2">Print Report</span></button>
        </form>
    </div>

    <div class="d-lg-none d-xl-none mb-4">
        <form action="<?= base_url('transaksi/printReport'); ?>" method="post">
            <input type="date" name="tanggal_awal" class="form-control mb-3" required>
            <input type="date" name="tanggal_akhir" class="form-control mb-3" required>
            <button type="submit" class="btn btn-success btn-block"><i class="fas fa-print"></i><span class="ml-2">Print Report</span></button>
        </form>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <?= session()->getFlashdata('success'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
            <?= session()->getFlashdata('error'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID</th>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Medical Staff Name</th>
                            <th scope="col">Service Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Cost</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($master as $m) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $m['id'] ?></td>
                                <td><?= $m['nama_pasien'] ?></td>
                                <td><?= $m['nama_tenaga_medis'] ?></td>
                                <td><?= $m['nama_pelayanan'] ?></td>
                                <td><?= $m['jenis_pelayanan'] ?></td>
                                <td><?= 'Rp ' . number_format($m['biaya'], 0, ',', ',') ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('transaksi/print/' . $m['id']); ?>" target="_blank" class="btn btn-success"><i class="fas fa-print"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>