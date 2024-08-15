<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-start mb-4">
        <a class="btn btn-outline-secondary border-0 mr-2" href="<?= base_url('tenaga-medis'); ?>"><i class="fas fa-angle-left"></i></a>
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

        <form action="<?= base_url('tenaga-medis/update/' . $tenaga_medis['id']); ?>" method="POST">
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col">
                    <div class="form-group row my-3">
                        <label for="id" class="col-sm-3 col-form-label">NIP</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control bg-light <?= session('errors.id') ? 'is-invalid' : ''; ?>" id="id" name="id" value="<?= old('id') ? old('id') : $tenaga_medis['id']; ?>" readonly>
                            <div class="invalid-feedback">
                                <?= session('errors.id') ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row my-3">
                        <label for="nama" class="col-sm-3 col-form-label">Medical Personnel Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control <?= session('errors.nama') ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama') ? old('nama') : $tenaga_medis['nama']; ?>" autofocus>
                            <div class="invalid-feedback">
                                <?= session('errors.nama') ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row my-3">
                        <label for="tempat_lahir" class="col-sm-3 col-form-label">Place of Birth</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control <?= session('errors.tempat_lahir') ? 'is-invalid' : ''; ?>" id="tempat_lahir" name="tempat_lahir" value="<?= old('tempat_lahir') ? old('tempat_lahir') : $tenaga_medis['tempat_lahir']; ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.tempat_lahir') ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row my-3">
                        <label for="tanggal_lahir" class="col-sm-3 col-form-label">Date of Birth</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control <?= session('errors.tanggal_lahir') ? 'is-invalid' : ''; ?>" id="tanggal_lahir" name="tanggal_lahir" value="<?= old('tanggal_lahir') ? old('tanggal_lahir') : $tenaga_medis['tanggal_lahir']; ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.tanggal_lahir') ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row my-3">
                        <label for="jenis_kelamin" class="col-sm-3 col-form-label">Gender</label>
                        <div class="col-sm-9">
                            <select class="form-control <?= session('errors.jenis_kelamin') ? 'is-invalid' : ''; ?>" id="jenis_kelamin" name="jenis_kelamin">
                                <option value="" selected>Select Gender</option>
                                <option value="Laki-laki" <?= old('jenis_kelamin') === 'Laki-laki' || $tenaga_medis['jenis_kelamin'] === 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                                <option value="Perempuan" <?= old('jenis_kelamin') === 'Perempuan' || $tenaga_medis['jenis_kelamin'] === 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                            </select>
                            <div class="invalid-feedback">
                                <?= session('errors.jenis_kelamin') ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row my-3">
                        <label for="agama" class="col-sm-3 col-form-label">Religion</label>
                        <div class="col-sm-9">
                            <select class="form-control <?= session('errors.agama') ? 'is-invalid' : ''; ?>" id="agama" name="agama">
                                <option value="" selected>Select Religion</option>
                                <option value="Islam" <?= old('agama') === 'Islam' || $tenaga_medis['agama'] === 'Islam' ? 'selected' : ''; ?>>Islam</option>
                                <option value="Katolik" <?= old('agama') === 'Katolik' || $tenaga_medis['agama'] === 'Katolik' ? 'selected' : ''; ?>>Katolik</option>
                                <option value="Protestan" <?= old('agama') === 'Protestan' || $tenaga_medis['agama'] === 'Protestan' ? 'selected' : ''; ?>>Protestan</option>
                                <option value="Hindu" <?= old('agama') === 'Hindu' || $tenaga_medis['agama'] === 'Hindu' ? 'selected' : ''; ?>>Hindu</option>
                                <option value="Buddha" <?= old('agama') === 'Buddha' || $tenaga_medis['agama'] === 'Buddha' ? 'selected' : ''; ?>>Buddha</option>
                                <option value="Konghuchu" <?= old('agama') === 'Konghuchu' || $tenaga_medis['agama'] === 'Konghuchu' ? 'selected' : ''; ?>>Konghuchu</option>
                            </select>
                            <div class="invalid-feedback">
                                <?= session('errors.agama') ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row my-3">
                        <label for="jabatan" class="col-sm-3 col-form-label">Position</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control <?= session('errors.jabatan') ? 'is-invalid' : ''; ?>" id="jabatan" name="jabatan" value="<?= old('jabatan') ? old('jabatan') : $tenaga_medis['jabatan']; ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.jabatan') ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row my-3">
                        <label for="alamat" class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-9">
                            <textarea class="form-control <?= session('errors.alamat') ? 'is-invalid' : ''; ?>" id="alamat" name="alamat"><?= old('alamat') ? old('alamat') : $tenaga_medis['alamat']; ?></textarea>
                            <div class="invalid-feedback">
                                <?= session('errors.alamat') ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row my-3">
                        <label for="no_telepon" class="col-sm-3 col-form-label">Phone Number</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control <?= session('errors.no_telepon') ? 'is-invalid' : ''; ?>" id="no_telepon" name="no_telepon" value="<?= old('no_telepon') ? old('no_telepon') : $tenaga_medis['no_telepon']; ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.no_telepon') ?>
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