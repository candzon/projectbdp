<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data SKDP</h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading mb-4">
            <?php echo anchor('data_akun/tambah_akun','<button class="btn btn-sm btn-primary mb-2"><i class="fas fa-plus"></i> Tambah</button>')?>
            <form class="form-inline" method="post" action="<?php echo base_url('data_skdp/tampil_data_skdp') ?>">
                <div class="form-group">
                    <input class="form-control" type="text" autocomplete="off" placeholder="NIK atau nama" name="cari"/>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="cari" class="btn btn-primary btn-xs">
                </div>

                <button class="btn btn-sm btn-danger mb-2 ml-2" onclick="printDocument()"><i class="fas fa-print"></i> Print</button>
            </form>
        </div>
    </div>

    <script>
        function printDocument() {
            window.print();
        }
    </script>

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
        <tr align="center"> 
            <?php $no = 1?>
            <th>Nomor surat</th>
            <th>Nama kepala kantor</th>
            <th>Alamat kantor</th>
            <th>Masa berlaku</th>
            <th>Jenis kelamin</th>
            <th>Agama</th>
            <th>NIK</th>
            <th>Pekerjaan</th>
            <th>Tempat tinggal</th>
            <th>Nama perusahaan</th>
            <th>Jenis usaha</th>
            <th>Alamat usaha</th>
            <th>Telp perusahaan</th>
            <th>Status bangunan</th>
            <th>Akte perusahaan</th>
            <th>SK pengesahan</th>
            <th>Penanggung jawab</th>
            <th>Aksi</th>
        </tr>

        <?php foreach($data as $skdp):?>
            <tr align="center">
                <td><?php echo $no++ ?></td>
                <td><?php echo $skdp->nama ?></td>
                <td><?php echo $skdp->tempat_lahir ?></td>
                <td><?php echo $skdp->tanggal_lahir ?></td>
                <td><?php echo $skdp->jenis_kelamin ?></td>
                <td><?php echo $skdp->agama ?></td>
                <td><?php echo $skdp->nik ?></td>
                <td><?php echo $skdp->pekerjaan ?></td>
                <td><?php echo $skdp->tempat_tinggal ?></td>
                <td><?php echo $skdp->nama_perusahaan ?></td>
                <td><?php echo $skdp->jenis_usaha ?></td>
                <td><?php echo $skdp->alamat_usaha ?></td>
                <td><?php echo $skdp->telp_perusahaan ?></td>
                <td><?php echo $skdp->status_bangunan ?></td>
                <td><?php echo $skdp->akte_perusahaan ?></td>
                <td><?php echo $skdp->sk_pengesahan ?></td>
                <td><?php echo $skdp->penanggung_jawab ?></td>
                
                <!-- Tombol untuk aksi upload, download, lihat PDF -->
                <td>
                    <!-- Tombol Ubah -->
                    <?php echo anchor('data_skdp/edit/'.$skdp->id, '<i class="fas fa-edit"></i> Ubah', array('class' => 'btn btn-sm btn-warning')) ?>

                    <!-- Tombol Upload PDF -->
                    <form action="<?php echo base_url('data_skdp/upload_pdf/'.$skdp->id); ?>" method="post" enctype="multipart/form-data" style="display:inline;">
                        <input type="file" name="file_pdf" accept="application/pdf" class="form-control-file" required>
                        <button type="submit" class="btn btn-sm btn-info"><i class="fas fa-upload"></i> Upload PDF</button>
                    </form>
                    
                    <!-- Tombol Download PDF -->
                    <?php if (!empty($skdp->file_pdf)): ?>
                        <a href="<?php echo base_url('uploads/'.$skdp->file_pdf); ?>" class="btn btn-sm btn-success" target="_blank"><i class="fas fa-download"></i> Download PDF</a>
                        <!-- Tombol Lihat PDF -->
                        <a href="<?php echo base_url('uploads/'.$skdp->file_pdf); ?>" class="btn btn-sm btn-primary" target="_blank"><i class="fas fa-eye"></i> Lihat PDF</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach;?>
    </table>
    <?php endif;?>
</div>
