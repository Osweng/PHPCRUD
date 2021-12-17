<?php 
    include 'conn.php';
	session_start();

        if (isset($_POST['submit'])) {
	        $username = $_POST['username'];
	        $password = $_POST['password'];
			$usertype = $_POST['usertype'];

	    $sql_query = "SELECT * FROM login WHERE username='".$username."' AND password='".$password."' ";
            $result = mysqli_query($conn, $sql_query);

			if(mysqli_num_rows($result) >0){

				while($row = mysqli_fetch_assoc($result)) 
				{
					if($row["usertype"] == "admin"){
						?>
						<script>alert('Logged in as Admin!');</script>
						<script type="text/javascript">window.location.href="read.php"</script>
						<?php
					}
					else{
						?>
						<script>alert('Logged in as Student!');</script>
						<script type="text/javascript">window.location.href="view.php"</script>
						<?php 
					}
				}
			}
			else{
				?><script>alert('Wrong Username or Password')</script><?php
			}				
		}
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="box">
		<form action="" method="POST" class="login">
		<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input">
				<input type="username" placeholder="Username" name="username" required>
			</div>
			<div class="input">
				<input type="password" placeholder="Password" name="password"  required>
			</div>
			<div class="input">
				<button class="btn" type="submit" name="submit">Login</button>
			</div>
			<div class="input">
				<input type="hidden" name="usertype" value="">
			</div>
			
		</form>
	</div>
</body>
</html>