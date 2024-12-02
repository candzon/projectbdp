<div class="container-fluid ">
<div class="row">
    <div class="col-sm-6 ml-auto mr-auto">
    <form method="post" action="<?php echo base_url('data_vendor_ga/tambah_vendor_ga_aksi')?>">
        <div class="form-group"> 
                <label for="">Pilih Jenis Vendor</label>
                <select  class="form-control" name="jenis_vendor">
                <option value="">-- Pilih --</option>
                    <option value="pengadaan">Pengadaan</option>
                    <option value="service">Service/Maintenance</option>
                    <option value="jasa">Jasa</option>
                </select>
                <?php echo form_error('jenis_vendor','<div class="text-danger small ml-2 mt-2">','</div>');?>
        </div>
        <div class="form-group">
            <label for="">Nama Vendor</label>
            <input value="<?php echo set_value('nama_vendor')?>" autocomplete ="off" type="text" name="nama_vendor" placeholder="Masukkan Nama Vendor" class="form-control">
            <?php echo form_error('nama_vendor','<small class="text-danger mt-2">','</small>')?>
        </div>

        <div class="form-group">
            <label for="">Alamat Vendor</label>
            <input value="<?php echo set_value('alamat')?>" autocomplete ="off" type="text" name="alamat" placeholder="Masukkan Alamat Vendor" class="form-control">
            <?php echo form_error('alamat','<small class="text-danger mt-2">','</small>')?>
        </div>

        <div class="form-group">
            <label for="">Provinsi</label>
            <input value="<?php echo set_value('provinsi')?>" autocomplete ="off" type="text" name="provinsi" placeholder="Masukkan Nama Provinsi" class="form-control">
            <?php echo form_error('provinsi','<small class="text-danger mt-2">','</small>')?>
        </div>

        <div class="form-group">
            <label for="">Nomor Telepon</label> 
            <input value="<?php echo set_value('no_telepon_kantor')?>" autocomplete ="off" type="text" name="no_telepon_kantor" placeholder="Masukkan Nomor Telepon Kantor Vendor (Jika ada)" class="form-control">
            <?php echo form_error('no_telepon_kantor','<small class="text-danger mt-2">','</small>')?>
        </div>

        <div class="modal-footer">  
        <?php echo anchor('dashboard_admin/index','<div class="btn btn-danger btn-sm hapus_pakar">Batal</div>')?>
        <button type="submit" class ="btn btn-sm btn-primary">Simpan</button>
    </form>
</div>
</div>
</div>