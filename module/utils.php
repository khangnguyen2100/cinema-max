<?php
  function createId() {
    return abs(crc32(uniqid()));
  }
?>