<?php
	// koneksi database
	$conn = mysqli_connect("localhost", "root", "", "dbpercetakan");
	
	if(!$conn) {
		die("connection Failed". mysqli_connect_error());
	}
?>