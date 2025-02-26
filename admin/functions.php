<?php 
session_start();

if($_SESSION){
    if($_SESSION['role'] == 'admin'){

    }else{
        header('location:../index.php');
    }
}else{
    header('location:../index.php');
}

$conn = mysqli_connect('localhost','root','','laundrydoy');

if (!function_exists('ambildata')) {
    function ambildata($conn,$query){
        $data = mysqli_query($conn,$query);
        if (mysqli_num_rows($data) > 0) {
            while($row = mysqli_fetch_assoc($data)){
                $hasil[] = $row;
            }
            return $hasil;
        }
    }
}

if (!function_exists('bisa')) {
    function bisa($conn,$query){
        $db = mysqli_query($conn,$query);
        
        if($db){
            return 1;
        }else{
            return 0;
        }
    }
}

if (!function_exists('ambilsatubaris')) {
    function ambilsatubaris($conn,$query){
        $db = mysqli_query($conn,$query);
        return mysqli_fetch_assoc($db);
    }
}

if (!function_exists('hapus')) {
    function hapus($where,$table,$redirect){
        $query = 'DELETE FROM ' . $table . ' WHERE ' . $where;
        echo $query;
    }
}

?>