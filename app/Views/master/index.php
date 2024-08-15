<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <div class="d-flex">
            <a class="btn btn-success d-none d-lg-inline" href="<?= base_url('master/generate-excel'); ?>"><i class="fas fa-download"></i><span class="ml-2">Report</span></a>
            <a class="btn btn-primary d-none d-lg-inline ml-2" href="<?= base_url('master/create'); ?>"><i class="fas fa-plus-square"></i><span class="ml-2">New Data</span></a>
        </div>
        <div class="dropdown d-lg-none d-xl-none no-arrow">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-ellipsis"></i>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="<?= base_url('master/generate-excel'); ?>"><i class="fas fa-download text-success"></i><span class="ml-2">Report</span></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url('master/create'); ?>"><i class="fas fa-plus-square text-primary"></i><span class="ml-2">New Data</span></a>
            </div>
        </div>
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
                            <th scope="col">NIK</th>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Medical Staff Name</th>
                            <th scope="col">Service Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($master as $m) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $m['id'] ?></td>
                                <td><?= $m['nik'] ?></td>
                                <td><?= $m['nama_pasien'] ?></td>
                                <td><?= $m['nama_tenaga_medis'] ?></td>
                                <td><?= $m['nama_pelayanan'] ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('master/detail/' . $m['id']); ?>" class="btn btn-success"><i class="fas fa-circle-info"></i></a>
                                    <a href="<?= base_url('master/edit/' . $m['id']); ?>" class="btn btn-primary"><i class="fas fa-pen-to-square"></i></a>
                                    <form action="<?= base_url('master/' . $m['id']); ?>" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete <?= $m['id']; ?> from table?');"><i class="fas fa-trash"></i></button>
                                    </form>
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