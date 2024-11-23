<!DOCTYPE html>
<html lang="en">
	<head>
	<title>registration</title>
	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	</head>
<body>
	
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">Registration</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<form action="register_query.php" method="POST">	
				
				<hr style="border-top:1px groovy #000;">
				<div class="form-group">
					<label>Name :</label>
					<input type="text" class="form-control" name="name" />
                    </div>
				<div class="form-group">
					<label>User name :</label>
					<input type="text" class="form-control" name="username" required/>
				</div>
                <div class="form-group">
					<label>ID : </label>
					<input type="text" class="form-control" name="id" required/>
				</div>
                <div class="form-group">
					<label>Phone Number :</label>
					<input type="phone" class="form-control" name="ph_num" required/>
				</div>
                <div class="form-group">
					<label>Department :</label>
					<input type="text" class="form-control" name="dept" required/>
				</div>
				
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="pwd" />
				</div>
				<br />
				<div class="form-group">
					<button class="btn btn-primary form-control" name="register">Register</button>
				</div>
				<a href="login.php">Login</a>
			</form>
		</div>
	</div>
    </body>
</html>