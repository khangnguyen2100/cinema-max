<?php
session_start();
ob_start();
if (isset($_SESSION['admin'])) {
  unset($_SESSION['admin']);
}
if (isset($_SESSION['user'])) {
  unset($_SESSION['user']);
}
header("location:../index.php");

?>