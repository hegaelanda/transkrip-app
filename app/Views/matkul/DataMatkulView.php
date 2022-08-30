<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/navbar') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-3">Daftar Nilai Mata Kuliah</h1>
            <?php foreach ($matkul as $semester => $matkulpersemester) : ?>
                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th colspan="6">Semester <?= $semester ?></th>
                        </tr>
                    </thead>
                    <thead class="table-group-divider">
                        <tr>
                            <th scope="col" class="col-1 text-center">No</th>
                            <th scope="col" class="col-2">ID Mata Kuliah</th>
                            <th scope="col" class="col-6">Nama Mata Kuliah</th>
                            <th scope="col" class="col-1 text-center">SKS</th>
                            <th scope="col" class="col-1 text-center">Nilai</th>
                            <th scope="col" class="col-1 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // if ($val) :
                        $i = 1;
                        foreach ($matkulpersemester as $m) : ?>
                            <tr>
                                <td class="text-center"><?= $i++; ?></td>
                                <td><?= $m['id_matkul'] ?></td>
                                <td><?= $m['nama'] ?></td>
                                <td class="text-center"><?= $m['sks'] ?></td>
                                <td class="text-center"><?= $m['nilai'] ?></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $m['id_matkul'] ?>" aria-expanded="true">
                                        <i class="bi bi-chevron-down"></i>
                                    </button>
                                </td>
                            </tr>
                            </tr>
                            <tr class="collapse" id="collapse<?= $m['id_matkul']; ?>">
                                <td colspan="6">
                                    <table class="table table-bordered bg-light">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="col-3">Jenis Penilaian</th>
                                                <th scope="col" class="col-3 text-center">Nilai</th>
                                                <th scope="col" class="col-3 text-center">Bobot</th>
                                                <th scope="col" class="col-3 text-center">Hasil</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Kehadiran</td>
                                                <td class="text-center"><?= $m['kehadiran']; ?></td>
                                                <td class="text-center">10%</td>
                                                <td class="text-center"><?= $m['h_kehadiran']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tugas</td>
                                                <td class="text-center"><?= $m['tugas']; ?></td>
                                                <td class="text-center">20%</td>
                                                <td class="text-center"><?= $m['h_tugas']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Kuis</td>
                                                <td class="text-center"><?= $m['kuis']; ?></td>
                                                <td class="text-center">20%</td>
                                                <td class="text-center"><?= $m['h_kuis']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>UTS</td>
                                                <td class="text-center"><?= $m['uts']; ?></td>
                                                <td class="text-center">25%</td>
                                                <td class="text-center"><?= $m['h_uts']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>UAS</td>
                                                <td class="text-center"><?= $m['uas']; ?></td>
                                                <td class="text-center">25%</td>
                                                <td class="text-center"><?= $m['h_uas']; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-end"><b> Total :</b></td>
                                                <td class="text-center"><?= $m['h_kehadiran'] + $m['h_tugas'] + $m['h_kuis'] + $m['h_uts'] + $m['h_uas']; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-end">
                                                    <form action="/delete/<?= $m['id_matkul'] ?>" method="post">
                                                        <?= csrf_field(); ?>
                                                        <div class="btn-group" role="group" aria-label="Button group">
                                                            <a href="/update/<?= $m['id_matkul'] ?>" type="button" class="btn btn-warning"><i class="bi-pencil"></i></a>
                                                            <input type="hidden" name="_method" value="delete">
                                                            <button type="submit" class="btn btn-danger"><i class="bi-trash" onclick="return confirm('Apakah Anda yakin menghapus data <?= $m['nama']; ?>?');"></i></button>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        // endif;
                        if (!$matkulpersemester) :
                        ?>
                            <tr>
                                <td colspan="6" class="text-center">Data Tidak Ditemukan!</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>