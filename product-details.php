<?php
    include_once "Include_main/header.php";
    include_once "Class/product.php";
    include_once "Class/cartclass.php";
    include_once "Class/attribute.php";
?>
<?php
    $product = new product();
    $cart = new cart();
    $attr = new attribu();

    if(!isset($_GET['product_id']) || $_GET['product_id'] == NULL)
    {
        echo "<script>window.location = 'index.php'</script>";
    }
    else{
        $product_id = $_GET['product_id'];
    }
    
    $sizeList = $attr->show_size_list($product_id);
    $colorList = $attr->show_color_list($product_id);

    $featured_product = $product->show_product_list_by_id($product_id);
    $featured_product_desc = $product->show_product_desc_by_id($product_id);

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        if($_POST['size'] != '' and $_POST['color'] != '')
        {
            $quantity = $_POST['quantity'];
            $size = $_POST['size'];
            $color = $_POST['color'];
            $addToCart = $cart->add_to_cart($product_id,$quantity,$size,$color);
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
                <img class="image-fluid w-100 big-image mb-1" src="<?php echo "./Admin//Uploads/".$result['IMAGE']; ?>" alt="">
                <div class="small-image-group">
                    <div class="small-image-col">
                        <img class="small-image w-100" src="<?php echo "./Admin//Uploads/".$result['IMAGE']; ?>" alt="">
                    </div>
                    <?php
                      if(isset($featured_product_desc))
                      {
                        while($result_desc = $featured_product_desc->fetch_assoc())
                      {
                    ?>
                    <div class="small-image-col">
                        <img class="small-image w-100" src="<?php echo "./Admin//Uploads_desc/".$result_desc['PRO_IMG_DES']; ?>" alt="">
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
                <h6><?php echo "Home / ".$result['CATEGORY_NAME']; ?></h6>
                <h3 class="py-4"><?php echo $result['PRODUCT_NAME']; ?></h3>
                <h2><?php echo "$".$result['PRICE']; ?></h2>
                <form action="" method="POST" class="addToCartForm">
                  <select class="my-3" name="size">
                      <option value="">--Size--</option>
                      <?php
                        if($sizeList)
                        {
                            while($result_size = $sizeList->fetch_assoc())
                            {

                      ?>
                      <option value="<?php echo $result_size['SIZE_VALUE'] ?>"><?php echo $result_size['SIZE_VALUE'] ?></option>
                      <?php
                            }
                        }
                      ?>
                  </select>
                  <select class="my-3" name="color">
                      <option value="">--Color--</option>
                      <?php
                        if($colorList)
                        {
                            while($result_color = $colorList->fetch_assoc())
                            {

                      ?>
                      <option value="<?php echo $result_color['COLOR_VALUE'] ?>"><?php echo $result_color['COLOR_VALUE'] ?></option>
                      <?php
                            }
                        }
                      ?>
                  </select>
                  <input type="number" value="1" name="quantity" min = "1"> 
                  <button class="btn buy-btn" name="submit">Add to cart</button>
                </form>
                <?php 
                    if(isset($addToCart))
                    {
                      echo $addToCart;
                    }
                  ?>
                <br>
                <span class="addError">
                <?php 
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
                    {
                      if($_POST['size'] == '' or $_POST['color'] == ''){echo "Please select size/color !";} 
                    }
                    
                ?>
                </span>
                <h4 class="my-5">Products Description</h4>
                <div><?php echo $result['PRODUCT_DESCRIPTION']; ?></div>
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