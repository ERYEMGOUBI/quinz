<?php 
session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
$query = "SELECT * FROM questions";
$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
$total = mysqli_num_rows($run);
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

		    
			<div class="container1">
			
				<h2> QUINZ</h2>
				<form action="">
				<p>Vous pouvez commencer maintenant votre quinz!!</p>
				<blockquote>
				<ul>
					
				    
				    <li><strong>Type: </strong>Choix multiple</li> <br>
				    <li><strong>Estimated time for each question: </strong><?php echo $total * 0.05 * 60; ?> seconds</li> <br>
				     <li> &nbsp; +1 point pour chaque bonne réponse</li>
				</ul>
				</blockquote> </form>
				<a href="question.php?n=1" class="start">Démarrer le questionnaire</a>
				<a href="exit.php" class="add">deconecte</a>
				
			</div>
			</div>
			</main>
		

		<footer>
			<div class="container1">
			<h3 id="contact">Nous_contacter</h2>
         <form   action="connect.php" method="post"    > <br>
            <input placeholder="Nom"  required name="Name" > <br>
           <input placeholder="E-mail" required  name="Email">  <br>
           <textarea placeholder=" Message  " required name="Your"></textarea> <br>
           <button type="submit" name="Send">Envoyer</button>
         </form>
			</div>
			
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

	</body>
	</footer>
</html>




<?php unset($_SESSION['score']); ?>
<?php }
else {
	header("location: index.php");
}
?>