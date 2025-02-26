<?php
$title = 'pelanggan';
require'functions.php';

$id_member = $_GET['id'];
$queryedit = "SELECT * FROM member WHERE id_member = '$id_member'";
$edit = ambilsatubaris($conn,$queryedit);

if(isset($_POST['btn-simpan'])){
    $nama = $_POST['nama_member'];
    $alamat_member = $_POST['alamat_member'];
    $no_ktp = $_POST['no_ktp']; 
    $telp_member = $_POST['telp_member']; 
    $jenis_kelamin = $_POST['jenis_kelamin'];

    // Check duplicate data
    $check_duplicate = mysqli_query($conn, "SELECT * FROM member WHERE 
        (nama_member = '$nama' OR telp_member = '$telp_member' OR no_ktp = '$no_ktp')
        AND id_member != '$id_member'");

    if(mysqli_num_rows($check_duplicate) > 0) {
        $duplicate = mysqli_fetch_assoc($check_duplicate);
        $error_msg = '';
        
        if($duplicate['nama_member'] == $nama) {
            $error_msg = 'Nama member sudah terdaftar';
        } else if($duplicate['telp_member'] == $telp_member) {
            $error_msg = 'Nomor telepon sudah terdaftar';
        } else if($duplicate['no_ktp'] == $no_ktp) {
            $error_msg = 'Nomor KTP sudah terdaftar';
        }
        
        // JavaScript alert
        echo "<script>
            alert('$error_msg');
            window.history.back();
        </script>";
        exit;
    }

    // If no duplicates, proceed with update
    $query = "UPDATE member SET 
        nama_member = '$nama', 
        alamat_member = '$alamat_member', 
        no_ktp = '$no_ktp', 
        telp_member = '$telp_member', 
        jenis_kelamin = '$jenis_kelamin' 
        WHERE id_member = '$id_member'";
    
    $execute = bisa($conn,$query);
    if($execute == 1){
        echo "<script>
            alert('Berhasil mengubah data pelanggan');
            window.location.href = 'pelanggan.php';
        </script>";
    }else{
        echo "<script>
            alert('Gagal mengubah data');
            window.history.back();
        </script>";
    }
}


require'layout_header.php';
?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Data Master Pengguna</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="outlet.php">Pengguna</a></li>
                <li><a href="#">Tambah Pengguna</a></li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-md-6">
                        <a href="javascript:void(0)" onclick="window.history.back();"
                            class="btn btn-primary box-title"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <button id="btn-refresh" class="btn btn-primary box-title text-right" title="Refresh Data"><i
                                class="fa fa-refresh" id="ic-refresh"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <form method="post" action="">
                    <div class="form-group">
                        <label>No KTP Member</label>
                        <input type="text" name="no_ktp" class="form-control" value="<?= $edit['no_ktp'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Nama Member</label>
                        <input type="text" name="nama_member" class="form-control" value="<?= $edit['nama_member'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Alamat Member</label>
                        <input type="text" name="alamat_member" class="form-control"
                            value="<?= $edit['alamat_member'] ?>">
                    </div>
                    <div class="form-group">
                        <label>No Telepon</label>
                        <input type="text" name="telp_member" class="form-control" value="<?= $edit['telp_member'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option value="L" <?php if($edit['jenis_kelamin']  == 'L'){echo "selected";} ?>>Laki-laki
                            </option>
                            <option value="P" <?php if($edit['jenis_kelamin']  == 'P'){echo "selected";} ?>>Perempuan
                            </option>
                        </select>
                    </div>
                    <div class="text-right">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" name="btn-simpan" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require'layout_footer.php';
?>