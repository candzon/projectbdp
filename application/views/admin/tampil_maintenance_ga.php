<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Vendor Service/Maintenance</h1>
    </div>
    
    <div class="panel panel-default">
    <div class="panel-heading mb-4">
            <form class="form-inline"  method="post" action="<?php echo base_url('data_vendor_ga/pencarian_maintenance') ?>">
            
                <div class="form-group">
                    <input class="form-control" type="text" autocomplete="off" placeholder="Pencarian"   name="cari"/>
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
                <th>Alamat</th>
                <th>Provinsi</th>
                <th>Nomor Telepon (kantor)</th>
                <th>Aksi</th>
                <th>PIC Vendor</th>
            </tr>

            <?php foreach($data as $vendor):?>
                <tr  align="center">
                    <td><?php echo $no++?></td>
                    <td><?php echo $vendor->nama_vendor?></td>
                    <td><?php echo $vendor->alamat?></td>
                    <td><?php echo $vendor->provinsi?></td>
                    <td><?php echo $vendor->no_telepon_kantor?></td>
                    <td>
                        <?php echo anchor('data_vendor_ga/download_pdf_penilaian_vendor/'.$vendor->id_vendor, '<div class="btn btn-warning btn-sm">Penilaian PDF</div>')?>
                    </td>
                    <td>
                    <?php echo anchor('data_vendor_ga/tampil_pic_maintenance/'.$vendor->id_vendor, '<div class="btn btn-info btn-sm">PIC Vendor</div>')?>    
                    <?php echo anchor('data_vendor_ga/edit_maintenance_ga/'.$vendor->id_vendor, '<div class="btn btn-success btn-sm">Ubah</div>')?>
                    <a onclick="deletedata()"  id_vendor="<?php echo $vendor->id_vendor?>" data-toggle="tooltip" data-placement="bottom" title="Hapus" class="btn btn-danger btn-sm delete text-white">Hapus</a>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
        <?php endif;?>
</div>

<script>
   function deletedata(){
    $('.delete').click(function(){
        var id_vendor = $(this).attr('id_vendor'); 
        swal({
            title: "Hapus Data?",
            type:  "warning",
            showCancelButton: true,
            confirmButtonColor: "#FF0000",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",   
        }, function(){ 
            window.location = "../data_vendor_ga/hapus_maintenance/"+id_vendor+""
        })
      });
   }
</script>