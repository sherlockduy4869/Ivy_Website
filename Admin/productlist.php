<?php
    include 'Include/header.php';
    include 'Include/slider.php';
    include 'Class/category.php';
    include 'Class/product.php';
?>

<?php
    $product = new product();
    if(isset($_GET['delID']))
    {
        $delID = $_GET['delID'];
        $delCategoryID = $product->delete_product($delID);
        
    }  
?>
    <div class="admin-content-right">
            <div class="admin-content-right-category_list">
                <h1>Product List</h1>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Product name</th>
                        <th>Category name</th>
                        <th>Price</th>
                        <th>Type</th>
                        <th>Customization</th>
                    </tr>
                    <?php
                        $productList = $product->show_product_list();

                        if($productList)
                        {   
                            $ID = 0;
                            while($result = $productList->fetch_assoc())
                            {
                                $ID++;
                    ?>
                    <tr>
                        
                        <td><?php echo $ID; ?></td>
                        <td><img src="Uploads/<?php echo $result['image']; ?>" width="55px" alt=""></td>
                        <td><?php echo $result['product_name']; ?></td>
                        <td><?php echo $result['category_id']; ?></td>
                        <td><?php echo $result['price']; ?></td>
                        <td><?php 
                            if($result['type'] == 1){
                                echo 'Featured';
                            } 
                            else{
                                echo 'Non-Featured';
                            }
                        ?></td>
                        <td><a href="productedit.php?product_id=<?php echo $result['product_id'];?>">Edit</a>|<a onclick="return confirm('Do you want to delete ?')" href="?delID=<?php echo $result['product_id']; ?>">Delete</a></td>
                        
                    </tr>
                    <?php
                                }
                            }
                        ?>
                </table>
            </div>
    </div>
</section>
</body>
</html>