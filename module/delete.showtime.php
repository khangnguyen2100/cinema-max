<?php
  function deleteRow($page) {
    global $db;
    $row_id = $_GET['rowId'];
    $sth = $db->query("DELETE FROM showtimes WHERE id = '$row_id'");
    $sth->fetchAll();
    echo("<script>window.location.assign('index.php?page=".$page."');</script>");

  }
?>