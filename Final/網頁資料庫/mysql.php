<?php
	header("Content-Type:text/html; charset=utf-8");
	$mysqli = mysqli_connect('sql200.byethost.com', 'b7_22012081', 'lucky777', 'b7_22012081_news');
	$mysqli->query("SET NAMES utf8");

if (mysqli_connect_error($mysqli)) {
    echo "not connect". mysqli_connect_error();
}

?>