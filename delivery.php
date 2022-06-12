<?php
    include "Include_main/header.php";
    include "Class/deliveryclass.php";
?>

<?php
    $deliver = new delivery();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $customerInfo = $deliver->insert_customer_information($_POST);
    }
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
                                <input type="text" name="customer_name">
                            </div>
                            <div class="delivery-content-left-input-top-item">
                                <label for="">Phone Number<span style="color:red">*</span></label>
                                <input type="text" name="phone_number">
                            </div>
                            <div class="delivery-content-left-input-top-item">
                                <label for="">City/Province<span style="color:red">*</span></label>
                                <input type="text" name="city">
                            </div>
                            <div class="delivery-content-left-input-top-item">
                                <label for="">District<span style="color:red">*</span></label>
                                <input type="text" name="district">
                            </div>
                        </div>
                        <div class="delivery-content-left-input-bottom row">
                            <label for="">Address<span style="color:red">*</span></label>
                            <input type="text" name="address">
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
                        <tr>
                            <td>Áo polo kẻ ngang MS</td>
                            <td>X</td>
                            <td>1</td>
                            <td>$30</td>
                        </tr>
                        <tr>
                            <td>Áo polo kẻ ngang MS PEO</td>
                            <td>XL</td>
                            <td>2</td>
                            <td>$50</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;" colspan="3">Price</td>
                            <td style="font-weight: bold;">$50</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;" colspan="3">Shipping fee</td>
                            <td style="font-weight: bold;">$50</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;" colspan="3">Total price</td>
                            <td style="font-weight: bold;">$100</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
</section>

<?php
    include "Include_main/footer.php";
?>