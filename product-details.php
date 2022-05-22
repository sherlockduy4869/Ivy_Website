<?php
    include "Include_main/header.php";
    include "Class/product.php";
    include "Class/cartclass.php";
?>
<?php
    $product = new product();
    $cart = new cart();

    if(!isset($_GET['product_id']) || $_GET['product_id'] == NULL)
    {
        echo "<script>window.location = 'home.php'</script>";
    }
    else{
        $product_id = $_GET['product_id'];
    }
    
    $featured_product = $product->show_featured_product_list_by_id($product_id);
    $featured_product_desc = $product->show_featured_product_desc_by_id($product_id);

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        if($_POST['size'] != '')
        {
            $quantity = $_POST['quantity'];
            $size = $_POST['size'];
            $addToCart = $cart->add_to_cart($product_id,$quantity,$size);
        }

    }
?>

<!--PRODUCT-DETAILS AREA-->
<section class="container product-details my-5 pt-5">
        <div class="row mt-5">
            <div class="product-details-left col-lg-5 col-md-12 col-12">
                <?php
                if(isset($featured_product))
                {
                  $result = $featured_product->fetch_assoc();
                ?>
                <img class="image-fluid w-100 big-image mb-1" src="<?php echo "./Admin//Uploads/".$result['image']; ?>" alt="">
                <div class="small-image-group">
                    <div class="small-image-col">
                        <img class="small-image w-100" src="<?php echo "./Admin//Uploads/".$result['image']; ?>" alt="">
                    </div>
                    <?php
                      if(isset($featured_product_desc))
                      {
                        while($result_desc = $featured_product_desc->fetch_assoc())
                      {
                    ?>
                    <div class="small-image-col">
                        <img class="small-image w-100" src="<?php echo "./Admin//Uploads_desc/".$result_desc['product_img_desc']; ?>" alt="">
                    </div>
                    <?php
                      }
                      }
                    ?>
                </div>
                <?php
                }
                ?>
            </div>
            <div class="product-details-right col-lg-6 col-md-12 col-12">
                <h6><?php echo "Home / ".$result['cateName']; ?></h6>
                <h3 class="py-4"><?php echo $result['product_name']; ?></h3>
                <h2><?php echo "$".$result['price']; ?></h2>
                <form action="" method="POST">
                  <select class="my-3" name="size">
                      <option value="">--Select Size--</option>
                      <option value="S">S</option>
                      <option value="XL">XL</option>
                      <option value="XXL">XXL</option>
                  </select>
                  <input type="number" value="1" name="quantity" min = "1">
                  <button class="btn buy-btn" name="submit">Add to cart</button>
                </form>
                <h4 class="my-5">Products Description</h4>
                <span><?php echo $result['product_desc']; ?></span>
            </div>
        </div>
</section>

<!--RELATED PRODUCT AREA-->
<section class="featured-product-area my-5 pb-5">
        <div class="container text-center mt-5 py-5">
          <h3>RELATED PRODUCT</h3>
          <hr class="mx-auto">
        </div>
        <div class="row mx-auto container-fluid">
          <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="img-fluid mb-3" src="./Resource/img/featured-product1.jfif" alt="">
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="product-name">Poem Shirt</h5>
            <h4 class="product-price">$20.00</h4>
            <button class="buy-btn btn">Buy Now</button>
          </div>
  
          <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="img-fluid mb-3" src="./Resource/img/featured-product2.jfif" alt="">
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="product-name">Ontop Shirt</h5>
            <h4 class="product-price">$20.00</h4>
            <button class="buy-btn btn">Buy Now</button>
          </div>
  
          <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="img-fluid mb-3" src="./Resource/img/featured-product3.jfif" alt="">
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="product-name">Trending Shirt</h5>
            <h4 class="product-price">$20.00</h4>
            <button class="buy-btn btn">Buy Now</button>
          </div>
  
          <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="img-fluid mb-3" src="./Resource/img/featured-product4.jfif" alt="">
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="product-name">City Shirt</h5>
            <h4 class="product-price">$20.00</h4>
            <button class="buy-btn btn">Buy Now</button>
          </div>
        </div>
</section>

<?php
    include "Include_main/footer.php";
?>