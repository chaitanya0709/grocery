<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="test.css">
    <title>Document</title>
    <style>
        form{
            background-color: red;
            padding: 20px;
            padding-left: 15%;
        }
        body{
            background-color: greenyellow;
        }
    </style>
</head>
<body>
    <form action="#" method="post" enctype="multipart/form-data">
        <label>Select Image File:</label><br>
        <input type="file" name="itemImg" required><br><br>
        <label>Item Name:</label><br>
        <input type="text" name="itemName" required><br><br>
        <label>Item Actual Price:</label><br>
        <input type="text" name="actualMRP" required><br><br>
        <label>Item Store Price:</label><br>
        <input type="text" name="storeMRP" required><br><br>

        <input type="submit" name="submit" value="Upload">
    </form>
</body>

</html>

<?php
include 'dbConfig.php';

$status = $statusMsg = '';
if (isset($_POST["submit"])) {

    $itemName = $_POST["itemName"];
    $actualMRP = $_POST["actualMRP"];
    $storeMRP = $_POST["storeMRP"];

    $status = 'error';
    if (!empty($_FILES["itemImg"]["name"])) {
        // Get file info 
        $fileName = basename($_FILES["itemImg"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['itemImg']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

            // Insert image content into database 

            $sql = "INSERT INTO items(itemID,itemImg,itemName,actualMRP,storeMRP) VALUES ('','$imgContent','$itemName','$actualMRP','$storeMRP')";

            $insert = $conn->query($sql);
            //  $insert = $db->query("INSERT into images (image, created) VALUES ('$imgContent', NOW())");

            if ($insert) {
                $status = 'success';
                $statusMsg = "File uploaded successfully.";
            } else {
                $statusMsg = "File upload failed, please try again.";
            }
        } else {
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
        }
    } else {
        $statusMsg = 'Please select an image file to upload.';
    }
}

// Display status message 
echo $statusMsg;
?>