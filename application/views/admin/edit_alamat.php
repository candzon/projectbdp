<div class="container-fluid ">
<div class="row">
    <div class="col-sm-6 ml-auto mr-auto">
    <?php foreach($data as $kantor):?>
    <form action="<?php echo base_url('data_alamat/edit_alamat_aksi/'.$kantor->id_alamat)?>" 
    method="post">
            <div class="form-group">
            <label for="">Nama Kantor</label>
                <input name="nama_kantor" class="form-control" value="<?php echo $kantor->nama_kantor?>" autocomplete="off">
                <?php echo form_error('nama_kantor','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>
        
            <div class="form-group">
            <label for="">Alamat</label>
                <input name="alamat" class="form-control" value="<?php echo $kantor->alamat?>" autocomplete="off">
                <?php echo form_error('alamat','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>
           
            <div class="modal-footer">          
            <?php echo anchor('data_alamat/tampil_alamat','<div class="btn btn-danger btn-sm hapus_pakar">Batal</div>')?>
                <button type="submit" class="btn btn-primary btn-sm" >Simpan</button>
        </form>
    <?php endforeach;?>
</div>
</div>
</div>