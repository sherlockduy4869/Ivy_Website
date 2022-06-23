<?php
    include $_SERVER['DOCUMENT_ROOT']."/Web_Final_Project/Include_main/header.php";
    //include $_SERVER['DOCUMENT_ROOT']."/Web_Final_Project/Class/cartclass.php";
?>
<script>
    $(document).ready(function () {
        $('#table_cart').DataTable();
    });        
</script>
<?php

    $cart = new cart();

    if(isset($_GET['cart_id']))
    {
        $cart_id = $_GET['cart_id'];
        $delCartProduct = $cart->delete_product_cart($cart_id);
    }

    $get_product_cart = $cart->get_product_cart();
    
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
            <thead>
                <th>Remove</th>
                <th>Image</th>
                <th>Product</th>
                <th>Size</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </thead>

            <tbody>
                <?php
                    $subTotal = 0;
                    if($get_product_cart)
                    {
                        while($result = $get_product_cart->fetch_assoc())
                        {
                            
                ?>
                <tr>
                    <td><a onclick="return confirm('Do you want to delete ?')" href="?cart_id=<?php echo $result['CART_ID']; ?>"><i class="fas fa-trash"></i></a></td>
                    <td><img src="<?php echo "./Admin//Uploads/".$result['IMAGE']; ?>" alt=""></td>
                    <td><h5><?php echo $result['PRODUCT_NAME'] ?></h5></td>
                    <td><h5><?php echo $result['SIZE']?></h5></td>
                    <td><h5><?php echo '$'.$result['PRICE'] ?></h5></td>
                    <td><?php echo $result['QUANTITY'] ?></td>
                    <td><h5 id="totalPrice"><?php echo '$'.$result['PRICE']*$result['QUANTITY'] ?></h5></td>
                </tr>
                <?php
                        $subTotal = $subTotal + $result['PRICE']*$result['QUANTITY'];
                        }
                    }
                    Session::set('subTotal',$subTotal);
                ?>
            </tbody>
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
                            Session::set('shippingCost',$shippingCost);
                        }
                        else if ($subTotal <= 20000){
                            $shippingCost = 50;
                            echo '$'.$shippingCost;
                            Session::set('shippingCost',$shippingCost);
                        }
                        else if ($subTotal <= 50000){
                            $shippingCost = 30;
                            echo '$'.$shippingCost;
                            Session::set('shippingCost',$shippingCost);
                        }
                        else{
                            $shippingCost = 0;
                            echo '$'.$shippingCost;
                            Session::set('shippingCost',$shippingCost);
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