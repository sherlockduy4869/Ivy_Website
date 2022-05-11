<?php
    include 'Include/header.php';
    include 'Include/slider.php';

?>
    <div class="admin-content-right">
            <div class="admin-content-right-product_add">
                <h1>Add product</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Enter product name<span style="color: red;">*</span></label>
                    <input type="text">
                    <label for="">Choose category<span style="color: red;">*</span></label>
                    <select name="" id="">
                        <option value="">--Category--</option>
                    </select>
                    <label for="">Product price<span style="color: red;">*</span></label>
                    <input type="text">
                    <label for="">Product description<span style="color: red;">*</span></label>
                    <textarea name="" id="" cols="30" rows="10"></textarea>
                    <label for="">Product picture<span style="color: red;">*</span></label>
                    <input type="file">
                    <label for="">Product picture description<span style="color: red;">*</span></label>
                    <input type="file" multiple>
                    <button type="submit">Add</button>
                </form>
            </div>
    </div>
</section>
</body>
</html>