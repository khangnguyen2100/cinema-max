<?php 
   function action($sql){
    global $db;
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
   }
   function selectDb($sql){
    global $db;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
   }
   function total($sql){
    global $db;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchColumn();
    return $result;
   }
?>