<!-- Tabel Data --> 
<table class="table table-bordered table-striped table-hover table-sm small" id="dataTabel">
    <thead>
        <tr align="center">
            <th>No</th>
            <th>Nama Kantor</th>
            <th>Nomor SKDP</th>
            <th>Periode Awal</th>
            <th>Periode Akhir</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody id="tableBody">
    <?php 
    // Debugging: tampilkan data untuk diperiksa
    echo '<pre>';
    var_dump($data); // Memeriksa nilai dari $data
    echo '</pre>';

    // Sort the data by 'periode_akhir' in descending order to show latest first
    usort($data, function($a, $b) {
        return strtotime($b->periode_akhir) - strtotime($a->periode_akhir);
    });

    $no = 1; 
    foreach($data as $detail_skdp): 
    ?>
        <tr align="center">
            <td><?php echo $no; ?></td>
            <td><?php echo $detail_skdp->nama_kantor; ?></td>
            <td><?php echo $detail_skdp->nomor_skdp; ?></td>
            <td><?php echo $detail_skdp->periode_awal; ?></td>
            <td><?php echo $detail_skdp->periode_akhir; ?></td>
            <td>
                <div class="btn-group" role="group">
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse<?php echo $no; ?>">Detail</button>
                    <button class="btn btn-secondary" type="button" onclick="lihatDokumen('dokumen<?php echo $no; ?>.pdf')">
                        <i class="fas fa-eye"></i> Lihat
                    </button>
                </div>
            </td>
        </tr>
        
        <!-- Accordion detail -->
        <tr id="collapse<?php echo $no; ?>" class="collapse">
            <td colspan="6">
                <div class="card">
                    <div class="card-header">
                        <strong>Detail Kantor</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr align="center">
                                    <th>No</th>
                                    <th>Informasi Kantor</th>
                                    <th>Alamat Kantor</th>
                                    <th>Nama Kepala Kantor</th>
                                    <th>Periode Awal</th>
                                    <th>Periode Akhir</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>  
                                </tr>       
                            </thead>
                            <tbody>
                                <tr align="center">
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $detail_skdp->nama_kantor . ' (' . $detail_skdp->nomor_skdp . ')'; ?></td>
                                    <td><?php echo $detail_skdp->alamat_kantor; ?></td>
                                    <td><?php echo $detail_skdp->nama_kepala_kantor; ?></td>
                                    <td><?php echo $detail_skdp->periode_awal; ?></td>
                                    <td><?php echo $detail_skdp->periode_akhir; ?></td>
                                    <td><?php echo $detail_skdp->keterangan; ?></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#editModal<?php echo $no; ?>">Ubah</button>
                                            <button class="btn btn-secondary">Upload Dokumen</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </td>
        </tr> 
    <?php 
    $no++; 
    endforeach; 
    ?>
    </tbody>
</table>
