<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-start mb-4">
        <a class="btn btn-outline-secondary border-0 mr-2" href="<?= base_url('layanan'); ?>"><i class="fas fa-angle-left"></i></a>
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
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

    <div class="container">
        <form action="<?= base_url('layanan/update/' . $layanan['id']); ?>" method="POST">
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col">
                    <input type="hidden" name="id" value="<?= $layanan['id']; ?>">

                    <div class="form-group row my-3">
                        <label for="nama_pelayanan" class="col-sm-3 col-form-label">Name of Medical Service</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control <?= session('errors.nama_pelayanan') ? 'is-invalid' : ''; ?>" id="nama_pelayanan" name="nama_pelayanan" value="<?= old('nama_pelayanan') ? old('nama_pelayanan') : $layanan['nama_pelayanan']; ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.nama_pelayanan') ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row my-3">
                        <label for="biaya" class="col-sm-3 col-form-label">Cost</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control <?= session('errors.biaya') ? 'is-invalid' : ''; ?>" id="biaya" name="biaya" value="<?= old('biaya') ? old('biaya') : $layanan['biaya']; ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.biaya') ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row my-3">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary">Update Data</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>