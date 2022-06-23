<?php
    include "Class/category.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Web_Final_Project/Lib/session.php';
    Session::init();

    $cate = new category();
    $cate_dropdown = $cate->show_category_list();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Clothes</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="./Resource/css/style.css">
    <link rel="stylesheet" href="./Resource/css/query.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="./Resource/js/script.js"></script>

    <!--DataTables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

</head>
<body>
    
    <!--NAVIGATION AREA-->
    <nav class="navbar navbar-expand-lg navbar-light py-3">
      <div class="container">
        <a href="index.php"><img src="./Resource/img/logo.png" alt="Logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php"><span>Home</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php"><span>About</span></a>
            </li>   
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Collections
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php
                  if(isset($cate_dropdown))
                  {
                    while($result = $cate_dropdown->fetch_assoc())
                    { 
                ?>
                <li><a class="dropdown-item" href="shop.php?cateID=<?php echo $result['CATEGORY_ID'] ?>"><?php echo $result['CATEGORY_NAME'] ?></a></li>
                <li><hr class="dropdown-divider w-100"></li>
                <?php
                    }
                  }
                ?>
              </ul>
            <li class="nav-item">
              <a class="nav-link" href="cart.php"><span>Cart</span></a>
            </li> 
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php"><span>Contact</span></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>










<?php
    //include "Include_main/header.php";
    include "Class/deliveryclass.php";
?>
<?php
    $deliver = new delivery();

    $customerConfirm = $deliver->get_customer_information();
?>
<!--ORDER SUCESSFULL AREA-->
<section class="featured-product-area order-sucessfull-area container text-center">
        <div class="bill-confirm">
            <h1>Thank you for your order</h1>
            <?php
                if(isset($customerConfirm)){
                    $result = $customerConfirm->fetch_assoc();
            ?>
            <ul>
                <li>Name: <span><?php echo $result['CUSTOMER_NAME'] ?></span></span></li>
                <li>Phone: <span><?php echo $result['CUSTOMER_PHONE'] ?></span></li>
                <li>Address: <span><?php echo $result['CUSTOMER_ADDRESS'] ?></span></li>
                <li style="color: red">Unique Order Reference Number: <span><?php echo $result['ORDER_ID'] ?></span></li>
            </ul>
            <ul>
                <li style="color: red">Order Total: <span>
                    <?php 
                    $total = Session::get('total'); 
                    echo '$'.$total;
                    ?>
                </span></span></li>
                <li><span>Please preparing this amount of money when recieving the products</span></li>
            </ul>
            <?php
                }
            ?>
            <p>We appriciate your business ! <br>
                If you have any question, please email <a href="mailto:duy.tran190201@vnuk.edu.vn">duy.tran190201@vnuk.edu.vn</a>
            </p> <br>
            <button class="btn mt-3"><a href="index.php">CONTINUE SHOPPING</a></button>
        </div>
</section>

<?php
    //include "Include_main/footer.php";
?>






    <!--FOOTER AREA-->
    <footer class="mt-5 py-5 text-center">
      <div class="row container mx-auto pt-5">
        <div class="footer-one col-lg-4 col-md-4 col-12 mb-3">
          <img src="./Resource/img/logo.png" alt="">
          <p class="pt-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
            Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>

        <div class="footer-one col-lg-4 col-md-4 col-12 mb-3">
          <h5 class="pb-2">Featured</h5>
          <ul class="text-uppercase list-unstyled">
            <li><a href="shop.php?cateID=2">Men</a></li>
            <li><a href="shop.php?cateID=1">Women</a></li>
            <li><a href="shop.php?cateID=3">Children</a></li>
            <li><a href="#">Featured product</a></li>
            <li><a href="#">Best seller product</a></li>
          </ul>
        </div>

        <div class="footer-one col-lg-4 col-md-4 col-12 mb-3">
          <h5 class="pb-2">Contact Us</h5>
          <div>
            <h6 class="text-uppercase">Address:</h6>
            <p>159A Le Loi Street, Da Nang city</p>
          </div>
          <div>
            <h6 class="text-uppercase">Phone:</h6>
            <p>0905933981</p>
          </div>
          <div>
            <h6 class="text-uppercase">Email:</h6>
            <p>duy.tran190201@vnuk.edu.vn</p>
          </div>
        </div>

      </div>

      <!--Copyright-->
      <p class="text-center copyright">©IVYmoda All rights reserved</p>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="./Vendors/js/jquery.waypoints.min.js"></script>
    
  </body>
</html>