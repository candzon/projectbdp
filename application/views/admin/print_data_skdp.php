<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data SKDP</title>
    <link rel="stylesheet" href="<?php echo base_url('data_skdp/tampil_data_skdp'); ?>"> <!-- Pastikan jalur CSS sesuai -->
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cetak Data SKDP</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td><?php echo $row->nik; ?></td>
                        <td><?php echo $row->nama; ?></td>
                        <td><?php echo $row->alamat; ?></td>
                        <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button class="btn btn-sm btn-danger mb-2 ml-2" onclick="window.location.href='<?php echo base_url('data_skdp/print_data_skdp'); ?>'"><i class="fas fa-print"></i> Print</button>

    </div>
</body>
</html>
