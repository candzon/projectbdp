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
        <?php echo anchor('data_antrian/tambah_antrian','<button class="btn btn-sm btn-primary mb-4"><i class="fas fa-plus"></i> Tambah</button>')?>
        <?php echo anchor('data_antrian/tampil_data','<button class="btn btn-sm btn-danger mb-4"><i class="fa fa-times" aria-hidden="true"></i> Kembali</button>')?>
            <form class="form-inline"  method="post" action="<?php echo base_url('data_antrian/pencarian') ?>">
            
                <div class="form-group">
                    <input class="form-control" type="text" autocomplete="off" placeholder="Pencarian"   name="cari"/>
                </div>
                
                <div class="form-group">
                    <input type="submit" name="submit" value="Cari" class="btn btn-primary btn-xs"></input>
                </div>
            </form>
        </div>

    <?php if($data == null):?>
        <div class="container-fluid mt-3">
            <div class="alert alert-primary">
                <h4 class="text-center align-middle">
                Data Antrian Tidak Ditemukan!
                </h4>
            </div>
        </div>
    <?php endif;?>

    <?php if($data != null):?>
        <table class="table table-bordered table-striped table-hover table-sm mt-3">
        <tr align="center"> 
        <?php $no =1?>
            <th>No</th>
            <th>No RR</th>
            <th>Penerbitan</th>
            <th>Pengajuan</th>
            <th>Perihal</th>
            <th>Prioritas</th>
            <th>Dokumen</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php foreach($data as $antrian):?>
            <tr align="center">
                <td><?php echo $no++?></td>
                <td><?php echo $antrian->rr?></td>
                <td><?php echo $antrian->penerbitan?></td>
                <td><?php echo $antrian->pengajuan?></td>
                <td><?php echo $antrian->perihal?></td>
                <td><?php echo $antrian->prioritas?></td>
                <td><?php echo $antrian->jenis?></td>
                <td><?php echo $antrian->status_terakhir?></td>
                <td>
                <?php echo anchor('data_antrian/proses_antrian/'.$antrian->id.'/'.$antrian->pengajuan, '<div class="btn btn-primary btn-sm">Proses</div>')?>
                <?php echo anchor('data_antrian/detail_antrian/'.$antrian->id, '<div class="btn btn-success btn-sm">Detail</div>')?>
                <?php echo anchor('data_antrian/hapus_antrian/'.$antrian->id, '<div class="btn btn-sm btn-danger">Hapus</i></div>')?>    
                </td>
            </tr>
        <?php endforeach;?>
    </table>
    <?php endif;?>
</div>