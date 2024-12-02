<div class="container-fluid ">
     <!-- Content Column -->
     <!-- Content Row -->
     <div class="row">
<!-- Content Column -->
<div class="col-lg-6 mb-4">
  <!-- Project Card Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tambah Data Antrian</h6>
    </div>
    <div class="card-body">
    <form method="post" action="<?php echo base_url('data_antrian/tambah_antrian_aksi')?>">
        <!-- <div class="form-group">
            <label for="">No RR</label>
            <input value="<?php echo set_value('rr')?>" autocomplete ="off" type="text" name="rr" placeholder="Masukkan Nomor RR" class="form-control">
            <?php echo form_error('rr','<small class="text-danger mt-2">','</small>')?>
        </div> -->

        <div class="form-group">
            <label for="">Nomor RR</label>
            <input type="hidden" name="maksimal" value="1.0">
            <input type="hidden" name="minimal" value="0.0">
            <input readonly value="<?= $kodeunik;?>" type="text" name="rr" class="form-control" autocomplete="off">
        </div>
 
        <div class="form-group">
            <label for="">Pilih Prioritas</label>
            <select class="form-control" name="prioritas">
            <option value="">--- Pilih ---</option>
                    <?php 
                        foreach($prioritas as $p):?>
                        <option <?= set_select('prioritas',$p->prioritas)?> value = "<?=$p->prioritas?>"><?=$p->prioritas?></option>
                    <?php endforeach;?> 
            </select>
            <?php echo form_error('prioritas','<div class="text-danger small ml-2 mt-2">','</div>');?>
        </div>

        <div class="form-group">
            <label for="">Jenis Pengajuan</label>
            <select class="form-control" name="pengajuan">
            <option value="">--- Pilih ---</option>
                    <?php 
                        foreach($pengajuan as $pgj):?>
                        <option <?= set_select('pengajuan',$pgj->pengajuan)?> value = "<?=$pgj->pengajuan?>"><?=$pgj->pengajuan?></option>
                    <?php endforeach;?> 
            </select>
            <?php echo form_error('pengajuan','<div class="text-danger small ml-2 mt-2">','</div>');?>
        </div>

        <div class="form-group">
            <label for="">Jenis Dokumen</label>
            <select class="form-control" name="jenis">
            <option value="">--- Pilih ---</option>
                    <?php 
                        foreach($jenis as $j):?>
                        <option <?= set_select('jenis',$j->jenis)?> value = "<?=$j->jenis?>"><?=$j->jenis?></option>
                    <?php endforeach;?> 
            </select>
            <?php echo form_error('jenis','<div class="text-danger small ml-2 mt-2">','</div>');?>
        </div>

        <div class="form-group">
            <label for="">Perihal</label>
            <input value="<?php echo set_value('perihal')?>" autocomplete ="off"type="text" name="perihal" placeholder="Masukkan Perihal" class="form-control">
            <?php echo form_error('perihal','<small class="text-danger mt-2">','</small>')?>
        </div>
        
        <div class="form-group">
            <label for="">Pemohon</label>
            <input value="<?php echo set_value('pemohon')?>" autocomplete ="off"type="text" name="pemohon" placeholder="Masukkan Nama Pemohon" class="form-control">
            <?php echo form_error('pemohon','<small class="text-danger mt-2">','</small>')?>
        </div>
    </div>
  </div>
</div>

<div class="col-lg-6 mb-4">
  <!-- Approach -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-3 font-weight-bold text-primary"></h6>
    </div>
        <div class="card-body">
            <div class="form-group">
            <label for="">Disetujui Oleh</label>
            <input value="<?php echo set_value('disetujui')?>" autocomplete ="off"type="text" name="disetujui" placeholder="Masukkan Nama Pemberi Persetujuan" class="form-control">
            <?php echo form_error('disetujui','<small class="text-danger mt-2">','</small>')?>
        </div>

        
        <div class="form-group">
            <label for="">Unit Kerja</label>
            <input value="<?php echo set_value('unit_kerja')?>" autocomplete ="off"type="text" name="unit_kerja" placeholder="Masukkan Unit Kerja" class="form-control">
            <?php echo form_error('unit_kerja','<small class="text-danger mt-2">','</small>')?>
        </div>

        <div class="form-group">
            <label for="">Tanggal Terima</label>
            <input type="date" class ="form-control" name="registrasi">
            <?php echo form_error('registrasi','<div class="text-danger small ml-2 mt-2">','</div>');?>
        </div>

        <div class="form-group">
            <label for="">Target Selesai</label>
            <input type="date" class ="form-control" name="target_selesai">
            <?php echo form_error('target_selesai','<div class="text-danger small ml-2 mt-2">','</div>');?>
        </div>
       
         
        <div class="form-group">
            <label for="">Catatan</label>
            <input value="<?php echo set_value('catatan')?>" autocomplete ="off"type="text" name="catatan" placeholder="Masukkan Catatan" class="form-control">
            <?php echo form_error('catatan','<small class="text-danger mt-2">','</small>')?>
        </div>
        
        <div class="modal-footer mb-4">  
        <?php echo anchor('data_antrian/tampil_data','<div class="btn btn-danger btn-sm hapus_pakar">Batal</div>')?>
        <button type="submit" class ="btn btn-sm btn-primary">Tambah</button>
    </form>                      
    </div>
  </div>
</div>
</div>     



    <!-- <div class="col-sm-6 mt-4 ml-auto mr-auto">
    <form method="post" action="<?php echo base_url('data_antrian/tambah_antrian_aksi')?>">
        <div class="form-group">
            <label for="">No RR</label>
            <input value="<?php echo set_value('rr')?>" autocomplete ="off" type="text" name="rr" placeholder="Masukkan Nomor RR" class="form-control">
            <?php echo form_error('rr','<small class="text-danger mt-2">','</small>')?>
        </div>

        <div class="form-group">
            <label for="">Pilih Prioritas</label>
            <select class="form-control" name="prioritas">
            <option value="">--- Pilih ---</option>
                    <?php 
                        foreach($prioritas as $p):?>
                        <option <?= set_select('prioritas',$p->prioritas)?> value = "<?=$p->prioritas?>"><?=$p->prioritas?></option>
                    <?php endforeach;?> 
            </select>
            <?php echo form_error('prioritas','<div class="text-danger small ml-2 mt-2">','</div>');?>
        </div>

        <div class="form-group">
            <label for="">Jenis Pengajuan</label>
            <select class="form-control" name="pengajuan">
            <option value="">--- Pilih ---</option>
                    <?php 
                        foreach($pengajuan as $pgj):?>
                        <option <?= set_select('pengajuan',$pgj->pengajuan)?> value = "<?=$pgj->pengajuan?>"><?=$pgj->pengajuan?></option>
                    <?php endforeach;?> 
            </select>
            <?php echo form_error('pengajuan','<div class="text-danger small ml-2 mt-2">','</div>');?>
        </div>

        <div class="form-group">
            <label for="">Jenis Dokumen</label>
            <select class="form-control" name="jenis">
            <option value="">--- Pilih ---</option>
                    <?php 
                        foreach($jenis as $j):?>
                        <option <?= set_select('jenis',$j->jenis)?> value = "<?=$j->jenis?>"><?=$j->jenis?></option>
                    <?php endforeach;?> 
            </select>
            <?php echo form_error('jenis','<div class="text-danger small ml-2 mt-2">','</div>');?>
        </div>

        <div class="form-group">
            <label for="">Perihal</label>
            <input value="<?php echo set_value('perihal')?>" autocomplete ="off"type="text" name="perihal" placeholder="Masukkan Perihal" class="form-control">
            <?php echo form_error('perihal','<small class="text-danger mt-2">','</small>')?>
        </div>

        <div class="form-group">
            <label for="">Pemohon</label>
            <input value="<?php echo set_value('pemohon')?>" autocomplete ="off"type="text" name="pemohon" placeholder="Masukkan Nama Pemohon" class="form-control">
            <?php echo form_error('pemohon','<small class="text-danger mt-2">','</small>')?>
        </div>

        <div class="form-group">
            <label for="">Disetujui Oleh</label>
            <input value="<?php echo set_value('disetujui')?>" autocomplete ="off"type="text" name="disetujui" placeholder="Masukkan Nama Pemberi Persetujuan" class="form-control">
            <?php echo form_error('disetujui','<small class="text-danger mt-2">','</small>')?>
        </div>

        
        <div class="form-group">
            <label for="">Unit Kerja</label>
            <input value="<?php echo set_value('unit_kerja')?>" autocomplete ="off"type="text" name="unit_kerja" placeholder="Masukkan Unit Kerja" class="form-control">
            <?php echo form_error('unit_kerja','<small class="text-danger mt-2">','</small>')?>
        </div>

        <div class="form-group">
            <label for="">Tanggal Registrasi</label>
            <input type="date" class ="form-control" name="registrasi">
            <?php echo form_error('registrasi','<div class="text-danger small ml-2 mt-2">','</div>');?>
        </div>

        <div class="form-group">
            <label for="">Target Selesai</label>
            <input type="date" class ="form-control" name="target_selesai">
            <?php echo form_error('target_selesai','<div class="text-danger small ml-2 mt-2">','</div>');?>
        </div>
       
         
        <div class="form-group">
            <label for="">Catatan</label>
            <input value="<?php echo set_value('catatan')?>" autocomplete ="off"type="text" name="catatan" placeholder="Masukkan Catatan" class="form-control">
            <?php echo form_error('catatan','<small class="text-danger mt-2">','</small>')?>
        </div>
        
        <div class="modal-footer">  
        <?php echo anchor('data_antrian/tampil_data','<div class="btn btn-danger btn-sm hapus_pakar">Batal</div>')?>
        <button type="submit" class ="btn btn-sm btn-primary">Tambah</button>
    </form> -->
</div>
</div>
</div>
