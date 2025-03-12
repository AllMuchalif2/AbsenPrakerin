<?php echo view('_partials/sidebar'); ?>

<div class="row">
    <div class="col">
        <h2>Data Absensi Hari ini</h2>
    </div>
    <div class="col">
        <h2><?= date('Y-m-d') ?></h2>
    </div>
</div>
<table class="table table-bordered">
    <thead>

        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Sekolah</th>
            <th>Waktu Absen</th>
        </tr>
    </thead>

    <tbody>
    <?php if (!empty($absensi)): ?>
        <?php $no = 1; ?>
                    <?php foreach ($absensi as $item): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= esc($item['nama']); ?></td>
                            <td><?= esc($item['sekolah']); ?></td>
                            <td><?= esc($item['waktu']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data absensi untuk hari ini.</td>
                    </tr>
                <?php endif; ?>
    </tbody>

</table>




<?php echo view('_partials/footer'); ?>