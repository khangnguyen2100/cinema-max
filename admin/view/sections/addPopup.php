<div class="popup">
  <div class="heading">
    Add to <?php echo $_GET['page'] ?> table
  </div>
  <form <?php echo "action=./index.php?page=" . $_GET['page'] . "&mode=add" ?> method="post" enctype="multipart/form-data">
    <div class="add-wrapper">
      <?php
      $keys = getTableKeys();
      foreach ($keys as $key => $value) {
        echo '
          <div class="add-item">
            <label class="add-item-label">' . $value . ': </label>
            <input class="add-item-input" type="text" name="'.$value.'">
          </div>
        ';
      }
      ?>
    </div>
    <input type="submit" value="X" name="close-icon" class="close-icon">
    <input type="submit" name="add" class="add-action" value="Add">
  </form>
</div>
<div class="overlay"></div>