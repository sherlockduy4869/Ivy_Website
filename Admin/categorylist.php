<?php
    include 'Include/header.php';
    include 'Include/slider.php';
    include $_SERVER['DOCUMENT_ROOT'].'/Web_Final_Project/Class/category.php';
?>

<?php
    $cate = new category();
    $cateList = $cate->show_category_list();

    if(isset($_GET['delID']))
    {
        $delID = $_GET['delID'];
        $delCategoryID = $cate->delete_category($delID);
        
    }  
?>
    <div class="admin-content-right">
            <div class="admin-content-right-category_list">
                <h1>Category List</h1>
                <?php 
                    if(isset($delCategoryID))
                    {
                        echo $delCategoryID;
                    }
                ?>
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
                            <td><a href="categoryedit.php?cateID=<?php echo $result['cateID']; ?>">Edit</a>
                            |<a onclick="return confirm('Do you want to delete ?')" href="?delID=<?php echo $result['cateID']; ?>">Delete</a></td>
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