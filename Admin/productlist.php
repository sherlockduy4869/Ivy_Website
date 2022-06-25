<?php
    include 'Include/header.php';
    include 'Include/slider.php';
    include $_SERVER['DOCUMENT_ROOT'].'/Class/category.php';
    include $_SERVER['DOCUMENT_ROOT'].'/Class/product.php';
?>

<?php
    $product = new product();
    if(isset($_GET['delID']))
    {
        $delID = $_GET['delID'];
        $product_by_id = $product->get_product_by_id($delID);
        $product_image = $product_by_id['IMAGE'];
        $delCategoryID = $product->delete_product($delID,$product_image);
        
    }  
?>
    <div class="admin-content-right">
            <div class="admin-content-right-category_list">
                <h1>Product List</h1>
                <table id="product_list">
                    <thead>
                        <th id="th_DataTable">ID</th>
                        <th id="th_DataTable">Image</th>
                        <th id="th_DataTable">Product name</th>
                        <th id="th_DataTable">Category name</th>
                        <th id="th_DataTable">Price</th>
                        <th id="th_DataTable">Sold</th>
                        <th id="th_DataTable">Type</th>
                        <th id="th_DataTable">Attributes</th>
                        <th id="th_DataTable">Customization</th>
                        
                    </thead>
                    <tbody>
                        <?php
                            $productList = $product->show_product_list();
                            
                            if($productList)
                            {   
                                $ID = 0;
                                while($result = $productList->fetch_assoc())
                                {
                                    $ID++;
                                    if($product->get_product_number_order($result['PRODUCT_ID'])){
                                        $getNum = $product->get_product_number_order($result['PRODUCT_ID'])->fetch_assoc()['NUM'];
                                    }
                                    else{
                                        $getNum = 0;
                                    }
                        ?>
                        <tr>
                            
                            <td><?php echo $ID; ?></td>
                            <td><img src="Uploads/<?php echo $result['IMAGE']; ?>" width="55px" alt=""></td>
                            <td><?php echo $result['PRODUCT_NAME']; ?></td>
                            <td><?php echo $result['CATEGORY_NAME']; ?></td>
                            <td><?php echo $result['PRICE']; ?></td>
                            <td><?php echo $getNum ?></td>
                            <td><?php 
                                if($result['TYPE'] == 2){
                                    echo 'Best-Seller';
                                } 
                                else if($result['TYPE'] == 1){
                                    echo 'Featured';
                                } 
                                else{
                                    echo 'Non-Featured';
                                }
                            ?></td>
                            <td><a href="sizelist.php?product_id_size=<?php echo $result['PRODUCT_ID'];?>">Size</a>|<a href="colorlist.php?product_id_color=<?php echo $result['PRODUCT_ID'];?>">Color</a></td>
                            <td><a href="productedit.php?product_id=<?php echo $result['PRODUCT_ID'];?>">Edit</a>
                            |<a onclick="return confirm('Do you want to delete ?')" href="?delID=<?php echo $result['PRODUCT_ID']; ?>">Delete</a></td>
                            
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