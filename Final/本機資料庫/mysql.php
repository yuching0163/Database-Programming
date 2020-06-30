<?php
	header("Content-Type:text/html; charset=utf-8");
	$mysqli = mysqli_connect('localhost', 'root', '', 'database');
	$mysqli->query("SET NAMES utf8");

if (mysqli_connect_error($mysqli)) {
    echo "not connect". mysqli_connect_error();
}

?>