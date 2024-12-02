<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <table align="center">
            <tr>
            <th><p><strong><h2>Data Sewa Kendaraan Dinas Operasional</h1></strong></p></th>
            </tr>
        </table>
        <table align="center">
        <tr>
            <th>Total Harga Sewa (+ PPN):</th>
                <?php foreach($total_harga_sewa as $total_harga_sewa):?>
            <th><td>Rp. <?php echo number_format($total_harga_sewa->harga_sewa,0,',','.') ?></td></th>
            <?php endforeach;?>
        </tr><br><br>                                           
        <tr>
            Dicetak oleh <?php echo $_SESSION['nama'];?> pada tanggal <?php echo $_SESSION['tanggalcetak'];?>
        </tr>
        </table>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading mb-4">
            <form class="form-inline"  method="post" action="<?php echo base_url('data_kendaraan/pencarian_data_kendaraan') ?>">            
                <div class="form-group">
                    <input class="form-control" type="text" autocomplete="off" placeholder="Kata Kunci"   name="cari"/>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="cari" class="btn btn-primary btn-xs"></input>
                </div>
            </form>
            <br>
        </div>
        <?php if($data == null):?>
            <div class="container-fluid mt-3">
                <div class="alert alert-primary">
                    <h4 class="text-center align-middle">
                        Data Kendaraan Masih Kosong!
                    </h4>
                </div>
            </div>
        <?php endif;?>
        <?php if($data != null):?>          
        <table style = "width: 100%" cellspacing ="0" border="1">
            <tr  align="left"> 
                <?php $no =1?>
                <th>No</th>
                <th>Kantor</th>
                <th>Nama</th>
                <th>Departemen</th>
                <th>Mobil</th>
                <th width="80px">Plat Nomor</th>
                <th>Tahun</th>
                <th>Vendor</th>
                <th width="100px">Harga Sewa (+PPN)</th>
                <th width="100px">Periode Awal Sewa</th>
                <th width="100px">Periode Akhir Sewa</th>
                <th width="100px">Catatan</th>
            </tr>
            <?php foreach($data as $detail_kantor):?>
                <tr>
                    <td align="center"><?php echo $no++?></td>
                    <td align="left"><?php echo $detail_kantor->nama_kantor?></td>
                    <td align="left"><?php echo $detail_kantor->nama_karyawan?></td>
                    <td align="left"><?php echo $detail_kantor->departemen?></td>
                    <td align="left"><?php echo $detail_kantor->mobil?></td>
                    <td align="left"><?php echo $detail_kantor->plat_nomor?></td>
                    <td align="left"><?php echo $detail_kantor->tahun?></td>
                    <td align="left"><?php echo $detail_kantor->nama_vendor_kendaraan?></td>
                    <td align="left">Rp. <?php echo number_format($detail_kantor->harga_sewa,0,',','.')?></td>
                    <td align="left"><?php echo date("d-m-Y",strtotime($detail_kantor->periode_awal))?></td>
                    <td align="left"><?php echo date("d-m-Y",strtotime($detail_kantor->periode_akhir))?></td>
                    <td align="left"><?php echo $detail_kantor->catatan?></td>
                </tr>
            <?php endforeach;?>
        </table>
        <?php endif;?>
</div>



