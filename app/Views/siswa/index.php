<?php echo view('_partials/sidebar'); ?>


    <div class="container mt-5">
        <div class="row">

            <div class="col">
                <h2>Data Siswa</h2>
            </div>
            <div class="col">
                <a href="<?php echo base_url('siswa/create'); ?>" class="btn btn-primary mb-3 float-right">Tambah Data</a>
            </div>
        </div>
        <?php if (!empty(session()->getFlashdata('success'))) { ?>
            <div class="alert alert-success">
                <?= esc(session()->getFlashdata('success')); ?>
            </div>
        <?php } ?>

        <table id="dataTable" class="table table-striped">
            <thead>
                <tr>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Sekolah</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($siswa)) : ?>
                    <?php foreach ($siswa as $key => $row) : ?>
                        <tr>
                            <td><?= esc($row['id_siswa']); ?></td>
                            <td><?= esc($row['nama']); ?></td>
                            <td><?= esc($row['sekolah']); ?></td>
                            <td><?= esc($row['status']); ?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="<?= base_url('siswa/edit/' . esc($row['id_siswa'])); ?>" class="btn btn-sm btn-success">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('siswa/delete/' . esc($row['id_siswa'])); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        <i class="fa fa-trash-alt"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data ditemukan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php echo view('_partials/footer'); ?>