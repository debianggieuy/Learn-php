<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class ="container">
        <div class="card">
            <div class ="card-header bg-dark">
                <h4 class="text white">
                    Daftar Peminjaman
</h4>
</div>
<div class="card-body">

<ul class="list-group"> 
    <?php
    include "connection.php"; 
    $sql="select 
    pinjam.*,anggota.*,petugas.*,
    ,pengembalian.tanggal_pengembalian,
    pengembalian.denda
    from
    pinjam inner join anggota
     on anggota.=pinjam
     inner join petugas
     on pinjam.id_petugas=petugas.id_petugas
     left outer join pengembalian_buku1 ";

     $hasil=mysqli_query($connect,$sql);
     while($pinjam=mysqli_fetch_array($hasil)){
         ?>
         <li class="list-group-item">
    <div class ="row">

        <div class="col-lg-3 col-md6"></div>
        <small class="text-info">Peminjam</small>
        <h5><?=($pinjam["nama_anggota"])?></h5>

        <div class="col-lg-3 col-md6"></div>
        <small class="text-info">petugas</small>
        <h5><?=($pinjam["nama_petugas"])?></h5>

        <div class="col-lg-3 col-md6"></div>

        <small class="text-info">Tgl.pinjam</small>
        <h5><?=($pinjam["tgl_pinjam"])?></h5>


     </div>
     <div class="col-lg-4 col-md-6">
         <h5> 
             Setatus:
             <a href="proses-kembali.php?
             kode_pinjam=<?=($pinjam["kode_pinjam"])?>"
             onclick="retrun confrim('Kamu yakin ingin kembali?')">
             <button class="btn btn-sm btn-success mx-2">
                 Dikembalikan

            </button>
              </a>
             </div>
            <?php} else{?>
                <div class="badge badge-success">
                    Sudah dikembalikan
            </div>
            <div class="badge badge-info">
                Denda:Rp<?=(number_format($pinjam["denda"],2))?>
            </div >
                <?php}?>
            </h5>
            </div>
            </div>

            }
            }

     <small class="text-success">
         list Buku yang dipinjam

     <small>
     </ul>
     <ul>
     <?php
     $sql="select*from detail_pinjam
     inner join buku
     on detail_pinjam.isbn=buku.isbn";

     $hasil_buku=mysqli_query($connect,$sql);
     while($buku=mysqli_fetch_array($hasil_buku)){
         ?>
         <li>
             <small>
                 <?=($buku["judul_buku"])?>
                 <i class="text primary">
                     (Ditulis oleh <?=($buku["penulis"])?>)
         </i>
     </small>
     <li>
         <?php
         
     }

     ?>
     </li>
     <?php 
     }



    ?>
</ul>
</div>
