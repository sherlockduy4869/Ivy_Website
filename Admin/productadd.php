<?php
    include 'Include/header.php';
    include 'Include/slider.php';
    include 'Class/category.php';

?>

<?php
    $cate = new category();
    $cateList = $cate->show_category_list();
?>
    <div class="admin-content-right">
            <div class="admin-content-right-product_add">
                <h1>Add product</h1>
                <form action="productadd.php" method="POST" enctype="multipart/form-data">
                    <label for="">Enter product name<span style="color: red;">*</span></label>
                    <input type="text" name="productName" required>
                    <label for="">Choose category<span style="color: red;">*</span></label>
                    <select name="" id="">
                        <option value="">--Category--</option>
                        <?php
                            if(isset($cateList))
                            {
                                while($result = $cateList->fetch_assoc())
                                {            
                                
                        ?>
                        <option value=""><?php echo $result['cateName']; ?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                    <label for="">Product price<span style="color: red;">*</span></label>
                    <input type="text" required>
                    <label for="">Product description<span style="color: red;">*</span></label>
                    <textarea name="editor" id="" cols="30" rows="10" required></textarea>
                    <label for="">Choose type<span style="color: red;">*</span></label>
                    <select name="" id="">
                        <option value="">--Type--</option>
                    </select>
                    <label for="">Product picture<span style="color: red;">*</span></label>
                    <input type="file" required>
                    <label for="">Product picture description<span style="color: red;">*</span></label>
                    <input type="file" multiple required>
                    <button type="submit">Add</button>
                </form>
            </div>
    </div>
</section>
            <script>
                CKEDITOR.replace( 'editor', {
	            filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
	            filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
} );
            </script>
</body>
</html>