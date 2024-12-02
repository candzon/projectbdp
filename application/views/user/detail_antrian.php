<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Detail Antrian</h1>
          </div>
    <table class="table table-bordered table-striped table-hover table-sm">
        <tr align="center"> 
            <?php $no =1?>
            <th>No</th>
            <th>Penerbitan</th>
            <th>Pemohon</th>
            <th>Disetujui Oleh</th>
            <th>Unit Kerja</th>
            <th>Jenis</th>
            <th>Tanggal Terima</th>
            <th>Target Selesai</th>
            <th>Catatan</th>
        </tr>

        <?php foreach($data as $antrian):?>
            <tr align="center">
                <td><?php echo $no++?></td>
                <td><?php echo $antrian->penerbitan?></td>
                <td><?php echo $antrian->pemohon?></td>
                <td><?php echo $antrian->disetujui?></td>
                <td><?php echo $antrian->unit_kerja?></td>
                <td><?php echo $antrian->jenis?></td>
                <td><?php echo $antrian->registrasi?></td>
                <td><?php echo $antrian->target_selesai?></td>
                <td><?php echo $antrian->catatan?></td>
            </tr>
        <?php endforeach;?>
    </table>
    <div class="modal-footer">  
        <?php echo anchor('data_antrian/tampil_data','<div class="btn btn-danger btn-sm hapus_pakar">Kembali</div>')?>
</div>