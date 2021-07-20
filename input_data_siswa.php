<?php
  include "template/header.php";
  include "template/sidebar.php";
  include("koneksi/connect.php");
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Input Data siswa</h1>
          </div>
          <div class="card">
            <div class="card-header">
            <a href='data_siswa.php' class='btn btn-warning'>back</a>
            </div>
            <div class="card-body">
              <div class="col-md-6 offset-md-3">
                <form action="" enctype="multipart/form-data" method="post">
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="Nama" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Tempat lahir</label>
                    <input type="text" name="Tempat_Lahir" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Tanggal lahir</label>
                    <input type="date" name="Tanggal_Lahir" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="Jenis_Kelamin" class="form-control">
                      <option value="Laki-Laki">Laki-Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="Alamat" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Nama Ayah Kandung</label>
                    <input type="text" name="Nama_Ayah_Kandung" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Nama Ibu Kandung</label>
                    <input type="text" name="Nama_Ibu_Kandung" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Nama Wali</label>
                    <input type="text" name="Nama_Wali" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Kelas</label>
                    <select name="Kelas" class="form-control">
                      <option>-kelas kosong-</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                    </select>
                  </div>
                  <div class="card-footer text-right">
                  <td colspan="2"><input id="btn-fblogin" name="simpan" class="btn btn-primary" type="submit" value="Input Data Siswa" /></td>
                  <button class="btn btn-secondary" type="reset">Reset</button>
                </div>
                </form>

                <?php
                if (isset($_POST['simpan'])) {
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
                    $add_siswa =  mysql_query("INSERT INTO data_siswa(Nama,Tempat_lahir,Tanggal_lahir,Jenis_Kelamin,Alamat,Nama_Ayah_kandung,Nama_Ibu_Kandung,Nama_Wali,Kelas) VALUES 
                                  ('$nama','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$alamat','$nama_ayah_kandung','$nama_ibu_kandung','$nama_wali','$kelas')");
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