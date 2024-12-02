<div class="container-fluid ">
<div class="row">
    <div class="col-sm-6 ml-auto mr-auto">
    <form method="post" action="<?php echo base_url('data_karyawan/tambah_karyawan_aksi')?>">
        <div class="form-group">
            <label for="">NIK</label>
            <input value="<?php echo set_value('nik')?>" autocomplete ="off" type="text" name="nik" placeholder="Masukkan NIK" class="form-control">
            <?php echo form_error('nik','<small class="text-danger mt-2">','</small>')?>
        </div>

        <div class="form-group">
            <label for="">Nama Karyawan</label>
            <input value="<?php echo set_value('nama_karyawan')?>" autocomplete ="off" type="text" name="nama_karyawan" placeholder="Masukkan Nama Karyawan" class="form-control">
            <?php echo form_error('nama_karyawan','<small class="text-danger mt-2">','</small>')?>
        </div>

        <div class="form-group">
            <label for="">Lokasi</label>
            <input value="<?php echo set_value('lokasi')?>" autocomplete ="off" type="text" name="lokasi" placeholder="Masukkan Lokasi" class="form-control">
            <?php echo form_error('lokasi','<small class="text-danger mt-2">','</small>')?>
        </div>

        <div class="form-group">
            <label for="">Divisi</label>
            <input value="<?php echo set_value('divisi')?>" autocomplete ="off" type="text" name="divisi" placeholder="Masukkan Divisi" class="form-control">
            <?php echo form_error('divisi','<small class="text-danger mt-2">','</small>')?>
        </div>

        <div class="form-group">
            <label for="">Departemen</label>
            <input value="<?php echo set_value('departemen')?>" autocomplete ="off" type="text" name="departemen" placeholder="Masukkan Departemen" class="form-control">
            <?php echo form_error('departemen','<small class="text-danger mt-2">','</small>')?>
        </div>

        <div class="form-group">
            <label for="">Jabatan</label>
            <input value="<?php echo set_value('jabatan')?>" autocomplete ="off" type="text" name="jabatan" placeholder="Masukkan Jabatan" class="form-control">
            <?php echo form_error('jabatan','<small class="text-danger mt-2">','</small>')?>
        </div>
        <div class="modal-footer">  
        <?php echo anchor('data_karyawan/tampil_data_karyawan','<div class="btn btn-danger btn-sm hapus_pakar">Batal</div>')?>
        <button type="submit" class ="btn btn-sm btn-primary">Simpan</button>
    </form>
</div>
</div>
</div>