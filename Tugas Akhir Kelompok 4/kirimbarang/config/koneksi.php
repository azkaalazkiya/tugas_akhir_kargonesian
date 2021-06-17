<?php
	// menetapkan parameter
	$host = "localhost";
	$port = "5432";
	$dbname = "db_kargo";
	$user = "postgres";
	$password = "ss17.mrn74"; 
	
	// membuat string koneksi
	$dbconn = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
	
	// membuka koneksi
	$koneksi = pg_connect($dbconn);
	
	// cek koneksi
	if($koneksi){
		//echo "Berhasil";
	}

?>

