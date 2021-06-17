<?php
	// load koneksi
	include "config/koneksi.php";

	// untuk menghindari injekasi
	function anti_injection($data){
		$filter  = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
		return $filter;
	}

	// menangkap username dan password yang dikirim dari form login
	$username = anti_injection($_POST['txt_user']);
	$password = anti_injection(($_POST['txt_pass']));

	// menghindari sql injection
	$injeksi_username = pg_escape_string($koneksi, $username);
	$injeksi_password = pg_escape_string($koneksi, $password);

	// untuk memastikan username dan password hanya berupa huruf dan angka
	if(!ctype_alnum($injeksi_username) OR !ctype_alnum($injeksi_password)){
		echo "<script type=\"text/javascript\"> alert(\"SEKARANG LOGIN NYA TIDAK BISA DI INJEKSI\"); window.location.href=\"index.php\"; </script>";
	}
	else{
		// Apabila username dan password benar
		if(($username=="Admin") AND ($password=="Admin")){

			session_start();

			// membuat variabel session
			$_SESSION['ses_username'] = "Admin";
			$_SESSION['ses_password'] = "123456";
			$_SESSION['ses_nama'] = "Kelompok Empat";
			$_SESSION['ses_level'] = "Administrator";
			
			// dairek link
			header("location:media.php?page=home");
		}
		// Apabila username dan password salah
		else{
			echo"<center>";
				echo"<p>Login GAGAL! Username atau Password Salah</p>";
				echo"<p><a href='index.php'>Harap Ulangi</a></p>";
			echo"</center>";
		}
	}
?>