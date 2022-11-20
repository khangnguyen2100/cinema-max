<div class="seat-container">
    <h2>CHỌN GHẾ</h2>
    <div class="linealphabet">

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
<script>
    const handleClickSeat = (e) => {
        e.classList.toggle('active')
    }
    const lines = document.querySelector('.linealphabet')
    const alphabets = 'abcdefghij'.split('');
    const htmls = alphabets.map((item, i) => {
        let seat = ''
        for (let index = 1; index < 12; index++) {  
            seat += `<button type="submit" onclick="handleClickSeat(this);">${index}</button>`
        }
        return `
        <div class="line">
            <div class="alphabet">
                ${item}
            </div>
            <div class="linenumber">
                ${seat}
            </div>
        </div>`
    })
    lines.innerHTML = htmls.join('')
</script>