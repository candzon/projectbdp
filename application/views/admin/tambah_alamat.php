<div class="container-fluid ">
    <div class="row">
        <div class="col-sm-6 ml-auto mr-auto">
            <form method="post" action="<?php echo base_url('data_alamat/tambah_alamat_aksi') ?>">
                <input type="hidden" name="collapse_id" id="collapse_id" value="#collapse<?= $collapse_id ?>">

                <div class="form-group">
                    <label for="">Nama Kantor</label>
                    <input value="<?php echo set_value('nama_kantor') ?>" autocomplete="off" type="text" name="nama_kantor" placeholder="Masukkan Nama Kantor" class="form-control">
                    <?php echo form_error('nama_kantor', '<small class="text-danger mt-2">', '</small>') ?>
                </div>

                <div class="form-group">
                    <label for="">Alamat Kantor</label>
                    <input value="<?php echo set_value('alamat') ?>" autocomplete="off" type="text" name="alamat" placeholder="Masukkan Nama Kantor" class="form-control">
                    <?php echo form_error('alamat', '<small class="text-danger mt-2">', '</small>') ?>
                </div>

                <div class="modal-footer">
                    <?php echo anchor('data_alamat/tampil_alamat', '<div class="btn btn-danger btn-sm hapus_pakar">Batal</div>') ?>
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>