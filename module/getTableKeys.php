<?php
  function getTableKeys() {
    global $db;
    $table = $_GET['page'];
    $q = $db->prepare("DESCRIBE ". $table);
    $q->execute();
    $keys = $q->fetchAll(PDO::FETCH_COLUMN);
    return $keys;
  }
?>