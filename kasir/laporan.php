<?php
$title = 'laporan';
require 'functions.php';
require 'layout_header.php';
$outlet_id = $_SESSION['outlet_id'];
$bulan = ambilsatubaris($conn,"SELECT SUM(total_harga) AS total FROM detail_transaksi 
    INNER JOIN transaksi ON transaksi.id_transaksi = detail_transaksi.transaksi_id 
    INNER JOIN paket ON paket.id_paket = detail_transaksi.paket_id
    WHERE status_bayar = 'dibayar' 
    AND MONTH(tgl_pembayaran) = MONTH(NOW())
    AND paket.outlet_id = '$outlet_id'");

$tahun = ambilsatubaris($conn,"SELECT SUM(total_harga) AS total FROM detail_transaksi 
    INNER JOIN transaksi ON transaksi.id_transaksi = detail_transaksi.transaksi_id 
    INNER JOIN paket ON paket.id_paket = detail_transaksi.paket_id
    WHERE status_bayar = 'dibayar' 
    AND YEAR(tgl_pembayaran) = YEAR(NOW())
    AND paket.outlet_id = '$outlet_id'");

$minggu = ambilsatubaris($conn,"SELECT SUM(total_harga) AS total FROM detail_transaksi 
    INNER JOIN transaksi ON transaksi.id_transaksi = detail_transaksi.transaksi_id 
    INNER JOIN paket ON paket.id_paket = detail_transaksi.paket_id
    WHERE status_bayar = 'dibayar' 
    AND WEEK(tgl_pembayaran) = WEEK(NOW())
    AND paket.outlet_id = '$outlet_id'");


$penjualan = ambildata($conn,"SELECT SUM(detail_transaksi.total_harga) AS total,COUNT(detail_transaksi.paket_id) as jumlah_paket,paket.nama_paket,transaksi.tgl_pembayaran FROM detail_transaksi
INNER JOIN transaksi ON transaksi.id_transaksi = detail_transaksi.transaksi_id
INNER JOIN paket ON paket.id_paket = detail_transaksi.paket_id
WHERE transaksi.status_bayar = 'dibayar' AND paket.outlet_id = '$outlet_id' GROUP BY detail_transaksi.paket_id");
?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Dashboard</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <!-- ============================================================== -->
    <!-- Different data widgets -->
    <!-- ============================================================== -->
    <!-- .row -->
    <div class="row">
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info" style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                <h3 class="box-title">Penghasilan Tahun Ini</h3>
                <ul class="list-inline two-part">
                    <li class="text-right">
                        <i class="ti-arrow-up text-success"></i>
                        <span class="counter text-success" style="font-size: 24px; font-weight: bold;">
                            Rp <?= number_format($tahun['total'],0,',','.') ?>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info" style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                <h3 class="box-title">Penghasilan Bulan ini</h3>
                <ul class="list-inline two-part">
                    <li class="text-right">
                        <i class="ti-arrow-up text-purple"></i>
                        <span class="counter text-purple" style="font-size: 24px; font-weight: bold;">
                            Rp <?= number_format($bulan['total'],0,',','.') ?>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info" style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                <h3 class="box-title">Penghasilan Minggu Ini</h3>
                <ul class="list-inline two-part">
                    <li class="text-right">
                        <i class="ti-arrow-up text-info"></i>
                        <span class="counter text-info" style="font-size: 24px; font-weight: bold;">
                            Rp <?= number_format($minggu['total'],0,',','.') ?>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Laporan Penjualan Paket</h3>
                <div class="table-responsive">
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Paket</th>
                                <th>Jumlah Transaksi</th>
                                <th>Tanggal Transaksi</th>
                                <th>Total Hasil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($penjualan)): ?>
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data penjualan</td>
                            </tr>
                            <?php else: ?>
                            <?php $no=1; foreach($penjualan as $transaksi): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($transaksi['nama_paket']) ?></td>
                                <td><?= htmlspecialchars($transaksi['jumlah_paket']) ?></td>
                                <td><?= htmlspecialchars($transaksi['tgl_pembayaran']) ?></td>
                                <td>Rp <?= number_format($transaksi['total'], 0, ',', '.') ?></td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <a href="generate_pdf.php" class="btn btn-primary">Generate PDF</a>
            </div>
        </div>
    </div>
</div>
<script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
<script>
$(document).ready(function() {
    // Sparkline charts
    $("#sparklinedash").sparkline([0, 23, 43, 35, 44, 45, 56, 37, 40, 45, 56, 78, 90], {
        type: 'line',
        width: '100%',
        height: '50',
        lineColor: '#13dafe',
        fillColor: 'transparent',
        spotColor: '#13dafe',
        minSpotColor: undefined,
        maxSpotColor: undefined,
        highlightSpotColor: undefined,
        highlightLineColor: undefined
    });

    $("#sparklinedash2").sparkline([0, 13, 33, 35, 44, 45, 56, 37, 40, 45, 56, 78, 90], {
        type: 'line',
        width: '100%',
        height: '50',
        lineColor: '#6164c1',
        fillColor: 'transparent',
        spotColor: '#6164c1',
        minSpotColor: undefined,
        maxSpotColor: undefined,
        highlightSpotColor: undefined,
        highlightLineColor: undefined
    });

    $("#sparklinedash3").sparkline([0, 53, 43, 35, 44, 65, 56, 37, 40, 45, 56, 78, 90], {
        type: 'line',
        width: '100%',
        height: '50',
        lineColor: '#13dafe',
        fillColor: 'transparent',
        spotColor: '#13dafe',
        minSpotColor: undefined,
        maxSpotColor: undefined,
        highlightSpotColor: undefined,
        highlightLineColor: undefined
    });
});
</script>
<?php
require 'layout_footer.php';
?>