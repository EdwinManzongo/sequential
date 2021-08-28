$(document).ready(function() {
	$(document).ready(function() {
	
	// Bar Chart

	// var barChartData = {
	// 	labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
	// 	datasets: [{
	// 		label: 'Dataset 1',
	// 		backgroundColor: 'rgba(0, 158, 251, 0.5)',
	// 		borderColor: 'rgba(0, 158, 251, 1)',
	// 		borderWidth: 1,
	// 		data: [35, 59, 80, 81, 56, 55, 40]
	// 	}, {
	// 		label: 'Dataset 2',
	// 		backgroundColor: 'rgba(255, 188, 53, 0.5)',
	// 		borderColor: 'rgba(255, 188, 53, 1)',
	// 		borderWidth: 1,
	// 		data: [28, 48, 40, 19, 86, 27, 90]
	// 	}]
	// };

	// var ctx = document.getElementById('bargraph').getContext('2d');
	// window.myBar = new Chart(ctx, {
	// 	type: 'bar',
	// 	data: barChartData,
	// 	options: {
	// 		responsive: true,
	// 		legend: {
	// 			display: false,
	// 		}
	// 	}
	// });

	// Line Chart

	var lineChartData = {
		labels: ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sept","Oct","Nov","Dec"],
		datasets: [{
			label: "NL",
			borderColor: "rgba(0, 158, 251)",
			fill: false,
			data: [370, 370, 370, 370, 370, 370, 370, 370, 370, 370, 370, 370]
		}, {
			label: "BMD",
			borderColor: "rgba(238, 240, 20)",
			fill: false,
			data: [460, 460, 460, 460, 460, 460, 460, 460, 460, 460, 460, 460]
		}, {
			label: "MD",
			borderColor: "rgba(255, 0, 0)",
			fill: false,
			data: [550, 550, 550, 550, 550, 550, 550, 550, 550, 550, 550, 550]
		}, {
			label: "Actual Power",
			borderColor: "rgba(255, 188, 53, 0.5)",
			fill: false,
			data: [28, 48, 410, 19, 86, 700, 20, 90, 525, 20, 90, 20]
		}]
	};
	
	var linectx = document.getElementById('linegraph').getContext('2d');
	window.myLine = new Chart(linectx, {
		type: 'line',
		data: lineChartData,
		options: {
			responsive: true,
			title: {
				display: true,
				text: 'Usage'
			},
			legend: {
				display: true,
			},
			tooltips: {
				mode: 'index',
				intersect: true,
			}
		}
	});
	
	// Bar Chart 2
	
    // barChart();
    
    // $(window).resize(function(){
    //     barChart();
    // });
    
    // function barChart(){
    //     $('.bar-chart').find('.item-progress').each(function(){
    //         var itemProgress = $(this),
    //         itemProgressWidth = $(this).parent().width() * ($(this).data('percent') / 100);
    //         itemProgress.css('width', itemProgressWidth);
    //     });
    // };
});