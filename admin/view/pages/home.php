<style>
  .barChart_wrapper {
    margin-top: 100px;
    display: block;
    max-width: 80%;
    margin-left: auto;
    margin-right: auto;
  }
  .pieProductChart_wrapper {
    margin-top: 100px;
    max-width: 50%;
    margin-left: auto;
    margin-right: auto;
    display: block;
    margin-bottom: 100px;
  }
  .container h3 {
    font-size: 36px;
    margin-bottom: 25px;
  }
</style>
<script>
  const renderBarChart = (labels, dataTable) => {
    const convertToNumber = dataTable.map(item => Number(item))
    const data = {
      labels: labels,
      datasets: [{
        label: ['Total'],
        data: convertToNumber,
        backgroundColor: [
          'rgba(255, 99, 132, 0.9)',
          'rgba(255, 159, 64, 0.9)',
          'rgba(255, 205, 86, 0.9)',
          'rgba(75, 192, 192, 0.9)',
          'rgba(153, 102, 255, 0.9)',
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
  const collectProductData = []
  const handleCollectData = (arr) => {
    collectProductData.push(arr)
  }
  const sortProductWithBrand = []
  const renderProductChart = () => {
    collectProductData.forEach((product, i) => {
      const brandId = product[1];
      if (i === 0) {
        sortProductWithBrand.push({
          brandId: brandId,
          amount: 1
        })
      } else {
        let check = true;
        for (let index = 0; index < sortProductWithBrand.length; index++) {
          if (sortProductWithBrand[index].brandId === brandId) {
            sortProductWithBrand[index].amount++
            check = false
          }
        }
        if (check) {
          sortProductWithBrand.push({
            brandId: brandId,
            amount: 1
          })
        }
      }
    })
    const amountBrand = sortProductWithBrand.map(item => item.amount)
    const data = {
      labels: [
        'Apple',
        'Samsung',
        'Xiaomi',
        'Oppo'
      ],
      datasets: [{
        label: 'My First Dataset',
        data: amountBrand,
        backgroundColor: [
          'rgba(231, 231, 231, 1)',
          'rgba(3, 76, 157, 1)',
          'rgba(247, 100, 0, 1)',
          'rgba(29, 158, 99, 1)'
        ],
        hoverOffset: 4
      }]
    };
    const config = {
      type: 'pie',
      data: data,
    };
    const pieProductChart = new Chart(
      document.getElementById('pieProductChart'),
      config
    );
  }
</script>
<div class="container">
  <div class='barChart_wrapper'>
    <h3>All Table</h3>
    <canvas id="barChart"></canvas>
  </div>
  <div class="pieProductChart_wrapper">
    <h3>Product</h3>
    <canvas id="pieProductChart"></canvas>
  </div>
  <div class="home-list">
    <?php

    $nameTables = [];
    $data = [];
    $productTable = [];

    $query = $db->prepare('show tables');
    $query->execute();
    while ($rows = $query->fetch(PDO::FETCH_ASSOC)) {
      foreach ($rows as $key => $tableName) {
        $tableData = getAllTableData($tableName);
        array_push($nameTables, $tableName);
        array_push($data, count($tableData));
        if ($tableName == 'product') {
          $productTable = $tableData;
        }
      }
    }

    function js_str($s)
    {
      return '"' . addcslashes($s, "\0..\37\"\\") . '"';
    }
    function js_array($array)
    {
      $temp = array_map('js_str', $array);
      return '[' . implode(',', $temp) . ']';
    }
    $jsArrayProduct = [];
    foreach ($productTable as $key => $value) {
      array_push($jsArrayProduct, js_array($value));
      echo 
        '<script>
          handleCollectData(' . js_array($value) . ')
        </script>;';
    }
    echo '<script>
        renderBarChart(' . js_array($nameTables) . ',' . js_array($data) . ')
        renderProductChart()
      </script>;';
    ?>

  </div>
</div>