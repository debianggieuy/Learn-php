<?php
include './connection.php';

$id_anggota = $_GET['id_petugas'];



$sql ="delete from petugas where id_petugas= '".$id_petugas."'" ;

$result = mysqli_query($connect,$sql);

if ($result) {
    header('Location:list-petugas.php');
} else
    printf('Gagal ya'.mysqli_error($connect));
    exit();
}
        
