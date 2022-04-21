<?php 
session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
	?>
	<?php if(!isset($_SESSION['score'])) {
		header("location: question.php?n=1");
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
            <ul>
                <li id="logo"><a href="#">GENERE DES QUESTIONNAIRE</a></li>  
            </ul>
        </nav>
		</header>

		<main>
			<div class= "container1">
			<h2>Felicitation</h2> 
				<p>Vous avez réussi le test avec </p>
				<p>Total  de points: <?php if (isset($_SESSION['score'])) {
echo $_SESSION['score']; 
}; ?> </p>
		<a href="question.php?n=1" class="start">Recommencer</a>
		<a href="index.php" class="start">Aller à la page d'accueil</a>
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

		<?php 
		$score = $_SESSION['score'];
		$email = $_SESSION['email'];
		$query = "UPDATE users SET score = '$score' WHERE email = '$email'";
		$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
 		?>


<?php unset($_SESSION['score']); ?>
<?php unset($_SESSION['time_up']); ?>
<?php unset($_SESSION['start_time']); ?>
<?php }
else {
	header("location: index.php");
}
?>

