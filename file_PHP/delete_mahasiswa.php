<form action="" method="POST">
	<input type="text" placeholder="nim" name="nim">
	<input type="submit" name="submit">

</form>
<?php 
if ($_POST['submit']) {
	
$postdata = http_build_query(
    array(
    	'nim' => $_POST['nim'],
        'nama_mhs' => $_POST['nama_mhs'],
        'alamat' => $_POST['alamat']
    )
);

$opts = array('http' =>
    array(
        'method'  => 'DELETE',
        'header'  => 'Content-Type: application/x-www-form-urlencoded',
        'content' => $postdata
    )
);

$context  = stream_context_create($opts);

$output = file_get_contents('http://10.0.12.89/mahasiswa/delete_methode.php', false, $context);


// $postdatas =
//     array(
//     	'nim' => $_POST['nim'],
//         'nama_mhs' => $_POST['nama_mhs'],
//         'alamat' => $_POST['alamat']
// );
//     $payload = json_encode($postdatas);
// $ch = curl_init(); 

//     // set url 
// 					curl_setopt($ch, CURLOPT_URL, 'http://10.0.12.89/mahasiswa/update_putmahasiswa.php');
// 					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
// 					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
// 					curl_setopt($ch, CURLOPT_POSTFIELDS,$postdata);
// 					curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

//     // return the transfer as a string 

//     // $output contains the output string 
// 					$output = curl_exec($ch); 

//     // tutup curl 
// 					curl_close($ch);    

					print_r(json_decode($output,true)); 
} else {
	echo "Gagal Hapus Data";
}

 ?>