<?php
include("connection.php");
if (isset ($_POST["simpan_anggota"])) {
    // tampung data input anggota dari user
    $id_anggota = $_POST["id_anggota"];
    $nama_anggota = $_POST["nama_anggota"];
    $telepon = $_POST["telepon"];
    $alamat = $_POST["alamat"];
    $tgl_lahir = $_POST["tgl_lahir"];

    //membuat perintah sql untuk insert data ke table anggota
    $sql = "insert into anggota values 
    ('$id_anggota', '$nama_anggota', '$tgl_lahir', '$alamat', '$telepon' )";

    //eksekusi perintah SQL
    mysqli_query($connect, $sql);

    //direct ke halaman list anggota
    header("location.list-anggota.php");
}
if(isset($_POST["edit_anggota"];
$id_anggota=$_POST["id_anggota"];
$nama_anggota=$_POST["nama_anggota"];
$telepon=$_POST["telepon"];
$alamat=$_POST["alamat"];
$tgl_lahir=$_POST["tgl_lahir"];
$sql="update anggota set nama _anggota='$nama_anggota',
telepon='$telepon', alamat='$alamat', tgl_lahir='$tgl_lahir' where id_anggota='$id_anggota'";

#eksekusi perintah SQL
mysqli_query($connect, $sql);
//direct ke halaman list anggota
header("location.list-anggota.php");
}
?>s
