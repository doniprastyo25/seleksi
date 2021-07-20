<?php
	$host="localhost";
	$user="root";
	$pass="";
	$dbase="seleksi";
	
	$koneksi=mysql_connect($host,$user,$pass);
	if(!$koneksi){
		die("Database mysql tidak terkoneksi");
	}
	
	$seleksi=mysql_select_db($dbase,$koneksi);
	if(!$seleksi){
		die("Database tidak terseleksi");
	}
?>