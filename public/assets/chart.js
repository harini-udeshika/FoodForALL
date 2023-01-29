
  const ctx = document.getElementById('myChart');
  const cty = document.getElementById('myChart_2');
  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12,8, 19, 3, 5, 2, 3],
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
  new Chart(cty, {
    type: 'bar',
    data: {
      labels: ['Volunteer', 'Donate'],
      datasets: [{
        label: 'No of Times',
        data: [12,8],
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