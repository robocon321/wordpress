<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
<section>
  <div class="d-flex justify-content-left align-items-center">
    <h1 class="mr-5">Lượt tương tác</h1>
    <select id="interactionSel">
      <option value="2020">2018</option>
      <option value="2020">2019</option>
      <option value="2020">2020</option>
      <option value="2021">2021</option>
      <option value="2022">2022</option>
    </select>
  </div>
  <canvas id="interaction" width="400" height="200" style="background-color: white"></canvas>
</section>

<section>
  <div class="d-flex justify-content-left align-items-center">
    <h1 class="mr-5">Doanh thu</h1>
    <select id="incomeSel">
      <option value="2020">2018</option>
      <option value="2020">2019</option>
      <option value="2020">2020</option>
      <option value="2021">2021</option>
      <option value="2022">2022</option>
    </select>
  </div>
  <canvas id="income" width="400" height="200" style="background-color: white"></canvas>
</section>

<section>
  <div class="d-flex justify-content-left align-items-center">
    <h1 class="mr-5">Lượng khách hàng</h1>
    <select id="customerSel">
      <option value="2020">2018</option>
      <option value="2020">2019</option>
      <option value="2020">2020</option>
      <option value="2021">2021</option>
      <option value="2022">2022</option>
    </select>
  </div>
  <canvas id="customer" width="400" height="200" style="background-color: white"></canvas>
</section>

<script>
  const random = (min, max, amount) => {
    var result = [];
    for (var i = 0; i < 12; i++) {
      result.push(Math.floor(Math.random() * max + min));
    }
    return result;
  }
</script>

<script>
  const interactionSel = document.getElementById("interactionSel");
  const interactionCxt = document.getElementById('interaction').getContext('2d');
  const interactionChart = new Chart(interactionCxt, {
    type: 'bar',
    data: {
      labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
      datasets: [{
        label: 'View',
        data: random(150, 250, 12),
        backgroundColor: 'rgba(225, 199, 232, 0.2)',
        borderColor: 'rgba(225, 199, 232, 1)',
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  const incomeSel = document.getElementById("incomeSel");
  const incomeCxt = document.getElementById('income').getContext('2d');
  const incomeChart = new Chart(incomeCxt, {
    type: 'bar',
    data: {
      labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
      datasets: [{
        label: 'Đồng',
        data: random(1500000, 3500000),
        backgroundColor: 'rgba(55, 129, 132, 0.2)',
        borderColor: 'rgba(55, 129, 132, 1)',
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  const customerSel = document.getElementById("customerSel");
  const customerCxt = document.getElementById('customer').getContext('2d');
  const customerChart = new Chart(customerCxt, {
    type: 'bar',
    data: {
      labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
      datasets: [{
        label: 'Khách hàng',
        data: random(20, 100),
        backgroundColor: 'rgba(155, 99, 232, 0.2)',
        borderColor: 'rgba(155, 99, 232, 1)',
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  interactionSel.addEventListener('change', () => {
    interactionChart.data.datasets.forEach(dataset => {
      dataset.data = random(150, 250);
    });
    interactionChart.update();
  });

  incomeSel.addEventListener('change', () => {
    incomeChart.data.datasets.forEach(dataset => {
      dataset.data = random(1500000, 3500000);
    });
    incomeChart.update();
  });

  customerSel.addEventListener('change', () => {
    customerChart.data.datasets.forEach(dataset => {
      dataset.data = random(20, 100);
    });
    customerChart.update();
  })
</script>