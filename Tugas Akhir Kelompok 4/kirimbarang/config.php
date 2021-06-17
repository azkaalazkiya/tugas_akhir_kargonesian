<?php
$db=pg_connect('host=localhost dbname=company user=postgres password=ss17.mrn74');

if(!$db){
    die("Gagal terhubung dengan database: " . pg_connect_error());
}

?>