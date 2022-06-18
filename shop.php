<?php
    include_once "Include_main/header.php";
    include_once "Class/product.php";
    include_once "Class/category.php";
?>
<?php
    $product = new product();
    $cate = new category();

    if(isset($_GET['cateID'])){
        $cateID = $_GET['cateID'];
        $product_by_cate = $product->get_product_by_cate($cateID);
        $cate_result = $cate->get_cate_name_by_id($cateID)->fetch_assoc();
    }
?>
<!--FEATURED PRODUCT AREA-->
<section class="featured-product-area shop-product my-5 py-5">

      <div class="container mt-5 py-5">
        <h2 class="text-uppercase"><?php echo 'Our '.$cate_result['CATEGORY_NAME'].' Collections' ?></h2>
        <hr>
        <p>Here you can see our noticable products with competitive price</p>
      </div>
      <div class="row mx-auto container">
        <?php
            if($product_by_cate)
            {
              while($result=$product_by_cate->fetch_assoc())
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
          <h5 class="product-name"><?php echo $result['PRODUCT_NAME'] ?></h5>
          <h4 class="product-price"><?php echo '$'.$result['PRICE'] ?></h4>
          <a href="product-details.php?product_id=<?php echo $result['PRODUCT_ID']?>" class="buy-btn btn">Buy Now</a>
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