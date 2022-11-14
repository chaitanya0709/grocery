<?php
   if( $_GET["ID"]) {
    $ID = $_GET["ID"];
    include 'dbConfig.php';
    if($conn->query("delete from cart where itemID=$ID") === TRUE){
        header("location:Cart.php");
    }
    header("location:Cart.php");
   } else {
    header("location:Cart.php");
   }
   

//    DELETE FROM Customers WHERE CustomerName='Alfreds Futterkiste';
