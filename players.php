<?php session_start(); ?>
<?php include "connection.php";
if (isset($_SESSION['admin'])) {
?>
	<!DOCTYPE html>
	<html>

	<head>
		<title>QUESTIONNAIRE</title>
		<link rel="stylesheet" type="text/css" href="css/quiz.css">
		<link rel="stylesheet" type="text/css" href="css/style1.css">
		<link href="https://Tamkine.org/wp-content/uploads/2020/11/logo.png" rel="icon">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	</head>

	<body>
		<header>
			<nav>
				<ul>
					<li id="logo"><a href="#">GENERE DES QUESTIONNAIRE</a></li>
				</ul>
				<div class="container2">
					<a href="index.php" class="start">Accueil</a>
					<a href="add.php" class="start">Ajouter une Questionar</a>
					<a href="allquestions.php" class="start">Tout les Questions</a>
					<a href="players.php" class="start">Utilisateur</a>
					<a href="exit.php" class="start">Se deconecte</a>

				</div>
			</nav>
			<div id="home">
				<h2>Utilisateur</h2>

			</div>
		</header>



		<table class="data-table">

			<thead>
				<tr>
					<th>Utilisateur-Id</th>
					<th>Email</th>
					<th> Date-TEMPS</th>
					<th>POINT-OBTENU</th>
				</tr>
			</thead>
			<tbody>
				<?php

				$query = "SELECT * FROM users ORDER BY played_on DESC";
				$select_players = mysqli_query($conn, $query) or die(mysqli_error($conn));
				if (mysqli_num_rows($select_players) > 0) {
					while ($row = mysqli_fetch_array($select_players)) {
						$id = $row['id'];
						$email = $row['email'];
						$played_on = $row['played_on'];
						$score = $row['score'];
						echo "<tr>";
						echo "<td>$id</td>";
						echo "<td>$email</td>";
						echo "<td>$played_on</td>";
						echo "<td>$score</td>";

						echo "</tr>";
					}
				}
				?>

			</tbody>

		</table>
	</body>

	</html>

<?php } else {
	header("location: admin.php");
}
?>