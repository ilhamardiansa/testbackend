<?php
header("content-type:application/octet-stream/");
header("Content-Disposition:attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<h3>Laporan Pemesanan Kendaraan</h3>
<table border="1" width="100%">
    <thead>
        <tr>
        <th>#</th>
                    <th>Jenis Kendaraan</th>
                    <th>Driver</th>
                    <th>Barang</th>
                    <th>Durasi</th>
                    <th>Nama Penyewa</th>
                    <th>Status</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($histori as $histori){ ?>
                  <tr>
                  <td><?= $histori->id; ?></td>
                    <td><?= $histori->jenis_kendaraan; ?></td>
                    <td><?= $histori->driver; ?></td>
                    <td><?= $histori->barang; ?></td>
                    <td><?= $histori->durasi; ?> Hari</td>
                    <td><?= $histori->nama_penyewa; ?></td>
                    <td><?= $histori->status; ?></td>
                  </tr>
                  <?php } ?>
    </tbody>
</table>