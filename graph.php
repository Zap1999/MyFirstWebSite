<?php
include ("config/db.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT COUNT(*) FROM film;";
$cnt = $conn->query($sql);
$cnts = array(0, 0, 0, 0, 0, 0);
$sql = "SELECT id, category FROM film";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	switch ($row["category"]) {
		case 1:
			$cnts[0]++;
			break;
		case 2:
		$cnts[1]++;
		break;
		case 3:
		$cnts[2]++;
		break;
		case 4:
		$cnts[3]++;
		break;
		case 5:
		$cnts[4]++;
		break;
		case 6:
		$cnts[5]++;
	}
}
$maxVal = max($cnts);
?>
<!DOCTYPE html>
<head>
	<title>HTML5 Bar Graph Example</title>
</head>

<body>
	<script src="js/html5-canvas-bar-graph.js"></script>
	<link rel="stylesheet" href="style.css">
	<header>
		<div class="container">
			<div id="logo">
				<a href="index.php">
					<img src="img/logo.png" alt="Logo">
				</a>
			</div>
			<div id="menu">
				<a href="index.php">
					<div class="menu-button">
						Homepage
					</div>
				</a>
				<a href="graph.php">
					<div class="menu-button">
						Histogram
					</div>
				</a>
				<a href="moderate.php">
					<div class="menu-button">
						Moderate
					</div>
				</a>
				<a href="add-film.php">
					<div class="menu-button">
						Add film
					</div>
				</a>
			</div>
		</div>
	</header>
	<div id="graphDiv1" ></div>
	<br />
	<!--[if IE]><script src="excanvas.js"></script><![endif]-->


	<script>(function () {

		function createCanvas(divName) {

			var div = document.getElementById(divName);
			var canvas = document.createElement('canvas');
			div.appendChild(canvas);
			if (typeof G_vmlCanvasManager != 'undefined') {
				canvas = G_vmlCanvasManager.initElement(canvas);
			}
			var ctx = canvas.getContext("2d");
			return ctx;
		}

		var ctx = createCanvas("graphDiv1");

		var graph = new BarGraph(ctx);
		graph.maxValue = <?php echo $maxVal ?>;
		graph.margin = 3;
		graph.colors = ["#49a0d8", "#d353a0", "#ffc527", "#df4c27", "#01579B", "#9E9D24"];
		graph.xAxisLabelArr = ["Action", "Adventure", "Comedy", "Drama", "Fantasy", "Triller"];
		graph.update([<?php echo ($cnts[0])?>,
		<?php echo ($cnts[1])?>,
		<?php echo ($cnts[2])?>,
		<?php echo ($cnts[3])?>,
		<?php echo ($cnts[4])?>,
		<?php echo ($cnts[5])?>]);
	}());</script>
</body>
</html>
