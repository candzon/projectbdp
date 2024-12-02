<div class="container-fluid ">
<div class="row">
    <div class="col-sm-6 ml-auto mr-auto">
    <form method="post" action="<?php echo base_url('data_skdp/tambah_skdp_aksi')?>">
        <div class="form-group">
            <label for="">Nama kantor</label>
            <input value="<?php echo set_value('nama_kantor')?>" autocomplete ="off" type="text" name="nama_kantor" placeholder="Masukkan Nama Kantor " class="form-control">
            <?php echo form_error('nama_kantor','<small class="text-danger mt-2">','</small>')?>
        </div>

        <div class="form-group">
            <label for="">Nomor surat</label>
            <input value="<?php echo set_value('nomor_surat')?>" autocomplete ="off"type="text" name="nomor_surat" placeholder="Masukkan Nomor surat" class="form-control">
            <?php echo form_error('nomor_surat','<small class="text-danger mt-2">','</small>')?>
        </div>

        

        <div class="form-group">
            <label for="">Masa Berlaku</label>
                <input type="date" name="masa_berlaku" class="form-control" value="<?php echo set_value('masa_berlaku')?>" autocomplete="off">
                <?php echo form_error('pmasa_berlaku','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>
        <div class="modal-footer">  
        <?php echo anchor('data_skdp/tampil_data_skdp','<div class="btn btn-danger btn-sm hapus_pakar">Batal</div>')?>
        <button type="submit" class ="btn btn-sm btn-primary">Simpan</button>
    </form>
</div>
</div>
</div>