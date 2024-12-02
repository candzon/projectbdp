<div class="container-fluid ">
<div class="row">
    <div class="col-sm-6 ml-auto mr-auto">
    <?php foreach($data as $skdp):?>
    <form action="<?php echo base_url('data_alamat/edit_alamat_aksi/'.$skdp->id_detail_skdp)?>" 
    method="post">
            <div class="form-group">
            <label for="">Nomor SKDP</label>
                <input name="nomor_skdp" class="form-control" value="<?php echo $skdp->nomor_skdp?>" autocomplete="off">
                <?php echo form_error('nomor_skdp','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>
        
            <div class="form-group">
            <label for="">Nama Kantor</label>
                <input name="nama_kantor" class="form-control" value="<?php echo $skdp->nama_kantor?>" autocomplete="off">
                <?php echo form_error('nama_kantor','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>

            <div class="form-group">
            <label for="">Alamat Kantor</label>
                <input name="alamat_kantor" class="form-control" value="<?php echo $skdp->alamat_kantor?>" autocomplete="off">
                <?php echo form_error('alamat_kantor','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>

            <div class="form-group">
            <label for="">Nama Kepala Kantor</label>
                <input name="nama_kepala_kantor" class="form-control" value="<?php echo $skdp->nama_kepala_kantor?>" autocomplete="off">
                <?php echo form_error('nama_kepala_kantor','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>

              <div class="form-group">
            <label for="">Periode Awal</label>
                <input name="periode_awal" class="form-control" value="<?php echo $skdp->periode_awal?>" autocomplete="off">
                <?php echo form_error('periode_awal','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>

            <div class="form-group">
            <label for="">Periode Akhir</label>
                <input name="periode_akhir" class="form-control" value="<?php echo $skdp->periode_akhir?>" autocomplete="off">
                <?php echo form_error('periode_akhir','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>
           
            <div class="modal-footer">          
            <?php echo anchor('data_alamat/tampil_alamat','<div class="btn btn-danger btn-sm hapus_pakar">Batal</div>')?>
                <button type="submit" class="btn btn-primary btn-sm" >Simpan</button>
        </form>
    <?php endforeach;?>
</div>
</div>
</div>