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
            <th style="width: 10%;">Update item</th>
            <th style="width: 10%;">Delete item</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $flag2 = true;
            function renderList($value) {
              extract($value);
              $string = '';
              global $keys;
              foreach ($keys as $keyName => $name) {
                if($name == 'image') {
                  $string .= '
                    <td>
                      <img src="./assets/upload/product/' . $value[$name] . '" class="'.$_GET['page'].'-img">
                    </td>
                  ';
                } else {
                  $string .= '
                    <td>' . $value[$name] . '</td>
                  ';
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
                    <a class="delete-btn" href="./index.php?page='.$_GET['page'].'&mode=delete&rowId=' . $id . '" class="btn" name="delete">
                      Delete
                    </a>
                  </td>
                </tr>
              ';
            }

            foreach ($tableData as $keyValue => $value) {
              if(isset($_GET['idBrand']) && $_GET['idBrand']) {
                if($_GET['idBrand'] == $value['idBrand']) {
                  echo 'Sản phẩm trong danh mục có idBrand là '.$value['idBrand'];
                  renderList($value);
                  $flag2 = false;
                } 

              } else {
                renderList($value);
                $flag2 = false;

              }
            }
            if($flag2) {
              echo "Không có sản phẩm nào được tìm thấy";
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