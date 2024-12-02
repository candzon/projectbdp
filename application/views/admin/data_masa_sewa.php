<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Masa Sewa Kendaraan Yang kurang dari 30 hari</h1>
    </div>
    
    <div class="panel panel-default">
       

        <?php if($data == null):?>
            <div class="container-fluid mt-3">
                <div class="alert alert-primary">
                    <h4 class="text-center align-middle">
                    Sisa Masa Sewa Semua Kendaraan Masih Diatas 30 Hari!
                    </h4>
                </div>
            </div>
        <?php endif;?>

        <?php if($data != null):?>
        <table class="table table-bordered table-striped table-hover table-sm small">
            <tr  align="center"> 
                <?php $no =1?>
                <th>No</th>
                <th>Nama</th>
                <th>Mobil</th>
                <th width="100px">Plat Nomor</th>
                <th>Tahun</th>
                <th>Vendor</th>
                <th width="100px">Harga Sewa</th>
                <th>Periode Awal Sewa</th>
                <th>Periode Akhir Sewa</th>
                <th>Sisa Sewa</th>
                <th>Catatan</th>
                <th>Aksi</th>
            </tr>

            <?php foreach($data as $masa_sewa):?>
                <tr  align="center">
                    <td><?php echo $no++?></td>
                    <td><?php echo $masa_sewa->nama_karyawan?></td>
                    <td><?php echo $masa_sewa->mobil?></td>
                    <td><?php echo $masa_sewa->plat_nomor?></td>
                    <td><?php echo $masa_sewa->tahun?></td>
                    <td><?php echo $masa_sewa->nama_vendor_kendaraan?></td>
                    <td>Rp. <?php echo number_format($masa_sewa->harga_sewa,0,',','.')?></td>
                    <td><?php echo date("d-m-Y",strtotime($masa_sewa->periode_awal))?></td>
                    <td><?php echo date("d-m-Y",strtotime($masa_sewa->periode_akhir))?></td>
                    <td><?php echo $masa_sewa->days?> hari</td>
                    <td><?php echo $masa_sewa->catatan?></td>
                    <td>
                    <?php echo anchor('data_kantor/edit_detail_kantor/'.$masa_sewa->id_detail_kantor, '<div class="btn btn-success btn-sm">Perbaharui</div>')?>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
        <?php endif;?>
</div>

<script>
   function deletedata(){
    $('.delete').click(function(){
        var id_kantor = $(this).attr('id_kantor'); 
        swal({
            title: "Hapus Data?",
            type:  "warning",
            showCancelButton: true,
            confirmButtonColor: "#FF0000",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",   
        }, function(){ 
            window.location = "../data_kantor/hapus_kantor/"+id_kantor+""
        })
      });
   }
</script>