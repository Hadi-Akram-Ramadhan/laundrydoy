<?php
require '../vendor/setasign/fpdf/fpdf.php';
require 'functions.php';

// Ambil data penjualan
$penjualan = ambildata($conn,"SELECT SUM(detail_transaksi.total_harga) AS total, COUNT(detail_transaksi.paket_id) as jumlah_paket, paket.nama_paket, transaksi.tgl_pembayaran FROM detail_transaksi
INNER JOIN transaksi ON transaksi.id_transaksi = detail_transaksi.transaksi_id
INNER JOIN paket ON paket.id_paket = detail_transaksi.paket_id
WHERE transaksi.status_bayar = 'dibayar' GROUP BY detail_transaksi.paket_id");

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

// Header
$pdf->SetFillColor(230,230,230); // Background color
$pdf->Cell(0,10,'Laporan Penjualan Paket',0,1,'C', true);
$pdf->Ln(10);

// Table header
$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(200,220,255); // Header background color
$pdf->Cell(10,10,'#',1,0,'C', true);
$pdf->Cell(50,10,'Nama Paket',1,0,'C', true);
$pdf->Cell(40,10,'Jumlah Transaksi',1,0,'C', true);
$pdf->Cell(50,10,'Tanggal Transaksi',1,0,'C', true);
$pdf->Cell(40,10,'Total Hasil',1,0,'C', true);
$pdf->Ln();

// Table content
$pdf->SetFont('Arial','',10);
$no = 1;
foreach($penjualan as $transaksi) {
    $pdf->Cell(10,10,$no++,1,0,'C');
    $pdf->Cell(50,10,$transaksi['nama_paket'],1);
    $pdf->Cell(40,10,$transaksi['jumlah_paket'],1,0,'C');
    $pdf->Cell(50,10,$transaksi['tgl_pembayaran'],1);
    $pdf->Cell(40,10,'Rp ' . number_format($transaksi['total'], 0, ',', '.'),1,0,'R');
    $pdf->Ln();
}

$pdf->Output();
?>