<?php
    include 'Include/header.php';
    include 'Include/slider.php';
    include $_SERVER['DOCUMENT_ROOT'].'/Class/category.php';
?>

<?php
    $cate = new category();

    if(!isset($_GET['cateID']) || $_GET['cateID'] == NULL)
    {
        echo "<script>window.location = 'categorylist.php'</script>";
    }
    else{
        $cateID = $_GET['cateID'];
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $cateName = $_POST['cateName'];

        $cateEdit = $cate->edit_category($cateID,$cateName);
    }

    $get_cate_name = $cate->get_cate_name_by_id($cateID);
?>

    <div class="admin-content-right">
            <div class="admin-content-right-category_add">
                <h1>Edit category</h1>
                <?php 
                    if(isset($cateEdit))
                    {
                        echo $cateEdit;
                    }
                ?>
                <?php
                    if($get_cate_name)
                    {
                        while($result = $get_cate_name->fetch_assoc())
                        {
                        
                ?>
                <form action="" method="POST">
                    <input required value="<?php echo $result['CATEGORY_NAME']; ?>" type="text" placeholder="Enter category name" name="cateName">
                    <button type="submit" name="submit">Edit</button>
                </form>

                <?php
                        }
                    }
                ?>
            </div>
    </div>
</section>
</body>
</html>