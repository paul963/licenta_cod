<!-- Verifica cine este conectat si te duce la pgina principala cu ala conectat -->
<?php
	$con = mysqli_connect("localhost", "root", "", "exemplu") or die("Nu ma pot conecta: ".$con->connect_error);

	session_start();

	$user_check = $_SESSION['login_user'];
	$query = "SELECT nume, prenume, email from cont where email = '$user_check'";
	$ses_sql = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($ses_sql);
	$login_session_prenume = $row['prenume'];
	$login_session_email = $row['email'];
	$login_session_agent = $row['nume']." ".$row['prenume'];
?>