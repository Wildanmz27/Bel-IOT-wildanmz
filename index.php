<?php 
    //koneksi ke database
    $konek = mysqli_connect("localhost", "root", "", "databel");
    
    //uji apakah tombol simpan di klik

    if (isset($_POST['btnSimpan'])) {
    $hari = $_POST['hari'];
    $jam = $_POST['jam'] . ':' . $_POST['menit'] . ':' . $_POST['detik']; // Menggabungkan jam, menit, dan detik
    $jenis = $_POST['jenis'];
    $status = 0;
      

      //simpan ke database
      //supaya id selalu dimulai dari awal

      mysqli_query($konek, "ALTER TABLE jam AUTO_INCREMENT=1");
      mysqli_query($konek, "insert into jam(hari, jam, jenis, status)values('$hari', '$jam', '$jenis', '$status')");
    }
 ?>


<!doctype html>
<html lang="en">

<head>
  <title>Bel Sekolah IOT</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <link rel="stylesheet" type="text/css" href="assets/css/css.css">
  <link rel="stylesheet" type="text/css" href="assets/css/material-dashboard.css?v=2.1.2">
  <script type="text/javascript" src="jquery/jquery.min.js"></script>
  <script type="text/javascript" src="js/js.js"></script>

  <style type="text/css">
    .tengah{
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
    }
  </style>

<script type="text/javascript">
  $(document).ready(function(){
    setInterval(function(){
      $("#datajam").load('cekjam.php');
    }, 1000);
  });
</script>

</head>


<body>

  <!--- tampilan --->
  <div class="content">
    <div class="container-fluid tengah">
      <div style="text-align: center"><h3>IOT Bel Sekolah - MTs Al-Khairiyyah</h3></div>
        <div style="width: 500px">
          <div class="card card-chart" style="height: auto">
            <div class="card-header card-header-success">
               <i class="fas fa-bell" style="font-size: 36px"></i>
               <br>
               Pengaturan Bel Sekolah
          </div>

          <div class="card-body">
            jam sekarang :
            <h2 style="font-weight: bold">
            <div id="datajam"></div>
            </h2>
            <br>
            <div class="form-group">
              <form method="POST">
                <div>
                  <select name="hari" id="hari" class="form-control" required style="text-align: center">
                      <option value="" disabled selected>Pilih Hari</option>
                      <option value="Monday">Senin</option>
                      <option value="Tuesday">Selasa</option>
                      <option value="Wednesday">Rabu</option>
                      <option value="Thursday">Kamis</option>
                      <option value="Friday">Jumat</option>
                      <option value="Saturday">Sabtu</option>
                      <option value="Sunday">Minggu</option>
                  </select>

                  <div style="display: flex; justify-content: center; margin-top: 10px;">
                    <select name="jam" id="jam" class="form-control" required style="margin-right: 5px; width: 60px;">
                      <option value="" disabled selected>Jam</option>
                      <?php for ($i = 0; $i < 24; $i++): ?>
                      <option value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?>">
                      <?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?>
                      </option>
                      <?php endfor; ?>
                    </select>

                    <select name="menit" id="menit" class="form-control" required style="margin-right: 5px; width: 60px;">
                      <option value="" disabled selected>Menit</option>
                      <?php for ($i = 0; $i < 60; $i++): ?>
                      <option value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?>">
                      <?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?>
                      </option>
                      <?php endfor; ?>
                    </select>

                    <select name="detik" id="detik" class="form-control" required style="width: 60px;">
                      <option value="" disabled selected>Detik</option>
                      <?php for ($i = 0; $i < 60; $i++): ?>
                      <option value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?>">
                      <?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?>
                      </option>
                      <?php endfor; ?>
                    </select>
                  </div>

                  <select name="jenis" id="jenis" class="form-control" required style="text-align: center">
                      <option value="" disabled selected>Pilih Jenis Bunyi</option>
                      <option value="A">Bunyi 1</option>
                      <option value="B">Bunyi 2</option>
                      <option value="C">Bunyi 3</option>
                  </select>

                  <button type="submit" name="btnSimpan" id="btnSimpan" class="btn btn-primary btn-sm">Tambah Jadwal Bel</button>
                </div>
              </form>
            </div>
            <!-- Data Jam Tersimpan -->
            <table class="table table-bordered" style="text-align: center">
              <tr style="background-color: grey; color: white;">
                <th style="width: 100px">Hari</th>
                <th>List Jam</th>
                <th style="width: 30px">Jenis Bunyi</th>
                <th style="width: 10px">Aksi</th>

              </tr>
              <?php 

                  //baca isi tabel jam
                $sql = mysqli_query($konek, "select * from jam order by id asc");
                  while ($data = mysqli_fetch_array($sql)) {

               ?>

              <tr>
                <td> <?php echo $data['hari']; ?> </td>
                <td> <?php echo $data['jam']; ?> </td>
                <td> <?php echo $data['jenis']; ?> </td>
                <td> <a href="hapus.php?id=<?php echo $data['id']; ?>">
                  <i class="fa fa-trash"></i>
                  </a>
                 </td>
              </tr>
              <?php  } ?>
            </table>
          </div>
        </div>

        <!-- UNTUK MENAMBAHKAN GAMBAR -->
        <div>
          <img src="assets/img/MIT.jpg" width="100" height="100">
        </div>

      </div>
    </div>
  </div>


</body>
</html>