<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto mt-3 mb-3">
            <div class="card">
                <h1 class="card-title card-header text-center">Register</h1>
                <div class="card-body">
                    <form action="/register/simpan" method="post">
                        <?= csrf_field(); ?>
                        <div class="mb-3">
                            <label for="npm" class="form-label">Nomor Pokok Mahasiswa</label>
                            <input type="text" class="form-control <?= ($validation->hasError('npm')) ? 'is-invalid' : ''; ?>" aria-describedby="validation_npm" id="npm" name="npm" value="<?= old('npm'); ?>" autofocus>
                            <div id="validation_npm" class="invalid-feedback">
                                <?= $validation->getError('npm'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" aria-describedby="validation_nama" id="nama" name="nama" value="<?= old('nama'); ?>">
                            <div id="validation_nama" class="invalid-feedback">
                                <?= $validation->getError('npm'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" aria-describedby="validation_password" id="password" name="password" value="<?= old('password'); ?>">
                            <div id="validation_password" class="invalid-feedback">
                                <?= $validation->getError('password'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Ulangi Password</label>
                            <input type="password" class="form-control <?= ($validation->hasError('upassword')) ? 'is-invalid' : ''; ?>" aria-describedby="validation_upassword" id="upassword" name="upassword" value="<?= old('upassword'); ?>">
                            <div id="validation_upassword" class="invalid-feedback">
                                <?= $validation->getError('upassword'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="npm" class="form-label">Program Studi</label>
                            <input type="text" class="form-control <?= ($validation->hasError('prodi')) ? 'is-invalid' : ''; ?>" aria-describedby="validation_prodi" id="prodi" name="prodi" value="<?= old('prodi'); ?>">
                            <div id="validation_prodi" class="invalid-feedback">
                                <?= $validation->getError('prodi'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="npm" class="form-label">Fakultas</label>
                            <input type="text" class="form-control <?= ($validation->hasError('fakultas')) ? 'is-invalid' : ''; ?>" aria-describedby="validation_fakultas" id="fakultas" name="fakultas" value="<?= old('fakultas'); ?>">
                            <div id="validation_fakultas" class="invalid-feedback">
                                <?= $validation->getError('fakultas'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                            <input type="year" class="form-control <?= ($validation->hasError('tahun_masuk')) ? 'is-invalid' : ''; ?>" aria-describedby="validation_tahun_masuk" id="tahun_masuk" name="tahun_masuk" value="<?= old('tahun_masuk'); ?>">
                            <div id="validation_tahun_masuk" class="invalid-feedback">
                                <?= $validation->getError('tahun'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="npm" class="form-label">Jenjang</label>
                            <select name="jenjang" id="jenjang" class="form-select <?= ($validation->hasError('jenjang')) ? 'is-invalid' : ''; ?>" aria-describedby="validation_jenjang">
                                <option value="S1">S1</option>
                                <option value="D3">D3</option>
                                <option value="D4">D4</option>
                            </select>
                            <div id="validation_jenjang" class="invalid-feedback">
                                <?= $validation->getError('jenjang'); ?>
                            </div>
                        </div>
                        <div class="text-center">
                            <p>Sudah punya akun? <a href="/">Login</a></p>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </form>
                </div>
                <div class="card-footer text-muted">
                    <div class="text-center">
                        Transkrip App
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>