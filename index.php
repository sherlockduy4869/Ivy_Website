<?php
    include_once "Include_main/header.php";
    include_once "Class/product.php";
?>
<?php
    $product = new product();
    $featured_product = $product->show_featured_product_list();
    $best_seller_product = $product->show_best_seller_product_list();
?>
    <!--SLIDER AREA-->
    <section class="slider">
        <div class="aspect-ratio-169">
            <img src="./Resource/img/slider1.jpg" alt="">
            <img src="./Resource/img/slider2.jpg" alt="">
            <img src="./Resource/img/slider3.png" alt="">
        </div>
        <div class="dot-container">
            <div class="dot active"></div>
            <div class="dot"></div>
        <div class="dot"></div>
        </div>
    </section>

    <!--BRAND AREA-->
    <section class="brand-area container">
      <div class="row m-0 py-5">
          <img class="image-fluid col-lg-2 col-md-3 col-6" src="./Resource/img/brand1.png" alt="">
          <img class="image-fluid col-lg-2 col-md-3 col-6" src="./Resource/img/brand2.png" alt="">
          <img class="image-fluid col-lg-2 col-md-3 col-6" src="./Resource/img/brand3.jpg" alt="">
          <img class="image-fluid col-lg-2 col-md-3 col-6" src="./Resource/img/brand4.png" alt="">
          <img class="image-fluid col-lg-2 col-md-3 col-6" src="./Resource/img/brand2.png" alt="">
          <img class="image-fluid col-lg-2 col-md-3 col-6" src="./Resource/img/brand3.jpg" alt="">
      </div>
    </section>

    <!--NEW AREA-->
    <section class="new-area w-100">
      <div class="row p-0 m-0">
        <div class="one col-lg-4 col-md-12 col-12 p-0 clickable">
          <img src="./Resource/img/new1.jfif" alt="" class="img-fluid">
          <div class="details">
            <h2>Clothes For Women</h2>
            <a href="shop.php?cateID=1" class="text-uppercase">Shop now</a>
          </div>
        </div>
        <div class="one col-lg-4 col-md-12 col-12 p-0 clickable">
          <img src="./Resource/img/new2.jfif" alt="" class="img-fluid">
          <div class="details">
            <h2>Clothes For Men</h2>
            <a href="shop.php?cateID=2" class="text-uppercase">Shop now</a>
          </div>
        </div>
        <div class="one col-lg-4 col-md-12 col-12 p-0 clickable">
          <img src="./Resource/img/new3.jfif" alt="" class="img-fluid">
          <div class="details">
            <h2>Clothes For Children</h2>
            <a href="shop.php?cateID=3" class="text-uppercase">Shop now</a>
          </div>
        </div>
      </div>
    </section>

    <!--FEATURED PRODUCT AREA-->
    <section class="featured-product-area my-5 pb-5">
      <div class="container text-center mt-5 py-5">
        <h3>OUR FEATURED PRODUCT</h3>
        <hr class="mx-auto">
        <p>Here you can see our noticable products with competitive price.</p>
      </div>
      <div class="row mx-auto container-fluid">
        <?php
          if($featured_product)
          {
            
            while($result = $featured_product->fetch_assoc())
            {
        ?>

        <div class="product text-center col-lg-3 col-md-4 col-12 clickable">
          <img class="img-fluid mb-3" src="<?php echo "./Admin//Uploads/".$result['IMAGE']; ?>" alt="">
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="product-name"><?php echo $result['PRODUCT_NAME']; ?></h5>
          <h4 class="product-price"><?php echo "$".$result['PRICE']; ?></h4>
          <a href="product-details.php?product_id=<?php echo $result['PRODUCT_ID']; ?>" class="buy-btn btn">Buy Now</a>
        </div>

        <?php
            }
          }
        ?>
      </div>
    </section>

    <!--BANNER AREA-->
    <section class="banner-area my-5 py-5">
      <div class="container">
        <h4>SUMMER SEASON SALE</h4>
        <h1>SUMMER COLLECTION SALE <br> UP TO 15% OFF</h1>
        <button class="text-uppercase btn"><a href="shop.php?cateID=49">Shop Now</a></button>
      </div>
    </section>

    <!--BEST SELLER PRODUCT AREA-->
    <section class="best-seller-product-area my-5">
      <div class="container text-center mt-5 py-5">
        <h3>OUR BEST SELLER PRODUCT</h3>
        <hr class="mx-auto">
        <p>Here you can see our best seller product in this summer vacation</p>
      </div>
      <div class="row mx-auto container-fluid">
        <?php
          if($best_seller_product)
          {
            while($result = $best_seller_product->fetch_assoc())
            {
        ?>
        <div class="product text-center col-lg-3 col-md-4 col-12 clickable">
          <img class="img-fluid mb-3" src="<?php echo "./Admin//Uploads/".$result['IMAGE']; ?>" alt="">
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="product-name"><?php echo $result['PRODUCT_NAME']; ?></h5>
          <h4 class="product-price"><?php echo "$".$result['PRICE']; ?></h4>
          <a href="product-details.php?product_id=<?php echo $result['PRODUCT_ID']; ?>" class="buy-btn btn">Buy Now</a>
        </div>
        <?php
            }
          }
        ?>
      </div>
    </section>

<?php
    include "Include_main/footer.php";
?>