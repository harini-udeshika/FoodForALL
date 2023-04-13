
let months_v = new Array(12).fill(0);
let months_d = new Array(12).fill(0);
let tot_data = new Array(2).fill(0);
let donate = 0;
let volunteer = 0;

var ajax = new XMLHttpRequest(); 
ajax.open('GET', 'http://localhost/food_for_all/public/charts/get_stats', true);
ajax.send();

ajax.onload = function () {
  if (ajax.readyState === XMLHttpRequest.DONE) {
    if (ajax.status === 200) {
      console.log(ajax.response);
      var json = JSON.parse(ajax.response);

      volunteer = json[0][0].count;
      donate = json[1][0].count;

      let m = json[2];
      let n = json[3];
      console.log(m);
      console.log(n);
      for (i in m) {
        months_v[m[i].month - 1] = m[i].count;


      }
      for (j in n) {
        months_d[n[j].month - 1] = n[j].amount;

      }
      // console.log(months_v);
      // console.log(donate);
      // console.log(volunteer);

      tot_data[1] = donate;
      tot_data[0] = volunteer;
      console.log(months_v);
      console.log(months_d);
      const ctx = document.getElementById('myChart');
      const cty = document.getElementById('myChart_2');
      const ctz = document.getElementById('myChart_3')

      new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          datasets: [{

            label: 'No. of times volunteered',
            data: months_v,
            borderWidth: 2,
            borderColor: 'rgb(127, 180, 50)',
            backgroundColor: 'rgb(127, 180, 50)',
            hoverBackgroundColor: 'rgb(118, 129, 191)',

          },],
          pointRadius: 3
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
              suggestedMin: 0,
              suggestedMax: 10

            }
          }
        }
      });
      new Chart(ctz, {
        type: 'line',
        data: {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          datasets: [{

            label: 'Amount donated',
            data: months_d,
            borderWidth: 2,
            borderColor: 'rgb(118, 129, 191)',
            backgroundColor: 'rgb(118, 129, 191)',
            hoverBackgroundColor: 'rgb(127, 180, 50)',

          }],
          pointRadius: 3
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
              suggestedMin: 0,
              suggestedMax: (Math.max(months_d)+Math.max(months_d)/Math.min(months_d))

            }
          }
        }
      });
      new Chart(cty, {
        type: 'doughnut',
        data: {

          labels: ['Volunteer', 'Donate'],

          datasets: [{
            label: 'No of Times',
            data: tot_data,
            borderWidth: 3,
            backgroundColor: [
              'rgba(127, 180, 50,0.8)',
              'rgba(118, 129, 191,0.8)'],
            borderColor: ['rgba(127, 180, 50,1)', 'rgba(118, 129, 191,1)']
          }]
        }

      });
    }
  }
};

