<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container d-flex justify-content-center vh-100 align-items-center">
    <div class="card col-6">
        <h1 class="card-title card-header text-center">Login</h1>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?php echo session()->getFlashdata('error'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <form action="/login" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="npm" class="form-label">Nomor Pokok Mahasiswa</label>
                    <input type="text" class="form-control" id="npm" name="npm">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="text-center">
                    <p>Tidak punya akun? <a href="/register">Daftar</a></p>
                    <input type="submit" class="btn btn-primary" value="Login">
                </div>
            </form>
        </div>
        <div class="card-footer text-muted">
            <div class="text-center">
                Transkrip App
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>