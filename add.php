<?php session_start(); ?>
<?php include "connection.php";
if (isset($_SESSION['admin'])) {

if(isset($_POST['submit'])) {
	$question =htmlentities(mysqli_real_escape_string($conn , $_POST['question']));
	$choice1 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice1']));
	$choice2 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice2']));
	$choice3 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice3']));
	$choice4 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice4']));
	$correct_answer = mysqli_real_escape_string($conn , $_POST['answer']);


    $checkqsn = "SELECT * FROM questions";
	$runcheck = mysqli_query($conn , $checkqsn) or die(mysqli_error($conn));
	$qno = mysqli_num_rows($runcheck) + 1;

	$query = "INSERT INTO questions(qno, question , ans1, ans2, ans3, ans4, correct_answer) VALUES ('$qno' , '$question' , '$choice1' , '$choice2' , '$choice3' , '$choice4' , '$correct_answer') " ;
	$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
	if (mysqli_affected_rows($conn) > 0 ) {
		echo "<script>alert('Question successfully added'); </script> " ;
	}
	else {
		"<script>alert('error, try again!'); </script> " ;
	}
}

?>


<!DOCTYPE html>
<html lang="en">

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
                <div class="container2">
                <a href="index.php" class="start">Accueil</a>
                <a href="add.php" class="start">Ajouter une Questionar</a>
				<a href="allquestions.php" class="start"> Tout les Questions</a>
				<a href="players.php" class="start">Utilisateur</a>
				<a href="exit.php" class="start">Se deconecte</a>
				
			</div>
            </ul>
        </nav>
        <div id="home">
            <h2>QUESTIONNAIRE</h2>
            
        </div>
    </header>
	<main>

	
				<form method="post" action="">
				<h3>Ajouter une question ...</h3>

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


<?php } 
else {
	header("location: admin.php");
}
?>