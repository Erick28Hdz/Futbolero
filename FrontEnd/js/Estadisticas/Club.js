const juegos = document.getElementById('estaclub');

  new Chart(juegos, {
    type: 'bar',
    data: {
      labels: ['Ganados Local', 'Ganados visitante', 'Perdidos local', 'Perdidos visitante', 'Empates local', 'Empates visitante'],
      datasets: [{
        label: 'Números de temporada',
        data: [8, 14, 3, 5, 2, 3],
        borderWidth: 2
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

  const partidos = document.getElementById('estajuga');

  new Chart(partidos, {
    type: 'bar',
    data: {
      labels: ['Goles visitante', 'Goles local', 'Autogoles', 'Tiros a puerta', 'Tiros de esquina', 'Penaltis'],
      datasets: [{
        label: 'Números del jugador',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 2
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

  const apuesta = document.getElementById('estapues');

  new Chart(apuesta, {
    type: 'bar',
    data: {
      labels: ['Ganar', 'Perder', 'Empatar', 'Más de 1.5 goles', 'Menos 1.5 goles', ],
      datasets: [{
        label: 'Probabilidad apuestas',
        data: [17, 5, 2, 5, 2],
        borderWidth: 2
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