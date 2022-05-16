<?php
    include "Include_main/header.php";
?>

<!--PRODUCT-DETAILS AREA-->
<section class="container product-details my-5 pt-5">
        <div class="row mt-5">
            <div class="product-details-left col-lg-5 col-md-12 col-12">
                <img class="image-fluid w-100 big-image mb-1" src="./Resource/img/produc-details-big-img.jfif" alt="">
                <div class="small-image-group">
                    <div class="small-image-col">
                        <img class="small-image w-100" src="./Resource/img/product-details-small-1.jfif" alt="">
                    </div>
                    <div class="small-image-col">
                        <img class="small-image w-100" src="./Resource/img/product-details-small-2.jfif" alt="">
                    </div>
                    <div class="small-image-col">
                        <img class="small-image w-100" src="./Resource/img/product-details-small-3.jfif" alt="">
                    </div>
                    <div class="small-image-col">
                        <img class="small-image w-100" src="./Resource/img/product-details-small-4.jfif" alt="">
                    </div>
                </div>
            </div>
            <div class="product-details-right col-lg-6 col-md-12 col-12">
                <h6>Home/ Women-Clothes</h6>
                <h3 class="py-4">Women trending T-shirt</h3>
                <h2>$20.00</h2>
                <form action="">
                  <select class="my-3" name="" id="">
                      <option value="">--Select Size--</option>
                      <option value="">S</option>
                      <option value="">XL</option>
                      <option value="">XXL</option>
                  </select>
                  <input type="number" value="1">
                  <a href="" class="btn buy-btn">Add to cart</a>
                </form>
                <h4 class="my-5">Products Description</h4>
                <span>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                </span>
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