<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Akun</h1>
    </div>
    
    <div class="panel panel-default">
        <div class="panel-heading mb-4">
        <?php echo anchor('data_akun/tambah_akun','<button class="btn btn-sm btn-primary mb-2"><i class="fas fa-plus"></i> Tambah</button>')?>
            <form class="form-inline"  method="post" action="<?php echo base_url('data_akun/pencarian') ?>">
            
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
                    Data Akun Masih Kosong!
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
                <th>Level</th>
                <th>Aksi</th>
            </tr>

            <?php foreach($data as $akun):?>
                <tr  align="center">
                    <td><?php echo $no++?></td>
                    <td><?php echo $akun->nama_akun?></td>
                    <td><?php echo $akun->nama?></td>
                    <td><?php echo $akun->level?></td>
                    <td>
                    <?php echo anchor('data_akun/edit_akun/'.$akun->nama_akun, '<div class="btn btn-success btn-sm">Ubah Sandi</div>')?>
                    <a onclick="deletedata()"  nama_akun="<?php echo $akun->nama_akun?>" data-toggle="tooltip" data-placement="bottom" title="Hapus" class="btn btn-danger btn-sm delete text-white">Hapus</a>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
        <?php endif;?>
</div>

<script>
   function deletedata(){
    $('.delete').click(function(){
        var nama_akun = $(this).attr('nama_akun'); 
        swal({
            title: "Hapus Data?",
            type:  "warning",
            showCancelButton: true,
            confirmButtonColor: "#FF0000",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",   
        }, function(){ 
            window.location = "../data_akun/hapus_akun/"+nama_akun+""
        })
      });
   }
</script>