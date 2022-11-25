function handleClickBrand(id) {
  window.location.assign(location.pathname + '?page=product&idBrand=' + id)
}
const renderLineChart = (bill_data, time) => {
  
  function createDays(day_before) {
    const daysAgo = new Date(Date.now() - (day_before) * 24 * 60 * 60 * 1000)
    for (var arr = [], dt = new Date(daysAgo); dt <= new Date(); dt.setDate(dt.getDate() + 1)) {
      const date = new Date(dt)
      arr.push({
        day_label: `${date.getDate()}/${date.getMonth()+1}`,
        day: date.getDate(),
        price: 0
      });
    }
    return arr
  }
  const days = createDays(time)
  bill_data.forEach(bill => {
    // get day, price from db
    const day = new Date(bill.date).getDate();
    const price = bill.ticket_price

    days.forEach(item => {
      if(item.day === day) {
        item.price+=price;
      }
    })
  })
  // split price and days to array
  const price = [], days_label = []
  days.forEach(item => {
    days_label.push(item.day_label)
    price.push(item.price)
  })
  const data = {
    labels: days_label,
    datasets: [{
      data: price,
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
      responsive: true,
      scales: {
        y: {
          beginAtZero: true,
          offset : true,
        }
      }
    },
  };

  // update chart when data changed
  let chart = $("#billWithTheader");
  if (chart.length) {
    chart.remove()
    chart = $("<canvas id='billWithTheader'></canvas>");
    $(".chart-container").append(chart);
  }
  const billWithTheader = new Chart(chart, config);
}