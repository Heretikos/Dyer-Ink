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
		
		function uploadImage() {
			
		}
		
		function getAsJSON() {
			
		}
	}
	
?>