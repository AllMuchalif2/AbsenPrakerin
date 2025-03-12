<?php echo view('_partials/sidebar'); ?>
<h2>Data Kehadiran Siswa Prakerin</h2>
<form method="GET">
    <?php $tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d'); ?>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"><label for="tanggal">Pilih Tanggal:</label></span>
        <input type="date" name="tanggal" value="<?= $tanggal; ?>" class="form-control" aria-label="<?= $tanggal; ?>" aria-describedby="basic-addon2"id="tanggal">
        <button type="submit" class="btn btn-outline-primary" id="basic-addon2">Filter</button>
    </div>
</form>

<h3>Siswa yang Sudah Absen</h3>
<table class="table table-bordered">
    <tr>
        <th>NIS</th>
        <th>Nama</th>
        <th>Sekolah</th>
        <th>Waktu Absen</th>
    </tr>
    <?php if (!empty($sudah_absen)): ?>
    <?php foreach ($sudah_absen as $siswa): ?>
        <tr>
            <td><?= $siswa['id_siswa'] ?></td>
            <td><?= $siswa['nama'] ?></td>
            <td><?= $siswa['sekolah'] ?></td>
            <td><?= $siswa['waktu'] ?></td>
        </tr>
    <?php endforeach; ?>
    <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data</td>
                    </tr>
    <?php endif; ?>

</table>

<h3>Siswa yang Belum Absen</h3>
<table class="table table-bordered">
    <tr>
        <th>NIS</th>
        <th>Nama</th>
        <th>Sekolah</th>
    </tr>
    <?php if (!empty($belum_absen)): ?>
    <?php foreach ($belum_absen as $siswa): ?>
        <tr>
            <td><?= $siswa['id_siswa'] ?></td>
            <td><?= $siswa['nama'] ?></td>
            <td><?= $siswa['sekolah'] ?></td>
        </tr>
    <?php endforeach; ?>
    <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data</td>
                    </tr>
    <?php endif; ?>
</table>


<?php echo view('_partials/footer'); ?>