<?php
    include "Include_main/header.php";
    include "Class/cartclass.php";
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
            <?php
                $cart = new cart();
                $get_product_cart = $cart->get_product_cart();
                $subTotal = 0;
                if($get_product_cart)
                {
                    while($result = $get_product_cart->fetch_assoc())
                    {
                        
            ?>
            <tr>
                <td><a href=""><i class="fas fa-trash"></i></a></td>
                <td><img src="<?php echo "./Admin//Uploads/".$result['image']; ?>" alt=""></td>
                <td><h5><?php echo $result['product_name'] ?></h5></td>
                <td>
                    <select name="" id="">
                        <option <?php if($result['size'] == 'S'){echo 'selected';} ?> value="S">S</option>
                        <option <?php if($result['size'] == 'XL'){echo 'selected';} ?> value="XL">XL</option>
                        <option <?php if($result['size'] == 'XXL'){echo 'selected';} ?> value="XXL">XXL</option>
                    </select>
                </td>
                <td><h5><?php echo $result['price'] ?></h5></td>
                <td><input class="w-25 pl-1" type="number" value="<?php echo $result['quantity'] ?>"></td>
                <td><h5><?php echo '$'.$result['price']*$result['quantity'] ?></h5></td>
            </tr>
            <?php
                    $subTotal = $subTotal + $result['price']*$result['quantity'];
                    }
                }
            ?>
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
                        <p><?php echo '$'.$subTotal ?></p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6>Shipping</h6>
                        <p>$0</p>
                    </div>
                    <hr class="second-hr">
                    <div class="d-flex justify-content-between">
                        <h6>Total</h6>
                        <p><?php echo '$'.$subTotal ?></p>
                    </div>
                    <button class="btn ml-auto">CHECK OUT</button>
                </div>
            </div>
        </div>
</section>

<?php
    include "Include_main/footer.php";
?>