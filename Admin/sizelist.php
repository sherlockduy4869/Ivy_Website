<?php
    include_once 'Include/header.php';
    include_once 'Include/slider.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Web_Final_Project/Class/attribute.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Web_Final_Project/Class/product.php';
?>

<?php
    $attr = new attribu();
    $product = new product();

    if(isset($_GET['size_del_id']))
    {
        $size_del_id = $_GET['size_del_id'];
        $size_del = $attr->delete_size($size_del_id);
    }  

    if(isset($_GET['product_id_size']))
    {
        $product_id_size = $_GET['product_id_size'];
        $sizeList = $attr->show_size_list($product_id_size);
        $product_name = $product->get_product_by_id($product_id_size);
    }  
?>
    <div class="admin-content-right">
            <div class="admin-content-right-category_list">
                <h1>SIZE OF: <?php echo $product_name['PRODUCT_NAME'] ?> </h1>
                <table id="size_list">
                    <thead>
                        <th id="th_DataTable">STT</th>
                        <th id="th_DataTable">ID</th>
                        <th id="th_DataTable">Product name</th>
                        <th id="th_DataTable">Size value</th>
                        <th id="th_DataTable">Customization</th>
                    </thead>
                    <tbody>
                        <?php
                            $STT = 0;
                            if($sizeList)
                            {
                                while($result = $sizeList->fetch_assoc())
                                {
                                    $STT ++;
                                
                        ?>
                            <tr>
                                <td><?php echo $STT ?></td>
                                <td><?php echo $result['SIZE_ID'] ?></td>
                                <td><?php echo $result['PRODUCT_NAME'] ?></td>
                                <td><?php echo $result['SIZE_VALUE'] ?></td>
                                <td><a href="sizeedit.php?size_id=<?php echo $result['SIZE_ID'] ?>">Edit</a>
                                |<a onclick="return confirm('Do you want to delete ?')" href="sizelist.php?product_id_size=
                                <?php echo $product_id_size ?>&size_del_id=<?php echo $result['SIZE_ID'] ?>">Delete</a></td>
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
        $('#size_list').DataTable();
    });        
</script>
</body>
</html>