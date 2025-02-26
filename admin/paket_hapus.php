<?php 
require 'functions.php';
$id_paket = stripslashes($_GET['id']);

// Hapus detail transaksi dulu
$sql_detail = "DELETE FROM detail_transaksi WHERE paket_id = " . $id_paket;
mysqli_query($conn, $sql_detail);

// Baru hapus paketnya
$sql_paket = "DELETE FROM paket WHERE id_paket = " . $id_paket;
$exe = mysqli_query($conn, $sql_paket);

if($exe){
    $success = 'true';
    $title = 'Berhasil';
    $message = 'Menghapus Data';
    $type = 'success';
    header('location: paket.php?crud='.$success.'&msg='.$message.'&type='.$type.'&title='.$title);
}