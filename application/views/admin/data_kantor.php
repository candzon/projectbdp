<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Kantor</h1>
    </div>
    
    <div class="panel panel-default">
        <div class="panel-heading mb-4">
        <?php echo anchor('data_kantor/tambah_kantor','<button class="btn btn-sm btn-primary mb-2"><i class="fas fa-plus"></i> Tambah</button>')?>
            <form class="form-inline"  method="post" action="<?php echo base_url('data_kantor/pencarian') ?>">
            
                <div class="form-group">
                    <input class="form-control" type="text" autocomplete="off" placeholder="Nama kantor"   name="cari"/>
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
                    Data Kantor Masih Kosong!
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
                <th>Aksi</th>
            </tr>

            <?php foreach($data as $kantor):?>
                <tr  align="center">
                    <td><?php echo $no++?></td>
                    <td><?php echo $kantor->nama_kantor?></td>
                    <td>
                    <?php echo anchor('data_kantor/detail_kantor/'.$kantor->id_kantor, '<div class="btn btn-primary btn-sm">Detail</div>')?>
                    <!-- <?php echo anchor('data_kantor/edit_kantor/'.$kantor->id_kantor, '<div class="btn btn-success btn-sm">Ubah</div>')?> -->
                    <!-- <a onclick="deletedata()"  id_kantor="<?php echo $kantor->id_kantor?>" data-toggle="tooltip" data-placement="bottom" title="Hapus" class="btn btn-danger btn-sm delete text-white">Hapus</a> -->
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