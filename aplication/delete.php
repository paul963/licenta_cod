<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		body{
			font-family: arial;
		}
		
		.alert{
			position: absolute;
			width: 100%;
			top: 0px;
			height: 55px;  
			background-color: #f2dede;
			z-index: 1;
		}

		.allert{
			padding-left: 650px;
			color: #a94442;
			font-size: 20px;
			font-weight: bold;
		}
	</style>
</head>
<body>
</body>
</html>

<?php
	$con = new mysqli("localhost", "root", "", "exemplu") or die("Nu ma pot conecta");
	$id=$_REQUEST['id'];
	$con->query("DELETE FROM vanzari WHERE id=$id") or die("Nu merge".$con->error());

	echo '<div class="alert">';
		echo '<p class="allert">Vânzarea a fost anulată!</p>';
	echo '</div>';

	header("Refresh:3; url=sale-all.php");
?>