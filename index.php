<?php

include 'dbConfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM login where Email='".$username."' AND password='".$password."';";
    $result = $conn->query($sql);
    
    $usertype = "";
    if ($result->num_rows > 0) {
    
        while ($row = $result->fetch_assoc()) {

            $usertype = $row["usertype"];
        }
    }

    if($usertype=="user"){
        //  echo "user";
        header("location:UserDashbord.php");
    }
    else if($usertype=="admin"){
        // echo "admin";
        header("location:AdminDashbord.php");

    }
    else{
        echo "Username or Password incorrect";
    }
    

}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Login Form Using HTML And CSS Only</title>
</head>
<body>
	<div class="container" id="container">
		<div class="form-container log-in-container">
			<form action="#" method="post">
				<img class="img1" src="img/newicon.png" alt="login png">
                <h1>Login</h1>
				<input type="text" placeholder="Email@gmail.com" name="email" required/>
				<input type="password" placeholder="Password" name="password" required/>
                <br>
                <br>
				<button>LOG IN</button>
                <P>Do not have account? <a style="text-decoration: underline; color: #FF4B2B; cursor:pointer;" href="SignUp.php">Sign Up</a></P>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<img class="img2" src="img/bag3.png" alt="">
					<h1>Grocery Store</h1>
					<p>where you get the fresh vegetables and much more at reasonable price hurry up</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
