<div class="container-fluid ">
<div class="row">
    <div class="col-sm-6 ml-auto mr-auto">
    <form method="post" action="<?php echo base_url('data_kantor/tambah_detail_kantor_aksi/'.$this->uri->segment(3))?>">
    <input type="hidden" name="id_kantor" value= "<?php $this->uri->segment(3)?>" >
        <div class="form-group"> 
            <label for="">Pilih Karyawan</label>
            <select id="pilih_karyawan" class="form-control" name="nama_karyawan">
            <option value="">--- Pilih ---</option>
                    <?php 
                        foreach($tampil_karyawan as $p):?>
                        <option <?= set_select('nama_karyawan',$p->id_karyawan)?> value = "<?=$p->id_karyawan?>"><?=$p->nama_karyawan?></option>
                    <?php endforeach;?> 
            </select>
            <?php echo form_error('nama_karyawan','<div class="text-danger small ml-2 mt-2">','</div>');?>
        </div>


        <div class="form-group">
            <label for="">Merk Mobil</label>
            <input value="<?php echo set_value('mobil')?>" autocomplete ="off" type="text" name="mobil" placeholder="Masukkan Merk Mobil" class="form-control">
            <?php echo form_error('mobil','<small class="text-danger mt-2">','</small>')?>
        </div>

        <div class="form-group">
            <label for="">Plat Nomor</label>
            <input value="<?php echo set_value('plat_nomor')?>" autocomplete ="off" type="text" name="plat_nomor" placeholder="Masukkan Plat Nomor" class="form-control">
            <?php echo form_error('plat_nomor','<small class="text-danger mt-2">','</small>')?>
        </div>

        <div class="form-group">
            <label for="">Tahun</label>
            <input value="<?php echo set_value('tahun')?>" autocomplete ="off" type="text" name="tahun" placeholder="Masukkan Tahun Mobil" class="form-control">
            <?php echo form_error('tahun','<small class="text-danger mt-2">','</small>')?>
        </div>

        <div class="form-group">
            <label for="">Pilih Vendor Kendaraan</label>
            <select id="pilih_vendor" class="form-control" name="nama_vendor_kendaraan">
            <option value="">--- Pilih ---</option>
                    <?php 
                        foreach($tampil_vendor_kendaraan as $v):?>
                        <option <?= set_select('nama_vendor_kendaraan',$v->id_vendor_kendaraan)?> value = "<?=$v->id_vendor_kendaraan?>"><?=$v->nama_vendor_kendaraan?></option>
                    <?php endforeach;?> 
            </select>
            <?php echo form_error('nama_vendor_kendaraan','<div class="text-danger small ml-2 mt-2">','</div>');?>
        </div>

        <div class="form-group">
            <label for="">Harga Sewa</label>
            <input value="<?php echo set_value('harga_sewa')?>" autocomplete ="off" type="text" name="harga_sewa" placeholder="Masukkan Harga Sewa Kendaraan" class="form-control">
            <?php echo form_error('harga_sewa','<small class="text-danger mt-2">','</small>')?>
        </div>

        <div class="form-group">
            <label for="">Periode Awal Sewa</label>
            <input type="date" class ="form-control" name="periode_awal">
            <?php echo form_error('periode_awal','<div class="text-danger small ml-2 mt-2">','</div>');?>
        </div>

        <div class="form-group">
            <label for="">Periode Akhir Sewa</label>
            <input type="date" class ="form-control" name="periode_akhir">
            <?php echo form_error('periode_akhir','<div class="text-danger small ml-2 mt-2">','</div>');?>
        </div>

        <div class="form-group">
            <label for="">Catatan</label>
            <input value="<?php echo set_value('catatan')?>" autocomplete ="off" type="text" name="catatan" placeholder="Masukkan Catatan " class="form-control">
            <?php echo form_error('catatan','<small class="text-danger mt-2">','</small>')?>
        </div>


        <div class="modal-footer">  
        <?php echo anchor('data_kantor/detail_kantor/'.$this->uri->segment(3),'<div class="btn btn-danger btn-sm hapus_pakar">Batal</div>')?>
        <button type="submit" class ="btn btn-sm btn-primary">Simpan</button>
    </form>
</div>
</div>
</div>