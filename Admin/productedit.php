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

    if(isset($_GET['product_id']))
    {
        $product_id = $_GET['product_id'];
        $product_by_id = $product->get_product_by_id($product_id);
        $product_image = $product_by_id['IMAGE'];
        
    }
        $get_product = $product->get_product_by_id($product_id);
?>
<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {             
        $product_edit = $product->edit_product($_POST, $_FILES,$product_id,$product_image);
    }

?>
    <div class="admin-content-right">
            <div class="admin-content-right-product_add">
                <h1>Edit product</h1>
                <form action="" method="POST" enctype="multipart/form-data">

                    <label for="">Enter product name<span style="color: red;">*</span></label>
                    <input type="text" name="product_name" value="<?php echo $get_product['PRODUCT_NAME'] ?>" required>

                    <label for="">Choose category<span style="color: red;">*</span></label>
                    <select name="category_id" id="select_category">
                        <option value="">--Category--</option>
                        <?php
                            if(isset($cateList))
                            {
                                while($result = $cateList->fetch_assoc())
                                {            
                                
                        ?>
                        <option <?php if($get_product['CATEGORY_ID'] == $result['CATEGORY_ID']) {echo "SELECTED";} ?> 
                        value="<?php echo $result['CATEGORY_ID'] ?>"><?php echo $result['CATEGORY_NAME']; ?></option>

                        <?php
                                }
                            }
                        ?>
                    </select>
                    <label for="">Product price<span style="color: red;">*</span></label>
                    <input type="text" required name="price" value="<?php echo $get_product['PRICE'] ?>">

                    <label for="">Product description<span style="color: red;">*</span></label>
                    <textarea name="product_desc" id="" cols="30" rows="10" required><?php echo $get_product['PRODUCT_DESCRIPTION'] ?></textarea>

                    <label for="">Choose type<span style="color: red;">*</span></label>
                    <select name="type" id="select_category">
                        <option value="">--Type--</option>
                        <option <?php if($get_product['TYPE'] == 2) {echo "SELECTED";} ?> value="2">Best-Seller</option>
                        <option <?php if($get_product['TYPE'] == 1) {echo "SELECTED";} ?> value="1">Featured</option>
                        <option <?php if($get_product['TYPE'] == 0) {echo "SELECTED";} ?> value="0">Non-Featured</option>
                    </select>

                    <label for="">Product picture<span style="color: red;">*</span></label> <br>
                    <img src="Uploads/<?php echo $get_product['IMAGE']; ?>" width="55px" alt="">
                    <input type="file" name="image">

                    <label for="">Product picture description<span style="color: red;">*</span></label>
                    <input type="file" name="product_img_desc[]" multiple>
                    <?php 
                    if(isset($product_edit))
                    {
                        echo $product_edit;
                    }
                    ?>
                    <button type="submit" name="submit">Edit</button> 
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