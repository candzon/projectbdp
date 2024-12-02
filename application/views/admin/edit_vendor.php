<div class="container-fluid ">
<div class="row">
    <div class="col-sm-6 ml-auto mr-auto">
    <?php foreach($data as $vendor):?>
    <form action="<?php echo base_url('data_vendor/edit_vendor_aksi/'.$vendor->id_vendor_kendaraan)?>" 
    method="post">
            <div class="form-group">
            <label for="">Nama Perusahaan</label>
                <input name="nama_vendor" class="form-control" value="<?php echo $vendor->nama_vendor_kendaraan?>" autocomplete="off">
                <?php echo form_error('nama_vendor','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>

            <div class="form-group">
            <label for="">PIC (Person In Contact)</label>
                <input name="pic" class="form-control" value="<?php echo $vendor->pic?>" autocomplete="off">
                <?php echo form_error('pic','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>

            <div class="form-group">
            <label for="">Email</label>
                <input name="email" type="email" class="form-control" value="<?php echo $vendor->email?>" autocomplete="off">
                <?php echo form_error('email','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>

            <div class="form-group">
            <label for="">Nomor Telepon</label>
                <input name="nomor_telepon" class="form-control" value="<?php echo $vendor->nomor_telepon?>" autocomplete="off">
                <?php echo form_error('nomor_telepon','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>
           
            
            <div class="modal-footer">          
            <?php echo anchor('data_vendor/tampil_data_vendor','<div class="btn btn-danger btn-sm hapus_pakar">Batal</div>')?>
                <button type="submit" class="btn btn-primary btn-sm" >Simpan</button>
        </form>
    <?php endforeach;?>
</div>
</div>
</div>