<?php
include("connection.php");
$kode_pinjam=$_GET ["kode-pinjam"];
date_set_timezone_set('Asia/Jakarta');
$tgl_kembali=date_create(date("Y-m-d H:i:s")
$tgl_kembali_fiks=date_create(date("Y-m-d H:i:s")
#denda =selisih tgl_kembali dan tgl_pinjam
# jika selisih hari >7 ,maka (selisih hari -7)*1000
# else denda=0

$sql="select * from pinjam where kode_pinjam='$kode_pinjam'";
$hasil=mysqli_query($connect,$sql);
$pinjam=mysqli_fetch_array($hasil);
$tgl_pinjam= date_create($pinjam["tgl_pinjam"]);

#menghitung selish antara dua tanggal
$selisih=date_diff($tgl_kembali,$tgl_pinjam);
#mengkonversi hasil selisih format jumlah hari
$selisih_hari=$selisih->format("%a");

If($selish_hari >7){
    $denda=($selisih_hari-7)*1000;

}
else{
    $denda=0;
}
$sql="insert into pengembalian values
('','$kode_pinjam','$tgl_kembali_fix','$denda')";

if(mysqli_query($connect,$sql)){
    header("location:list-pinjam.php");
}else{
    echo mysqli_error($connect);
    
}
}
?>