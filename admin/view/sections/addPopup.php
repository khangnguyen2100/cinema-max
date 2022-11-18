<div class="popup">
  <div class="heading">
    Add to <?php echo $_GET['page'] ?> table
  </div>
  <form <?php echo "action=./index.php?page=" . $_GET['page'] . "&mode=add" ?> method="post" enctype="multipart/form-data">
    <div class="add-wrapper">
      <?php
      $keys = getTableKeys();
      foreach ($keys as $index => $key) {

        $inputType = '<input required class="add-item-input" type="text" name="' . $key . '">';
        if ($key === 'date') {
          $inputType = '';
          $key = '';
        }
        if ($key === 'birthday') {
          $inputType = '<input required class="add-item-input" type="date" name="' . $key . '">';
        }
        if ($key === 'email') {
          $inputType = '<input required class="add-item-input" type="email" name="' . $key . '">';
        }
        if ($key === 'gender') {
          $inputType =
            '<div class="add-item-input">
            <div class="radio-group">
              <input required type="radio" id="nam" value="nam" name="gender">
              <label for="nam">Nam</label><br>
            </div>
            <div class="radio-group">
              <input required type="radio" id="nữ" value="nữ" name="gender">
              <label for="nữ">Nữ</label>
            </div>
          </div>';
        }

        if ($index !== 0) {
          echo '
          <div class="add-item">
            <label class="add-item-label">' . $key . ': </label>
            ' . $inputType . '
          </div>
        ';
        } else {
          echo '
            <div class="add-item">
              <label class="add-item-label">' . $key . ': </label>
              <input placeholder="Id sẽ tự động được tạo" class="add-item-input" type="text" disabled name="' . $key . '">
            </div>
          ';
        }
      }
      ?>
    </div>
    <button value="X" name="close-icon" class="close-icon">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
    </button>
    <input type="submit" name="add" class="add-action" value="Add">
  </form>
</div>
<div class="overlay"></div>
<script>
  document.querySelector('.close-icon').addEventListener(('click') ,() => {
    window.history.back()
  })
</script>