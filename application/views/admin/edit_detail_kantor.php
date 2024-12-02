<div class="container-fluid ">
<div class="row">
    <div class="col-sm-6 ml-auto mr-auto">
    <?php foreach($data as $detail_kantor):?>
    <form action="<?php echo base_url('data_kantor/edit_detail_kantor_aksi/'.$detail_kantor->id_detail_kantor)?>" 
    method="post">
    <input type="hidden" name="id_kantor" value= "<?php echo $detail_kantor->id_kantor?>">
        <div class="form-group">
                <label for="">Pilih Karyawan</label>
                <select id="pilih_karyawan" class="form-control" name="pengguna">
                <option value="">--- Pilih ---</option>
                        <?php 
                            foreach($karyawan as $kry):?>
                                <option value="<?php echo $kry->id_karyawan?>" <?php if($kry->id_karyawan == $detail_kantor->pengguna){echo "selected";}?>> 
                                    <?php echo $kry->nama_karyawan?>
                                </option>
                        <?php endforeach;?> 
                </select>
                <?php echo form_error('pengguna','<div class="text-danger small ml-2 mt-2">','</div>');?>
        </div>
    
            <div class="form-group">
            <label for="">Mobil Operasional</label>
                <input name="mobil" class="form-control" value="<?php echo $detail_kantor->mobil?>" autocomplete="off">
                <?php echo form_error('mobil','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>

            <div class="form-group">
            <label for="">Plat Nomor</label>
                <input name="plat_nomor" class="form-control" value="<?php echo $detail_kantor->plat_nomor?>" autocomplete="off">
                <?php echo form_error('plat_nomor','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>

            <div class="form-group">
            <label for="">Tahun</label>
                <input name="tahun" class="form-control" value="<?php echo $detail_kantor->tahun?>" autocomplete="off">
                <?php echo form_error('tahun','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>

            <div class="form-group">
                <label for="">Pilih Vendor Kendaraan</label>
                <select id="pilih_vendor"class="form-control" name="nama_vendor_kendaraan">
                <option value="">--- Pilih ---</option>
                        <?php 
                            foreach($vendor_kendaraan as $vendor):?>
                                <option value="<?php echo $vendor->id_vendor_kendaraan?>" <?php if($vendor->id_vendor_kendaraan == $detail_kantor->nama_vendor_kendaraan){echo "selected";}?>> 
                                    <?php echo $vendor->nama_vendor_kendaraan?>
                                </option>
                        <?php endforeach;?> 
                </select>
                <?php echo form_error('nama_vendor_kendaraan','<div class="text-danger small ml-2 mt-2">','</div>');?>
        </div>
            
            <div class="form-group">
            <label for="">Harga Sewa</label>
                <input name="harga_sewa" class="form-control" value="<?php echo $detail_kantor->harga_sewa?>" autocomplete="off">
                <?php echo form_error('harga_sewa','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>

            <div class="form-group">
            <label for="">Periode Awal Sewa</label>
                <input type="date" name="periode_awal" class="form-control" value="<?php echo $detail_kantor->periode_awal?>" autocomplete="off">
                <?php echo form_error('periode_awal','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>

            <div class="form-group">
            <label for="">Periode Akhir Sewa</label>
                <input type="date" name="periode_akhir" class="form-control" value="<?php echo $detail_kantor->periode_akhir?>" autocomplete="off">
                <?php echo form_error('periode_akhir','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>

            <div class="form-group">
            <label for="">Catatan</label>
                <input name="catatan" class="form-control" value="<?php echo $detail_kantor->catatan?>" autocomplete="off">
                <?php echo form_error('catatan','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>

            <div class="modal-footer">          
            <?php echo anchor('data_kantor/detail_kantor/'.$detail_kantor->id_kantor,'<div class="btn btn-danger btn-sm hapus_pakar">Batal</div>')?>
                <button type="submit" class="btn btn-primary btn-sm" >Simpan</button>
        </form>
    <?php endforeach;?>
</div>
</div>
</div>