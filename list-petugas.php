<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Data Petugas Perpustakaan</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <!-- card header -->
            <div class="card-header bg-dark">
                <h4 class="text-white">Data Petugas Perpustakaan</h4>
            </div>
            <!-- card body -->
            <div class="card-body">
                <!--kontak pencarian data anggota-->
                <form action="list-petugas.php" method="get">  
                    <input type="text" name="search" 
                    class= "form-control mb-2"
                    placeholder="Masukkan Keyword Pencarian"
                    required/>
                </form>
                <ul class="list-group">
                        <?php
                    include("connection.php");
                    if(isset($_GET["search"])){
                        #jika pada saat load halaman ini,
                        #akan mengecek apakah ada data dengan method
                        #GET yang bernama "search"
                        $search =$_GET["search"];
                        $sql="select* from petugas
                        where id_petugaslike '%$search'
                         or  nama_petugas like'%$search%'
                         or  kontak like '%$search'
                         or username like '%$search'%
                         or password like '%$search'";
                    }else{
                        $sql ="select* from petugas";
                    }


                    //eksekusi perintah SQL
                    $query = mysqli_query($connect, $sql);
                    while ($petugas = mysqli_fetch_array($query)) {?>
                        <li class="list-group-item">
                        <div class="row">
                            <!-- bagian data anggota -->
                            <div class="col-lg-8 col-md-10">
                                <h5>Nama Petugas: <?php echo $petugas["nama_petugas"];?></h5>
                                <h6> Kontak : <?php echo $petugas["kontak"];?></h6>
                                <h6>Username: <?php echo $petugas["username"];?></h6>
                                <h6>ID Petugas: <?php echo $petugas["id_petugas"];?></h6>
                                <h6> Password: <?php echo $petugas ["password"];?></h6>
                            </div>
                        

                            <!-- bagian tombol pilihan -->
                            <div class="col-lg-4 col-md-2">
                                <button class="btn btn-block btn-primary">
                                    Edit
                                </button>
                                <button class="btn btn-block btn-danger">
                                    Hapus
                                </button>
                            </div>
                        </div>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>

            <div class="card-footer">
                <a href="form-anggota.php"> 
                    <button class="btn btn-success">
                        Tambah Data Petugas
                    </button>
                </a>
            </div>
            <!-- card footer -->
        </div>
    </div>
          </ul>          
          <button type="submit"
                class="btn btn-block btn-danger">
                Beranda
            </button>



        </div>
    
                </button>
                </body>
</html>
