<form action="" method="POST">
	<input type="text" placeholder="nim" name="nim">
	<input type="text" placeholder="nama" name="nama_mhs">
	<input type="text" placeholder="alamat" name="alamat">
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
        'method'  => 'POST',
        'header'  => 'Content-Type: application/x-www-form-urlencoded',
        'content' => $postdata
    )
);

$context  = stream_context_create($opts);

$result = file_get_contents('http://10.0.12.89/mahasiswa/insert.php', false, $context);

echo "Berhasil Post Data";

} else {
	echo "Gagal Post Data";
}

 ?>