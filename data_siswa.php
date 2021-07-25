<?php
  include "template/header.php";
  include "template/sidebar.php";
  include("koneksi/connect.php");
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data siswa</h1>
          </div>
          <div class="card">
            <div class="card-header">
            <a href='input_data_siswa.php' class='btn btn-info'>Input data siswa</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama</th>
                      <th>Tempat lahir</th>
                      <th>Tanggal lahir</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat</th>
                      <th>Nama Wali</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sql = mysql_query("SELECT * FROM data_siswa ORDER BY id_siswa ASC");
                      $no = 1;
                      while ($row=mysql_fetch_array($sql)){?>
                        <tr>
                          <td><?php echo $no++?></td>
                          <td><?php echo $row['Nama']?></td>
                          <td><?php echo $row['Tempat_lahir']?></td>
                          <td><?php echo $row['Tanggal_lahir']?></td>
                          <td><?php echo $row['Jenis_Kelamin']?></td>
                          <td><?php echo $row['Alamat']?></td>
                          <td><?php echo $row['Nama_Wali']?></td>
                        <?php
                        print("
                          <td class='row'>
                            <a href='edit_data.php?idk=$row[id_siswa]' class='btn btn-warning'>Edit</a>
                            <a href='hapus_data.php?idk=$row[id_siswa]' class='btn btn-danger'>hapus</a>
                            <a href='input_kriteria_siswa.php?idk=$row[id_siswa]' class='btn btn-info'>input kriteria</a>
                          </td>
                        ")
                        ?>
                        </tr>
                      <?php
                    }?>
                  </tbody>
                </table>
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