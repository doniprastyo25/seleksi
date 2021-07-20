<?php
  include("koneksi/connect.php");
  function jml_kriteria(){
    $sql = "SELECT * FROM kriteria";
    $query = mysql_query($sql);
    $count = mysql_num_rows($query);
    return $count;
  }

  function get_kriteria(){
    $kriteria = mysql_query("SELECT * FROM kriteria");
    $i = 1;
    while ($datakriteria = mysql_fetch_array($kriteria)) {
      $kri[$i] = $datakriteria['nama_kriteria'];
      $i++; 
    }
    return $kri;
  }

  function jml_alternatif(){
    $sql = "SELECT * FROM analisa GROUP BY id_siswa";
    $query = mysql_query($sql);
    $alternatif = mysql_num_rows($query);
    return $alternatif;
  }

  function get_alt_name(){
    $alternatif = mysql_query("SELECT * FROM data_siswa");
    $i=0;
    while ($dataalternatif = mysql_fetch_array($alternatif))
    {
        $alt[$i] = $dataalternatif['Nama'];
        $i++;
    }
    return $alt;
    }

  function get_alternatif(){
    $alternatifkriteria = array();
    $queryalternatif = mysql_query("SELECT * FROM data_siswa ORDER BY id_siswa");
    $i=0;
    while ($dataalternatif = mysql_fetch_array($queryalternatif))
    {
        $querykriteria = mysql_query("SELECT * FROM kriteria ORDER BY id_kriteria");
        $j=0;
        while ($datakriteria = mysql_fetch_array($querykriteria))
        {
            $queryalternatifkriteria = mysql_query("SELECT * FROM analisa WHERE id_siswa = '$dataalternatif[id_siswa]' AND id_kriteria = '$datakriteria[id_kriteria]'");
            $dataalternatifkriteria = mysql_fetch_array($queryalternatifkriteria);       
            $alternatifkriteria[$i][$j] = $dataalternatifkriteria['nilainya'];
            $j++;
        }
        $i++;
    }
    return $alternatifkriteria;
  }

  function pembagi(){
    $pembagi = array();
    for ($i=0;$i<count($kriteria);$i++)
    {
        $pembagi[$i] = 0;
        for ($j=0;$j<count($alternatif);$j++)
        {
            $pembagi[$i] = $pembagi[$i] + ($alternatifkriteria[$j][$i] * $alternatifkriteria[$j][$i]);
        }
        $pembagi[$i] = sqrt($pembagi[$i]);
    }
            return $pembagi;
}

function get_kepentingan(){
  $kepentingan = mysql_query("SELECT * FROM kriteria");
  $i=0;
  while ($datakepentingan = mysql_fetch_array($kepentingan))
  {
      $kep[$i] = $datakepentingan['bobot_nilai'];
      $i++;
  }
  return $kep;
}

function get_costbenefit(){
  $costbenefit = mysql_query("SELECT * FROM kriteria");
  $i=0;
  while ($datacostbenefit = mysql_fetch_array($costbenefit))
  {
      $cb[$i] = $datacostbenefit['atribut'];
      $i++;
  }
  return $cb;
}

function cmp($a, $b){
  if ($a == $b) {
      return 0;
  }
  return ($a > $b) ? -1 : 1;
  }

  function print_ar(array $x){    //just for print array
      echo "<pre>";
      print_r($x);
      echo "</pre></br>";
}

$k = jml_kriteria();

$kri = get_kriteria();

$a = jml_alternatif();

$alt = get_alternatif();

$alt_name = get_alt_name();

$kep = get_kepentingan();

$cb = get_costbenefit();
?>

  <?php
    for ($i=1; $i <= $k ; $i++) { 
        $kri[$i];
    }
    ?>
      <?php
        for ($i=0; $i <$a ; $i++) { 
            $alt_name[$i];
            for($j=0;$j<$k;$j++){
              $alt[$i][$j];
            }
        }
      ?>
    <?php
      for($i=1;$i<=$k;$i++){
          $kri[$i];
      }
    ?>
    <?php  
      for($i=0;$i<$k;$i++){
        $pembagi[$i] = 0;
        for($j=0;$j<$a;$j++){
            $pembagi[$i] = $pembagi[$i] + pow($alt[$j][$i],2);
        }
        $pembagi[$i] = round(sqrt($pembagi[$i]),6);
        $pembagi[$i];
      }                                 
    ?>
    <?php
    for ($i=1; $i <= $k ; $i++) { 
          $kri[$i];
    }
    ?>
      <?php
        for($i=0;$i<$a;$i++){
            $alt_name[$i];
            for($j=0;$j<$k;$j++){
                $nor[$i][$j] = round(($alt[$i][$j] / $pembagi[$j]),9);
                $nor[$i][$j];
            }
        }
      ?>
    <?php
    for ($i=1; $i <= $k ; $i++) { 
      $kri[$i];
    }
    ?>
      <?php
        for($i=0;$i<$a;$i++){
            $alt_name[$i];
            for($j=0;$j<$k;$j++){
                $bob[$i][$j] = round(($nor[$i][$j] * $kep[$j]),9);
                $bob[$i][$j];
            }
      }
      ?>
  <?php
  for($i=1;$i<=$k;$i++){
      $kri[$i];
  }
  ?>
  <?php
  for($i=0;$i<$k;$i++){
      for($j=0;$j<$a;$j++){
          $temp[$j] = $bob[$j][$i];
      }
      if($cb[$i]=='benefit')
          $aplus[$i] = max($temp);
      if($cb[$i]=='cost')
          $aplus[$i] = min($temp);
          $aplus[$i];
  }                               
  ?>
  <?php
  for($i=0;$i<$k;$i++){
    for($j=0;$j<$a;$j++){
        $temp[$j] = $bob[$j][$i];
    }
    if($cb[$i]=='benefit')
        $amin[$i] = min($temp);
    if($cb[$i]=='cost')
        $amin[$i] = max($temp);
        $amin[$i];
  }                               
  ?>
  <?php                                
      for($i=0;$i<$a;$i++){
          $alt_name[$i];
          $dplus[$i] = 0;
          for($j=0;$j<$k;$j++){
              $dplus[$i] = $dplus[$i] + pow(($aplus[$j] - $bob[$i][$j]),2);
          }
          $dplus[$i] = sqrt($dplus[$i]);
          $dplus[$i];
          $dmin[$i] = 0;
          for($j=0;$j<$k;$j++){
              $dmin[$i] = $dmin[$i] + pow(($amin[$j] - $bob[$i][$j]),2);
          }
          $dmin[$i] = sqrt($dmin[$i]);
          $dmin[$i];
      }                                                                        
  ?>

<?php
include('koneksi/connect.php');
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
// $query = mysqli_query($koneksi,"select * from tb_siswa");
$html = '<center><h3>Daftar Nama Siswa</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">'; 
      for($i=0;$i<$a;$i++){
        $alt_name[$i];
        $v[$i][0] = round(($dmin[$i] / ($dplus[$i]+$dmin[$i])),4);
        $v[$i][1] = $alt_name[$i];
        $v[$i][0];
      }
      usort($v, "cmp");
      $i = 0;
      while (list($key, $value) = each($v)) {
        $hsl[$i] = array($value[1],$value[0]); 
        $i++;
      }
        $html .= "<thead><tr><th>No.</th><th>Alternatif</th><th>Hasil Akhir</th></tr></thead>";
        $html .= "<tbody>";
        for($i=0;$i<10;$i++){
          $html .=  "<tr><td>".($i+1).".</td><td>".ucwords(($hsl[$i][0]))."</td><td>".$hsl[$i][1]."</td></tr>";
      }
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_siswa.pdf');
?>