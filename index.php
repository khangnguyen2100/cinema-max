<?php
include_once './module/connectDb.php';
include './module/getAllTableData.php';
include './module/getTableKeys.php';
include_once './module/function.php';
$page = '';
$db = connectDb();

if (isset($_GET['page'])) {
  $page = $_GET['page'];
}

include './view/header.php';

switch ($page) {
  case '':
    include './view/home.php';
    break;
  case 'movie':
    include './view/movie.php';
    break;
  case 'seats':
    include './view/seats.php';
    break;
  case 'rap':
    include './view/rap.php';
    break;
  case 'bill_confirm':
    include './view/bill_confirm.php';
    break;
  case 'user':
    include './view/user.php';
    break;
  case 'successful':
    include './view/successful.php';
    break;
  case 'login':
    header('Location: ./view/login.php');
    break;
}
include './view/footer.php';
?>
<style>
  #snowflakeContainer {
    position: absolute;
    left: 0px;
    top: 0px;
  }

  .snowflake {
    padding-left: 15px;
    font-size: 14px;
    line-height: 24px;
    position: fixed;
    color: black;
    user-select: none;
    z-index: 1000;
    -moz-user-select: none;
    -ms-user-select: none;
    -khtml-user-select: none;
    -webkit-user-select: none;
    -webkit-touch-callout: none;
  }

  .snowflake:hover {
    cursor: default
  }
</style>
<div id='snowflakeContainer'>
  <p class='snowflake'>❄</p>
</div>

<script>
  //<![CDATA[
  var requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
  var transforms = ["transform", "msTransform", "webkitTransform", "mozTransform", "oTransform"];
  var transformProperty = getSupportedPropertyName(transforms);
  var snowflakes = [];
  var browserWidth;
  var browserHeight;
  var numberOfSnowflakes = 30;
  var resetPosition = false;

  function setup() {
    window.addEventListener("DOMContentLoaded", generateSnowflakes, false);
    window.addEventListener("resize", setResetFlag, false)
  }
  setup();

  function getSupportedPropertyName(b) {
    for (var a = 0; a < b.length; a++) {
      if (typeof document.body.style[b[a]] != "undefined") {
        return b[a]
      }
    }
    return null
  }

  function Snowflake(b, a, d, e, c) {
    this.element = b;
    this.radius = a;
    this.speed = d;
    this.xPos = e;
    this.yPos = c;
    this.counter = 0;
    this.sign = Math.random() < 0.5 ? 1 : -1;
    this.element.style.opacity = 0.5 + Math.random();
    this.element.style.fontSize = 4 + Math.random() * 30 + "px"
  }
  Snowflake.prototype.update = function() {
    this.counter += this.speed / 5000;
    this.xPos += this.sign * this.speed * Math.cos(this.counter) / 40;
    this.yPos += Math.sin(this.counter) / 40 + this.speed / 30;
    setTranslate3DTransform(this.element, Math.round(this.xPos), Math.round(this.yPos));
    if (this.yPos > browserHeight) {
      this.yPos = -50
    }
  };

  function setTranslate3DTransform(a, c, b) {
    var d = "translate3d(" + c + "px, " + b + "px, 0)";
    a.style[transformProperty] = d
  }

  function generateSnowflakes() {
    var b = document.querySelector(".snowflake");
    var h = b.parentNode;
    browserWidth = document.documentElement.clientWidth;
    browserHeight = document.documentElement.clientHeight;
    for (var d = 0; d < numberOfSnowflakes; d++) {
      var j = b.cloneNode(true);
      h.appendChild(j);
      var e = getPosition(50, browserWidth);
      var a = getPosition(50, browserHeight);
      var c = 5 + Math.random() * 40;
      var g = 4 + Math.random() * 10;
      var f = new Snowflake(j, g, c, e, a);
      snowflakes.push(f)
    }
    h.removeChild(b);
    moveSnowflakes()
  }

  function moveSnowflakes() {
    for (var b = 0; b < snowflakes.length; b++) {
      var a = snowflakes[b];
      a.update()
    }
    if (resetPosition) {
      browserWidth = document.documentElement.clientWidth;
      browserHeight = document.documentElement.clientHeight;
      for (var b = 0; b < snowflakes.length; b++) {
        var a = snowflakes[b];
        a.xPos = getPosition(50, browserWidth);
        a.yPos = getPosition(50, browserHeight)
      }
      resetPosition = false
    }
    requestAnimationFrame(moveSnowflakes)
  }

  function getPosition(b, a) {
    return Math.round(-1 * b + Math.random() * (a + 2 * b))
  }

  function setResetFlag(a) {
    resetPosition = true
  };
  //]]>
</script>
<script src="https://itexpress.vn/API/js/noel.js"></script>