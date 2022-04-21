<?php session_start(); ?>
<?php include "connection.php";
if (isset($_SESSION['admin'])) {
	?>



<?php 
if (isset($_GET['qno'])) {
	$qno = mysqli_real_escape_string($conn , $_GET['qno']);
	if (is_numeric($qno)) {
		$query = "SELECT * FROM questions WHERE qno = '$qno' ";
		$run = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if (mysqli_num_rows($run) > 0) {
			while ($row = mysqli_fetch_array($run)) {
				 $qno = $row['qno'];
                 $question = $row['question'];
                 $ans1 = $row['ans1'];
                 $ans2 = $row['ans2'];
                 $ans3 = $row['ans3'];
                 $ans4 = $row['ans4'];
                 $correct_answer = $row['correct_answer'];
			}
		}
		else {
			echo "<script> alert('error');
			window.location.href = 'allquestions.php'; </script>" ;
		}
	}
	else {
		header("location: allquestions.php");
	}
}

?>
<?php 
if(isset($_POST['submit'])) {
	$question =htmlentities(mysqli_real_escape_string($conn , $_POST['question']));
	$choice1 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice1']));
	$choice2 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice2']));
	$choice3 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice3']));
	$choice4 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice4']));
	$correct_answer = mysqli_real_escape_string($conn , $_POST['answer']);
    

	$query = "UPDATE questions SET question = '$question' , ans1 = '$choice1' , ans2= '$choice2' , ans3 = '$choice3' , ans4 = '$choice4' , correct_answer = '$correct_answer' WHERE qno = '$qno' ";
	$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
	if (mysqli_affected_rows($conn) > 0 ) {
		echo "<script>alert('Question successfully updated');
		window.location.href= 'allquestions.php'; </script> " ;
	}
	else {
		"<script>alert('error, try again!'); </script> " ;
	}
}

?>


<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="php echo get_template_directory_uri(); ?>/quistionnaire_meeting/assets/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/quiz.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link href="https://Tamkine.org/wp-content/uploads/2020/11/logo.png" rel="icon">
    <title>QUESTIONNAIRE</title>
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
				<a href="allquestions.php" class="start">Tout les Questionare</a>
				<a href="player.php" class="start">Les questionnaire</a>
                <a href="exit.php" class="start">Se deconecte</a>
				
			</div>
         
			</nav>
		</header>
<main>
		
	<section id="Formulaire">
	<h2> Modifier une question ...</h2>
	<fieldset>
				<form method="post" action="">

					<p>
						<label>Question</label>
						<input type="text" name="question" required="">
					</p>
					<p>
						<label>Choice 1</label>
						<input type="text" name="choice1" required="">
					</p>
					<p>
						<label>Choice 2</label>
						<input type="text" name="choice2" required="">
					</p>
					<p>
						<label>Choice 3</label>
						<input type="text" name="choice3" required="">
					</p>
					<p>
						<label>Choice 4</label>
						<input type="text" name="choice4" required="">
					</p>
					<p>
						<label>Correct answer</label>
						<select name="answer">
                        <option value="a">Choice 1 </option>
                        <option value="b">Choice 2</option>
                        <option value="c">Choice 3</option>
                        <option value="d">Choice 4</option>
                    </select>
					</p>
					
					<button type="submit" class="btn btn-danger" name="submit" id="btn-envoyer" value="Submit">Envoyer <i
                                class="fas fa-share-square"></i>
                        </button>
                        
					</form>
    </fieldset>
    </section>
	</main>
	<footer>
			<div class="container1">
				@QUESTIONNAIRE
			</div>
		</footer>				
	</body>
    
</html>








<?php } 
else {
	header("location: admin.php");
}
?>