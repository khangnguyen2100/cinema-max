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
    $serverName = "sql6.freemysqlhosting.net";
    $username = "sql6581942";
    $databaseName = "sql6581942";
    $password = "H24G8SuNyG";
    $port = '3306';
  }
  
  $conn = new PDO("mysql:host=$serverName;$port dbname=$databaseName", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $conn;
}
