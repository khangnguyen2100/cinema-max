<?php
session_start();
ob_start();
function connectDb(){
  $env =  $_SERVER['HTTP_HOST'];
  if($env === 'localhost') {
    // dev
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "cinema-max";
    $port = '';
  } else {
    // production
    $serverName = "us-cdbr-east-06.cleardb.net";
    $username = "b141be260bcad3";
    $databaseName = "heroku_590ab1bfc1ed2b1";
    $password = "d60dc9d4";
    $port = '';
  }
  
  $conn = new PDO("mysql:host=$serverName;$port charset=utf8;dbname=$databaseName", $username, $password,);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $conn;
}
