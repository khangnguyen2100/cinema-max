<?php
session_start();
ob_start();
function connectDb(){
  // production
    // $serverName = "containers-us-west-104.railway.app";
    // $username = "root";
    // $databaseName = "railway";
    // $password = "WF8jgDc8mS4Sx52wsbBX";
    // $port = 'port=6897;';
  // dev
  $serverName = "localhost";
  $username = "root";
  $password = "";
  $databaseName = "cinema-max";
  $port = '';
  
  $conn = new PDO("mysql:host=$serverName;$port dbname=$databaseName", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $conn;
}
