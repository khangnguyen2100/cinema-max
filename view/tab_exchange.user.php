<form method="POST" class="form-user">
  <?php
  $user = getUserInfo();
  ?>
  <div class="form-col" style="width: 100%;">
  <div class="form-group-container">
        <div class="form-group">
          <label for="name">Từ:</label>
          <input type="date" class="form-input date-since" name="day-since" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <div class="form-group">
          <label for="name">Đến:</label>
          <input type="date" class="form-input date-to" name="day-to" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <input type='submit' name="search" class="btn" value="Tìm kiếm" />
      </div>
      <div class="error">
      </div>
      <div class="result-container">
        <table class="table" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Mã mua hàng</th>
              <th>Phim</th>
              <th>Rạp</th>

              <th>Thời gian chiếu</th>
              <th>Số lượng vé</th>
              <th>Tổng tiền</th>

            </tr>
          </thead>
          <tbody class="result">

          </tbody>
        </table>
      </div>
  </div>
</form>
<script>
  // ajax to get data in form select
  $(function() {
    $('.form-user').submit(function(e) {
      const since_value = document.querySelector(".date-since").value
      const to_value = document.querySelector(".date-to").value
      const since = new Date(since_value)
      const to = new Date(to_value)
      e.preventDefault();
      if (to - since < 0) {
        document.querySelector('.error').innerText = 'Ngày Đến phải lớn hơn!'
      } else {
        $.ajax({
          type: "GET",
          url: "./module/searchExchange.php",
          data: {
            to: to_value,
            since: since_value,
          },
        }).then(function(res) {
          const data = JSON.parse(res)
          console.log(data);
          const htmls = data.data.map(item => {
            const {bill_id, movie_name, name, amount_ticket, ticket_price, time} = item
            return (
              `
              <tr>
                <td>${bill_id}</td>
                <td>${movie_name}</td>
                <td>${name}</td>
                <td>${time}</td>
                <td>${amount_ticket}</td>
                <td>${ticket_price}</td>
              </tr>
              `
            )
          })
          $(".result").html(htmls)
        });
      }
    });
  })
</script>