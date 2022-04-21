<?php
session_start();
include "connection.php";
if (isset($_SESSION['admin'])) {
	header("location: adminhome.php");
}
if (isset($_POST['password']))  {
	$password = mysqli_real_escape_string($conn , $_POST['password']);
	$adminpass = '$2y$10$8WkSLFcoaqhJUJoqjg3K8eWixJWswsICf7FTxehKmx8hpmIKYWqju';
	if (password_verify($password , $adminpass)) {
		$_SESSION['admin'] = "active";
		header("Location: adminhome.php");
	}
	else {
		echo  "<script> alert('wrong password');</script>";
	}
}


?>



<html>
	<head>
	<title>QUESTIONNAIRE</title>
		<link rel="stylesheet" type="text/css" href="css/quiz.css">
		<link href="https://Tamkine.org/wp-content/uploads/2020/11/logo.png" rel="icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	</head>

	<body>
		<header>
		<nav>
		<li id="logo"><a href="#">GENERE DES QUESTIONNAIRE</a></li>
			<div class="container2">
				<a href="index.php" class="start">Accueil</a>
				

			</div>
			</nav>
		</header>

		<main >
		<div class="container1">
				<h2>QUESTIONNAIRE</h2>
				<form method="POST" action="">
                 <label> <h3> Enter le Mot de passe </h3></label> <br>   
				<input type="password" name="password" required="" >
				 
				<button type="submit" name="submi" value="Envoyer">Envoyer</button>

			</div>


		</main>

		<footer>
		
			<div id="copyrightEtIcons">
				<div id="copyright">
					<span>©questionnaire_2022</span>
				</div>
				<div id="icons">
					<a href="http://www.twitter.fr" target="_blank"><i class="fa fa-twitter "></i></a>
					<a href="http://www.facebook.fr" target="_blank"><i class="fa fa-facebook"></i></a>
					<a href="https://tamkine.org/fr/" target="_blank"><i class="fa-solid fa-user"></i></a>


				</div>
			</div>


		</div>
		</footer>

	</body>
</html>