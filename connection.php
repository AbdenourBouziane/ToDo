<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "admin1871";
$dbname = "todo";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
