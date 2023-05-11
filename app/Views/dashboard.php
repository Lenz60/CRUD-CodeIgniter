<?= $this->extend('layout/dashboard/template'); ?>
<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- User Detail -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <img src="/assets/img/avatar/<?= $image ?>" width="200" height="200">
                    </div>
                    <div class="col">
                        <h3 class="card-title"><?= $name; ?></h3>
                        <p><?= $email; ?></p>
                        <p>Registered since <?= date('d F Y', $date_created); ?></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?= $this->endSection('content'); ?>