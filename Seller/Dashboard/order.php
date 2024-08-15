<?php
session_start();
include('../../DBconnection.php');

if(!isset($_SESSION['Seller_Pic'])){
  ?>
  <script>
    alert('First Login Please!');
    location.replace('../seller signin.php');
  </script>
  <?php
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Dashboard</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS v5.0.2 -->
  <link rel="stylesheet" href="../../assets/Bootstrap 5/css/bootstrap.min.css" />

  <!-- Animate.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <!-- min.js link -->
  <script type="text/JavaScript" src="../../assets/Bootstrap 5/js/bootstrap.min.js"></script>

  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- css link -->
  <link rel="stylesheet" href="../../assets/Custom Css/fyp.css" />

  <!-- favicon -->
  <link rel="shortcut icon" href="Icons/dashboard.png" type="image/x-icon">

  <style>
    body {
      height: 100vh;
      /* border: 2px solid yellow; */
    }

    .maindiv {
      height: 100vh;
      width: 100%;
      /* border: 2px solid red; */
      overflow: scroll;
    }

    .main {
      height: 100vh;
    }

    ul {
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 0;
      margin: 0;
    }

    ul li {
      list-style-type: none;
    }

    ul li a {
      text-decoration: none;
    }

    @media screen and (min-width: 320px) and (max-width: 768px) {
      h4 {
        font-size: medium;
      }
    }

    @media screen and (min-width: 1024px) and (max-width: 1440px) {
      h4 {
        font-size: 30px;
      }
    }

    @media screen and (min-width: 768px) and (max-width: 1024px) {
      .link {
        font-size: 27px;
      }
    }

    ::-webkit-scrollbar {
      display: none;
    }
  </style>
</head>

<body class="body">
  <!-- for Mobile View -->
  <div class="maindiv d-md-none">
    <header class="border border-dark d-flex justify-content-between bg-dark align-items-center">
      <a href="../../home.php" class="w-25">
        <img src="../../assets/Icons/main_logo.jpeg" alt="" class="w-100 h-100 img-fluid">
      </a>
      <!-- <p class="text-center d-flex align-self-center fs-6">Admin Welcome to Dashboard</p> -->

      <div class="container mt-2 text-dark w-25 h-25">
        <!-- Button to trigger offcanvas -->
        <button class="btn btn-outline-primary" type="button" data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
          Menu
        </button>

        <!-- Offcanvas component -->
        <div class="offcanvas offcanvas-start" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel"><?php echo $_SESSION['Seller_Name']; ?> Welcome to Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <div class=" h-100">
              <ul class="d-flex flex-column justify-content-between fs-3">
                <li><a href="dashboard.php" class="btn btn-outline-info mt-2">Home</a></li>
                <li><a href="buyers.php" class="btn btn-outline-info mt-2">Buyers</a></li>
                <li><a href="order.php" class="btn btn-outline-info mt-2">Orders</a></li>
                <li><a href="Add product.php" class="btn btn-outline-info mt-2">Add Product</a></li>
                <li><a href="./Delete product.php" class="btn btn-outline-info mt-2">Delete Product</a></li>
                <li><a href="Logout.php" class="btn btn-outline-info mt-2">Log out</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <img src="../<?php echo $_SESSION['Seller_Pic']; ?>" alt="" class="w-25 img-fluid">
    </header>

    <!-- table section for Mobile-->
      <div class="mt-3 table-responsive w-100 bg-light text-dark">
        <h4 class="text-center p-3">Hi <?php echo $_SESSION['Seller_Name']; ?> these are the all Buyers</h4>
        <table class="table table-bordered table-hover border border-dark ">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Buyer Name</th>
                    <th scope="col">Buyer Pic</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Quantity</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Product Picture</th>
                </tr>
            </thead>
            <tbody>
            <!-- PHP code for fetching orders From DB -->
            <?php 
                  $selectqry = "select * from `Orders`";
                  $firequery = mysqli_query($conn,$selectqry);

                  while($Result = mysqli_fetch_array($firequery)){
                    ?>
                    <tr>
                    <td><?php echo $Result['Buyer Name']; ?></td>
                    <td><img src="../../Buyer/<?php echo $Result['Buyer_Image'];?>" alt="Product Image" class="img-thumbnail" style="width: 100px;"></td>
                    <td><?php echo $Result['Product Name']; ?></td>
                    <td><?php echo $Result['Product Quantity']; ?></td>
                    <td><?php echo $Result['Product Price']; ?></td>
                    <td><img src="Add Products/<?php echo $Result['Product Pic 1'];?>" alt="Product Image" class="img-thumbnail" style="width: 100px;"></td>
                </tr>
                <?php
                  }
                ?>

            </tbody>
          </table>
    </div>
  </div>

  <!-- for Laptop and big screens -->
  <div class="d-none row d-md-flex align-items-md-center d-md-block w-100 main">
    <!-- admin div -->
    <div class="col-md-3 bg-dark d-md-flex flex-md-column justify-content-md-center align-items-md-center h-100">
      <img src="../<?php echo $_SESSION['Seller_Pic']; ?>" alt=""
        class="w-50 rounded-circle img-fluid mt-1 border border-3 border-white">
      <h3>Welcome <?Php echo $_SESSION['Seller_Name']; ?></h3>
      <ul class="text-decoration-none w-100 h-100 fs-4">
        <li><a href="./dashboard.php" class="btn btn-outline-info mt-4">Home</a></li>
        <li><a href="./buyers.php" class="btn btn-outline-info mt-4">Buyers</a></li>
        <li><a href="./order.php" class="btn btn-outline-info mt-4">Orders</a></li>
        <li><a href="./Add product.php" class="btn btn-outline-info mt-4">Add Product</a></li>
        <li><a href="./Delete product.php" class="btn btn-outline-info mt-4">Delete Product</a></li>
        <li><a href="Logout.php" class="btn btn-outline-info mt-4">Logout</a></li>
      </ul>
    </div>

    <!-- Content div -->
    <div class="d-none col-md-9 d-md-flex flex-md-column justify-content-md-between align-items-md-center text-dark text-center h-100 bg-white p-4">
      <h3>Hi <?Php echo $_SESSION['Seller_Name']; ?> here is the Orders details</h3>
      <!-- table section -->
      <div class="table-section w-100 h-100 overflow-scroll">
        <div class="table-responsive">
          <table class="table table-bordered table-hover border border-dark ">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Buyer Name</th>
                    <th scope="col">Buyer Pic</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Quantity</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Product Picture</th>
                </tr>
            </thead>
            <tbody>
            <!-- PHP code for fetching orders From DB -->
            <?php 
                  $selectqry = "select * from `Orders`";
                  $firequery = mysqli_query($conn,$selectqry);

                  while($Result = mysqli_fetch_array($firequery)){
                    ?>
                    <tr>
                    <td><?php echo $Result['Buyer Name']; ?></td>
                    <td><img src="../../Buyer/<?php echo $Result['Buyer_Image'];?>" alt="Product Image" class="img-thumbnail" style="width: 100px;"></td>
                    <td><?php echo $Result['Product Name']; ?></td>
                    <td><?php echo $Result['Product Quantity']; ?></td>
                    <td><?php echo $Result['Product Price']; ?></td>
                    <td><img src="Add Products/<?php echo $Result['Product Pic 1'];?>" alt="Product Image" class="img-thumbnail" style="width: 100px;"></td>
                </tr>
                <?php
                  }
                ?>

            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>

</body>

</html>