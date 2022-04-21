<?php
session_start();
include "connection.php";
?>
<?php
if (isset($_SESSION['id'])) {
	header("location: home.php");
}
?>
<?php
if (isset($_POST['email'])) {
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$checkmail = "SELECT * from users WHERE email = '$email'";
		$runcheck = mysqli_query($conn, $checkmail) or die(mysqli_error($conn));
		if (mysqli_num_rows($runcheck) > 0) {
			$played_on = date('Y-m-d H:i:s');
			$update = "UPDATE users SET played_on = '$played_on' WHERE email = '$email' ";
			$runupdate = mysqli_query($conn, $update) or die(mysqli_error($conn));
			$row = mysqli_fetch_array($runcheck);
			$id = $row['id'];
			$_SESSION['id'] = $id;
			$_SESSION['email'] = $row['email'];
			header("location: home.php");
		} else {
			$played_on = date('Y-m-d H:i:s');
			$query = "INSERT INTO users(email,played_on) VALUES ('$email','$played_on')";
			$run = mysqli_query($conn, $query) or die(mysqli_error($conn));
			if (mysqli_affected_rows($conn) > 0) {
				$query2 = "SELECT * FROM users WHERE email = '$email' ";
				$run2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
				if (mysqli_num_rows($run2) > 0) {
					$row = mysqli_fetch_array($run2);
					$id = $row['id'];
					$_SESSION['id'] = $id;
					$_SESSION['email'] = $row['email'];
					header("location: home.php");
				}
			} else {
				echo "<script> alert('something is wrong'); </script>";
			}
		}
	} else {
		echo "<script> alert('Invalid Email'); </script>";
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
				<a href="admin.php" class="start">Administrateur</a>

			</div>
		</nav>
	</header>

	<main>
		<div class="container1">
			<h2>QUESTIONNAIRE</h2>
			<form method="POST" action="">
				<label> <h4>Tapez votre adresse e-mail</h4>  </label> <br>
				<input type="email" name="email" required="">
				<button type="submit" name="submi" value="commencé(e)"> commencé(e) </button>

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


		</div>
	</footer>

</body>

</html>