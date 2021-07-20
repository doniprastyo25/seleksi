<?php
  include "template/header.php";
  include "template/sidebar.php";
  include("koneksi/connect.php");
?>
<!-- <?php
$id=$_GET['idk'];
$show_kriteria ="SELECT * FROM kriteria WHERE id_kriteria='$id'";
$hasil_kriteria =mysql_query($show_kriteria,$koneksi);
$view_kriteria = mysql_fetch_row($hasil_kriteria);
?> -->
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>input kriteria siswa</h1>
          </div>

          <div class="section-body">
            <div class="col-md-6 offset-md-3">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <?php
    /*                   if (mysql_num_rows($hasil_kriteria) < 0) { ?>
                        <h1>KRITERIA KOSONG</h1>
                      <?php
                      }else { */
                        $id=$_GET['idk'];
                        $q = "SELECT * FROM data_siswa WHERE id_siswa='$id'";
                        $a = mysql_query($q,$koneksi);
                        $b = mysql_fetch_array($a);
                        $idsiswa=$b['id_siswa'];
                      
                    ?>
                    <form class="form-group" action="" data-toggle="validator" method="post" enctype="multipart/form-data">
                      <table class="table table-bordered table-md" align="left">
                        <tr>
                          <td>ID Siswa</td>
                          <td><input readonly type="text" class="form-control" name="idpemilik" value="<?php echo $idsiswa; ?>"></td>
                        </tr>
                        <?php
                          $q =mysql_query("select * from kriteria ORDER BY id_kriteria");
                          while ($r = mysql_fetch_array($q)) { ?>
                        <tr>
                          <td width="250">
                            <?php echo $r['nama_kriteria']; ?> (<?php echo $r['atribut'];?>)
                          </td>
                          <td width="200">
                              <?php
                                $querykriteria = mysql_query("SELECT * FROM kriteria,t_kriteria WHERE kriteria.id_kriteria = t_kriteria.id_kriteria AND t_kriteria.id_kriteria='$r[id_kriteria]'");
                                while ($datakriteria = mysql_fetch_array($querykriteria)) { ?>
                                    <div class="form-check">
                                      <label>
                                        <input class="form-check-input" type="radio" name="kepentingan<?php echo $datakriteria['id_kriteria']; ?>" value="<?php echo $datakriteria['nkriteria']; ?>" required> <?php echo $datakriteria['keterangan'];?>
                                      </label>
                                    </div>
                                <?php
                                }                            
                              ?>
                          </td>
                        </tr>
                        <?php } ?>
                        <tr>
                          <td colspan="2"><input id="btn-fblogin" name="simpan" class="btn btn-primary" type="submit" value="Input Data Siswa" /></td>
                        </tr>
                      </table>
                    </form>
                  </div>
                  <!-- <?php
                    for ($i=1; $i <=5; $i++) { 
                        $kepentinganku = $_POST['kepentingan'.$i];
                        if ((!empty($kepentinganku))) {
                          $query = "INSERT INTO analisa (id_kriteria, id_siswa, nilainya) VALUES ('$i', '$idsiswa', '$kepentinganku')";
                          $hasil = mysql_query($query);
                        }
                    }
                    echo '<script type="text/javascript">
                      alert("data berhasil ditambah");
                    </script>';
                    echo '<meta http-equiv="refresh" content="1; url=data_siswa.php">';                  
                  ?> -->
                  <?php
                  $b = mysql_query("select * from kriteria");
                  $c = mysql_fetch_assoc($b);

                  if (isset($_POST['simpan'])) {
                    $o = 1;
                    $id=$_GET['idk'];
                    $q = "SELECT * FROM data_siswa WHERE id_siswa='$id'";
                    $a = mysql_query($q,$koneksi);
                    $cek_l=mysql_num_rows($a);
                    if ($cek_l>0) {
                      $del=mysql_query("delete from analisa where id_siswa ='$id'");
                    }

                  for ($i=1; $i <=5 ; $i++) { 
                    $kepentinganku = $_POST['kepentingan'.$i];
                    $m = mysql_query("INSERT INTO analisa (id_kriteria, id_siswa, nilainya) VALUES ('$i', '$idsiswa', '$kepentinganku')");
                    // if($m){
                    //   echo '<script type="text/javascript">
                    //   alert("data berhasil ditambah");
                    // </script>';
                    
                    // }                
                    $o++;
                  }
                  echo '<script type="text/javascript">
                      alert("data berhasil ditambah");
                    </script>';
                  echo '<meta http-equiv="refresh" content="1; url=data_siswa.php" />';  

                  }
                  
                  ?>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      
      
<?php
  include "template/footer.php";
?>