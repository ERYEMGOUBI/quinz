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

	<body >
		<header>
		<nav>
            <ul>
                <li id="logo"><a href="#">GENERE DES QUESTIONNAIRE</a></li>  
            </ul>
        
			<div class="container2">
	
				<a href="index.php" class="start">Accueil</a>
                <a href="add.php" class="start">Ajouter une Questionar</a>
				<a href="allquestions.php" class="start"> Tout les Questions</a>
				<a href="players.php" class="start">Utilisateur</a>
				<a href="exit.php" class="start">Se deconecte</a>
				
			</div>
			</nav>
			<div id="home">
            <h2> TOUT LES QUESTIONNAIRES</h2>
            
        </div>
		</header>

	
	
	<table class="data-table">
	
		
		<thead>
			<tr>
				<th>Q.NO</th>
				<th>Question</th>
				<th>Option1</th>
				<th>Option2</th>
				<th>Option3</th>
				<th>Option4</th>
				<th>Bonne reponse </th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
		</thead>
		<tbody>
        
        <?php 
            
            $query = "SELECT * FROM questions ORDER BY qno DESC";
            $select_questions = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($select_questions) > 0 ) {
            while ($row = mysqli_fetch_array($select_questions)) {
                $qno = $row['qno'];
                $question = $row['question'];
                $option1 = $row['ans1'];
                $option2 = $row['ans2'];
                $option3 = $row['ans3'];
                $option4 = $row['ans4'];
                $Answer = $row['correct_answer'];
                echo "<tr>";
                echo "<td>$qno</td>";
                echo "<td>$question</td>";
                echo "<td>$option1</td>";
                echo "<td>$option2</td>";
                echo "<td>$option3</td>";
                echo "<td>$option4</td>";
                echo "<td>$Answer</td>";
				
                echo "<td> <a href='editquestion.php? qno=$qno'>Modifier  </a></td>";
				echo "<td > <a href='deletequestion.php? qno=$qno'>Supprimer </a></td>";
				
              
                echo "</tr>";
             }
         }
        ?>
	
		</tbody>
		
	</table>
	

</body>
</html>

<?php }
else {
	header("location: admin.php");
}
?>


