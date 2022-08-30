<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/navbar') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-3">Ubah Data Nilai Mata Kuliah</h1>
            <form class="mt-4" action="/update/<?= $matkul['id_matkul']; ?>/simpan" method="post">
                <?= csrf_field(); ?>
                <table class="table table-responsive">
                    <tr>
                        <td class="col-3"><label for="id_matkul">ID Mata Kuliah</label></td>
                        <td>
                            <input type="text" name="id_matkul" id="id_matkul" class="form-control <?= ($validation->hasError('id_matkul')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan ID Mata Kuliah" aria-describedby="validation_id_matkul" autofocus value="<?= (old('id_matkul')) ? old('id_matkul') : $matkul['id_matkul'] ?>">
                            <div id="validation_id_matkul" class="invalid-feedback">
                                <?= $validation->getError('id_matkul'); ?>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td><label for="nama">Nama Mata Kuliah</label></td>
                        <td>
                            <input type="text" name="nama" id="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>"" placeholder=" Masukkan Nama Mata Kuliah" aria-describedby="validation_nama" value="<?= (old('nama')) ? old('nama') : $matkul['nama'] ?>">
                            <div id="validation_nama" class="invalid-feedback">
                                <?= $validation->getError('nama'); ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="semester">Semester</label></td>
                        <td>
                            <input type="number" name="semester" id="semester" class="form-control <?= ($validation->hasError('semester')) ? 'is-invalid' : ''; ?>"" placeholder=" Masukkan Semester" aria-describedby="validation_semester" value="<?= (old('semester')) ? old('semester') :  $matkul['semester']; ?>">
                            <div id="validation_semester" class="invalid-feedback">
                                <?= $validation->getError('semester'); ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="sks">SKS</label></td>
                        <td>
                            <input type="number" name="sks" id="sks" class="form-control <?= ($validation->hasError('sks')) ? 'is-invalid' : ''; ?>"" placeholder=" Masukkan Bobot SKS" aria-describedby="validation_sks" value="<?= (old('sks')) ? old('sks') : $matkul['sks'] ?>">
                            <div id="validation_sks" class="invalid-feedback">
                                <?= $validation->getError('sks'); ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="nilai">Nilai Kehadiran</label></td>
                        <td>
                            <input type="number" name="kehadiran" id="kehadiran" class="form-control <?= ($validation->hasError('kehadiran')) ? 'is-invalid' : ''; ?>"" placeholder=" Masukkan Nilai Kehadiran" aria-describedby="validation_kehadiran" value="<?= (old('kehadiran')) ? old('kehadiran') : $matkul['kehadiran'] ?>">
                            <div id="validation_kehadiran" class="invalid-feedback">
                                <?= $validation->getError('kehadiran'); ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="nilai">Nilai Tugas</label></td>
                        <td>
                            <input type="number" name="tugas" id="tugas" class="form-control <?= ($validation->hasError('tugas')) ? 'is-invalid' : ''; ?>"" placeholder=" Masukkan Nilai Tugas" aria-describedby="validation_tugas" value="<?= (old('tugas')) ? old('tugas') : $matkul['tugas'] ?>">
                            <div id="validation_tugas" class="invalid-feedback">
                                <?= $validation->getError('tugas'); ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="nilai">Nilai Kuis</label></td>
                        <td>
                            <input type="number" name="kuis" id="kuis" class="form-control <?= ($validation->hasError('kuis')) ? 'is-invalid' : ''; ?>"" placeholder=" Masukkan Nilai Kuis" aria-describedby="validation_kuis" value="<?= (old('kuis')) ? old('kuis') : $matkul['kuis'] ?>">
                            <div id="validation_kuis" class="invalid-feedback">
                                <?= $validation->getError('kuis'); ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="nilai">Nilai UTS</label></td>
                        <td>
                            <input type="number" name="uts" id="uts" class="form-control <?= ($validation->hasError('uts')) ? 'is-invalid' : ''; ?>"" placeholder=" Masukkan Nilai UTS" aria-describedby="validation_uts" value="<?= (old('uts')) ? old('uts') : $matkul['uts'] ?>">
                            <div id="validation_uts" class="invalid-feedback">
                                <?= $validation->getError('uts'); ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="nilai">Nilai UAS</label></td>
                        <td>
                            <input type="number" name="uas" id="uas" class="form-control <?= ($validation->hasError('uas')) ? 'is-invalid' : ''; ?>"" placeholder=" Masukkan Nilai UAS" aria-describedby="validation_uas" value="<?= (old('uas')) ? old('uas') : $matkul['uas'] ?>">
                            <div id="validation_uas" class="invalid-feedback">
                                <?= $validation->getError('uas'); ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="simpan" id="simpan" class="btn btn-primary" value="Kirim">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>