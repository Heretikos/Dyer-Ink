<?php
	
	class InventoryItem {
		
		//declare properties
		protected $name;
		protected $price;
		protected $tags = [];
		protected $imageURL;
		protected $category;
		protected $published;
		
		function __construct($name,$price,$image,$inDB,$category,$published) {
			$this->name = $name;
			$this->price = $price;
			$this->image = $image;
			$this->category = $category;
			$this->published = $published;
			
			//if the image being passed hasn't already been added to the database (indicated by the 'in database' flag)
			//add it to the database
			if(!$inDB) {
				uploadImage();
			}
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