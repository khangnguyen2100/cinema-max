<?php
  function deleteRow($page) {
    global $db;
    $row_id = $_GET['rowId'];
    $sth = $db->query("DELETE FROM ".$page." WHERE id = '$row_id'");
    $sth->fetchAll();
    // header('Location: index.php?page='.$page);
    echo("<script>window.location.assign('index.php?page=".$page."');</script>");

  }
?>