<?php

$connect = new PDO("mysql:host=localhost;dbname=demo0", "root", "");

$start_date_error = '';
$end_date_error = '';

if(isset($_POST["export"]))
{
 if(empty($_POST["start_date"]))
 {
  $start_date_error = '<label class="text-danger">Start Date is required</label>';
 }
 else if(empty($_POST["end_date"]))
 {
  $end_date_error = '<label class="text-danger">End Date is required</label>';
 }
 else
 {
  $file_name = 'Paper Publication Data.csv';
  header("Content-Description: File Transfer");
  header("Content-Disposition: attachment; filename=$file_name");
  header("Content-Type: application/csv;");

  $file = fopen('php://output', 'w');

  $header = array("id", "name", "title_of_paper", "journal", "vol_no", "issn_no", "from_page_no", "to_page_no", "choose_one");

  fputcsv($file, $header);

  $query = "
  SELECT * FROM paper_publication 
  WHERE from_date >= '".$_POST["start_date"]."' 
  AND to_date <= '".$_POST["end_date"]."' 
  ORDER BY from_date DESC
  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
   $data = array();
   $data[] = $row["id"];
   $data[] = $row["name"];
   $data[] = $row["title_of_paper"];
   $data[] = $row["journal"];
   $data[] = $row["vol_no"];
   $data[] = $row["issn_no"];
   $data[] = $row["from_page_no"];
   $data[] = $row["to_page_no"];
   $data[] = $row["choose_one"];
   fputcsv($file, $data);
  }
  fclose($file);
  exit;
 }
}

$query = "
SELECT * FROM paper_publication 
ORDER BY from_date DESC;
";

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

?>


<html>
 <head>
  <title>Download Paper Publication Data</title>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
 </head>
 <body>
  <div class="container box">
   <h1 align="center">Download Paper Publication Data</h1>
   <br />
   <div class="table-responsive">
    <br />
    <div class="row">
     <form method="post">
      <div class="input-daterange">
       <div class="col-md-4">
        <input type="text" name="start_date" class="form-control" readonly />
        <?php echo $start_date_error; ?>
       </div>
       <div class="col-md-4">
        <input type="text" name="end_date" class="form-control" readonly />
        <?php echo $end_date_error; ?>
       </div>
      </div>
      <div class="col-md-2">
       <input type="submit" name="export" value="Export" class="btn btn-info" />
      </div>
     </form>
    </div>
    <br />
    <table class="table table-bordered table-striped">
     <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Title of the Paper</th>
        <th>Journal</th>
        <th>Volume Number</th>
        <th>ISSN Number</th>
        <th>Page Number</th>
        <th>Choosen one</th>
      </tr>
     </thead>
     <tbody>
      <?php
      foreach($result as $row)
      {
       echo '
       <tr>
        <td>'.$row["id"].'</td>
        <td>'.$row["name"].'</td>
        <td>'.$row["dept"].'</td>
        <td>'.$row["title_workshop"].'</td>
        <td>'.$row["type_workshop"].'</td>
        <td>'.$row["duration"].'</td>
        <td>'.$row["from_date"].'</td>
        <td>'.$row["to_date"].'</td>
        <td>$'.$row["organization"].'</td>
       </tr>
       ';
      }
      ?>
     </tbody>
    </table>
    <br />
    <br />
   </div>
  </div>
 </body>
</html>

<script>

$(document).ready(function(){
 $('.input-daterange').datepicker({
  todayBtn:'linked',
  format: "yyyy-mm-dd",
  autoclose: true
 });
});

</script>