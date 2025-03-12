<?php echo view('_partials/sidebar'); ?>


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Data Siswa</h2>
                    <form action="<?php echo base_url('siswa/update'); ?>" method="post">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                $errors = session()->getFlashdata('errors');
                                if (!empty($errors)) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        Whoops! Ada kesalahan saat input data,
                                        yaitu:
                                        <ul>
                                            <?php foreach ($errors as $error) :
                                            ?>
                                                <li><?= esc($error) ?></li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                <?php } ?>
                                <div class="form-group">
                                    <label for="">NIS</label>
                                    <input type="hidden" name="id_siswa" value="<?php echo esc($siswa['id_siswa']); ?>">
                                    <input type="text" class="form-control" value="<?php echo esc($siswa['id_siswa']); ?>" placeholder="Enter NIS" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Siswa</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Enter siswa name" value="<?php echo $siswa['nama']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Sekolah</label>
                                    <input type="text" class="form-control" name="sekolah" placeholder="Enter nama sekolah" value="<?php echo $siswa['sekolah']; ?>">
                                </div>

                                <label for="">Status</label>
                                <select name="status" id=""
                                    class="form-control">
                                    <option value="">Pilih Status</option>
                                    <option value="active" <?php echo
                                                            $siswa['status'] == "active" ? 'selected' : '' ?>>active</option>
                                    <option value="inactive" <?php echo
                                                                $siswa['status'] == "inactive" ? 'selected' : '' ?>>inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="<?php echo base_url('siswa'); ?>"
                                class="btn btn-outline-info">Back</a>
                            <button type="submit" class="btn btn-primary float-right">Edit</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>


<?php echo view('_partials/footer'); ?>