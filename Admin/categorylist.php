<?php
    include 'Include/header.php';
    include 'Include/slider.php';
    include $_SERVER['DOCUMENT_ROOT'].'/Class/category.php';
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
                <table id="category_list">
                    <thead>
                        <th id="th_DataTable">STT</th>
                        <th id="th_DataTable">ID</th>
                        <th id="th_DataTable">Category name</th>
                        <th id="th_DataTable">Customization</th>
                    </thead>
                    <tbody>
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
                                <td><?php echo $result['CATEGORY_ID'];?></td>
                                <td><?php echo $result['CATEGORY_NAME'];?></td>
                                <td><a href="categoryedit.php?cateID=<?php echo $result['CATEGORY_ID']; ?>">Edit</a>
                                |<a onclick="return confirm('Do you want to delete ?')" href="?delID=<?php echo $result['CATEGORY_ID']; ?>">Delete</a></td>
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