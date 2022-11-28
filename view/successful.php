<div class="container successful-container">
  <div class="left-content">
    <div id="placeHolder"></div>
  </div>
  <div class="right-content">
    <h1>Đặt vé thành công!</h1>
    <p>Cảm ơn bạn đã đặt vé.</p>
    <p>
      Vui lòng xuất trình mã QR này cho nhân viên để nhận vé!
    </p>
  </div>
</div>
<script type="text/javascript" src="./assets/scripts/qrcode.js"></script>
<script>
  const url = new URL(window.location.href);
  const id = url.searchParams.get("id");
  const typeNumber = 4;
  const errorCorrectionLevel = 'H';
  const qr = qrcode(typeNumber, errorCorrectionLevel);
  const data = `#${id}`;
  console.log(data);
  qr.addData(data);
  qr.make();
  document.getElementById('placeHolder').innerHTML = qr.createImgTag(20);
</script>