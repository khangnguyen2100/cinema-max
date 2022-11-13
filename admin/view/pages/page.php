<main>
  <div class="container">
    <div class="render">
      <div class="render-header">
        <div class="heading">
          Table <?php echo $_GET['page'] ?>
        </div>
        <a <?php echo 'href="./index.php?page='.$_GET['page'].'&mode=add"' ?> class="header-icon add-btn">
          Add
          <i class='bx bx-plus' ></i>
        </a>
      </div>

      <table class="table" cellspacing="0" width="100%">
        <thead>
          <tr>
            <?php
              foreach ($keys as $key => $value) {
                echo '
                  <th>'.$value.'</th>
                ';
              }
            ?>
            <th>Cập Nhật</th>
            <th>Xóa</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($tableData as $keyValue => $value) {
            extract($value);
            $string = '';
            foreach ($keys as $keyName => $name) {
              if((str_contains($value[$name],'https') || str_contains($value[$name],'http')) && !str_contains($value[$name],'youtube')) {
                $string .= '
                  <td>
                    <img src=' . $value[$name] . ' class="'.$_GET['page'].'-img">
                  </td>
                ';
              } else {
                if($name == 'description') {
                  $string .= '
                    <td>' . join(' ', array_slice(explode(' ', $value[$name]), 0 , 30)) . '...</td>
                  ';
                } else {
                  $string .= '
                    <td>' . $value[$name] .'</td>
                  ';
                }
              }
            }
            echo '
              <tr>
              '.$string.'
                <td class="td-btn">
                  <a class="update-btn action-btn" href="./index.php?page='.$_GET['page'].'&mode=update&rowId=' . $id . '" class="btn" name="update">
                    Update
                  </a>
                </td>
                <td class="td-btn">
                  <a class="delete-btn action-btn" href="./index.php?page='.$_GET['page'].'&mode=delete&rowId=' . $id . '" class="btn" name="delete">
                    Delete
                  </a>
                </td>
              </tr>
            ';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php
  if (isset($_GET['mode']) && $_GET['mode'] == 'delete') {
    include '.././module/deleteRow.php';
    deleteRow($_GET['page']);
  }
  if (isset($_GET['mode']) && $_GET['mode'] == 'add') {
    include './view/sections/addPopup.php';
    
    include '.././module/addRow.php';
    addRow();
  }
  if (isset($_GET['mode']) && $_GET['mode'] == 'update') {
    include '.././module/updateRow.php';
    showPopupUpdate();
  }
  if (isset($_GET['mode']) && $_GET['mode'] == 'updated') {
    include '.././module/updateRow.php';
    updateRow();
  }
?>