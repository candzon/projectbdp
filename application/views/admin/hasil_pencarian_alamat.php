<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Hasil Pencarian</h1>
    </div>
    
    <!-- <form method="post" action="<?php echo base_url('index.php/dashboard_user/cek_riwayat') ?>"class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Cari.." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append ">
            <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
            </div>
        </div>
    </form> -->

    <div class="panel panel-default">
        <div class="panel-heading mb-4">
        <?php echo anchor('data_akun/tambah_akun','<button class="btn btn-sm btn-primary mb-4"><i class="fas fa-plus"></i> Tambah</button>')?>
        <?php echo anchor('data_alamat/tampil_alamat','<button class="btn btn-sm btn-danger mb-4"><i class="fa fa-times" aria-hidden="true"></i> Kembali</button>')?>
            <form class="form-inline"  method="post" action="<?php echo base_url('data_alamat/pencarian') ?>">
            
                <div class="form-group">
                    <input class="form-control" type="text" autocomplete="off" placeholder="Nama Kantor"   name="cari"/>
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
                Data Alamat Tidak Ditemukan!
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
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>

            <?php foreach($data as $alamat):?>
                <tr  align="center">
                    <td><?php echo $no++?></td>
                    <td><?php echo $alamat->nama_kantor?></td>
                    <td><?php echo $alamat->alamat?></td>
                    <td>
                    <?php echo anchor('data_alamat/edit_alamat/'.$alamat->id_alamat, '<div class="btn btn-success btn-sm">Ubah</div>')?>
                    <a onclick="deletedata()"  id_alamat="<?php echo $alamat->id_alamat?>" data-toggle="tooltip" data-placement="bottom" title="Hapus" class="btn btn-danger btn-sm delete text-white">Hapus</a>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
        <?php endif;?>
</div>