<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-start mb-4">
        <a class="btn btn-outline-secondary border-0 mr-2" href="<?= base_url('user'); ?>"><i class="fas fa-angle-left"></i></a>
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

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('user/update'); ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= user()->id; ?>">
                <input type="hidden" name="oldUserImage" value="<?= user()->user_img; ?>">

                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group row my-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control bg-light <?= session('errors.email') ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email') ? old('email') : user()->email; ?>" readonly>
                                <div class="invalid-feedback">
                                    <?= session('errors.email') ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row my-3">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control bg-light <?= session('errors.username') ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?= old('username') ? old('username') : user()->username; ?>" readonly>
                                <div class="invalid-feedback">
                                    <?= session('errors.username') ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row my-3">
                            <label for="fullname" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= session('errors.fullname') ? 'is-invalid' : ''; ?>" id="fullname" name="fullname" value="<?= old('fullname') ? old('fullname') : user()->fullname; ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.fullname') ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row my-3">
                            <label for="user_img" class="col-sm-2 col-form-label">Profile Picture</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" class="form-control custom-file-input <?= session('errors.user_img') ? 'is-invalid' : ''; ?>" id="user_img" name="user_img" onchange="previewImage()">
                                    <div class="invalid-feedback">
                                        <?= session('errors.user_img') ?>
                                    </div>
                                    <div>
                                        <label class="custom-file-label d-inline" for="user_img"><?= user()->user_img; ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <img src="<?= base_url('img/' . user()->user_img); ?>" class="user-img rounded-circle shadow-sm img-preview my-3 mx-auto d-block" height="150" width="150">
                    </div>
                </div>

                <div class="row my-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Save Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>