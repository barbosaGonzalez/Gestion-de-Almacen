		<script src="js/jquery-1.7.2.min.js"></script>
		<script src="js/excanvas.min.js"></script>
		<script src="js/chart.min.js" type="text/javascript"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/base.js"></script>
		<script>
			var pieData = 
			[
				{
				    value: 30,
				    color: "#F38630"
				},
				{
				    value: 50,
				    color: "#E0E4CC"
				},
				{
				    value: 100,
				    color: "#69D2E7"
				}
			];
			var myPie = new Chart(document.getElementById("pie-chart").getContext("2d")).Pie(pieData);
			var barChartData = 
			{
				labels: ["January", "February", "March", "April", "May", "June", "July"],
				datasets: 
				[
					{
						fillColor: "rgba(220,220,220,0.5)",
						strokeColor: "rgba(220,220,220,1)",
						data: [65, 59, 90, 81, 56, 55, 40]
					},
					{
						fillColor: "rgba(151,187,205,0.5)",
						strokeColor: "rgba(151,187,205,1)",
						data: [28, 48, 40, 19, 96, 27, 100]
					}
				]
			}
			var myLine = new Chart(document.getElementById("bar-chart").getContext("2d")).Bar(barChartData);
			var myLine = new Chart(document.getElementById("bar-chart1").getContext("2d")).Bar(barChartData);
			var myLine = new Chart(document.getElementById("bar-chart2").getContext("2d")).Bar(barChartData);
			var myLine = new Chart(document.getElementById("bar-chart3").getContext("2d")).Bar(barChartData);
		</script>
	</body>
</html>
