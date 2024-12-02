<div class="container-fluid ">
<div class="row">
    <div class="col-sm-6 ml-auto mr-auto">
    <form method="post" action="<?php echo base_url('data_vendor/tambah_vendor_aksi')?>">
        <div class="form-group">
            <label for="">Nama Perusahaan</label>
            <input value="<?php echo set_value('nama_vendor')?>" autocomplete ="off" type="text" name="nama_vendor" placeholder="Masukkan Nama" class="form-control">
            <?php echo form_error('nama_vendor','<small class="text-danger mt-2">','</small>')?>
        </div>

        <div class="form-group">
            <label for="">PIC (Person In Contact)</label>
            <input value="<?php echo set_value('pic')?>" autocomplete ="off" type="text" name="pic" placeholder="Masukkan Nama PIC (Person In Contact)" class="form-control">
            <?php echo form_error('pic','<small class="text-danger mt-2">','</small>')?>
        </div>

        <div class="form-group">
            <label for="">Email</label>
            <input value="<?php echo set_value('email')?>" autocomplete ="off" type="email" name="email" placeholder="Masukkan Email" class="form-control">
            <?php echo form_error('email','<small class="text-danger mt-2">','</small>')?>
        </div>

        <div class="form-group">
            <label for="">Nomor Telepon</label>
            <input value="<?php echo set_value('nomor_telepon')?>" autocomplete ="off" type="text" name="nomor_telepon" placeholder="Masukkan Nomor Telepon" class="form-control">
            <?php echo form_error('nomor_telepon','<small class="text-danger mt-2">','</small>')?>
        </div>

        <div class="modal-footer">  
        <?php echo anchor('data_vendor/tampil_data_vendor','<div class="btn btn-danger btn-sm hapus_pakar">Batal</div>')?>
        <button type="submit" class ="btn btn-sm btn-primary">Simpan</button>
    </form>
</div>
</div>
</div>