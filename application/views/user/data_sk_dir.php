<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data SK Direksi</h1>
    </div>

    <div class="panel panel-default">
    <div class="panel-heading mb-4">
        <form class="form-inline"  method="post" action="<?php echo base_url('data_sk_dir/pencarian') ?>">
        
            <div class="form-group">
                <input class="form-control" type="text" autocomplete="off" placeholder="Pencarian"   name="cari"/>
            </div>
            
            <div class="form-group">
                <input type="submit" name="submit" value="Cari" class="btn btn-primary btn-xs"></input>
            </div>
        </form>
    </div>

    <?php if($data == null):?>
        <div class="container-fluid">
            <div class="alert alert-primary">
                <h4 class="text-center align-middle mt-3">
                Data SK Direksi Belum Ada Yang Aktif!
                </h4>
            </div>
        </div>
    <?php endif;?>

    <?php if($data != null):?>
        <table class="table table-bordered table-striped table-hover table-sm">
        <tr align="center"> 
            <?php $no =1?>
            <th>No</th>
            <th>Jenis</th>
            <th>No SK</th>
            <th>Perihal</th>
            <th>Referensi</th>
            <th>Mencabut</th>
            <th>Keterangan</th>
            <th>Tanggal Publish</th>
        </tr>

        <?php foreach($data as $sk_dir):?>
            <tr align="center">
                <td><?php echo $no++?></td>
                <td><?php echo $sk_dir->status?></td>
                <td><?php echo $sk_dir->nomor_sk?></td>
                <td><?php echo $sk_dir->perihal?></td>
                <td><?php echo $sk_dir->referensi_ketentuan?></td>
                <td><?php echo $sk_dir->mencabut_ketentuan?></td>
                <!-- <td><?php echo $sk_dir->ketentuan_pengganti?></td> -->
                <td><?php echo $sk_dir->catatan?></td>
                <td><?php echo $sk_dir->publish?></td>
            </tr>
        <?php endforeach;?>
    </table>
    <?php endif;?>
</div>
