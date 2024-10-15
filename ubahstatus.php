<?php
//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "databel");
//Update status semua jam menjadi 0
mysqli_query($konek, "Update jam set status=0");
?>