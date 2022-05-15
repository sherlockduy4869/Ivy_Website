<?php
    include "Include_main/header.php";
?>

<!--DELIVERY AREA-->
<section class="featured-product-area delivery-area">
        <div class="container">
            <div class="delivery-content row">
                <div class="delivery-content-left">
                    <div class="delivery-content-left-input-top row">
                        <div class="delivery-content-left-input-top-item">
                            <label for="">Your Name<span style="color:red">*</span></label>
                            <input type="text">
                        </div>
                        <div class="delivery-content-left-input-top-item">
                            <label for="">Phone Number<span style="color:red">*</span></label>
                            <input type="text">
                        </div>
                        <div class="delivery-content-left-input-top-item">
                            <label for="">City/Province<span style="color:red">*</span></label>
                            <input type="text">
                        </div>
                        <div class="delivery-content-left-input-top-item">
                            <label for="">District<span style="color:red">*</span></label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="delivery-content-left-input-bottom row">
                        <label for="">Address<span style="color:red">*</span></label>
                        <input type="text">
                    </div>
                    <div class="delivery-content-left-button row">
                        <a href=""><span>&#10094;</span><p>Back to cart page</p> </a>
                        <button><p style="font-weight: bold;">Submit order</p></button>
                    </div>
                </div>
                <div class="delivery-content-right">
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