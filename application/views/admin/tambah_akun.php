<div class="container-fluid ">
<div class="row">
    <div class="col-sm-6 ml-auto mr-auto">
    <form method="post" action="<?php echo base_url('data_akun/tambah_akun_aksi')?>">
        <div class="form-group">
            <label for="">Nama</label>
            <input value="<?php echo set_value('nama')?>" autocomplete ="off" type="text" name="nama" placeholder="Masukkan Nama" class="form-control">
            <?php echo form_error('nama','<small class="text-danger mt-2">','</small>')?>
        </div>

        <div class="form-group">
            <label for="">NIK</label>
            <input value="<?php echo set_value('nama_akun')?>" autocomplete ="off"type="text" name="nama_akun" placeholder="Masukkan Nama Akun" class="form-control">
            <?php echo form_error('nama_akun','<small class="text-danger mt-2">','</small>')?>
        </div>

        <div class="form-group"> 
            <label for="">Pilih Peran</label>
            <select  class="form-control" name="level">
            <option value="">-- Pilih --</option>
                <option value="building">Building</option>
                <option value="procurement">Procurement</option>
                <option value="asset">Asset</option>
                <option value="admin">Admin</option>
            </select>
            <?php echo form_error('level','<div class="text-danger small ml-2 mt-2">','</div>');?>
        </div>

        <div class="form-group">
            <label for="">Kata Sandi</label>
            <input type="password" name="password1" placeholder="Masukkan Kata Sandi" class="form-control">
            <?php echo form_error('password1','<small class="text-danger mt-2">','</small>')?>
        </div>

        <div class="form-group">
            <label for="">Konfirmasi Kata Sandi</label>
            <input type="password" name="password2" placeholder="Konfirmasi Kata Sandi" class="form-control">
            <?php echo form_error('password2','<small class="text-danger mt-2">','</small>')?>
        </div>
        <div class="modal-footer">  
        <?php echo anchor('data_akun/tampil_data_akun','<div class="btn btn-danger btn-sm hapus_pakar">Batal</div>')?>
        <button type="submit" class ="btn btn-sm btn-primary">Simpan</button>
    </form>
</div>
</div>
</div>