<?php
    include 'Include/header.php';
    include 'Include/slider.php';
    include $_SERVER['DOCUMENT_ROOT'].'/Class/category.php';
    include $_SERVER['DOCUMENT_ROOT'].'/Class/product.php';

?>

<?php
    $cate = new category();
    $cateList = $cate->show_category_list();
?>
<?php
    $product = new product();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $productAdd = $product->insert_product($_POST, $_FILES);
    }
?>
    <div class="admin-content-right">
            <div class="admin-content-right-product_add">
                <h1>Add product</h1>
                <form action="productadd.php" method="POST" enctype="multipart/form-data">
                    <label for="">Enter product name<span style="color: red;">*</span></label>
                    <input type="text" name="product_name" required>
                    <label for="">Choose category<span style="color: red;">*</span></label>
                    <select name="category_id" id="select_category">
                        <option value="">--Category--</option>
                        <?php
                            if(isset($cateList))
                            {
                                while($result = $cateList->fetch_assoc())
                                {            
                                
                        ?>
                        <option value="<?php echo $result['CATEGORY_ID'] ?>"><?php echo $result['CATEGORY_NAME']; ?></option>
                                    
                        <?php
                                }
                            }
                        ?>
                    </select>
                    <label for="">Product price<span style="color: red;">*</span></label>
                    <input type="text" required name="price">
                    <label for="">Product description<span style="color: red;">*</span></label>
                    <textarea name="product_desc" id="" cols="30" rows="10" required></textarea>
                    <label for="">Choose type<span style="color: red;">*</span></label>
                    <select name="type" id="select_category">
                        <option value="">--Type--</option>
                        <option value="2">Best-Seller</option>
                        <option value="1">Featured</option>
                        <option value="0">Non-Featured</option>
                    </select>
                    <label for="">Product picture<span style="color: red;">*</span></label>
                    <input type="file" required name="image">
                    <label for="">Product picture description<span style="color: red;">*</span></label>
                    <input type="file" name="product_img_desc[]" multiple required>
                    <?php 
                    if(isset($productAdd))
                    {
                        echo $productAdd;
                    }
                    ?>
                    <button type="submit" name="submit">Add</button> 
                </form>
            </div>
    </div>
</section>
    <script>
        CKEDITOR.replace( 'product_desc', {
	    filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
	    filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
        } );
    </script>
</body>
</html>