<?php
    include "Include_main/header.php";
    include "Class/deliveryclass.php";
    include "Class/cartclass.php";
?>

<?php
    $deliver = new delivery();
    $cart = new cart();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $customerInfo = $deliver->insert_customer_information($_POST);
    }

    $get_product_cart = $cart->get_product_cart();
?>

<!--DELIVERY AREA-->
<section class="featured-product-area delivery-area">
        <div class="container">
            <div class="delivery-content row">
                <div class="delivery-content-left col-lg-8 col-md-7 col-7">
                    <form action="delivery.php" method="POST" enctype="multipart/form-data">
                        <div class="delivery-content-left-input-top row">
                            <div class="delivery-content-left-input-top-item">
                                <label for="">Your Name<span style="color:red">*</span></label>
                                <input type="text" name="customer_name" required>
                            </div>
                            <div class="delivery-content-left-input-top-item">
                                <label for="">Phone Number<span style="color:red">*</span></label>
                                <input type="text" name="phone_number" required>
                            </div>
                            <div class="delivery-content-left-input-top-item">
                                <label for="">City/Province<span style="color:red">*</span></label>
                                <input type="text" name="city" required>
                            </div>
                            <div class="delivery-content-left-input-top-item">
                                <label for="">District<span style="color:red">*</span></label>
                                <input type="text" name="district" required>
                            </div>
                        </div>
                        <div class="delivery-content-left-input-bottom row">
                            <label for="">Address<span style="color:red">*</span></label>
                            <input type="text" name="address" required>
                        </div>
                        <div class="delivery-content-left-button row">
                            <a href="cart.php"><span>&#10094;</span><p>Back to cart page</p> </a>
                            <button type="submit" name="submit"><p style="font-weight: bold;">Submit order</p></button>
                        </div>
                    </form>
                </div>
                <div class="delivery-content-right col-lg-4 col-md-5 col-5">
                    <table>
                        <tr>
                            <th>Product name</th>
                            <th>Size</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                        <?php
                        $subTotal = 0;
                        if($get_product_cart)
                        {
                            while($result = $get_product_cart->fetch_assoc())
                            {
                        
                        ?>
                        <tr>
                            <td><?php echo $result['product_name'] ?></td>
                            <td><?php echo $result['size'] ?></td>
                            <td><?php echo $result['quantity'] ?></td>
                            <td><?php echo '$'.$result['price'] ?></td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                        <tr class="boundary-items">
                            <td style="font-weight: bold;" colspan="3">Price</td>
                            <td style="font-weight: bold;">
                            <?php 
                            $subTotal = Session::get('subTotal'); 
                            echo '$'.$subTotal;
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;" colspan="3">Shipping fee</td>
                            <td style="font-weight: bold;">
                            <?php 
                            $shippingCost = Session::get('shippingCost'); 
                            echo '$'.$shippingCost;
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;" colspan="3">Total price</td>
                            <td style="font-weight: bold;">
                            <?php 
                            $total = Session::get('total'); 
                            echo '$'.$total;
                            ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
</section>

<?php
    include "Include_main/footer.php";
?>