<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Petugas</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="text-white">Form Petugas</h4>
            </div>

            <div class="card-body">
                <?php
                if(isset($_GET["id_petugas"])){
                    // memeriksa ketika load file ini,
                    // apakah membawa data GET dengan nama id_petugas
                    // jika ture, maka form anggota digunakan untuk edit

                    # mengakses data anggota dari id_petugas yg dikirim
                    include "connection.php";
                    $id_petugas = $_GET["id_petugas"];
                    $sql = "select * from anggota where id_petugas='$id_petugas'";
                    // eksekusiperintah SQL
                    $hasil = mysqli_query($connect, $sql);
                    # konversi hasil query ke bentuk array
                    $petugas = mysqli_fetch_array($hasil);
                    ?>
                    <form action="process-petugas.php" method="post"
                     onsubmit ="return confrim ('Apa anda yakin ingin mengubah data ini ?')">  
                     Nama Petugas
                    <input type="text" name="nama_petugas" 
                    class="form-control mb-2" required
                    value="<?=$petugas["nama_petugas"];?>" />

                    Kontak Petugas
                    <input type="text" name="kontak" 
                    class="form-control mb-2" required
                    value="<?=$petugas["kontak"];?>" />

                    Username
                    <input type="text" name="username" 
                    class="form-control mb-2" required
                    value="<?=$anggota["username"];?>" />

                    Password
                    <input type="text" name="password" 
                    class="form-control mb-2" required
                    value="<?=$anggota["password"];?>" />

                    <button type="submit" class="btn btn-success btn-block"
                    name="edit_petugas">
                        Simpan
                    </button>
                    </form>
                    <?php
                }else{
                    // jika false, maka form petugas digunakan untuk insert
                    ?>
                    <form action="process-petugas.php" method="post">

                    Nama Petugas
                    <input type="text" name="nama_petugas" 
                    class="form-control mb-2" required />

                    Kontak Petugas
                    <input type="text" name="Kontak" 
                    class="form-control mb-2" required />

                    Username
                    <input type="text" name="username" 
                    class="form-control mb-2" required />

                    Password
                    <input type="text" name="password" 
                    class="form-control mb-2" required />

                    <button type="submit" class="btn btn-success btn-block"
                    name="simpan_petugas">
                        Simpan
                    </button>
                    </form>
                    <?php
                }
                ?> 
                
            </div>
        </div>
    </div>
</body>
</html>