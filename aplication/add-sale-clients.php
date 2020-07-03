<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/add_sale.css">
	<link rel="stylesheet" type="text/css" href="css/nav.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script>
	    $(document).ready(function(){
	        $('#produs').on('change', function(){
	            var productID = $(this).val();
	            if(productID){
	                $.ajax({
	                    type:'POST',
	                    url:'ajaxData.php',
	                    data:'id_produs='+productID,
	                    success:function(html){
	                        $('#model').html(html); 
	                    }
	                }); 
	            }else{
	                $('#model').html('<option>Model</option>');
	            }
	        });
	    });
	</script>

	<title>LoWi</title>
</head>

<body>
	<nav>
		<ul>
			<li><div class="sign"><a class="sign" href="sign-in.php">AUTENTIFICĂ-TE</a></div></li>
		    <li class="add"><a href="add-sale-clients.php">COMANDĂ</a></li>
			<li><a href="#">PRODUSE</a>
		        <ul class="prod">
		      	 	<li class="prod"><a href="ski-clients.php">SKI-URI</a></li>
		    	    <li class="prod"><a href="snowboard-clients.php">PLĂCI SNOWBOARD</a></li>
		    	    <li class="prod"><a href="echipamente-clients.php">ECHIPAMENTE</a></li>
		        </ul>
		    <li><a class="w" href="welcome-clients.php">ACASĂ</a></li>
			<li class="logo"><img src="img\logo_nav.png" style="margin-left: 10px; height: 50px"></li>
		    </li>
		</ul>
	</nav>

	<div class="head">
		<h1 class="add">Plasează o comandă</h1>
	</div>

	<?php  
        $con = mysqli_connect("localhost", "root", "", "exemplu") or die("Nu ma pot conecta: ".$con->connect_error); 
        $sql = "SELECT * FROM produse"; 
        $result = $con->query($sql); 
    ?>

	<div class="add_sale">
		<form method="post" action="">
			<br><br>
			<input class="cell" type="text" name="nume" id="nume" placeholder="Nume și prenume">

			<br><br>
			<input class="cell" type="number" name="telefon" id="telefon" placeholder="Telefon">

			<br><br>
		  	<select id="produs" name="produs" required>
		        <option selected disabled>Produs</option>
		        <?php
		            if($result->num_rows > 0){ 
		                while($row = $result->fetch_assoc()){  
		                    echo '<option value="'.$row['id_produs'].'">'.$row['produs'].'</option>'; 
		                } 
		            }else{ 
		                echo '<option value="">Produs not available</option>'; 
		            } 
		        ?>
		    </select>

		    <br><br>
		    <select id="model" name="model" required>
		        <option selected disabled>Model</option>
		    </select>
			
			<br><br>
			<input class="cell" type="number" name="cantitate" id="cantitate" min="0" placeholder="Bucăți" autocomplete="off" required>
			
			<br><br>
			<input class="cell" type="number" name="pret" id="pret" placeholder="Pret total" readonly>

			<br><br>
			<input class="button" type="submit" name="submit" value="COMANDĂ">
		</form>
	</div>

	<footer id="footer">
		<div id="footer-content">
		    <div id="footer-logo">
		    	<a id="foot" href="welcome-clients.php"><img src="img\logo.png"></a>
		    </div>

		    <div id="footer-about">
	    	<h1 style="color: white">Servicii</h1>
	    	<hr style="border: 1px solid #7d7d7d; width: 70px; margin-top: 10px; margin-bottom: 15px;">
	    	<a id="foot" href="help-clients.php#questions">Intrebari frecvente</a><br>
	    	<a id="foot" href="help-clients.php#guarantees">Garantii si service</a><br>
	    	<a id="foot" href="help-clients.php#transport">Transport gratuit</a><br>
	    	<a id="foot" href="help-clients.php#return">Returnare</a><br>    	
	   	</div>

		<div id="footer-contact">
	    	<h1 style="color: white">Contact</h1>
	    	<hr style="border: 1px solid #7d7d7d; width: 70px; margin-top: 10px; margin-bottom: 15px;">
	    	<p style="margin-top: 20px; font-size: 17px"><img src="img\phonee.png" style="margin-right: 5px;">+ 40 7222 222 222</p>
	    	<p style="margin-bottom: 10px; font-size: 17px"><img src="img\email.png" style="margin-right: 5px;">test.test@gmail.ro</p>
	    	<a href="https://www.facebook.com"><img src="img\facebook.png"></a> &nbsp
	        <a href="https://www.linkedin.com"><img src="img\linkedin.png"></a> &nbsp
	        <a href="https://www.instagram.com"><img src="img\instagram.png"></a> &nbsp
	        <a href="https://www.twitter.com"><img src="img\twitter.png"></a>
	    </div>
		</div>

		<hr style="border: 1px solid #7d7d7d;">
		
		<div id="copywrite">
		    <a id="foot" href="welcome-clients.php">LoWi</a> &copy; 2020 | ALL RIGHTS RESERVED
		</div>
	</footer>

	<script> 
		$(function(){
			$('#cantitate').keyup(function(){
				var cantitate = parseFloat($('#cantitate').val()) || 0;
				var price = parseFloat($('#model').val()) || 0;
				$('#pret').val(cantitate * price);
			});
		});
	</script>
</body>
</html>

<?php	 	
	if (isset($_POST['submit'])){
		$con = mysqli_connect("localhost", "root", "", "exemplu") or die("Nu ma pot conecta: ".$con->connect_error);
		
	 	$nume = $_POST['nume'];
		$telefon = $_POST['telefon'];
	 	
	 	if($_POST['produs'] == 1)
	 		$produs = 'Ski';
	 	if($_POST['produs'] == 2)
	 		$produs = 'Placa snowboard';
	 	if($_POST['produs'] == 3)
	 		$produs = 'Echipamente';

	 	$price = $_POST['model'];
	 	$sql_produs = "SELECT model FROM model WHERE pret = '$price'";
		$result_produs = $con->query($sql_produs) or die("Nu merge".$con->error);
	 	$row_produs = $result_produs->fetch_assoc();
	 	$model = $row_produs['model'];

	 	$cantitate = $_POST['cantitate'];
	 	$pret = $_POST['model'] * $cantitate;

		$sql = "INSERT INTO comenzi (nume, telefon, produs, model, cantitate, pret) values ('$nume', '$telefon', '$produs', '$model', '$cantitate', '$pret')";
		$sql_run = mysqli_query($con, $sql) or die ($con->error);

		/* if($sql_run){

			header("Refresh:3");
		} */
		
		$con->close();
	}
?>