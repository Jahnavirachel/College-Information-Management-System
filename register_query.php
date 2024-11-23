<?php
	session_start();
	require_once 'conn.php';
 
	if(ISSET($_POST['register'])){
        
        $name = $_POST['name'];
        $username = $_POST['username'];
        
        $sql = "SELECT * FROM registration WHERE username = ?";
        $query = $conn->prepare($sql);
        $query->execute([$username]);
        $result = $query->rowCount();
        if($result > 0){
            $error = "<span class='text-danger'></span";
            echo "<script>alert('User already exists !!')</script>";
            echo "<script>window.location = 'login.php'</script>";

        }

        $id = $_POST['id'];
        $ph_num = $_POST['ph_num'];
        $dept = $_POST['dept'];
        
        // md5 encrypted
        // $password = md5($_POST['password']);
        $pwd = $_POST['pwd'];

        
        //$_POST['username'] != "" || $_POST['password'] != ""
		if(empty($error)){
			try{
			
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO registration(name, username, id, ph_num, dept, pwd) VALUES (:name, :username, :id, :ph_num, :dept, :pwd)";
                $pdoResult = $conn->prepare($sql);
                $pdoExce = $pdoResult->execute(array(":name"=>$name, ":username"=>$username, ":id"=>$id, ":ph_num"=>$ph_num, ":dept"=>$dept, ":pwd"=>$pwd));

            

				//$conn->exec($sql);
			}
        
            catch(PDOException $e){
				echo $e->getMessage();
			}
			$_SESSION['message']=array("text"=>"User successfully created.","alert"=>"info");
			$conn = null;
			header('location:login.php');}
		else{
            echo "
				<script>alert('Please fill up the required field!')</script>
				<script>window.location = 'registration.php'</script>
			";
		}
	
}
?>