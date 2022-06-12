<?php
    include "Include_main/header.php";
    include "Class/cartclass.php";
?>
<?php

    $cart = new cart();

    if(isset($_GET['cart_id']))
    {
        $cart_id = $_GET['cart_id'];
        $delCartProduct = $cart->delete_product_cart($cart_id);
    }
    
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
        <table id="table_cart">
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
                <td><a onclick="return confirm('Do you want to delete ?')" href="?cart_id=<?php echo $result['cart_id']; ?>"><i class="fas fa-trash"></i></a></td>
                <td><img src="<?php echo "./Admin//Uploads/".$result['image']; ?>" alt=""></td>
                <td><h5><?php echo $result['product_name'] ?></h5></td>
                <td><?php echo $result['size'] ?></td>
                <td><h5><?php echo '$'.$result['price'] ?></h5></td>
                <td><?php echo $result['quantity'] ?></td>
                <td><h5 id="totalPrice"><?php echo '$'.$result['price']*$result['quantity'] ?></h5></td>
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
                        <p><?php 
                        $shippingCost = 0;
                        if ($subTotal == 0){
                            $shippingCost = 0;
                            echo '$'.$shippingCost;
                        }
                        else if ($subTotal <= 20000){
                            $shippingCost = 50;
                            echo '$'.$shippingCost;
                        }
                        else if ($subTotal <= 50000){
                            $shippingCost = 30;
                            echo '$'.$shippingCost;
                        }
                        else{
                            $shippingCost = 0;
                            echo '$'.$shippingCost;
                        } ?></p>
                    </div>
                    <hr class="second-hr">
                    <div class="d-flex justify-content-between">
                        <h6>Total</h6>
                        <p><?php
                            $total = $subTotal + $shippingCost;
                             echo '$'.$total;
                             Session::set('total',$total);
                             ?>
                        </p>
                    </div>
                    <button class="btn ml-auto"><a href="delivery.php">CHECK OUT</a></button>
                </div>
            </div>
        </div>
</section>

<?php
    include "Include_main/footer.php";
?>