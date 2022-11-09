<div class="overlay"></div>
<div class="popup update-popup">
  <div class="heading">
    Update Database to <?php $_GET['page'] ?> table
  </div>
  <form <?php echo "action=./index.php?page=" . $_GET['page'] . "&mode=updated&rowId=" . $_GET['rowId'] . "" ?> method="post" enctype="multipart/form-data">
  <div class="add-wrapper">
      <?php
      $keys = getTableKeys();
      foreach ($keys as $key => $name) {
        if($name !== 'id') {
          echo '
          <div class="add-item">
          <label class="add-item-label">' . $name . ': </label>
          <input class="add-item-input" value="' . $value[$name] . '" type="text" name="' . $name . '">
          </div>
          ';
        }
      }
      ?>
    </div>
    <input type="submit" value="X" name="close-icon" class="close-icon">
    <input type="submit" name="update" class="add-action" value="Update">
  </form>
</div>