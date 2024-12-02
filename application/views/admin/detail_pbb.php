<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800">Detail</h1>

<?php if (!empty($header_pbb) && (is_array($header_pbb) || is_object($header_pbb))): ?>
    <?php foreach ($header_pbb as $header): ?>
        <p><?php echo isset($header->nama_kantor) ? $header->nama_kantor : 'Nama kantor tidak tersedia.'; ?></p>
    <?php endforeach; ?>
<?php else: ?>

<?php endif; ?>

    </div>

    
    
    <div class="panel panel-default">
        <div class="panel-heading mb-4">
        <?php echo anchor('data_pbb/tambah_detail_pbb/'.$this->uri->segment(3),'<button class="btn btn-sm btn-primary mb-2"><i class="fas fa-plus"></i> Tambah</button>')?>
            <form class="form-inline"  method="post" action="<?php echo base_url('data_pbb/pencarian_detail_pbb') ?>">
            
                <div class="form-group">
                    <input class="form-control" type="text" autocomplete="off" placeholder="Nama Pengguna"   name="cari"/>
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
                        Data Detail Kantor Masih Kosong!
                    </h4>
                </div>
            </div>
        <?php endif;?> 

        <?php if($data != null):?>
         
                          
        <table class="table thead-dark table-bordered table-striped table-hover table-sm mt-2 small">
            <tr  align="center"> 
                <?php $no =1?>
                <th>No</th>
                <th>Tahun</th>
                <th>Jumlah Pembayaran</th>
                <th>Tanggal Pembayaran</th>
               
            </tr>


            <?php foreach($data as $detail_pbb):?>
                <tr  align="center">
                    <td><?php echo $no++?></td>
                    <td><?= $detail->tahun; ?></td>
					<td><?= $detail->jumlah_Pembayaran; ?></td>
					<td><?= $detail->tanggal_pembayaran; ?></td>
                    <td>
                    <?php echo anchor('data_pbb/edit_detail_pbb/'.$detail_pbb->id_detail_pbb, '<button class="btn btn-success btn-sm">Ubah</button>'); ?>

              <a onclick="deletedata()" id_detail_pbb="<?php echo $detail_pbb->id_detail_pbb?>" id="<?php echo $this->uri->segment(3)?>" data-toggle="tooltip" data-placement="bottom" title="Hapus" class="btn btn-danger btn-sm delete text-white">Hapus</a>
                    </td>

                </tr>

                
            <?php endforeach;?>
        </table>
        <?php endif;?>

        

        

        
</div>

<script>
   function deletedata(){
    $('.delete').click(function(){
        var id_detail_pbb = $(this).attr('id_detail_pbb'); 
        var id_kantor = $(this).attr('id'); 
        swal({
            title: "Hapus Data?",
            type:  "warning",
            showCancelButton: true,
            confirmButtonColor: "#FF0000",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",   
        }, function(){ 
            window.location = "../hapus_detail_pbb/"+id_detail_pbb+"/"+id+""
        })
      });
   }
</script> 


