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
