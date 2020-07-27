// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily =
	'-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = "#292b2c";

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
	type: "bar",
	data: {
		labels: ["November", "December", "January", "February", "March", "April"],
		datasets: [
			{
				label: "Thu",
				backgroundColor: "rgba(2,117,216,1)",
				borderColor: "rgba(2,117,216,1)",
				data: [27.8, 30, 28.1, 28.9, 26.9, 28],
			},
			{
				label: "Chi",
				backgroundColor: "red",
				borderColor: "rgba(2,117,216,1)",
				data: [17.8, 20, 18.1, 18.9, 16.9, 18],
			},
		],
	},
	options: {
		scales: {
			xAxes: [
				{
					time: {
						unit: "month",
					},
					gridLines: {
						display: false,
					},
					ticks: {
						maxTicksLimit: 6,
					},
				},
			],
			yAxes: [
				{
					ticks: {
						min: 0,
						max: 35,
						maxTicksLimit: 5,
					},
					gridLines: {
						display: true,
					},
				},
			],
		},
		legend: {
			display: true,
		},
	},
});
