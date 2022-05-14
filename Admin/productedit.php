<?php
    include 'Include/header.php';
    include 'Include/slider.php';
    include 'Class/category.php';
    include 'Class/product.php';
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
        $product_image = $product_by_id['image'];
        
    }
        $get_product = $product->get_product_by_id($product_id);
?>
<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                
        $product_edit = $product->edit_product($_POST, $_FILES);
        $product_delete = $product->delete_product($product_id,$product_image);

    }

?>
    <div class="admin-content-right">
            <div class="admin-content-right-product_add">
                <h1>Edit product</h1>
                <form action="" method="POST" enctype="multipart/form-data">

                    <label for="">Enter product name<span style="color: red;">*</span></label>
                    <input type="text" name="product_name" value="<?php echo $get_product['product_name'] ?>" required>

                    <label for="">Choose category<span style="color: red;">*</span></label>
                    <select name="category_id" id="">
                        <option value="">--Category--</option>
                        <?php
                            if(isset($cateList))
                            {
                                while($result = $cateList->fetch_assoc())
                                {            
                                
                        ?>
                        <option <?php if($get_product['category_id'] == $result['cateID']) {echo "SELECTED";} ?> 
                        value="<?php echo $result['cateID'] ?>"><?php echo $result['cateName']; ?></option>

                        <?php
                                }
                            }
                        ?>
                    </select>
                    <label for="">Product price<span style="color: red;">*</span></label>
                    <input type="text" required name="price" value="<?php echo $get_product['price'] ?>">

                    <label for="">Product description<span style="color: red;">*</span></label>
                    <textarea name="product_desc" id="" cols="30" rows="10" required><?php echo $get_product['product_desc'] ?></textarea>

                    <label for="">Choose type<span style="color: red;">*</span></label>
                    <select name="type" id="">
                        <option value="">--Type--</option>
                        <option <?php if($get_product['type'] == 1) {echo "SELECTED";} ?> value="1">Featured</option>
                        <option <?php if($get_product['type'] == 0) {echo "SELECTED";} ?> value="0">Non-Featured</option>
                    </select>

                    <label for="">Product picture<span style="color: red;">*</span></label>
                    <input type="file" required name="image">

                    <label for="">Product picture description<span style="color: red;">*</span></label>
                    <input type="file" name="product_img_desc[]" multiple required>

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