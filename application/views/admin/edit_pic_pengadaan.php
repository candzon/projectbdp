<div class="container-fluid ">
<div class="row">
    <div class="col-sm-6 ml-auto mr-auto">
    <?php foreach($data as $vendor):?>
    <form method="post" action="<?php echo base_url('data_vendor_ga/edit_pic_pengadaan_aksi/'.$this->uri->segment(3))?>">
        <div class="form-group">
            <input type="hidden" value="<?php echo $vendor->id_vendor?>" autocomplete ="off" type="text" name="id" placeholder="Masukkan Jenis Vendor" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Nama PIC</label>
            <input value="<?php echo $vendor->nama?>" autocomplete ="off" type="text" name="nama" placeholder="Masukkan Nama PIC" class="form-control">
            <?php echo form_error('nama','<small class="text-danger mt-2">','</small>')?>
        </div>

        <div class="form-group">
            <label for="">Email PIC</label>
            <input value="<?php echo $vendor->email?>" autocomplete ="off" type="text" name="email" placeholder="Masukkan Email PIC" class="form-control">
            <?php echo form_error('email','<small class="text-danger mt-2">','</small>')?>
        </div>

        <div class="form-group">
            <label for="">Nomor Telepon PIC</label>
            <input value="<?php echo $vendor->nomor_telepon_pic?>" autocomplete ="off" type="text" name="nomor_telepon_pic" placeholder="Masukkan Nomor Telepon PIC" class="form-control">
            <?php echo form_error('nomor_telepon_pic','<small class="text-danger mt-2">','</small>')?>
        </div>
        <div class="modal-footer">  
        <?php echo anchor('data_vendor_ga/tampil_pengadaan_ga','<div class="btn btn-danger btn-sm hapus_pakar">Batal</div>')?>
        <button type="submit" class ="btn btn-sm btn-primary">Simpan</button>
    </form>
    <?php endforeach;?>
</div>
</div>
</div>