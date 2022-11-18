// GRAFICO DE BARRAS CANTIDAD DE USUARIOS
var ctx = document.getElementById('myBarCampanias').getContext('2d');
var myChartUsuarios = new Chart(ctx, {
	type: 'bar',
	data: {
		labels: ['SI', 'NO'],
		datasets: [{
			label: 'Personas',
			data: [100,200],
			backgroundColor: [
				'#009974',
				'#4477da'
			],
			borderColor: [
				'#009974',
				'#4477da'
			],
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
