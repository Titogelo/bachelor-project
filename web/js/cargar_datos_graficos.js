	var chart;
	$(document).ready(function() {
		chart = new Highcharts.Chart({
			chart: {
				renderTo: 'container',
				plotBackgroundColor: null,
				plotBorderWidth: null,
				plotShadow: false
			},
			title: {
				text: 'Grafico de partidos jugados'
			},
			tooltip: {
				formatter: function() {
					return '<b>'+ this.point.name +'</b>: '+ this.point.x +' ('+ this.y +' %)';
				}
			},
			plotOptions: {
				pie: {
					allowPointSelect: true,
					cursor: 'pointer',
					dataLabels: {
						enabled: true,
						color: '#000000',
						connectorColor: '#000000',
						formatter: function() {
							return '<b>'+ this.point.name +'</b>: '+ this.point.x +' ('+ this.y +' %)';
						}
					}
				}
			},
		    series: [{
				type: 'pie',
				name: 'Browser share',
				data: [
					{
						name: 'Ganados',    
						y: $("p#GanadosTP").text()*100,
						sliced: true,
						selected: true,
						x: $("p#Ganados").text()
					},
					{
						name: 'Perdidos',    
						y: $("p#PerdidosTP").text()*100,
						x: $("p#Perdidos").text()
					},
					{
						name: 'Empatados',    
						y: $("p#EmpatadosTP").text()*100,
						x: $("p#Empatados").text()
					}
				]
			}]
		});
		
		
	});
