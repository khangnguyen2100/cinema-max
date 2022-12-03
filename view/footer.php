<style>

  .footer {
    position: relative;
    width: 100%;
    margin-top: 250px;
    background: #3586ff;
    min-height: 10px;
    padding: 20px 50px;
    padding-bottom: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
  }

  .menu {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 10px 0;
    flex-wrap: wrap;
  }

  .social-icon__item,
  .menu__item {
    list-style: none;
  }

  .menu__link {
    color: #fff !important;
    margin: 0 20px;
    font-size: 18px;
    font-weight: 600;
    display: inline-block;
    transition: 0.5s;
    text-decoration: none;
    opacity: 0.75;
    font-weight: 300;
  }

  .menu__link:hover {
    opacity: 1;
  }

  .footer p {
    color: #fff;
    margin: 15px 0 10px 0;
    font-size: 1rem;
    font-weight: 300;
  }

  .wave {
    position: absolute;
    top: -100px;
    left: 0;
    width: 100%;
    height: 100px;
    background: url("https://i.ibb.co/wQZVxxk/wave.png");
    background-size: 1000px 100px;
  }

  .wave#wave1 {
    z-index: 1000;
    opacity: 1;
    bottom: 0;
    animation: animateWaves 4s linear infinite;
  }

  .wave#wave2 {
    z-index: 999;
    opacity: 0.5;
    bottom: 10px;
    animation: animate 4s linear infinite !important;
  }

  .wave#wave3 {
    z-index: 1000;
    opacity: 0.2;
    bottom: 15px;
    animation: animateWaves 3s linear infinite;
  }

  .wave#wave4 {
    z-index: 999;
    opacity: 0.7;
    bottom: 20px;
    animation: animate 3s linear infinite;
  }

  @keyframes animateWaves {
    0% {
      background-position-x: 1000px;
    }

    100% {
      background-positon-x: 0px;
    }
  }

  @keyframes animate {
    0% {
      background-position-x: -1000px;
    }

    100% {
      background-positon-x: 0px;
    }
  }
</style>

  <footer class="footer">
    <div class="waves">
      <div class="wave" id="wave1"></div>
      <div class="wave" id="wave2"></div>
      <div class="wave" id="wave3"></div>
    </div>
    <ul class="menu">
      <li class="menu__item"><a class="menu__link" href="#">Trang Chủ</a></li>
      <li class="menu__item"><a class="menu__link" href="#">Đặt vé</a></li>
      <li class="menu__item"><a class="menu__link" href="#">Rạp</a></li>
    </ul>
  </footer>
</body>

</html>