<?php 
include './dbConfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = 1;
    $qty = $_POST["qty"];
    $ID = $_POST["ID"];

    if($conn->query("select itemID from cart where itemID=$ID")->num_rows == 0){
        if ($conn->query("insert into cart values($userID,$qty,$ID)") === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Someting went wrong";
        }
    }
    else{
        echo "<h1>Sorry beradar</h1>";
    }
    header("location:UserDashbord.php");
}
?>