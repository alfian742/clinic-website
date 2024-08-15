<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <a class="btn btn-primary" href="<?= base_url('user/edit/') . user()->id ?>"><i class="fas fa-edit"></i><span class="ml-2  d-none d-lg-inline">Edit Profile</span></a>
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
            <div class="row">
                <div class="col-md-3">
                    <img src="<?= base_url('img/' . user()->user_img); ?>" class="mx-auto d-block rounded-circle shadow-sm mb-4 user-img" alt="<?= user()->username; ?>" height="150" width="150">
                </div>
                <div class="col-md-9">
                    <div class="table-responsive">
                        <table class="table table-borderless align-middle">
                            <tr>
                                <td class="fw-bold">Name</td>
                                <td>:</td>
                                <td><?= user()->fullname; ?></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Email</td>
                                <td>:</td>
                                <td><?= user()->email; ?></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Username</td>
                                <td>:</td>
                                <td><?= user()->username; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>