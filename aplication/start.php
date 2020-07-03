<!-- Verfica daca exista emailul si parola si te trimite la prima pagina. Daca e cineva direct conectat te trimite fara log in -->
<?php
	echo '<link rel="stylesheet" type="text/css" href="css/sign-in.css">';

	session_start();

	if (isset($_POST['submit'])){
		$email = $_POST['email'];
		$parola = md5($_POST['parola']);
		
		$con = mysqli_connect("localhost", "root", "", "exemplu") or die("Nu ma pot conecta: ".$con->connect_error);

		$query = "SELECT email, parola from cont where email=? AND parola=? LIMIT 1";
		$stmt = $con->prepare($query);
		$stmt->bind_param("ss", $email, $parola);
		$stmt->execute();
		$stmt->bind_result($email, $parola);
		$stmt->store_result();
		if($stmt->fetch()){
			$_SESSION['login_user'] = $email;

			echo '<div class="s_alert">';
				echo '<p class="s_allert">Autentificare reușită!</p>';
			echo '</div>';
		}
		else{
			echo '<div class="d_alert">';
				echo '<p class="d_allert">Email sau parolă incorecte!</p>';
			echo '</div>';
			header("Refresh:3; url=sign-in.php");
		}
		$con->close();	
	}
?>