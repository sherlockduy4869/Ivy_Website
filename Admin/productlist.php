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
                    <thead>
                        <th id="th_DataTable">ID</th>
                        <th id="th_DataTable">Image</th>
                        <th id="th_DataTable">Product name</th>
                        <th id="th_DataTable">Category name</th>
                        <th id="th_DataTable">Price</th>
                        <th id="th_DataTable">Type</th>
                        <th id="th_DataTable">Attributes</th>
                        <th id="th_DataTable">Customization</th>
                    </thead>
                    <tbody>
                        <?php
                            $productList = $product->show_product_list();
                            $myArray = array();
                            
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
                            <td><?php echo $result['CATEGORY_NAME']; ?></td>
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
                            <td><a href="#">Size</a>|<a href="#">Color</a></td>
                            <td><a href="productedit.php?product_id=<?php echo $result['product_id'];?>">Edit</a>|<a onclick="return confirm('Do you want to delete ?')" href="?delID=<?php echo $result['product_id']; ?>">Delete</a></td>
                            
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
        <script>
            $(document).ready(function () {
                $('#product_list').DataTable();
            });
        </script>
</body>
</html>