<div class="container-fluid ">
<div class="row">
    <div class="col-sm-6 ml-auto mr-auto">
    <?php foreach($data as $vendor):?>
    <form action="<?php echo base_url('data_vendor_ga/edit_pengadaan_ga_aksi/'.$vendor->id_vendor)?>" 
    method="post">
            <div class="form-group">
        <div class="form-group">
            <input type="hidden" value="<?php echo $vendor->jenis_vendor?>" autocomplete ="off" type="text" name="jenis_vendor" placeholder="Masukkan Jenis Vendor" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Nama Vendor</label>
            <input value="<?php echo $vendor->nama_vendor?>" autocomplete ="off" type="text" name="nama_vendor" placeholder="Masukkan Nama Vendor" class="form-control">
            <?php echo form_error('nama_vendor','<small class="text-danger mt-2">','</small>')?>
        </div>

        <div class="form-group">
            <label for="">Alamat Vendor</label>
            <input value="<?php echo $vendor->alamat?>" autocomplete ="off" type="text" name="alamat" placeholder="Masukkan Alamat Vendor" class="form-control">
            <?php echo form_error('alamat','<small class="text-danger mt-2">','</small>')?>
        </div>

        <div class="form-group">
            <label for="">Provinsi</label>
            <input value="<?php echo $vendor->provinsi?>" autocomplete ="off" type="text" name="provinsi" placeholder="Masukkan Nama Provinsi" class="form-control">
            <?php echo form_error('provinsi','<small class="text-danger mt-2">','</small>')?>
        </div>

        <div class="form-group">
            <label for="">Nomor Telepon</label> 
            <input value="<?php echo $vendor->no_telepon_kantor?>" autocomplete ="off" type="text" name="no_telepon_kantor" placeholder="Masukkan Nomor Telepon Kantor Vendor (Jika ada)" class="form-control">
            <?php echo form_error('no_telepon_kantor','<small class="text-danger mt-2">','</small>')?>
        </div>
            <div class="modal-footer">          
            <?php echo anchor('data_vendor_ga/tampil_pengadaan_ga','<div class="btn btn-danger btn-sm hapus_pakar">Batal</div>')?>
                <button type="submit" class="btn btn-primary btn-sm" >Simpan</button>
        </form>
    <?php endforeach;?>
</div>
</div>
</div>