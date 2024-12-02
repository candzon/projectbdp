<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Vendor</h1>
    </div>
    
    <div class="panel panel-default">
        <div class="panel-heading mb-4">
        <?php echo anchor('data_vendor/tambah_vendor','<button class="btn btn-sm btn-primary mb-2"><i class="fas fa-plus"></i> Tambah</button>')?>
            <form class="form-inline"  method="post" action="<?php echo base_url('data_vendor/pencarian') ?>">
            
                <div class="form-group">
                    <input class="form-control" type="text" autocomplete="off" placeholder="Nama vendor"   name="cari"/>
                </div>
                
                <div class="form-group">
                    <input type="submit" name="submit" value="cari" class="btn btn-primary btn-xs"></input>
                </div>
            </form>
        </div>

        <?php if($data == null):?>
            <div class="container-fluid mt-3">
                <div class="alert alert-primary">
                    <h4 class="text-center align-middle">
                    Data Vendor Masih Kosong!
                    </h4>
                </div>
            </div>
        <?php endif;?>

        <?php if($data != null):?>
        <table class="table table-bordered table-striped table-hover table-sm small">
            <tr  align="center"> 
                <?php $no =1?>
                <th>No</th>
                <th>Nama Vendor</th>
                <th>PIC (Person In Contact)</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Aksi</th>
            </tr>

            <?php foreach($data as $vendor):?>
                <tr  align="center">
                    <td><?php echo $no++?></td>
                    <td><?php echo $vendor->nama_vendor_kendaraan?></td>
                    <td><?php echo $vendor->pic?></td>
                    <td><?php echo $vendor->email?></td>
                    <td><?php echo $vendor->nomor_telepon?></td>
                    <td>
                    <?php echo anchor('data_vendor/edit_vendor/'.$vendor->id_vendor_kendaraan, '<div class="btn btn-success btn-sm">Ubah</div>')?>
                    <a onclick="deletedata()"  id_vendor_kendaraan="<?php echo $vendor->id_vendor_kendaraan?>" data-toggle="tooltip" data-placement="bottom" title="Hapus" class="btn btn-danger btn-sm delete text-white">Hapus</a>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
        <?php endif;?>
</div>

<script>
   function deletedata(){
    $('.delete').click(function(){
        var id_vendor_kendaraan = $(this).attr('id_vendor_kendaraan'); 
        swal({
            title: "Hapus Data?",
            type:  "warning",
            showCancelButton: true,
            confirmButtonColor: "#FF0000",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",   
        }, function(){ 
            window.location = "../data_vendor/hapus_vendor/"+id_vendor_kendaraan+""
        })
      });
   }
</script>