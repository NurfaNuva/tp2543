<!DOCTYPE html>
<html>
<head>
	<title>Week 9 Lab Deliverables</title>
	<style>
		body{
			background: linear-gradient(#a8ff78, #78ffd6);
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
		}
		h1{
			text-shadow: 2px 2px 5px #dee2e6; 
			font-size: 50px;
			color: #ffffff;
		}
		.frame {
			width: 90%;
			margin: 40px auto;
			text-align: center;
		}
		button {
			margin: 20px;
		}
		.custom-btn {
			font-size: 30px;
			width: 350px;
			height: 150px;
			color: #fff;
			border-radius: 5px;
			padding: 10px 25px;
			font-family: 'Lato', sans-serif;
			font-weight: 500;
			background: transparent;
			cursor: pointer;
			transition: all 0.3s ease;
			position: relative;
			display: inline-block;
			box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
			7px 7px 20px 0px rgba(0,0,0,.1),
			4px 4px 5px 0px rgba(0,0,0,.1);
			outline: none;
		}

		/* button effect */
		.btn-13 {
			background-color: #89d8d3;
			background-image: linear-gradient(315deg, #89d8d3 0%, #03c8a8 74%);
			border: none;
			z-index: 1;
		}
		.btn-13:after {
			position: absolute;
			content: "";
			width: 100%;
			height: 0;
			bottom: 0;
			left: 0;
			z-index: -1;
			border-radius: 5px;
			background-color: #4dccc6;
			background-image: linear-gradient(315deg, #4dccc6 0%, #96e4df 74%);
			box-shadow:
			-7px -7px 20px 0px #fff9,
			-4px -4px 5px 0px #fff9,
			7px 7px 20px 0px #0002,
			4px 4px 5px 0px #0001;
			transition: all 0.3s ease;
		}
		.btn-13:hover {
			color: #fff;
		}
		.btn-13:hover:after {
			top: 0;
			height: 100%;
		}
		.btn-13:active {
			top: 2px;
		}
	</style>
</head>
<body>
	<h1 align="center">Week 9 Lab</h1>
	<div class="frame">
		<a href="bio_form.php" style="text-decoration: none;"><button class="custom-btn btn-13">Bio Form CSS</button></a>
		<a href="content.php" style="text-decoration: none;"><button class="custom-btn btn-13">CSS Styling</button></a>
	</div>
</body>
</html>