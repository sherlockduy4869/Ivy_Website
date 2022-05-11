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
            <div class="admin-content-right-category_list">
                <h1>Category List</h1>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Category name</th>
                        <th>Customization</th>
                    </tr>
                    <?php
                        $STT = 0;
                        if($cateList)
                        {
                            while($result = $cateList->fetch_assoc())
                            {
                                $STT ++;
                            
                    ?>
                        <tr>
                            <td><?php echo $STT ?></td>
                            <td><?php echo $result['cateID'];  ?></td>
                            <td><?php echo $result['cateName']; ?></td>
                            <td><a href="">Edit</a>|<a href="">Delete</a></td>
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