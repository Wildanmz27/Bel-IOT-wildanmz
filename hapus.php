<?php  
  //koneksi ke database
    $konek = mysqli_connect("localhost", "root", "", "databel");
    $id = $_GET['id'];
    //hapus data
    mysqli_query($konek, "delete from jam where id='$id'");
    //kembali ke halaman utama
    echo "<script>location.replace('index.php');</script>";
?>