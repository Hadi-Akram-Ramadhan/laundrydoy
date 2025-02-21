<?php 
session_start();

if($_SESSION){
    if($_SESSION['role'] == 'kasir'){

    }else{
        header('location:../index.php');
    }
}else{
    header('location:../index.php');
}

$conn = mysqli_connect('localhost','root','','ujikom_laundry');

function ambildata($conn,$query){
    $data = mysqli_query($conn,$query);
    $hasil = array(); // Inisialisasi array kosong dulu
    
    if (mysqli_num_rows($data) > 0) {
        while($row = mysqli_fetch_assoc($data)){
            $hasil[] = $row;
        }
    }
    return $hasil; // Return array kosong kalo ga ada data
}

function bisa($conn,$query){
    $db = mysqli_query($conn,$query);

    if($db){
        return 1;
    }else{
        return 0;
    }
}



function ambilsatubaris($conn,$query){
    $db = mysqli_query($conn,$query);
    return mysqli_fetch_assoc($db);
}

function hapus($where,$table,$redirect){
    $query = "DELETE FROM " . $table . " WHERE " . $where;
    // Eksekusi query-nya, jangan cuma di echo
    global $conn;
    if(mysqli_query($conn, $query)){
        header("Location: $redirect");
    }
}

?>