<?php

	//tampilkan jam otomatis

	date_default_timezone_set("Asia/Jakarta");
	$hari = date('l');
	$jam = date('H:i:s');
	echo $hari . " - " . $jam;

	//koneksi ke database
	$konek = mysqli_connect("localhost", "root", "", "databel");

	//baca data jam yang tersimpan di database
	$sql = mysqli_query($konek, "select * from jam order by id asc");
	while ($data = mysqli_fetch_array($sql)) 
	{
		$id = $data['id'];
		$haridb = $data['hari'];
		$jamdb = $data['jam'];
		$jenis = $data['jenis'];

		// bandingkan dengan jam sekarang
		if ($hari == $haridb && $jam == $jamdb && $jenis == "A") {
			// Update status jam tersebut dengan nilai 1
			mysqli_query($konek, "Update jam set status=1 where id='$id'");
		}
		if ($hari == $haridb && $jam == $jamdb && $jenis == "B") {
			// Update status jam tersebut dengan nilai 1
			mysqli_query($konek, "Update jam set status=2 where id='$id'");
		}
		if ($hari == $haridb && $jam == $jamdb && $jenis == "C") {
			// Update status jam tersebut dengan nilai 1
			mysqli_query($konek, "Update jam set status=3 where id='$id'");
		}
	}

  ?>