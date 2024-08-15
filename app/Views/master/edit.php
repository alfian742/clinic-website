<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-start mb-4">
        <a class="btn btn-outline-secondary border-0 mr-2" href="<?= base_url('master'); ?>"><i class="fas fa-angle-left"></i></a>
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

        <form action="<?= base_url('master/update/' . $master['id']); ?>" method="POST">
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col">
                    <div class="form-group row my-3">
                        <label for="id" class="col-sm-3 col-form-label">ID</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control <?= session('errors.id') ? 'is-invalid' : ''; ?>" id="id" name="id" value="<?= $master['id']; ?>" readonly>
                            <div class="invalid-feedback">
                                <?= session('errors.id') ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row my-3">
                        <label for="id_pasien" class="col-sm-3 col-form-label">Patient's name</label>
                        <div class="col-sm-9">
                            <select class="form-control <?= session('errors.id_pasien') ? 'is-invalid' : ''; ?>" id="id_pasien" name="id_pasien" style="width: 100%;" autofocus>
                                <option value="">Select Patient</option>
                                <?php foreach ($pasien as $p) : ?>
                                    <option value="<?= $p['id']; ?>" <?= (old('id_pasien') ? old('id_pasien') : $master['id_pasien']) == $p['id'] ? 'selected' : ''; ?>>
                                        <?= $p['nama'] . ' - ' . $p['id']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= session('errors.id_pasien') ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row my-3">
                        <label for="id_tenaga_medis" class="col-sm-3 col-form-label">Name of medical personnel</label>
                        <div class="col-sm-9">
                            <select class="form-control <?= session('errors.id_tenaga_medis') ? 'is-invalid' : ''; ?>" id="id_tenaga_medis" name="id_tenaga_medis" style="width: 100%;">
                                <option value="">Select Medical Personnel</option>
                                <?php foreach ($tenagaMedis as $tMedis) : ?>
                                    <option value="<?= $tMedis['id']; ?>" <?= (old('id_tenaga_medis') ? old('id_tenaga_medis') : $master['id_tenaga_medis']) == $tMedis['id'] ? 'selected' : ''; ?>>
                                        <?= $tMedis['nama'] . ' - ' . $tMedis['id']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= session('errors.id_tenaga_medis') ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row my-3">
                        <label for="id_nama_pelayanan" class="col-sm-3 col-form-label">Name of service</label>
                        <div class="col-sm-9">
                            <select class="form-control <?= session('errors.id_nama_pelayanan') ? 'is-invalid' : ''; ?>" id="id_nama_pelayanan" name="id_nama_pelayanan">
                                <option value="">Select the service name</option>
                                <?php foreach ($namaPelayanan as $nPelayanan) : ?>
                                    <option value="<?= $nPelayanan['id']; ?>" <?= (old('id_nama_pelayanan') ? old('id_nama_pelayanan') : $master['id_nama_pelayanan']) == $nPelayanan['id'] ? 'selected' : ''; ?>>
                                        <?= $nPelayanan['nama_pelayanan']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= session('errors.id_nama_pelayanan') ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row my-3">
                        <label for="id_jenis_pelayanan" class="col-sm-3 col-form-label">Type of service</label>
                        <div class="col-sm-9">
                            <select class="form-control <?= session('errors.id_jenis_pelayanan') ? 'is-invalid' : ''; ?>" id="id_jenis_pelayanan" name="id_jenis_pelayanan">
                                <option value="">Select the service type</option>
                                <?php foreach ($jenisPelayanan as $jPelayanan) : ?>
                                    <option value="<?= $jPelayanan['id']; ?>" <?= (old('id_jenis_pelayanan') ? old('id_jenis_pelayanan') : $master['id_jenis_pelayanan']) == $jPelayanan['id'] ? 'selected' : ''; ?>>
                                        <?= $jPelayanan['jenis_pelayanan']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= session('errors.id_jenis_pelayanan') ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row my-3">
                        <label for="no_bpjs" class="col-sm-3 col-form-label">Number of BPJS</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control <?= session('errors.no_bpjs') ? 'is-invalid' : ''; ?>" id="no_bpjs" name="no_bpjs" value="<?= (old('no_bpjs')) ? old('no_bpjs') : $master['no_bpjs'] ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.no_bpjs') ?>
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