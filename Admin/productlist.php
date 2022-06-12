<?php
    include 'Include/header.php';
    include 'Include/slider.php';
    include $_SERVER['DOCUMENT_ROOT'].'/Web_Final_Project/Class/category.php';
    include $_SERVER['DOCUMENT_ROOT'].'/Web_Final_Project/Class/product.php';
?>

<?php
    $product = new product();
    if(isset($_GET['delID']))
    {
        $delID = $_GET['delID'];
        $product_by_id = $product->get_product_by_id($delID);
        $product_image = $product_by_id['image'];
        $delCategoryID = $product->delete_product($delID,$product_image);
        
    }  
?>
    <div class="admin-content-right">
            <div class="admin-content-right-category_list">
                <h1>Product List</h1>
                <table id="product_list">
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
                        <td><?php echo $result['cateName']; ?></td>
                        <td><?php echo $result['price']; ?></td>
                        <td><?php 
                            if($result['type'] == 2){
                                echo 'Best-Seller';
                            } 
                            else if($result['type'] == 1){
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