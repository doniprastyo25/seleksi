<?php
  include "template/header.php";
  include "template/sidebar.php";
  include("koneksi/connect.php");
  $id=$_GET['idk'];
  $s=mysql_query("select * from data_siswa where id_siswa='$id'");
  $d=mysql_fetch_assoc($s);
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data siswa</h1>
          </div>
          <div class="card">
            <div class="card-header">
            <a href='data_siswa.php' class='btn btn-warning'>back</a>
            </div>
            <div class="card-body">
              <div class="col-md-6 offset-md-3">
                <form action="" enctype="multipart/form-data" method="post">
                  <div class="form-group">
                    <label>id</label>
                    <input type="text" name="Id" value="<?php echo $d['id_siswa'];?>" class="form-control" readonly>
                  </div>
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="Nama" value="<?php echo $d['Nama'];?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Tempat lahir</label>
                    <input type="text" name="Tempat_Lahir" value="<?php echo $d['Tempat_lahir'];?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Tanggal lahir</label>
                    <input type="text" name="Tanggal_Lahir" value="<?php echo $d['Tanggal_lahir'];?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="Jenis_Kelamin" value="<?php echo $d['Jenis_Kelamin'];?>" class="form-control">
                      <option value="Laki-Laki" <?php if ($d['Jenis_Kelamin']=='Laki-Laki') echo 'selected'?>>Laki-Laki</option>
                      <option value="Perempuan" <?php if ($d['Jenis_Kelamin']=='Perempuan') echo 'selected'?>>Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="Alamat" class="form-control"><?php echo $d['Alamat'];?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Nama Ayah Kandung</label>
                    <input type="text" name="Nama_Ayah_Kandung" value="<?php echo $d['Nama_Ayah_Kandung'];?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Nama Ibu Kandung</label>
                    <input type="text" name="Nama_Ibu_Kandung" value="<?php echo $d['Nama_Ibu_Kandung'];?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Nama Wali</label>
                    <input type="text" name="Nama_Wali" value="<?php echo $d['Nama_Wali'];?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Kelas</label>
                    <select name="Kelas" value="<?php echo $d['Kelas'];?>" class="form-control">
                      <option>-kelas kosong-</option>
                      <option value="1" <?php if ($d['Kelas']=='1') echo 'selected'?>>1</option>
                      <option value="2" <?php if ($d['Kelas']=='2') echo 'selected'?>>2</option>
                      <option value="3" <?php if ($d['Kelas']=='3') echo 'selected'?>>3</option>
                      <option value="4" <?php if ($d['Kelas']=='4') echo 'selected'?>>4</option>
                      <option value="5" <?php if ($d['Kelas']=='5') echo 'selected'?>>5</option>
                      <option value="6" <?php if ($d['Kelas']=='6') echo 'selected'?>>6</option>
                    </select>
                  </div>
                  <div class="card-footer text-right">
                  <td colspan="2"><input id="btn-fblogin" name="simpan" class="btn btn-primary" type="submit" value="Input Data Siswa" /></td>
                  <button class="btn btn-secondary" type="reset">Reset</button>
                </div>
                </form>

                <?php
                if (isset($_POST['simpan'])) {
                  $id = $_POST['Id'];
                  $nama = $_POST['Nama'];
                  $tempat_lahir = $_POST['Tempat_Lahir'];
                  $tanggal_lahir = $_POST['Tanggal_Lahir'];
                  $jenis_kelamin = $_POST['Jenis_Kelamin'];
                  $alamat = $_POST['Alamat'];
                  $nama_ayah_kandung = $_POST['Nama_Ayah_Kandung'];
                  $nama_ibu_kandung = $_POST['Nama_Ibu_Kandung'];
                  $nama_wali = $_POST['Nama_Wali'];
                  $kelas = $_POST['Kelas'];

                  if (isset($_POST['simpan'], $nama,$tempat_lahir,$tanggal_lahir,$jenis_kelamin,$alamat,$nama_ayah_kandung,$nama_ibu_kandung,$nama_wali,$kelas)) {
                    if ((!$nama)||(!$tempat_lahir)||(!$tanggal_lahir)||(!$jenis_kelamin)||(!$alamat)||(!$nama_ayah_kandung)||(!$nama_ibu_kandung)||(!$nama_wali)||(!$kelas)) {
                      print "<script>alert ('Harap semua data diisi...!!');</script>";
                      print"<script> self.history.back('Gagal Menyimpan');</script>"; 
                      exit();
                    }
                  
                  }
                    $add_siswa =  mysql_query("UPDATE data_siswa SET Nama='$nama', Tempat_lahir='$tempat_lahir', Tanggal_lahir='$tanggal_lahir', Jenis_Kelamin='$jenis_kelamin', Alamat='$alamat', Nama_Ayah_Kandung='$nama_ayah_kandung', Nama_Ibu_Kandung='$nama_ibu_kandung', Nama_Wali='$nama_wali', Kelas='$kelas' WHERE id_siswa='$id'");
                    mysql_query($add_siswa,$koneksi);
                    echo '<script type="text/javascript">alert ("Data Berhasil Ditambah!");</script>';
                    echo '<meta http-equiv="refresh" content="1; url=data_siswa.php" />';
                }
                ?>
                <!-- <?php
                if(isset($_POST['simpan'])){
                  $s=mysql_query("insert into alternatif (id_alternatif,nm_alternatif) values('$_POST[id_alternatif]','$_POST[nama_alternatif]')"); 
                  if($s){
                    echo "<script>alert('Disimpan'); window.open('data_siswa.php');</script>";
                  }
                }
                ?> -->
              </div>
            </div>
          </div>
          <div class="section-body">
          </div>
        </section>
      </div>
      
      
<?php
  include "template/footer.php";
?>