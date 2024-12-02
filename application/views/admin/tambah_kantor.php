<div class="container-fluid ">
<div class="row">
    <div class="col-sm-6 ml-auto mr-auto">
    <?php echo $this->session->flashdata('message') ?>
    <form method="post" action="<?php echo base_url('data_kantor/tambah_kantor_aksi')?>">
        <div class="form-group"> 
            <label for="">Pilih Kantor</label>
            <select id="pilih_alamat" class="form-control" name="nama_kantor">
            <option value="">--- Pilih ---</option>
                    <?php 
                        foreach($tampil_alamat as $p):?>
                        <option <?= set_select('nama_kantor',$p->id_alamat)?> value = "<?=$p->id_alamat?>"><?=$p->nama_kantor?></option>
                    <?php endforeach;?> 
            </select>
            <?php echo form_error('nama_kantor','<div class="text-danger small ml-2 mt-2">','</div>');?>
        </div>
        <div class="modal-footer">  
        <?php echo anchor('data_kantor/tampil_data_kantor','<div class="btn btn-danger btn-sm hapus_pakar">Batal</div>')?>
        <button type="submit" class ="btn btn-sm btn-primary">Simpan</button>
    </form>
</div>
</div>
</div>