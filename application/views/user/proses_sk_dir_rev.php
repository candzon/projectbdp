<div class="container-fluid ">
<div class="row">
    <div class="col-sm-6 mt-4 ml-auto mr-auto">
    <?php foreach($antrian_revisi as $at):?>
    <form action="<?php echo base_url('data_antrian/proses_antrian_aksi_rev/'.$at->id.'/'.$at->pengajuan)?>" 
    method="post">
            <div class="form-group">
                <input type="hidden" name="cek" class="form-control" value="<?php echo $at->id?>" autocomplete="off">
            </div>
            <!-- <div class="form-group">
                <input hidden name="penerbitan" class="form-control" value="<?php echo $at->pengajuan?>" autocomplete="off">
            </div> -->

            <div class="form-group">
                <label for="">Status Terakhir</label>
                <input readonly name="status_terakhir_readonly" class="form-control" value="<?php echo $at->status_terakhir?>" autocomplete="off">
            </div>

            <div class="form-group">
                <label for="">Update Status</label>
                <select class="form-control" name="status_terakhir">
                <option value="">--- Pilih ---</option>
                        <?php 
                            foreach($status as $st):?>
                                <option value="<?php echo $st->status?>" 
                                <?php if($st->status == $at->status_terakhir){echo "selected";}?>> 
                                    <?php echo $st->status?>
                                </option>
                        <?php endforeach;?> 
                </select>
                <?php echo form_error('status_terakhir','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>

            <div class="form-group">
                <label for="">Nomor SK/SE (Pengganti)</label>
                <input name="penerbitan" class="form-control" value="<?php echo $at->penerbitan?>" autocomplete="off">
                <?php echo form_error('penerbitan','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>

            <div class="form-group">
                <label for="">Nomor SK yang akan dicabut</label>
                <select id="sk_dir_rev" class="form-control" name="mencabut_ketentuan">
                <option value="">--- Pilih ---</option>
                        <?php 
                            foreach($sk_dir_rev as $sk):?>
                                <option value="<?php echo $sk->nomor_sk?>" <?php if($sk->nomor_sk == $at->mencabut_ketentuan){echo "selected";}?>> 
                                    <?php echo $sk->nomor_sk?>
                                </option>
                        <?php endforeach;?> 
                </select>
                <?php echo form_error('mencabut_ketentuan','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>
            
            <div class="form-group">
                <label for="">Referensi Ketentuan</label>
                <input name="referensi_ketentuan" class="form-control" value="<?php echo $at->referensi_ketentuan?>" autocomplete="off">
                <?php echo form_error('referensi_ketentuan','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>

            <!-- <div class="form-group">
                <label for="">Ketentuan Pengganti</label>
                <input name="ketentuan_pengganti" class="form-control" value="<?php echo $at->ketentuan_pengganti?>" autocomplete="off">
                <?php echo form_error('ketentuan_pengganti','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div> -->
                

            <div class="form-group">
                <label for="">Catatan</label>
                <input name="catatan" class="form-control" value="<?php echo $at->catatan?>" autocomplete="off">
                <?php echo form_error('catatan','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>
            
            <div class="modal-footer">          
            <?php echo anchor('data_antrian/tampil_data','<div class="btn btn-danger btn-sm hapus_pakar">Batal</div>')?>
                <button type="submit" class="btn btn-primary btn-sm" >Proses</button>
        </form>
    <?php endforeach;?>
</div>
</div>
</div>