<?php
include_once 'connectDb.php';
function action($sql)
{
  $db = connectDb();

  $stmt = $db->prepare($sql);
  $stmt->execute();

  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetchAll();
  return $result;
}
function selectDb($sql)
{
  $db = connectDb();
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();
  return $result;
}
function total($sql)
{
  $db = connectDb();
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchColumn();
  return $result;
}
function createId() {
  $id = abs(crc32(uniqid()));
  if($id == 2140685257 || $id == 2147483647) {
    return abs(crc32(uniqid()));
  } else {
    return $id;
  }
}
function validate()
{
}
function validString($string) {
  $str = trim($string);
  return $str;
}
function validNumber($num)
{
  return is_numeric($num);
}
function getEmail()
{
  if (isset($_SESSION['admin'])) {
    return $_SESSION['admin'];
  }
  if (isset($_SESSION['user'])) {
    return $_SESSION['user'];
  }
  return "";
}
function formatPrice($num)
{
  if (is_numeric($num)) {
    return number_format($num, 0, '', ',') . ' đ';
  } else {
    return 0;
  }
}
function getMostId($ids)
{
  $c = array_count_values($ids);
  return array_search(max($c), $c);
}
