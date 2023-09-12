<?php 
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$dbname   = 'portal_berita';

	$conn = mysqli_connect($hostname, $username, $password, $dbname) or die ('Gagal terhubung ke database');
?>