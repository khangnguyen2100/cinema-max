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
    <button name="close-icon" class="close-icon">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
    </button>
    <input type="submit" name="update" class="add-action" value="Update">
  </form>
</div>
<script>
  document.querySelector('.close-icon').addEventListener(('click') ,() => {
    window.history.back()
  })
</script>