<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="UaerDashbord.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Document</title>
</head>

<body>

    <div class="navbar" style="align-items:flex-start;">
        <div style="display:flex; height:100px">
            <img style="height: 70px; margin: 14px 0px 0px 030px;" src="img/icon.png" alt="">
            <input style="height: 27px; width: 50%; margin: 35px 0px 0px 70px;" type="text" id="search" name="Search" placeholder="Search for Products..">
            <button class="searchButton">Search</button>
            <div style="margin: 20px 0px 35px 10%; display: flex; align-items: center; padding: 10px 10px 0px 0px;">
                <a href="index.php"><button style="width: 80px; margin-right: 20px;">Log Out</button></a>
                <a href="Cart.php"><img style="width: 60px; height: 50px;" src="img/MyBasket.png" alt=""></a>
                <sup class="cart" style="font-size: 20px; background-color: orange; padding: 15px 10px 15px 10px; border-radius:20px"><?php cart(); function cart(){ include './dbConfig.php'; echo $conn->query("select count(*) as ct from cart")->fetch_array()['ct'];} ?></sup>
            </div>
        </div>
    </div>
    <script>

        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("navbar").style.top = "0";
            } else {
                document.getElementById("navbar").style.top = "-40px";
            }
        }
    </script>
    <br>
    <div class="slides" >
        <img class="mySlides" src="https://www.bigbasket.com/media/uploads/banner_images/YXHP144_hp_fom_m_bbpl-staples_460_101022_Bangalore.jpg" style="width:100%">
        <img class="mySlides" src="https://www.bigbasket.com/media/uploads/banner_images/cp_c_Home_Kitchen_Entrypoint_Banner_400_081022.jpg" style="width:100%">
        <img class="mySlides" src="https://www.bigbasket.com/media/uploads/banner_images/cp_c_Diwali-pre-diwali_Entrypoint_Banner_400_081022.jpg" style="width:100%">
        <img class="mySlides" src="https://www.bigbasket.com/media/uploads/banner_images/cp_diwali-pre-cleaning_1130x400-041022.jpg" style="width:100%">

        <script>
            
            var myIndex = 0;
            carousel();

            function carousel() {
                var i;
                var x = document.getElementsByClassName("mySlides");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                myIndex++;
                if (myIndex > x.length) {
                    myIndex = 1
                }
                x[myIndex - 1].style.display = "block";
                setTimeout(carousel, 4000); // Change image every 2 seconds
            }
        </script>
    </div>

    <div class="container">
        <?php
        include 'dbConfig.php';

        $sql  = "SELECT * FROM items";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                itemcomp($row['itemImg'],$row['itemName'],$row['actualMRP'],$row['storeMRP'],$row['itemID']);
            }
        }else{
            echo '<h1>Image Not Found</h1>';
        }
        ?>
    </div>

</body>
</html>

<?php
function itemcomp($itemImg,$itemName,$actualMRP,$storeMRP,$itemId)
{
    echo '<table class="items">
            <tr>
                <td><img style="width: 200px; height: 175px;" class="itemsimg" src="data:image/jpg;charset=utf8;base64,'.base64_encode($itemImg).'"
                        alt="">
                </td>
            </tr>
            <tr>
                <td>Fresho <br>
                    <samp>'.$itemName.'</samp>
                    <br><br>
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid black;">
                    1 kg - Rs '.$storeMRP.'
                </td>
            </tr>
            <tr>
                <td style="font-size: 12px; background-color: rgb(243, 241, 241); padding: 5px;">
                    MRP: <s>Rs '.$actualMRP.'</s><span style="font-size: 16px"> Rs '.$storeMRP.'</span><br>
                    Standard Delivery: 18 Oct,<br>
                    3:00PM - 7:30PM<br>
                    <form action="AddToCart.php" method="post">
                    <div style="display: flex; text-align: center;">
                        <div style="border: 1px solid black; border-radius: 5px;">
                            <label style="padding: 5px;">Qty</label>
                            <input
                                style="padding: 3px; margin-right: 1px; border: none; width: 50px; border-left: 1px solid black;"
                                type="text" name="qty" value="1">
                        </div>
                        <Button class="button-33" role="button" style=" margin-left: 10px;">Add</Button>
                        <!-- <input type="hidden" name="StoreMrp" value="'.$storeMRP.'">
                        <input type="hidden" name="itemname" value="'.$itemName.'">
                        <input type="hidden" name="itemImg" value="'.base64_encode($itemImg).'"> -->
                        <input type="hidden" name="ID" value="'.$itemId.'">
                    </form>
                    </div>
                </td>
            </tr>
        </table>';      
}
?>