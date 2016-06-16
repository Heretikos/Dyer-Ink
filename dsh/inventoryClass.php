<?php
	
	class InventoryItem {
		
		//declare properties
		protected $name;
		protected $price;
		//protected $tags = [];
		protected $imageURL;
		protected $category;
		protected $published;
		
		function __construct($name,$price,$description,$image,$inDB,$category,$published) {
			$this->name = $name;
			$this->price = $price;
			$this->description = $description;
			$this->image = $image;
			$this->category = $category;
			$this->published = $published;
			
			//if the image being passed hasn't already been added to the database (indicated by the 'in database' flag)
			//add it to the database
			if(!$inDB) {
				uploadImage();
			}
		}
		
		function addToDB() {
			require "adminmysqlcreds.php";
			
			$dbname = "test";
			
			// Create connection
			$conn = new mysqli($servername, $dbusername, $dbpassword,$dbname);
		
			// Check connection
			if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
			} 
			$sql = "INSERT INTO inventory (name,price,description,imageURL,category,published) VALUES ('" . $this->name . "','" . $this->price. "','" . $this->description. "','" . $this->image. "','" . $this->category. "','" . $this->published . "');";
			if ($conn->query($sql) === TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			
			$conn->close();
		}
		
		function publish() {
			$this->published = true;
		}
		
		function unpublish() {
			$this->published = false;
		}
		
		function update() {
			if(!$_POST['itemName'] == $this->name) {
				setName();
			}
			
			if(!$_POST['itemPrice'] == $this->price) {
				setPrice();
			}
			
			if(!$_POST['itemCategory'] == $this->category) {
				setName();
			}
		}
		
		function uploadImage() {
			$uploaddir = 'invImages/';
			$uploadfile = $uploaddir . basename($_FILES['invImg']['name']);
			
			
			if (move_uploaded_file($_FILES['invImg']['tmp_name'], $uploadfile)) {
				echo "File was successfully uploaded.\n";
			} else {
				echo "something got broken!";
			}
		}
		
		function getAsJSON() {
			
		}
	}
	
?>