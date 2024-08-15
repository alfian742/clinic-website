<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-start mb-4">
        <a class="btn btn-outline-secondary border-0 mr-2" href="<?= base_url('pasien'); ?>"><i class="fas fa-angle-left"></i></a>
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

        <form action="<?= base_url('pasien/update/' . $pasien['id']); ?>" method="POST">
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col">
                    <div class="form-group row my-3">
                        <label for="id" class="col-sm-3 col-form-label">NIK</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control bg-light <?= session('errors.id') ? 'is-invalid' : ''; ?>" id="id" name="id" value="<?= old('id') ? old('id') : $pasien['id']; ?>" readonly>
                            <div class="invalid-feedback">
                                <?= session('errors.id') ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row my-3">
                        <label for="nama" class="col-sm-3 col-form-label">Patient Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control <?= session('errors.nama') ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama') ? old('nama') : $pasien['nama']; ?>" autofocus>
                            <div class="invalid-feedback">
                                <?= session('errors.nama') ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row my-3">
                        <label for="tempat_lahir" class="col-sm-3 col-form-label">Place of Birth</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control <?= session('errors.tempat_lahir') ? 'is-invalid' : ''; ?>" id="tempat_lahir" name="tempat_lahir" value="<?= old('tempat_lahir') ? old('tempat_lahir') : $pasien['tempat_lahir']; ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.tempat_lahir') ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row my-3">
                        <label for="tanggal_lahir" class="col-sm-3 col-form-label">Date of Birth</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control <?= session('errors.tanggal_lahir') ? 'is-invalid' : ''; ?>" id="tanggal_lahir" name="tanggal_lahir" value="<?= old('tanggal_lahir') ? old('tanggal_lahir') : $pasien['tanggal_lahir']; ?>">
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
                                <option value="Laki-laki" <?= old('jenis_kelamin') === 'Laki-laki' || $pasien['jenis_kelamin'] === 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                                <option value="Perempuan" <?= old('jenis_kelamin') === 'Perempuan' || $pasien['jenis_kelamin'] === 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
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
                                <option value="Islam" <?= old('agama') === 'Islam' || $pasien['agama'] === 'Islam' ? 'selected' : ''; ?>>Islam</option>
                                <option value="Katolik" <?= old('agama') === 'Katolik' || $pasien['agama'] === 'Katolik' ? 'selected' : ''; ?>>Katolik</option>
                                <option value="Protestan" <?= old('agama') === 'Protestan' || $pasien['agama'] === 'Protestan' ? 'selected' : ''; ?>>Protestan</option>
                                <option value="Hindu" <?= old('agama') === 'Hindu' || $pasien['agama'] === 'Hindu' ? 'selected' : ''; ?>>Hindu</option>
                                <option value="Buddha" <?= old('agama') === 'Buddha' || $pasien['agama'] === 'Buddha' ? 'selected' : ''; ?>>Buddha</option>
                                <option value="Konghuchu" <?= old('agama') === 'Konghuchu' || $pasien['agama'] === 'Konghuchu' ? 'selected' : ''; ?>>Konghuchu</option>
                            </select>
                            <div class="invalid-feedback">
                                <?= session('errors.agama') ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row my-3">
                        <label for="pekerjaan" class="col-sm-3 col-form-label">Occupation</label>
                        <div class="col-sm-9">
                            <select class="form-control <?= session('errors.pekerjaan') ? 'is-invalid' : ''; ?>" id="pekerjaan" name="pekerjaan">
                                <option value="">Select Occupation</option>
                                <option value="TNI/POLRI" <?= (old('pekerjaan') === 'TNI/POLRI' || ($pasien['pekerjaan'] === 'TNI/POLRI' && empty(old('pekerjaan')))) ? 'selected' : ''; ?>>TNI/POLRI</option>
                                <option value="PNS" <?= (old('pekerjaan') === 'PNS' || ($pasien['pekerjaan'] === 'PNS' && empty(old('pekerjaan')))) ? 'selected' : ''; ?>>PNS</option>
                                <option value="Pelajar/Mahasiswa" <?= (old('pekerjaan') === 'Pelajar/Mahasiswa' || ($pasien['pekerjaan'] === 'Pelajar/Mahasiswa' && empty(old('pekerjaan')))) ? 'selected' : ''; ?>>Pelajar/Mahasiswa</option>
                                <option value="Pegawai BUMN" <?= (old('pekerjaan') === 'Pegawai BUMN' || ($pasien['pekerjaan'] === 'Pegawai BUMN' && empty(old('pekerjaan')))) ? 'selected' : ''; ?>>Pegawai BUMN</option>
                                <option value="Pegawai BUMS" <?= (old('pekerjaan') === 'Pegawai BUMS' || ($pasien['pekerjaan'] === 'Pegawai BUMS' && empty(old('pekerjaan')))) ? 'selected' : ''; ?>>Pegawai BUMS</option>
                                <option value="Wiraswasta" <?= (old('pekerjaan') === 'Wiraswasta' || ($pasien['pekerjaan'] === 'Wiraswasta' && empty(old('pekerjaan')))) ? 'selected' : ''; ?>>Wiraswasta</option>
                                <option value="Petani" <?= (old('pekerjaan') === 'Petani' || ($pasien['pekerjaan'] === 'Petani' && empty(old('pekerjaan')))) ? 'selected' : ''; ?>>Petani</option>
                                <option value="Buruh" <?= (old('pekerjaan') === 'Buruh' || ($pasien['pekerjaan'] === 'Buruh' && empty(old('pekerjaan')))) ? 'selected' : ''; ?>>Buruh</option>
                                <option value="Tidak Bekerja" <?= (old('pekerjaan') === 'Tidak Bekerja' || ($pasien['pekerjaan'] === 'Tidak Bekerja' && empty(old('pekerjaan')))) ? 'selected' : ''; ?>>Tidak Bekerja</option>
                            </select>
                            <div class="invalid-feedback">
                                <?= session('errors.pekerjaan') ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row my-3">
                        <label for="alamat" class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-9">
                            <textarea class="form-control <?= session('errors.alamat') ? 'is-invalid' : ''; ?>" id="alamat" name="alamat"><?= old('alamat') ? old('alamat') : $pasien['alamat']; ?></textarea>
                            <div class="invalid-feedback">
                                <?= session('errors.alamat') ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row my-3">
                        <label for="no_telepon" class="col-sm-3 col-form-label">Phone Number</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control <?= session('errors.no_telepon') ? 'is-invalid' : ''; ?>" id="no_telepon" name="no_telepon" value="<?= old('no_telepon') ? old('no_telepon') : $pasien['no_telepon']; ?>">
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