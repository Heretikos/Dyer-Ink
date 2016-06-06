
<html>
	<head>
		<title><?php echo $title ?></title>
		<link href='https://fonts.googleapis.com/css?family=Wire+One' rel='stylesheet' type='text/css'>
		<meta name="viewport" content="width=70%; initial-scale=1.0" />
		<style type="text/css">
			html { 
			  background: url("http://www.superedo.net/fond-ecran/fond-ecran/Google%20Nexus/Google%20Nexus%205/google_nexus_5_088.jpg") no-repeat center center fixed; 
			  -webkit-background-size: cover;
			  -moz-background-size: cover;
			  -o-background-size: cover;
			  background-size: cover;
			  
			  font-family: 'Wire One', sans-serif;
			}
			form {
				width: 500px;
				margin: auto;
				margin-top:15%;
				text-align:right;
			}
			input {
				border:1px solid white;
				background-color:transparent;
				color:white;
				padding:10px;
				margin:15px;
				font-size:1.7em;
			}
			input[type=submit] {
				padding:10px 32px;
			}
			.error {
				color:red;
				font-size:1.45em;
				text-align:center;
				margin:auto;
				font-weight:bold;
			}
			h1 {
				text-align:center;
			}
			h2 {
				color:lime-green;
				font-size:0.7em;
			}
			
			<?php 
				if($adminLoggedIn) {
					
				?>
				
				#logoutButton {
					position:absolute;
					top:10px;
					right:10px;
					text-decoration:none;
					padding:10px 30px;
					border:1px solid white;
					border-radius:3px;
					color:white;
					font-size:2em;
					font-weight:bold;
				}
				
				.adminNavigation {
					margin:auto;
					text-align:center;
					width: 60%;
					margin-top:10%;
				}
				
				.adminNavButton {
					padding:30px;
					margin: 15px;
					border:1px solid white;
					border-radius:10px;
					display:inline-block;
					color:white;
					font-size:2em;
					background-color:rgba(0,0,0,0.3);
				}
				.adminNavButton a {
					color:white;
					text-decoration:none;
				}
				/* Rules for sizing the icon. */
				.material-icons.md-18 { font-size: 18px; }
				.material-icons.md-24 { font-size: 24px; }
				.material-icons.md-36 { font-size: 36px; }
				.material-icons.md-48 { font-size: 48px; }
				.material-icons.md-max { font-size: 158px;}
				
				/* Rules for using icons as black on a light background. */
				.material-icons.md-dark { color: rgba(0, 0, 0, 0.54); }
				.material-icons.md-dark.md-inactive { color: rgba(0, 0, 0, 0.26); }
				
				/* Rules for using icons as white on a dark background. */
				.material-icons.md-light { color: rgba(255, 255, 255, 1); }
				.material-icons.md-light.md-inactive { color: rgba(255, 255, 255, 0.3); }
				<?php
					
				}
			?>
		</style>
	</head>
	<body>