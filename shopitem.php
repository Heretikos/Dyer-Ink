<html>
	<head>
		<title>The Shark Shop</title>
		<link rel="stylesheet" href="style.css" />
	</head>
		   <?php include "contentHead.php"; ?>
		   <h1>Dyer Ink</h1>
			<?php include "nav.php"; include "social.php" ?>
			<article>
				
				
				<?php 
					require "mysqlcreds.php";
					
					$dbname = "test";
					
					// Create connection
					$conn = new mysqli($servername, $dbusername, $dbpassword,$dbname);
				
					// Check connection
					if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
					} 
					
					$sql = "SELECT * FROM inventory WHERE id=" . $_GET['id'] . ";";
					$result = $conn->query($sql);
					$itemCount = $result->num_rows;
					
					if ($itemCount > 0) {
							//If it's above zero, do an SQL query then, spit that shit out with a for() loop
							while($row = $result->fetch_assoc()) {
								
								?>
				<div id="imageDisplay" class="productListing">
					<img id="mainProductImage" width="320" src="<?php echo $row['imageURL']; ?>" />
					<br />
					<img class="productImage" width="100" src="http://cumbrianrun.co.uk/wp-content/uploads/2014/02/default-placeholder.png" />
					<img class="productImage" width="100" src="http://cumbrianrun.co.uk/wp-content/uploads/2014/02/default-placeholder.png" />
					<img class="productImage" width="100" src="http://cumbrianrun.co.uk/wp-content/uploads/2014/02/default-placeholder.png" />
				</div>
				<div id="purchaseArea" class="productListing">
					Price: <span class="price">$<?php echo $row['price']; ?></span><br />
					<button>Add to Cart</button>
				</div>
				<?php
								}
					} else {
							//if it's zero, echo "there's nothing in your inventory, click above to add an item!"
							echo "<h2>Sorry, it looks like that link was bad, or the item has been removed...</h2>";
					}
					$conn->close();
				?>
			</article>
			
			
			
			

<?php include "footer.php"; ?>