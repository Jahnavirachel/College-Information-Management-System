<?php 
  if(isset($_POST['insert'])){

     try{
      $conn = new PDO("mysql:host=localhost;dbname=demo0","root","");
     }
     catch (PDOException $exc) {
      echo $exc->getMessage();
      exit ();
     }
    
     $title = $_POST['title'];
     $conference = $_POST['conference'];
     $date = $_POST['date'];
     $conducted_by = $_POST['conducted_by'];
     $presented = $_POST['presented'];
     $pres_publ = $_POST['pres_publ'];

     $pdoQuery = "INSERT INTO conference(title, conference, date, conducted_by, presented, pres_publ)
      VALUES (:title, :conference, :date, :conducted_by, :presented, :pres_publ)";

     $pdoResult = $conn->prepare($pdoQuery);

     $pdoExec = $pdoResult->execute(array(":title"=>$title, ":conference"=>$conference, 
     ":date"=>$date, ":conducted_by"=>$conducted_by, ":presented"=>$presented, ":pres_publ"=>$pres_publ));
    
   echo "<script>window.location = 'conference.html'</script>";
   }

   
 ?>