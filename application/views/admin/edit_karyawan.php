<div class="container-fluid ">
<div class="row">
    <div class="col-sm-6 ml-auto mr-auto">
    <?php foreach($data as $karyawan):?>
    <form action="<?php echo base_url('data_karyawan/edit_karyawan_aksi/'.$karyawan->id_karyawan)?>" 
    method="post">
            <div class="form-group">
            <label for="">NIK</label>
                <input name="nik" class="form-control" value="<?php echo $karyawan->nik?>" autocomplete="off">
                <?php echo form_error('nik','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>

            <div class="form-group">
            <label for="">Nama Karyawan</label>
                <input name="nama_karyawan" class="form-control" value="<?php echo $karyawan->nama_karyawan?>" autocomplete="off">
                <?php echo form_error('nama_karyawan','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>

            <div class="form-group">
            <label for="">Lokasi</label>
                <input name="lokasi" class="form-control" value="<?php echo $karyawan->lokasi?>" autocomplete="off">
                <?php echo form_error('lokasi','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>
           
            <div class="form-group">
            <label for="">Divisi</label>
                <input name="divisi" class="form-control" value="<?php echo $karyawan->divisi?>" autocomplete="off">
                <?php echo form_error('divisi','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>

            <div class="form-group">
            <label for="">Departemen</label>
                <input name="departemen" class="form-control" value="<?php echo $karyawan->departemen?>" autocomplete="off">
                <?php echo form_error('departemen','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>

            <div class="form-group">
            <label for="">Jabatan</label>
                <input name="jabatan" class="form-control" value="<?php echo $karyawan->jabatan?>" autocomplete="off">
                <?php echo form_error('jabatan','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>
            
            <div class="modal-footer">          
            <?php echo anchor('data_karyawan/tampil_data_karyawan','<div class="btn btn-danger btn-sm hapus_pakar">Batal</div>')?>
                <button type="submit" class="btn btn-primary btn-sm" >Simpan</button>
        </form>
    <?php endforeach;?>
</div>
</div>
</div>