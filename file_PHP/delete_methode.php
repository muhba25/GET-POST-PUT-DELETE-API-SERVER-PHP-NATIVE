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

		// insert data
		$sql = "DELETE FROM mahasiswa WHERE nim = '$nim'";
		$conn->query($sql);

		$result['status']['code'] = 200;
		$result['status']['description'] = "1 data DELETED";
		$result['result'] = array(
			"nim"=>$nim,
		);

	}else{
		$result['status']['code'] = 400;
	}

	// parse ke format json
	echo json_encode($result);
?>
