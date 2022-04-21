<?php 
session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
	
	if (isset($_GET['n']) && is_numeric($_GET['n'])) {
	        $qno = $_GET['n'];
	        if ($qno == 1) {
	        	$_SESSION['quiz'] = 1;
	        }
	        }
	        else {
	        	header('location: question.php?n='.$_SESSION['quiz']);
	        } 
	        if (isset($_SESSION['quiz']) && $_SESSION['quiz'] == $qno) {
			$query = "SELECT * FROM questions WHERE qno = '$qno'" ;
			$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
			if (mysqli_num_rows($run) > 0) {
				$row = mysqli_fetch_array($run);
				$qno = $row['qno'];
                 $question = $row['question'];
                 $ans1 = $row['ans1'];
                 $ans2 = $row['ans2'];
                 $ans3 = $row['ans3'];
                 $ans4 = $row['ans4'];
                 $correct_answer = $row['correct_answer'];
                 $_SESSION['quiz'] = $qno;
                 $checkqsn = "SELECT * FROM questions" ;
                 $runcheck = mysqli_query($conn , $checkqsn) or die(mysqli_error($conn));
                 $countqsn = mysqli_num_rows($runcheck);
                 $time = time();
                 $_SESSION['start_time'] = $time;
                 $allowed_time = $countqsn * 0.05;
                 $_SESSION['time_up'] = $_SESSION['start_time'] + ($allowed_time * 60) ;
                 

			}
			else {
				echo "<script> alert('something went wrong');
			window.location.href = 'home.php'; </script> " ;
			}
		}
		else {
		echo "<script> alert('error');
			window.location.href = 'home.php'; </script> " ;
	}
?>
<?php 
$total = "SELECT * FROM questions ";
$run = mysqli_query($conn , $total) or die(mysqli_error($conn));
$totalqn = mysqli_num_rows($run);

?>
<html>
	<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link href="https://Tamkine.org/wp-content/uploads/2020/11/logo.png" rel="icon">
	<link rel="stylesheet" type="text/css" href="css/quiz.css">
    <title>QUESTIONNAIRE</title>
	</head>

	<body>
		<header>
		<nav>
		<li id="logo"><a href="#">GENERE DES QUESTIONNAIRE</a></li>
			
		</nav>
		<div id="home">
            <h2>QUESTIONNAIRE</h2>
            
        </div>
		</header>

		<main>
			<div class= "container1">
				<div class= "current">Question <?php echo $qno; ?> of <?php echo $totalqn; ?></div>
				<p class="question"><?php echo $question; ?></p>
				<form method="post" action="process.php">
				<select id="type-qtn" class="form-control type-qtn_1" position="1">
        
                            <option>Choix multiple</option>
                            <option>Case à cocher</option>
                        </select><br>
                        
						<br>
						
			 <!----------------choix_multiple--------------->
			             <div id="qtn_choix_multiple_1" class="qtn_choix_multiple" position="1">
                         <div class="form-group">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dynamic_field_choix_multiple_1">
                                        <tr>
											
                                            <td class="img-item" >
                                            <ul class="choices">
					                        <li><input name="choice" type="radio" value="a" required=""><?php echo $ans1; ?></li> 
					                        <li><input name="choice" type="radio" value="b" required=""><?php echo $ans2; ?></li>
					                        <li><input name="choice" type="radio" value="c" required=""><?php echo $ans3; ?></li> 
					                        <li><input name="choice" type="radio" value="d" required=""><?php echo $ans4; ?></li> 
					                        
					</ul>
                                    </table>
                                </div>
                            </div>
                        
                                    </table>
                                </div>
                            </div>
                        </div>


					<button type="submit" value="Submit"> Suivant </button>  
					<input type="hidden" name="number" value="<?php echo $qno;?>">
					<br>
					<br>
					<a href="index.php" class="start"> Arrêt</a>
				</form>
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
<!-----My script----->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script>
    jQuery(document).ready(function ($) {
        $(document).on('change', '#type-qtn', function (event) {
            var position = $(this).attr("position");
            var type = $(this).children("option:selected").val();
           
            var qtn_choix_multiple = document.getElementById('qtn_choix_multiple_' + position);
            var qtn_case_cocher = document.getElementById('qtn_case_cocher_' + position);
            
            if (type == "Choix multiple") {
                qtn_choix_multiple.style.display = "block";
                
                qtn_case_cocher.style.display = "none";
            }
            else if (type == "Case à cocher") {
                qtn_case_cocher.style.display = "block";
                
                qtn_choix_multiple.style.display = "none";
            }

        });

       
        });//fin event

       

</script>
</html>

<?php } 
else {
	header("location: home.php");
}
?>