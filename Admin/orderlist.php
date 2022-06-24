<?php
    include 'Include/header.php';
    include 'Include/slider.php';
    include $_SERVER['DOCUMENT_ROOT'].'/Class/deliveryclass.php';
?>

<?php

    $order = new delivery();
    $order_list = $order->get_order_information();

?>
    <div class="admin-content-right">
            <div class="admin-content-right-category_list">
                <h1>Order List</h1>
                <table id="order_list">
                    <thead>
                        <th id="th_DataTable">Uni-num</th>
                        <th id="th_DataTable">Product</th>
                        <th id="th_DataTable">Options</th>
                        <th id="th_DataTable">Quantity</th>
                        <th id="th_DataTable">Total</th>
                        <th id="th_DataTable">Name</th>
                        <th id="th_DataTable">Phone</th>
                        <th id="th_DataTable">Email</th>
                        <th id="th_DataTable">Address</th>
                        <th id="th_DataTable">Date order</th>
                    </thead>
                    <tbody>
                        <?php
                            if($order_list)
                            {
                                while($result = $order_list->fetch_assoc())
                                {
                        ?>
                            <tr>
                                <td><?php echo $result['ORDER_ID'];?></td>
                                <td><?php echo $result['PRODUCT_NAME'];?></td>
                                <td><?php echo $result['SIZE'].'-'.$result['COLOR'];?></td>
                                <td><?php echo $result['QUANTITY'];?></td>
                                <td><?php echo '$'.$result['QUANTITY']*$result['PRICE'];?></td>
                                <td><?php echo $result['CUSTOMER_NAME'];?></td>
                                <td><?php echo $result['CUSTOMER_PHONE'];?></td>
                                <td><?php echo $result['CUSTOMER_EMAIL'];?></td>
                                <td><?php echo $result['CUSTOMER_ADDRESS'];?></td>
                                <td><?php echo $result['DATE_ORDER'];?></td>
                            </tr>
                        <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
    </div>
</section>
</body>
</html>