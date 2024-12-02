<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <table align="center">
            <tr>
                <th>Total Harga Sewa (+PPN):</th>
                <?php foreach($total_harga_sewa as $total_harga_sewa):?>

            <th><td>Rp. <?php echo number_format($total_harga_sewa->harga_sewa,0,',','.') ?></td></th>
            <?php endforeach;?>
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
            <p><strong>Kata kunci pencarian berupa Nama Kantor/ Departemen / Vendor / Nama / Plat Nomor</strong> </p>
        
            <a target="_blank" class = "btn btn-danger btn-sm" href="<?php echo base_url('data_kendaraan/unduhpdf') ?>"><i class="fa fa-file"> Unduh PDF </i></a>
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
                    
        <table class="table thead-dark table-bordered table-striped table-hover table-sm mt-2 small">
            <tr  align="center"> 
                <?php $no =1?>
                <th>No</th>
                <th>Kantor</th>
                <th>Nama</th>
                <th>Departemen</th>
                <th>Mobil</th>
                <th width="100px">Plat Nomor</th>
                <th>Tahun</th>
                <th>Vendor</th>
                <th width="100px">Harga Sewa (+PPN)</th>
                <th width="100px">Periode Awal Sewa</th>
                <th width="100px">Periode Akhir Sewa</th>
                <th>Catatan</th>
            </tr>

            <?php foreach($data as $detail_kantor):?>
                <tr  align="center">
                    <td><?php echo $no++?></td>
                    <td><?php echo $detail_kantor->nama_kantor?></td>
                    <td><?php echo $detail_kantor->nama_karyawan?></td>
                    <td><?php echo $detail_kantor->departemen?></td>
                    <td><?php echo $detail_kantor->mobil?></td>
                    <td><?php echo $detail_kantor->plat_nomor?></td>
                    <td><?php echo $detail_kantor->tahun?></td>
                    <td><?php echo $detail_kantor->nama_vendor_kendaraan?></td>
                    <td>Rp. <?php echo number_format($detail_kantor->harga_sewa,0,',','.')?></td>
                    <td><?php echo date("d-m-Y",strtotime($detail_kantor->periode_awal))?></td>
                    <td><?php echo date("d-m-Y",strtotime($detail_kantor->periode_akhir))?></td>
                    <td><?php echo $detail_kantor->catatan?></td>
                </tr>
            <?php endforeach;?>
        </table>
        <?php endif;?>
</div>

<script>
   function deletedata(){
    $('.delete').click(function(){
        var id_detail_kantor = $(this).attr('id_detail_kantor'); 
        var id_kantor = $(this).attr('id_kantor'); 
        swal({
            title: "Hapus Data?",
            type:  "warning",
            showCancelButton: true,
            confirmButtonColor: "#FF0000",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",   
        }, function(){ 
            window.location = "../hapus_detail_kantor/"+id_detail_kantor+"/"+id_kantor+""
        })
      });
   }
</script>


