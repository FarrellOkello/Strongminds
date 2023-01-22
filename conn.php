<?php

$hostname="localhost";
$username="root";
$password="";
$database="strongminds";
$con = new mysqli($hostname, $username, $password, $database);
if (mysqli_connect_errno()) {
    die(mysqli_connect_error());
}
session_start();
$datenow=date('m/d/Y', time());
$timenow=  strtotime($datenow);
