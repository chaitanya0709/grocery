<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login Form Using HTML And CSS Only</title>
    <style>
        .scontainer {
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
            width: auto;
            height: 530px;
        }

        form {
            justify-content: normal;
            background-color: transparent;
        }
        .login {
            border-radius: 20px;
            border: 1px solid #FF4B2B;
            background-color: #FF4B2B;
            color: #FFFFFF;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            text-decoration: none;
        }
        .s{
            padding: 0px 80px 0px 80px;
        }
    </style>
</head>

<body style="height: 600px;">
<div class="scontainer">
    <?php

    include 'dbConfig.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password1 = $_POST["password1"];
        $password2 = $_POST["password2"];
        $FirstName = $_POST["firstname"];
        $LastName = $_POST["lastname"];

        if ($password1 == $password2) {
            $sql = "INSERT INTO login(Email,password,FirstName,LastName) VALUES ('$email','$password1','$FirstName','$LastName')";

            if ($conn->query($sql) === TRUE) {
                echo "<b class='s' style='text-align: center'>Your account is created successfully</b>";
            } else {
                echo "<b class='s' style='text-align: center'>Someting went wrong! Please try again</b>";
            }
        } else {
            echo "<span class='s'>Passwords do NOT match</span>";
        }
    }
    ?>


    
        <form action="#" method="post">
            <img class="img1" src="img/newicon.png" alt="login png">
            <h2>Sign Up</h2>
            <input type="text" placeholder="First Name" name="firstname" required />
            <input type="text" placeholder="Last Name" name="lastname" required />
            <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Email@gmail.com" name="email" required />
            <input type="password" placeholder="Password" name="password1" required />
            <input type="password" placeholder="Retype Password" name="password2" required />
            <br>
            <div><button>SIGN UP</button> <a class="login" href="index.php">LOG IN<a>
            </div>
        </form>

    </div>
</body>

</html>
