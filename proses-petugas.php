<?php
include("connection.php");
if (isset ($_POST["simpan_petugas"])) {
    // tampung data input anggota dari user
    
    $nama_petugas = $_POST["nama_petugas"];
    $kontak = $_POST["kontak"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    //membuat perintah sql untuk insert data ke table anggota
    $sql = "insert into anggota values 
    ( '$nama_petugas', '$password', '$username', '$kontak' )";

    //eksekusi perintah SQL
    mysqli_query($connect, $sql);

    //direct ke halaman list anggota
    header("location.list-petugas.php");
}
if(isset($_POST["edit_petugas"];
$nama_petugas=$_POST["nama_petugas"];
$kontak=$_POST["kontak"];
$username=$_POST["username"];
$password=$_POST["password"];
$sql="update petugas set nama _petugas='$nama_petugas',
kontak='$kontak', username='$username',  password='$password'";

#eksekusi perintah SQL
mysqli_query($connect, $sql);
//direct ke halaman list petugas
header("location.list-petugas.php");

}
?>
