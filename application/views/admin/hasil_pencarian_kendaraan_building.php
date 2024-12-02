<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <table align="center">
            <tr>
                <th>Total Harga Sewa:</th>
                <?php foreach($total_harga_sewa as $total_harga_sewa):?>

            <th><td>Rp. <?php echo number_format($total_harga_sewa->harga_sewa,0,',','.') ?></td></th>
            <?php endforeach;?>
            </tr>
        </table>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading mb-4">
            <form class="form-inline"  method="post" action="<?php echo base_url('data_kendaraan/pencarian_data_kendaraan_building')?>">
            
                <div class="form-group">
                    <input class="form-control" type="text" autocomplete="off" placeholder="Kata Kunci"   name="cari"/>
                </div>
                
                <div class="form-group">
                    <input type="submit" name="submit" value="cari" class="btn btn-primary btn-xs"></input>
                </div>
            </form>
            
            <br>
            <?php echo anchor('data_kendaraan/tampil_data_kendaraan_building','<button class="btn btn-sm btn-danger mb-4"><i class="fa fa-times" aria-hidden="true"></i> Kembali</button>')?>
            <p><strong>Kata kunci pencarian berupa Nama Kantor/ Divisi / Departemen / Vendor / Nama / Plat Nomor</strong> </p>
        </div>

    <?php if($data == null):?>
        <div class="container-fluid mt-3">
            <div class="alert alert-primary">
                <h4 class="text-center align-middle">
                Data Pencarian Tidak Ditemukan!
                </h4>
            </div>
        </div>
    <?php endif;?>              

    <?php if($data != null):?>
        <table class="table table-bordered table-striped table-hover table-sm small">
        <tr  align="center">            
            <?php $no =1?>
            <th>No</th>
            <th>Nama Kantor</th>
            <th>Nama</th>
            <th>Divisi</th>
            <th>Departemen</th>
            <th>Mobil</th>
            <th>Plat Nomor</th>
            <th>Tahun</th>
            <th>Vendor</th>
            <th>Harga Sewa</th>
            <th>Periode Awal Sewa</th>
            <th>Periode AKhir Sewa</th>
            <th>Catatan</th>
        </tr>

        <?php foreach($data as $data):?>
            <tr  align="center">
                    <td><?php echo $no++?></td>
                    <td><?php echo $data->nama_kantor?></td>
                    <td><?php echo $data->nama_karyawan?></td>
                    <td><?php echo $data->divisi?></td>
                    <td><?php echo $data->departemen?></td>
                    <td><?php echo $data->mobil?></td>
                    <td><?php echo $data->plat_nomor?></td> 
                    <td><?php echo $data->tahun?></td>
                    <td><?php echo $data->nama_vendor_kendaraan?></td>
                    <td>Rp. <?php echo number_format($data->harga_sewa,0,',','.')?></td>
                    <td><?php echo date("d-m-Y",strtotime($data->periode_awal))?></td>
                    <td><?php echo date("d-m-Y",strtotime($data->periode_akhir))?></td>
                    <td><?php echo $data->catatan?></td>
                </tr>
        <?php endforeach;?>
    </table>
    <?php endif;?>
</div>