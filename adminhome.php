<?php
session_start();
if (isset($_SESSION['admin'])) {
?>




	<!DOCTYPE html>
	<html>

	<head>

		<head>
			<title>QUESTIONNAIRE</title>
			<link rel="stylesheet" type="text/css" href="css/quiz.css">
			<link href="https://Tamkine.org/wp-content/uploads/2020/11/logo.png" rel="icon">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
		</head>
	</head>

	<body>
		<header>
			<nav>
				<li id="logo"><a href="#">GENERE DES QUESTIONNAIRE</a></li>
				<div class="container2">
					<a href="index.php" class="start">Accueil</a>
					<a href="add.php" class="start">Ajouter une Questionar</a>
					<a href="allquestions.php" class="start"> Tout les Questions</a>
					<a href="players.php" class="start">Utilisateur</a>
				    <a href="exit.php" class="start">Se deconecte</a>

				</div>
			</nav>
		</header>
		
         <main>
			<div class="container">
<br> <br> <br> <br> <br> <br> <br>
				<h2>Bienvenue en tant qu'administrateur</h2>

			</div>

			</main>


		<footer>

		<div id="copyrightEtIcons">
				<div id="copyright">
					<span >©questionnaire_2022</span>
				</div>
				<div id="icons">
					<a href="http://www.twitter.fr" target="_blank"><i class="fa fa-twitter "></i></a>
					<a href="http://www.facebook.fr" target="_blank"><i class="fa fa-facebook"></i></a>
					<a href="https://tamkine.org/fr/" target="_blank"><i class="fa-solid fa-user"></i></a>


				</div>
			</div>

		</footer>
	</body>

	</html>

<?php } else {
	header("location: admin.php");
}
?>