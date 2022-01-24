<?php
session_start();
# jika saat load halaman ini, pastikan telah login
# sbg petugas
if (!isset($_SESSION["petugas"])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Form Peminjaman Buku</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h4 class=" text-white">
                    Form Peminjaman Buku
                </h4>
            </div>

            <div class="card-body">
                <form action="process-pinjam.php" 
                method="post">
                     <!-- input kode pinjam -->
                Kode Peminjaman
                <input type="text" name="kode_pinjam" 
                class="form-control mb-2" required>

                <!-- tgl_pinjam dibuat otomatis -->
                <?php
                date_default_timezone_set('Asia/Jakarta');
                ?>
                Tanggal Pinjam
                <input type="text" name="tgl_pinjam" 
                class="form-control mb-2" readonly
                value="<?=(date("Y-m-d H:i:s"))?>">

                <!-- pilih anggota melalui nama -->
                Pilih Data Anggota
                <select name="nama_anggota"
                class="form-control mb-2" required>
                <?php
                include "connection.php";
                $sql = "select * from anggota";
               
                $hasil = mysqli_query($connect, $sql);
              
                while ($anggota = mysqli_fetch_array($hasil)) {
                    ?>
                    <option value="<?= ($anggota["nama_anggota"])?>">
                        <?= ($anggota["nama_anggota"])?>
                    </option>
                    <?php
                }
                ?>
                </select>

                <!-- petugas ambil data login -->
                <input type="hidden" name="id_petugas"
                class="form-control mb-2" readonly
                value="<?=($_SESSION["petugas"]["id_petugas"])?>">
                Pilih buku yang akan dipinjam
                <select name="isbn[]"class="form-control mb-2"
                required multiple="multiple">
                <?php
                $sql="select * from buku";
                $hasil=mysqli_query($connect,$sql);
                while($buku=mysqli_fetch_array($hasil)){

                    ?>
                    <option value="<?=($buku["isbn"])?>">
                    <?=($buku["judul_buku"])?>
                </option>
                <?php
                }
                ?>
                </select>
                <button type="submit"
                class="btn btn-block btn-danger">
                Pinjam
            </button>
                

                </form>
               
                
            </div>
        </div>
    </div>
</body>
</html>