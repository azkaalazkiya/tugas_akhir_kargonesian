<?php
    // load koneksi dan library
    include "config/koneksi.php";
    include "config/library.php";

    // default halaman
    if($_GET["page"] == "home"){
        $tgl=date("Y-m-d");
		$tanggal=tgl_indo($tgl);
		
		// Menampilkan selamat datang dan tanggal
		echo "<p align=\"center\">Hai <b>".strtoupper($_SESSION["ses_nama"])."</b> Selamat Datang di halaman <b>Administrator</b>.</p>";
		echo "<p align=\"center\">Login saat ini tanggal $tanggal</p>"; echo "<br>";

    }
    // mengecek hamalam berdasarkan modul-modulnya
    else if($_GET["page"] == "pengirim"){
        include "modul/mod_pengirim/pengirim.php";
    }
    // mengecek hamalam berdasarkan modul-modulnya
    else if($_GET["page"] == "distributor"){
        include "modul/mod_distributor/distributor.php";
    }
    // mengecek hamalam berdasarkan modul-modulnya
    else if($_GET["page"] == "catatan"){
        include "modul/mod_catatan/catatan.php";
    }
    // mengecek hamalam berdasarkan modul-modulnya
    else if($_GET["page"] == "ekspedisi"){
        include "modul/mod_ekspedisi/ekspedisi.php";
    }
    // mengecek hamalam berdasarkan modul-modulnya
    else if($_GET["page"] == "keberangkatan"){
        include "modul/mod_keberangkatan/keberangkatan.php";
    }

?>