
<body>
	<div id="content">
		<a href="index.php">
			<img id="logo" src="http://cumbrianrun.co.uk/wp-content/uploads/2014/02/default-placeholder.png" width="150" />
		</a>
		
		<?php 
		require "mysqlcreds.php";
		
		$dbname = "test";
		
		// Create connection
		$conn = new mysqli($servername, $dbusername, $dbpassword,$dbname);
	
		// Check connection
		if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
		} 
		
		$sql = "SELECT * FROM settings;";
		$result = $conn->query($sql);
		$itemCount = $result->num_rows;
		
		if ($row['bordersOn'] = 1) {
			echo "bordersOn!";
		}
		
		$conn->close();
		?>