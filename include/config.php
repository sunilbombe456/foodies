<?php
include("include/Database.php");
ini_set('error_reporting',E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
session_start();
$dbUser = 'root';
$dbHost = 'localhost';
$dbPassword = '';
$dbName ='foodies';
$link='';

	$db= new Database($dbHost,$dbUser,$dbPassword,$dbName);
	$link=$db->connect();
	
?>