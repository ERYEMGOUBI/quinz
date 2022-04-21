<?php
  
 include 'connection.php';  
 if (isset($_GET['qno'])) {  
      $qno = $_GET['qno'];  
      $query = "DELETE FROM `questions` WHERE qno = '$qno'";  
      $run = mysqli_query($conn,$query);  
      if ($run) {  
           header('location:allquestions.php');  
      }else{  
           echo "Error: ".mysqli_error($conn);  
      }  
 }  
 ?>






