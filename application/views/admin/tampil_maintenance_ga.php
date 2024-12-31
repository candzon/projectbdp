<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Vendor Service/Maintenance</h1>
    </div>
    
    <div class="panel panel-default">
    <div class="panel-heading mb-4">
            <form class="form-inline"  method="post" action="<?php echo base_url('data_vendor_ga/pencarian_maintenance') ?>">
            
                <div class="form-group">
                    <input class="form-control" type="text" autocomplete="off" placeholder="Pencarian"   name="cari"/>
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
                    Data Vendor Masih Kosong!
                    </h4>
                </div>
            </div>
        <?php endif;?>

        <?php if ($data != null): ?>
<table class="table table-bordered table-striped table-hover table-sm small">
    <tr align="center">
        <th>No</th>
        <th>Nama Vendor</th>
        <th>Alamat</th>
        <th>Provinsi</th>
        <th>Nomor Telepon (kantor)</th>
        <th>Aksi</th>
    </tr>
    <?php $no = 1; ?>
    <?php foreach ($data as $item): ?>
        <tr align="center">
            <td><?php echo $no++; ?></td>
            <td><?php echo $item['vendor']->nama_vendor; ?></td>
            <td><?php echo $item['vendor']->alamat; ?></td>
            <td><?php echo $item['vendor']->provinsi; ?></td>
            <td><?php echo $item['vendor']->no_telepon_kantor; ?></td>
            <td>
                <?php echo anchor('data_vendor_ga/tampil_pic_maintenance/' . $item['vendor']->id_vendor, '<div class="btn btn-info btn-sm">PIC Vendor</div>'); ?>    
                <?php echo anchor('data_vendor_ga/edit_maintenance_ga/' . $item['vendor']->id_vendor, '<div class="btn btn-success btn-sm">Ubah</div>'); ?>
                <a onclick="deletedata()" id_vendor="<?php echo $item['vendor']->id_vendor; ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus" class="btn btn-danger btn-sm delete text-white">Hapus</a>
                <button class="btn btn-secondary btn-sm" type="button" data-toggle="collapse" data-target="#collapse-<?php echo $item['vendor']->id_vendor; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $item['vendor']->id_vendor; ?>">
                    Detail
                </button>
            </td>
        </tr>
        <tr id="collapse-<?php echo $item['vendor']->id_vendor; ?>" class="collapse">
            <td colspan="7">
                <div class="card">
                    <div class="card-header">
                        <strong>History: <?= $item['vendor']->nama_vendor; ?></strong>
                    </div>
                    <div id="details-<?php echo $item['vendor']->id_vendor; ?>" class="details card card-body">
                    <?php if (!empty($item['details'])): ?>
                        <table class="table table-bordered">
							<thead>
								<tr align="center">
									<th>No</th>
									<th>Tanggal Penilaian</th>
									<th>aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $detail_no = 1;
								foreach ($item['details'] as $detail):
								?>
									<tr align="center">
										<td><?= $detail_no; ?></td>
										<td><?php echo $detail->tanggal_penilaian; ?></td>
										<td><a href="<?php echo base_url('data_vendor_ga/print_penilaian_pdf/' . $item['vendor']->id_vendor . '/' . urlencode($detail->tanggal_penilaian)); ?>" 
                                        target="_blank" class="btn btn-sm btn-warning ml-2">Print Penilaian PDF</a></td>
									</tr>
								<?php $detail_no++;
								endforeach; ?>
							</tbody>
						</table>
                    <?php else: ?>
                        <p>Tidak ada riwayat penilaian.</p>
                    <?php endif; ?>
                    </div>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>

</div>