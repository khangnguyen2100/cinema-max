<style>
  .barChart_wrapper {
    margin-top: 100px;
    display: block;
    margin-left: auto;
    margin-right: auto;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;

  }
  #barChart {
    max-width: 80%;
  }
  .pieMovieChart_wrapper {
    margin-top: 100px;
    margin-left: auto;
    margin-right: auto;
    display: block;
    margin-bottom: 100px;
    max-width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
  }
  h3 {
    text-align: left;
    justify-self: flex-start;
    display: block;
    width: 100%;
  }
  #pieMovieChart {
    max-width: 50%;
    max-height: 900px;
  }
  .container h3 {
    font-size: 36px;
    margin-bottom: 25px;
  }
</style>
<script>
  const renderBarChart = (labels, dataTable) => {
    console.log(dataTable)
    let convertToNumber = dataTable.map(item => Number(item))
    //remove table seats, showtimes, start_times
    convertToNumber.splice(3,3)
    console.log(convertToNumber)
    const data = {
      labels: [
        'Đơn Hàng',
        'Thể Loại',
        'Phim',
        'Rạp Phim',
        'Khách Hàng',
      ],
      datasets: [{
        label: [],
        data: convertToNumber,
        backgroundColor: [
          'rgba(48, 51, 107,1.0)',
          'rgba(249, 202, 36,1.0)',
          'rgba(255, 205, 86, 0.9)',
          'rgba(255, 121, 121,1.0)',
          'rgba(83, 92, 104,1.0)',
        ],
        borderColor: [
          'rgb(255, 99, 132)',
          'rgb(255, 159, 64)',
          'rgb(255, 205, 86)',
          'rgb(75, 192, 192)',
          'rgb(54, 162, 235)',
          'rgb(153, 102, 255)',
          'rgb(201, 203, 207)'
        ],
        borderWidth: 1
      }]
    };
    const config = {
      type: 'bar',
      data: data,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      },
    };
    const barChart = new Chart(
      document.getElementById('barChart'),
      config
    );
  }
  const collectMovieData = []
  const handleCollectData = (arr) => {
    collectMovieData.push(arr)
  }
  const sortMovieWithMovie = []
  const renderMovieChart = () => {
    collectMovieData.forEach((movie, i) => {
      const categoryId = movie[8];
      if (i === 0) {
        sortMovieWithMovie.push({
          categoryId: categoryId,
          amount: 1
        })
      } else {
        let check = true;
        for (let index = 0; index < sortMovieWithMovie.length; index++) {
          if (sortMovieWithMovie[index].categoryId === categoryId) {
            sortMovieWithMovie[index].amount++
            check = false
          }
        }
        if (check) {
          sortMovieWithMovie.push({
            categoryId: categoryId,
            amount: 1
          })
        }
      }
    })
    const amountMovie = sortMovieWithMovie.map(item => item.amount)
    const data = {
      labels: [
        'Hành Động',
        'Kịch tính',
        'Lãng mạn',
        'Khoa học viễn tưởng',
        'Hài',
        'Kinh dị',
        'Hoạt hình',
      ],
      datasets: [{
        label: 'My First Dataset',
        data: amountMovie,
        backgroundColor: [
          '#00cec9',
          '#74b9ff',
          '#ffeaa7',
          '#636e72',
          '#d63031',
          '#55efc4',
          '#2d3436',
        ],
        hoverOffset: 4
      }]
    };
    const config = {
      type: 'pie',
      data: data,
    };
    const pieMovieChart = new Chart(
      document.getElementById('pieMovieChart'),
      config
    );
  }
</script>
<div class="container">
  <div class='barChart_wrapper'>
    <h3>Dữ liệu các bảng</h3>
    <canvas id="barChart"></canvas>
  </div>
  <div class="pieMovieChart_wrapper">
    <h3>Phim theo thể loại</h3>
    <canvas id="pieMovieChart"></canvas>
  </div>
  <div class="home-list">
    <?php

    $nameTables = [];
    $data = [];
    $movieTable = [];

    $query = $db->prepare('show tables');
    $query->execute();
    while ($rows = $query->fetch(PDO::FETCH_ASSOC)) {
      foreach ($rows as $key => $tableName) {
        $tableData = getAllTableData($tableName);
        array_push($nameTables, $tableName);
        array_push($data, count($tableData));
        if ($tableName == 'movie') {
          $movieTable = $tableData;
        }
      }
    }

    function js_str($s) {
      return '"' . addcslashes($s, "\0..\37\"\\") . '"';
    }
    function js_array($array) {
      $temp = array_map('js_str', $array);
      return '[' . implode(',', $temp) . ']';
    }
    $jsArrayMovie = [];
    foreach ($movieTable as $key => $value) {
      array_push($jsArrayMovie, js_array($value));
      echo
      '<script>
          handleCollectData(' . js_array($value) . ')
        </script>;';
    }
    echo '<script>
        renderBarChart(' . js_array($nameTables) . ',' . js_array($data) . ')
        renderMovieChart()
      </script>;';
    ?>

  </div>
</div>