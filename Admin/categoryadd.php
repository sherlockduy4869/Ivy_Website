<?php
    include 'Include/header.php';
    include 'Include/slider.php';
    include $_SERVER['DOCUMENT_ROOT'].'/Class/category.php';
?>

<?php
    $cate = new category();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $cateName = $_POST['cateName'];

        $cateAdd = $cate->insert_category($cateName);
    }
?>
    <div class="admin-content-right">
            <div class="admin-content-right-category_add">
                <h1>Add category</h1>
                <?php 
                    if(isset($cateAdd))
                    {
                        echo $cateAdd;
                    }
                ?>
                <form action="categoryadd.php" method="POST">
                    <input required type="text" placeholder="Enter category name" name="cateName">
                    <button type="submit" name="submit">Add</button>
                </form>
            </div>
    </div>
</section>
</body>
</html>