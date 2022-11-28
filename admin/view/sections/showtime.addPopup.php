<div class="popup">
  <div class="heading">
    Thêm lịch chiếu
  </div>
  <form <?php echo "action=./index.php?page=lich_chieu&mode=add" ?> method="post">
    <div class="add-wrapper">
      <div class="add-item">
        <label class="add-item-label">Id Phim</label>
        <input required class="add-item-input" type="text" name="movie_id">
      </div>
      <div class="add-item">
        <label class="add-item-label">Id Rạp</label>
        <input required class="add-item-input" type="text" name="theader_id">
      </div>
      <div class="add-item">
        <label class="add-item-label">Thời gian chiếu</label>
        <input required class="add-item-input" type="text" name="time">
      </div>
      <div class="add-item">
        <label class="add-item-label">Ghế đã được mua</label>
        <input required class="add-item-input" type="text" name="seat_has_solded">
      </div>
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
  document.querySelector('.close-icon').addEventListener(('click'), () => {
    window.history.back()
  })
</script>