<?php
    include "Include_main/header.php";
?>

<!--SHOPPING CART AREA-->
<section class="featured-product-area shopping-cart-area shop-product mt-5 py-5">
        <div class="container">
          <h2 class="font-weight-bold">SHOPPING CART</h2>
          <hr>
        </div>
</section>

<!--TABLE CART AREA-->
<section class="cart-container-area container my-1" >
        <table width = "100%">
            <tr>
                <th>Remove</th>
                <th>Image</th>
                <th>Product</th>
                <th>Size</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            <tr>
                <td><a href=""><i class="fas fa-trash"></i></a></td>
                <td><img src="./Resource/img/best-seller1.jpg" alt=""></td>
                <td><h5>River T-Shirt</h5></td>
                <td>
                    <select name="" id="">
                        <option value="">S</option>
                        <option value="">XL</option>
                        <option value="">XXL</option>
                    </select>
                </td>
                <td><h5>$30</h5></td>
                <td><input class="w-25 pl-1" value="1" min="1" type="number"></td>
                <td><h5>$30</h5></td>
            </tr>
            <tr>
                <td><a href=""><i class="fas fa-trash"></i></a></td>
                <td><img src="./Resource/img/best-seller1.jpg" alt=""></td>
                <td><h5>River T-Shirt</h5></td>
                <td>
                    <select name="" id="">
                        <option value="">S</option>
                        <option value="">XL</option>
                        <option value="">XXL</option>
                    </select>
                </td>
                <td><h5>$30</h5></td>
                <td><input class="w-25 pl-1" value="1" min="1" type="number"></td>
                <td><h5>$30</h5></td>
            </tr>
            <tr>
                <td><a href=""><i class="fas fa-trash"></i></a></td>
                <td><img src="./Resource/img/best-seller1.jpg" alt=""></td>
                <td><h5>River T-Shirt</h5></td>
                <td>
                    <select name="" id="">
                        <option value="">S</option>
                        <option value="">XL</option>
                        <option value="">XXL</option>
                    </select>
                </td>
                <td><h5>$30</h5></td>
                <td><input class="w-25 pl-1" value="1" min="1" type="number"></td>
                <td><h5>$30</h5></td>
            </tr>
        </table>
</section>

<!--CART BOTTOM AREA-->
<section class="cart-bottom-area container">
        <div class="row">
            <div class="discount col-lg-6 col-md-6 col-12 mb-4">
                <div>
                    <h5>DISCOUNT</h5>
                    <p>Enter your discount code if you have one</p>
                    <input type="text" placeholder="Discount code">
                    <button class="btn">APPLY DISCOUNT</button>
                </div>
            </div>
            <div class="total-price col-lg-6 col-md-6 col-12">
                <div>
                    <h5>TOTAL PRICE</h5>
                    <div class="d-flex justify-content-between">
                        <h6>Subtotal</h6>
                        <p>$60</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6>Shipping</h6>
                        <p>$60</p>
                    </div>
                    <hr class="second-hr">
                    <div class="d-flex justify-content-between">
                        <h6>Total</h6>
                        <p>$60</p>
                    </div>
                    <button class="btn ml-auto">CHECK OUT</button>
                </div>
            </div>
        </div>
</section>

<?php
    include "Include_main/footer.php";
?>