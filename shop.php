<html>
	<head>
		<title>The Shark Shop</title>
		<link rel="stylesheet" href="style.css" />
	</head>
		   <?php include "contentHead.php"; ?>
		   <h1>The Shark Shop</h1>
			<?php include "nav.php"; include "social.php" ?>
			<article>
				<?php 
					require "mysqlcreds.php";
					
					$dbname = "tsubasag_DI_inventory";
					
					// Create connection
					$conn = new mysqli($servername, $dbusername, $dbpassword,$dbname);
				
					// Check connection
					if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
					} 
					
					$sql = "SELECT * FROM inventory";
					$result = $conn->query($sql);
					$itemCount = $result->num_rows;
					
					if ($itemCount > 0) {
							//If it's above zero, do an SQL query then, spit that shit out with a for() loop
							while($row = $result->fetch_assoc()) {
								//div, image with class that makes it float left, h2 with item name, p with details
								echo "<div class='shopItem'><img src='" . $row['imageURL'] . "' width='250' /><h3>" . $row["name"] . "</h3><p>" . $row['description'] . "</p>";
								
								
								echo "</div>";
								}
					} else {
							//if it's zero, echo "there's nothing in your inventory, click above to add an item!"
							echo "<h2>Sorry, it looks like there's nothing available in the shop yet :(</h2>";
					}
					$conn->close();
				?>
			</article>
			
			

<?php include "footer.php"; ?>