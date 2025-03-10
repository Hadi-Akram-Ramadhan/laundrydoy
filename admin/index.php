<?php

$title = 'dashboard';
require 'functions.php';
require 'layout_header.php';
$jTransaksi = ambilsatubaris($conn,'SELECT COUNT(id_transaksi) as jumlahtransaksi FROM transaksi');
$jPelanggan = ambilsatubaris($conn,'SELECT COUNT(id_member) as jumlahmember FROM member');
$joutlet = ambilsatubaris($conn,'SELECT COUNT(id_outlet) as jumlahoutlet FROM outlet');
$query = "SELECT transaksi.*,member.nama_member , detail_transaksi.total_harga FROM transaksi INNER JOIN member ON member.id_member = transaksi.member_id INNER JOIN detail_transaksi ON detail_transaksi.transaksi_id = transaksi.id_transaksi   ORDER BY transaksi.id_transaksi DESC LIMIT 10";
$data = ambildata($conn,$query);
?>
<div class="container-fluid">
    <div class="doy row bg-title">
        <div class="doy col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title-header">Dashboard</h4>
        </div>
        <div class="doy col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#" class="page-title-header">Dashboard</a></li>
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
            <div class="white-box analytics-info">
                <h3 class="box-title">Oulet</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-success"></i> <span
                            class="counter text-success"><?= htmlspecialchars($joutlet['jumlahoutlet']); ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Pelanggan</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash2"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span
                            class="counter text-purple"><?= htmlspecialchars($jPelanggan['jumlahmember']); ?></span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Transaksi</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash3"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-info"></i> <span
                            class="counter text-info"><?= htmlspecialchars($jTransaksi['jumlahtransaksi']); ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <h3 class="box-title">10 Transaksi Terbaru</h3>
                <div class="table-responsive">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Invoice</th>
                                <th>Member</th>
                                <th>Status</th>
                                <th>Pembayaran</th>
                                <th>Total Harga</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($data)): ?>
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada transaksi terbaru</td>
                            </tr>
                            <?php else: ?>
                            <?php $no=1; foreach($data as $transaksi): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($transaksi['kode_invoice']); ?></td>
                                <td><?= htmlspecialchars($transaksi['nama_member']); ?></td>
                                <td><?= htmlspecialchars($transaksi['status']); ?></td>
                                <td><?= htmlspecialchars($transaksi['status_bayar']); ?></td>
                                <td>Rp.<?= number_format($transaksi['total_harga'], 0, ',', '.'); ?></td>
                                <td align="center">
                                    <a href="transaksi_detail.php?id=<?= htmlspecialchars($transaksi['id_transaksi']); ?>"
                                        data-toggle="tooltip" data-placement="bottom" title="Edit"
                                        class="btn btn-success btn-block">Detail</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require 'layout_footer.php';
?>