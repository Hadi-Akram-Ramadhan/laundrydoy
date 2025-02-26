<?php 
require 'functions.php';
$id_outlet = stripslashes($_GET['id']);

// Hapus transaksi dulu
$sql_transaksi = "DELETE FROM transaksi WHERE outlet_id = " . $id_outlet;
mysqli_query($conn, $sql_transaksi);

// Hapus paket yang terkait dengan outlet ini
$sql_paket = "DELETE FROM paket WHERE outlet_id = " . $id_outlet;
mysqli_query($conn, $sql_paket);

// Terakhir baru hapus outletnya
$sql_outlet = "DELETE FROM outlet WHERE id_outlet = " . $id_outlet;
$exe = mysqli_query($conn, $sql_outlet);

if($exe){
    $success = 'true';
    $title = 'Berhasil';
    $message = 'Menghapus Data';
    $type = 'success';
    header('location: outlet.php?crud='.$success.'&msg='.$message.'&type='.$type.'&title='.$title);
}