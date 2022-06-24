<?php
    include_once 'Include/header.php';
    include_once 'Include/slider.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/attribute.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/product.php';
?>

<?php
    $attr = new attribu();
    $product = new product();

    if(isset($_GET['color_del_id']))
    {
        $color_del_id = $_GET['color_del_id'];
        $color_del = $attr->delete_color($color_del_id);
    }  

    if(isset($_GET['product_id_color']))
    {
        $product_id_color = $_GET['product_id_color'];
        $colorList = $attr->show_color_list($product_id_color);
        $product_name = $product->get_product_by_id($product_id_color);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $color_value = $_POST['color_value'];
            
            $color_add = $attr->insert_color($color_value,$product_id_color);
        }
    }  
?>
    <div class="admin-content-right">
            <div class="admin-content-right-category_list admin-attribute-add">
                <h1>COLOR OF: <?php echo $product_name['PRODUCT_NAME'] ?> </h1>
                <form action="colorlist.php?product_id_color=<?php echo $product_id_color;?>" method="POST">
                    <input required type="text" placeholder="Enter color value" name="color_value">
                    <button type="submit" name="submit">Add</button>
                </form>
                <table id="color_list">
                    <thead>
                        <th id="th_DataTable">STT</th>
                        <th id="th_DataTable">ID</th>
                        <th id="th_DataTable">Product name</th>
                        <th id="th_DataTable">Color value</th>
                        <th id="th_DataTable">Customization</th>
                    </thead>
                    <tbody>
                        <?php
                            $STT = 0;
                            if($colorList)
                            {
                                while($result = $colorList->fetch_assoc())
                                {
                                    $STT ++;
                                
                        ?>
                            <tr>
                                <td><?php echo $STT ?></td>
                                <td><?php echo $result['COLOR_ID'] ?></td>
                                <td><?php echo $result['PRODUCT_NAME'] ?></td>
                                <td><?php echo $result['COLOR_VALUE'] ?></td>
                                <td><a onclick="return confirm('Do you want to delete ?')" href="colorlist.php?product_id_color=
                                <?php echo $product_id_color ?>&color_del_id=<?php echo $result['COLOR_ID'] ?>">Delete</a></td>
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