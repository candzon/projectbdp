<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data PIC Vendor Pengadaan</h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading mb-4">
        <?php echo anchor('data_vendor_ga/tambah_pic_pengadaan_procurement/'.$this->uri->segment(3),'<button class="btn btn-sm btn-primary mb-2"><i class="fas fa-plus"></i> Tambah</button>')?>
        </div>

        <?php if($data == null):?>
            <div class="container-fluid mt-3">
                <div class="alert alert-primary">
                    <h4 class="text-center align-middle">
                    Data PIC Vendor Masih Kosong!
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
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Aksi</th>
            </tr>

            <?php foreach($data as $vendor):?>
                <tr  align="center">
                    <td><?php echo $no++?></td>
                    <td><?php echo $vendor->nama?></td>
                    <td><?php echo $vendor->email?></td>
                    <td><?php echo $vendor->nomor_telepon_pic?></td>
                    <td>
                    <?php echo anchor('data_vendor_ga/edit_pic_pengadaan_procurement/'.$vendor->id_pic_vendor, '<div class="btn btn-success btn-sm">Ubah</div>')?>
                    <a onclick="deletedata()"  id_pic_vendor="<?php echo $vendor->id_pic_vendor?>" data-toggle="tooltip" data-placement="bottom" title="Hapus" class="btn btn-danger btn-sm delete text-white">Hapus</a>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
        <?php endif;?>
</div>

<script>
   function deletedata(){
    $('.delete').click(function(){
        var id_pic_vendor = $(this).attr('id_pic_vendor'); 
        swal({
            title: "Hapus Data?",
            type:  "warning",
            showCancelButton: true,
            confirmButtonColor: "#FF0000",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",   
        }, function(){ 
            window.location = "../hapus_pic_pengadaan_procurement/"+id_pic_vendor+""
        })
      });
   }
</script>