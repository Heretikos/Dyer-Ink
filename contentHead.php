
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
		
		$sql = "SELECT * FROM settings";
		$result = $conn->query($sql);
		$itemCount = $result->num_rows;
		
		if ($itemCount > 0) {
				//If it's above zero, do an SQL query then, spit that shit out with a for() loop
			while($row = $result->fetch_assoc()) {
				
				if ($row['value'] == 1) {
				?>
					
					<style type="text/css">
						.productListing, nav, #social {
							border:1px solid white;
						}
					</style>
					
				<?php	
				} else {
				?>
					
					<style type="text/css">
						.productListing, nav, #social {
							border:0px solid transparent;
						}
					</style>
					
			
				<?php
				}
			}
		} else {
			echo "I have no freaking clue";
		}
		$conn->close();
		?>