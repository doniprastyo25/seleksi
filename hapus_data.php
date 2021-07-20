<?php
// include ("koneksi/connect.php");

// $s=mysql_query("delete from siswa where id_siswa='$_GET[id]' ");

// if($s){
// 	echo "<script>window.open('index.php?a=alternatif&k=alternatif','_self');</script>";
// }
include("koneksi/connect.php");
$id=$_GET['idk'];
$delete_kelas="DELETE FROM data_siswa WHERE id_siswa='$id'";
mysql_query($delete_kelas,$koneksi);
for ($i=1; $i <=5 ; $i++) { 
  $delete_analisa="DELETE FROM analisa WHERE id_siswa='$id'";
  mysql_query($delete_analisa,$koneksi);
}
header("Location:./data_siswa.php");

?>