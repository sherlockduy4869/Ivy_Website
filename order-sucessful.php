<?php
    include "Include_main/header.php";
    include "Class/deliveryclass.php";
?>
<?php
    $deliver = new delivery();

    $customerConfirm = $deliver->get_customer_information();
?>
<!--ORDER SUCESSFULL AREA-->
<section class="featured-product-area order-sucessfull-area container text-center">
        <div class="bill-confirm">
            <h1>Thank you for your order</h1>
            <?php
                if(isset($customerConfirm)){
                    $result = $customerConfirm->fetch_assoc();
            ?>
            <ul>
                <li>Name: <span><?php echo $result['CUSTOMER_NAME'] ?></span></span></li>
                <li>Phone: <span><?php echo $result['CUSTOMER_PHONE'] ?></span></li>
                <li>Address: <span><?php echo $result['CUSTOMER_ADDRESS'] ?></span></li>
                <li style="color: red">Unique Order Reference Number: <span><?php echo $result['ORDER_ID'] ?></span></li>
            </ul>
            <ul>
                <li style="color: red">Order Total: <span>
                    <?php 
                    $total = Session::get('total'); 
                    echo '$'.$total;
                    ?>
                </span></span></li>
                <li><span>Please preparing this amount of money when recieving the products</span></li>
            </ul>
            <?php
                }
            ?>
            <p>We appriciate your business ! <br>
                If you have any question, please email <a href="mailto:duy.tran190201@vnuk.edu.vn">duy.tran190201@vnuk.edu.vn</a>
            </p> <br>
            <button class="btn mt-3"><a href="index.php">CONTINUE SHOPPING</a></button>
        </div>
</section>

<?php
    include "Include_main/footer.php";
?>
