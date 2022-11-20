<?php
  function createId() {
    return abs(crc32(uniqid()));
  }
  function validate() {
    
  }
  function validString($string) {
    $str  = trim($string);
    return $str !== '';
  }
  function validNumber($num) {
    return is_numeric($num);
  }
?>