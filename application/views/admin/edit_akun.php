<div class="container-fluid ">
<div class="row">
    <div class="col-sm-6 ml-auto mr-auto">
    <?php foreach($data as $akun):?>
    <form action="<?php echo base_url('data_akun/edit_akun_aksi/'.$akun->nama_akun)?>" 
    method="post">
            <div class="form-group">
                <label for="">Nama</label>
                <input name="nama" class="form-control" value="<?php echo $akun->nama?>" autocomplete="off">
                <?php echo form_error('nama','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>

            <div class="form-group">
                <label for="">NIK</label>
                <input type="hidden" name="nama_akun" class="form-control" value="<?php echo $akun->nama_akun?>" autocomplete="off">
                <input readonly type="text" name="nama_akun" class="form-control" value="<?php echo $akun->nama_akun?>" autocomplete="off">
                <?php echo form_error('nama_akun','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>

            <div class="form-group">
                <label for="">Kata Sandi Lama</label>
                <input type="password" name="password_lama" class="form-control" autocomplete="off" placeholder="Kata Sandi Lama">
                <?php echo form_error('password_lama','<div class="text-danger small ml-2 mt-2">','</div>');?>
               
            </div>

            <div class="form-group mt-4">
                <label for="">kata Sandi Baru</label>
                <input type="password" name="password_baru" class="form-control" autocomplete="off" placeholder="Kata Sandi Baru">
                <?php echo form_error('password_baru','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>

            
            <div class="form-group mt-4">
                <label for="">Ulangi Kata Sandi Baru</label><br>
                <input type="password" name="ulangi_password" class="form-control" autocomplete="off" placeholder="Kata Sandi Baru">
                <?php echo form_error('ulangi_password','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>
            
            <div class="modal-footer">          
            <?php echo anchor('data_akun/tampil_data_akun','<div class="btn btn-danger btn-sm hapus_pakar">Batal</div>')?>
                <button type="submit" class="btn btn-primary btn-sm" >Simpan</button>
        </form>
    <?php endforeach;?>
</div>
</div>
</div>