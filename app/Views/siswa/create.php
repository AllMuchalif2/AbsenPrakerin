<?php echo view('_partials/sidebar'); ?>


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2>Tambah Data Siswa</h2>
                    <form action="<?php echo base_url('siswa/save'); ?>"
                        method="post">
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
                                    <input type="text" class="form-control" name="id_siswa" placeholder="Enter NIS" value="<?= esc($inputs['id_siswa'] ?? '') ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Siswa</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Enter siswa name" value="<?php //echo $inputs['nama']; }
                                                                                                                                ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Sekolah</label>
                                    <input type="text" class="form-control" name="sekolah" placeholder="Enter nama sekolah" value="<?php //echo $inputs['sekolah']; }
                                                                                                                                    ?>">
                                </div>

                                <label for="">Status</label>
                                <select name="status" id=""
                                    class="form-control">
                                    <option value="">Pilih Status</option>
                                    <option <?php //echo $inputs['status'] == "active" ? "selected" : ""; 
                                            ?>value="active">active</option>
                                    <option <?php //echo $inputs['status'] == "inactive" ? "selected" : ""; 
                                            ?>value="inactive">inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="<?php echo base_url('siswa'); ?>"
                                class="btn btn-outline-info">Back</a>
                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

<?php echo view('_partials/footer'); ?>