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
     $title_of_paper = $_POST['title_of_paper'];
     $journal = $_POST['journal'];
     $vol_no = $_POST['vol_no'];
     $issn_no = $_POST['issn_no'];
     $from_page_no = $_POST['from_page_no'];
     $to_page_no = $_POST['to_page_no'];
     $choose_one = $_POST['choose_one'];
     $choose_oneArray = array('Scopus', 'Sci', 'WOS'); 
        if(isset($_POST['choose_one'])) 
        {   $values = array(); // store the selection 
            foreach($_POST['choose_one'] as $selection )
            {   if(in_array($selection, $choose_oneArray)) 
                { $values[ $selection ] = 1; } 
                else 
                { $values[ $selection ] = 0; } 
            }
         }

     $pdoQuery = "INSERT INTO paper_publication(id, name, title_of_paper, journal, vol_no, issn_no, from_page_no, to_page_no, choose_one)
      VALUES (:id, :name, :title_of_paper, :journal, :vol_no, :issn_no, :from_page_no, :to_page_no, :choose_one)";

     $pdoResult = $conn->prepare($pdoQuery);

     $pdoExec = $pdoResult->execute(array(":id"=>$id, ":name"=>$name, ":title_of_paper"=>$title_of_paper, ":journal"=>$journal,
                                          ":vol_no"=>$vol_no, ":issn_no"=>$issn_no, ":from_page_no"=>$from_page_no, 
                                          ":to_page_no"=>$to_page_no, ":choose_one"=>$choose_one));
                                                                              
   echo "<script>window.location = 'paper_publication.html'</script>";
   }

   
 ?>