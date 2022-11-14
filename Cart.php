<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/e4907d1b30.js" crossorigin="anonymous"></script>
  <title>Document</title>
</head>

<body style="background-color: #eee;">
  <section class="h-100">
    <div class="container h-100 py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-10">

          <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-normal mb-0 text-black"><a href="UserDashbord.php">Shopping Cart</a></h3>
            <div>
              <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
            </div>
          </div>

          <?php
          include 'dbConfig.php';

          $result = $conn->query("SELECT * FROM items INNER JOIN cart ON cart.itemID=items.itemID;");
          $GLOBALS['total'] = 0;
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              render($row['itemID'], $row['itemImg'], $row['itemName'], $row['Qty'], $row['storeMRP']);
              // render();
              $total = $row['storeMRP'] * $row['Qty'] + $total;
              // echo $total;
            }
          } else {
            echo '<div class="text-center">
            <h1 class="fs-1">Your Cart Is Empty</h1>
            <p class="">look like you haven' . "'" . 't added <br> anything to your cart yet</p>
          </div>
          ';
          }
          echo '<div class="card mb-4">
          <div class="card-body p-4 d-flex justify-content-center">
            <h3>Total: <span>Rs ' . $total . '</span></h3>
          </div>
        </div>';
          ?>


          <!-- -------------------- -->

          <div class="card-body d-flex flex-row-reverse">
            <button type="button" class="btn btn-warning btn-block btn-lg">Place Order</button>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>

</html>

<?php

function render($itemID, $itemImg, $itemName, $itemQty, $itemPrice)
{
  echo '<div class="card rounded-3 mb-4">
            <div class="card-body p-4">
              <div class="row d-flex justify-content-between align-items-center">
                <div class="col-md-2 col-lg-2 col-xl-2">
                  <img src="data:image/jpg;charset=utf8;base64,' . base64_encode($itemImg) . '" class="img-fluid rounded-3" alt="Cotton T-shirt">
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                  <p class="lead fw-normal mb-2">' . $itemName . '</p>
                  <p><span class="text-muted">Size: </span>M <span class="text-muted">Color:
                    </span>Grey</p>
                </div>
                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                  <button class="btn btn-link px-2" onclick="this.parentNode.querySelector(' . "'input[type=number]'" . ').stepDown()">
                    <i class="fas fa-minus"> </i>
                  </button>

                  <input id="form1" min="0" name="quantity" value="' . $itemQty . '" type="number" class="form-control form-control-sm" />

                  <button class="btn btn-link px-2" onclick="this.parentNode.querySelector(' . "'input[type=number]'" . ').stepUp()">
                    <i class="fas fa-plus"> </i>
                  </button>
                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                  <h5 class="mb-0">Rs ' . $itemPrice . '</h5>
                </div>
                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                  <a href="deleteItem.php?ID=' . $itemID . '" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                </div>
              </div>
            </div>
          </div>';
}

?>
