<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <a class="btn btn-primary" href="<?= base_url('tenaga-medis/create'); ?>"><i class="fas fa-plus-square"></i><span class="ml-2 d-none d-lg-inline">New Data</span></a>
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
                            <th scope="col">NIP</th>
                            <th scope="col">Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Position</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($tenaga_medis as $tm) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $tm['id'] ?></td>
                                <td><?= $tm['nama'] ?></td>
                                <td><?= $tm['jenis_kelamin'] ?></td>
                                <td><?= $tm['jabatan'] ?></td>
                                <td><?= $tm['no_telepon'] ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('tenaga-medis/detail/' . $tm['id']); ?>" class="btn btn-success"><i class="fas fa-circle-info"></i></a>
                                    <a href="<?= base_url('tenaga-medis/edit/' . $tm['id']); ?>" class="btn btn-primary"><i class="fas fa-pen-to-square"></i></a>
                                    <form action="<?= base_url('tenagamedis/delete/' . $tm['id']); ?>" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete <?= $tm['id']; ?> from table?');"><i class="fas fa-trash"></i></button>
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