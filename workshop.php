<?php 
  if(isset($_POST['insert'])){
     try{
      $conn = new PDO("mysql:host=localhost;dbname=demo0","root","");
     }
     catch (PDOException $exc) {
      echo $exc->getMessage();
      exit ();
     }
    
     $id = $_POST['id'];
     $name = $_POST['name'];
     $dept = $_POST['dept'];
     $title_workshop = $_POST['title_workshop'];
     $type_workshop = $_POST['type_workshop'];
     $duration = $_POST['duration'];
     $from_date = $_POST['from_date'];
     $to_date = $_POST['to_date'];
     $organization = $_POST['organization'];

     $pdoQuery = "INSERT INTO workshop(id, name, dept, title_workshop, type_workshop, duration, from_date, to_date, organization)
      VALUES (:id, :name, :dept, :title_workshop, :type_workshop, :duration, :from_date, :to_date, :organization)";

     $pdoResult = $conn->prepare($pdoQuery);

     $pdoExec = $pdoResult->execute(array(":id"=>$id, ":name"=>$name, ":dept"=>$dept, ":title_workshop"=>$title_workshop, ":type_workshop"=>$type_workshop, ":duration"=>$duration, ":from_date"=>$from_date, ":to_date"=>$to_date, ":organization"=>$organization));
    
   echo "<script>window.location = 'workshop.html'</script>";
   }

   
 ?>