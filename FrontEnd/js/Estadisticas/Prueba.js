const pruebauno = document.getElementById('prueba');

  new Chart(pruebauno, {
    type: 'doughnut',
    data: {
      labels: ['Red',
      'Blue',
      'Yellow'],
      datasets: [{
        label: 'My First Dataset',
        data: [300, 50, 100],
        backgroundColor: [
          'rgb(255, 99, 132)',
          'rgb(54, 162, 235)',
          'rgb(255, 205, 86)'
        ],
        borderColor: '#000000',
        hoverOffset: 4
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