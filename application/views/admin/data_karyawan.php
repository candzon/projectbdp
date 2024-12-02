<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Karyawan</h1>
    </div>
    
    <div class="panel panel-default">
        <div class="panel-heading mb-4">
        <?php echo anchor('data_karyawan/tambah_karyawan','<button class="btn btn-sm btn-primary mb-2"><i class="fas fa-plus"></i> Tambah</button>')?>
            <form class="form-inline"  method="post" action="<?php echo base_url('data_karyawan/pencarian') ?>">
            
                <div class="form-group">
                    <input class="form-control" type="text" autocomplete="off" placeholder="NIK atau nama"   name="cari"/>
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
                    Data Karyawan Masih Kosong!
                    </h4>
                </div>
            </div>
        <?php endif;?>

        <?php if($data != null):?>
        <table class="table table-bordered table-striped table-hover table-sm small">
            <tr  align="center"> 
                <?php $no =1?>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Lokasi</th>
                <th>Divisi</th>
                <th>Departemen</th>
                <th></th>
            </tr>

            <?php foreach($data as $karyawan):?>
                <tr  align="center">
                    <td><?php echo $no++?></td>
                    <td><?php echo $karyawan->nik?></td>
                    <td><?php echo $karyawan->nama_karyawan?></td>
                    <td><?php echo $karyawan->lokasi?></td>
                    <td><?php echo $karyawan->divisi?></td>
                    <td><?php echo $karyawan->departemen?></td>
                    <td>
                    <?php echo anchor('data_karyawan/edit_karyawan/'.$karyawan->id_karyawan, '<div class="btn btn-success btn-sm">Ubah</div>')?>
                    <a onclick="deletedata()"  id_karyawan="<?php echo $karyawan->id_karyawan?>" data-toggle="tooltip" data-placement="bottom" title="Hapus" class="btn btn-danger btn-sm delete text-white">Hapus</a>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
        <?php endif;?>
</div>

<script>
   function deletedata(){
    $('.delete').click(function(){
        var id_karyawan = $(this).attr('id_karyawan'); 
        swal({
            title: "Hapus Data?",
            type:  "warning",
            showCancelButton: true,
            confirmButtonColor: "#FF0000",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",   
        }, function(){ 
            window.location = "../data_karyawan/hapus_karyawan/"+id_karyawan+""
        })
      });
   }
</script>