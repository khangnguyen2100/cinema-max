<?php
if (isset($_SESSION['admin']) && $_SESSION['admin'] !== '' || isset($_SESSION['user']) && $_SESSION['user'] !== '') {
} else {
    echo "
        <script type='text/javascript'>
            setTimeout(() => {
            alert('Bạn chưa đăng nhập vui lòng đăng nhập')
            window.location.assign('./view/login.php')
            }, 100);
        </script>
        ";
}
?>
<div class="seat-wrapper">
    <div class="seat-container">
        <h2>CHỌN GHẾ</h2>
        <div class="linealphabet">
            <?php
            $alphas = range('A', 'J');
            $start_time_id = $_GET['start_time_id'];
            $seat_solded = '';
            $get_seat_solded = action("SELECT * FROM seats WHERE start_times_id = $start_time_id");
            if(count($get_seat_solded) > 0) {
                $seat_solded = $get_seat_solded[0]["seat_has_solded"];
            } 
            $seat_solded_list = explode(" ", $seat_solded);
            foreach ($alphas as $key => $alpha) {
                $seat = '';
                for ($i = 1; $i < 13; $i++) {
                    $name_seat = $alpha . $i;
                    if(in_array($name_seat, $seat_solded_list)) {
                        $seat .= '<button type="submit" disabled="disabled" class="has_sold" data-status="unavailable" data-name="' . $name_seat . '" onclick="handleClickSeat(this);">' . $i . '</button>';
                    }  else {
                        $seat .= '<button type="submit"  data-status="available" data-name="' . $name_seat . '" onclick="handleClickSeat(this);">' . $i . '</button>';
                    }
                }
                echo '
                <div class="line">
                    <div class="alphabet">
                        ' . $alpha . '
                    </div>
                    <div class="linenumber">
                        ' . $seat . '
                    </div>
                </div>';
            }
            ?>
        </div>
        <br><br>
        <div class="manhinh">
            <p>MÀN HÌNH</p>
        </div>
        <hr>
        <div class="notes">
            <div class="note note1">
                <div class="box-color"></div>
                <p>Ghế đang chọn</p>
            </div>
            <div class="note note2">
                <div class="box-color"></div>
                <p>Ghế đã bán</p>
            </div>
            <div class="note note3">
                <div class="box-color"></div>
                <p>Có thể chọn</p>
            </div>
            <div class="note note4">
                <div class="box-color"></div>
                <p>Không thể chọn</p>
            </div>
        </div>
    </div>
    <form method="post" id="ticket" <?php echo "action=index.php?page=bill_confirm&movie_id=" . $_GET['movie_id'] . "&start_time_id=" . $_GET['start_time_id'] . "&theater_id=" . $_GET['theater_id'] . "" ?> class="movie-info-container">
        <?php
        $movie_id = $_GET['movie_id'];
        $start_time_id = $_GET['start_time_id'];
        $theater_id = $_GET['theater_id'];

        $movie_info = action("SELECT * FROM movie WHERE id = $movie_id");
        $theader_info = action("SELECT * FROM theader WHERE id = $theater_id");
        $start_times_info = action("SELECT * FROM start_times WHERE id = $start_time_id");
        foreach ($movie_info as $key => $movie) {
            extract($movie);
            echo '
                <div class="block1 block">
                    <div class="movie-info-img">
                        <img src="' . $banner . '" alt="">
                    </div>
                    <h4>' . $name . '</h4>
                </div>
                <p>Rạp: ' . $theader_info[0]["name"] . '</p>
                <hr>
                <p>Suất chiếu: ' . $start_times_info[0]["time"] . '</p>
                <p class="seat_selected">
                    Ghế ngồi: <input type="text" id="selected"  class="input-text" name="selected" readonly />
                </p>
                <input type="text" name="ticket_price" class="total-price input-text" value="0" readonly />
                <input type="submit" name="ticket" class="btn book_btn" value="Đặt vé">
            ';
        }
        ?>
    </form>
</div>
<?php

?>
<script>
    let seats = []
    const formatPrice = (price) => {
        return new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND',
        }).format(price)
    }
    const calcTotalPrice = (num) => {
        const total = document.querySelector('.total-price')
        // total.value = formatPrice(+num * 75000)
        total.value = +num * 75000
    }
    const handleClickSeat = (e) => {
        const seat_selected = document.querySelector('.seat_selected input')
        e.classList.toggle('active')
        e.dataset.status = "selected"
        if (e.classList.contains('active')) {
            seats.push(`${e.dataset.name}`)
        } else {
            seat_selected.innerText += `${e.dataset.name}`
            seats = seats.filter(item => item !== e.dataset.name)
        }
        seat_selected.value = seats.join(' ')
        calcTotalPrice(seats.length)
    }
    const ticket = document.querySelector('#ticket')
    ticket.addEventListener('submit', (e) => checkTicket(e))
    const checkTicket = (e) => {
        if(seats.length == 0 ) {
            e.preventDefault();
            alert("Bạn chưa chọn ghế nào")
        }
    }
</script>