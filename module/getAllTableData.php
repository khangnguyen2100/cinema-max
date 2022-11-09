<?php
  function getAllTableData($page) {
    global $db;
    $stmt = $db->prepare("SELECT * FROM " . $page);
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
  }
?>