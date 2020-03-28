<?php
	// header harus json
	header("Content-Type:application/json");

	// conf koneksi db
	$servername = "localhost";
	    $username = "root";
	    $password = "rabpu";
	    $dbnamea = "mahasiswa";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbnamea);

	// tangkap method request
	$smethod = $_SERVER['REQUEST_METHOD'];

	// inisialisasi variable hasil

	// kondisi metode
	if($smethod == $smethod){
		// tangkap input

		 parse_str(file_get_contents("php://input"),$post_vars);
    	$nim = $post_vars['nim'];
		$nama_mhs = $post_vars['nama_mhs'];
		$alamat = $post_vars['alamat'];

		// insert data
		$sql = "UPDATE mahasiswa SET
					nama_mhs = '$nama_mhs',
					alamat = '$alamat',
					foto = ''
				WHERE nim = '$nim'";
		$conn->query($sql);

		$result['status']['code'] = 200;
		$result['status']['description'] = "1 data updated";
		$result['result'] = array(
			"nim"=>$nim,
			"nama_mhs"=>$nama_mhs,
			"alamat"=>$alamat
		);

	}else{
		$result['status']['code'] = 400;
	}

	// parse ke format json
	echo json_encode($result);
?>
