<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Web_Final_Project/Lib/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Web_Final_Project/Helpers/format.php';
?>

<?php

    class product
    {
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        //Insert product
        public function insert_product($data, $files){

            $product_name = mysqli_real_escape_string($this->db->link, $data['product_name']);
            $category_id = mysqli_real_escape_string($this->db->link, $data['category_id']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);


            $permited = array('jpg','jpeg','png','jfif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];
            
            $div = explode('.',$file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $upload_image = "Uploads/".$unique_image;

            if($file_size > 1000000){
                echo "<span class = 'addError'>Image size should be less than 1MB</span> <br>";
            }
            elseif (in_array($file_ext,$permited) === false){
                $alert = "<span class = 'addError'>You can up load only:-".implode(',',$permited)."</span> <br>" ;
                return $alert;
            }

            move_uploaded_file($file_temp,$upload_image);
            $query = "INSERT INTO tbl_product(PRODUCT_NAME,CATEGORY_ID,PRICE,PRODUCT_DESCRIPTION,TYPE,IMAGE) 
                  VALUES('$product_name','$category_id','$price','$product_desc','$type','$unique_image')";
            $result = $this->db->insert($query);

        
            if($result)
            {
                $query = "SELECT * FROM tbl_product ORDER BY PRODUCT_ID DESC LIMIT 1";
                $result_product = $this->db->select($query)->fetch_assoc();

                $product_id = $result_product['PRODUCT_ID'];
                $file_name_desc = $_FILES['product_img_desc']['name'];
                $file_tmp_desc = $_FILES['product_img_desc']['tmp_name'];
                foreach($file_name_desc as $key => $value)
                {
                    move_uploaded_file($file_tmp_desc[$key], "Uploads_desc/".$value);
                    $query = "INSERT INTO tbl_product_image_description(PRODUCT_ID,PRO_IMG_DES) VALUES ('$product_id','$value')";
                    $result_product_img_desc = $this->db->insert($query);
                }

                $alert = "<span class = 'addSuccess'>Add product successfully</span> <br>";
                return $alert;
            }
                else{
                $alert = "<span class = 'addError'>Can not add product</span> <br>";
                return $alert;
            }
        }

        //Delete product
        public function delete_product($delID,$product_image){

            $query_select_image_desc = "SELECT * FROM tbl_product_image_description WHERE PRODUCT_ID = '$delID'";
            $select_image_desc = $this->db->select($query_select_image_desc);

            while($image_desc = $select_image_desc->fetch_assoc())
                {
                    unlink("Uploads_desc/".$image_desc['PRO_IMG_DES']);
                }
                
            unlink("Uploads/".$product_image);
            $query_img_desc = "DELETE FROM tbl_product_image_description WHERE PRODUCT_ID = '$delID'";
            $query = "DELETE FROM tbl_product WHERE PRODUCT_ID = '$delID'";
            $result_img_desc = $this->db->delete($query_img_desc);
            $result = $this->db->delete($query);
            

            header('Location:productlist.php');
        }

        //Get product information 
        public function get_product_by_id($product_id){
            $query = "SELECT * FROM tbl_product WHERE PRODUCT_ID = '$product_id'";
            $result = $this->db->select($query)->fetch_assoc();
            return $result;
        }

        //Edit product information
        public function edit_product($data, $files,$product_id_edit,$product_image){
            $product_name = mysqli_real_escape_string($this->db->link, $data['product_name']);
            $category_id = mysqli_real_escape_string($this->db->link, $data['category_id']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);


            $permited = array('jpg','jpeg','png','jfif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];
            
            $div = explode('.',$file_name);
            $file_ext = strtolower(end($div));  
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $upload_image = "Uploads/".$unique_image;
            
            //If enter new image
            if(!empty($file_name)){

                unlink("Uploads/".$product_image);

                if($file_size > 1000000){
                    echo "<span class = 'addError'>Image size should be less than 1MB</span> <br>";
                }
                elseif (in_array($file_ext,$permited) === false){
                    $alert = "<span class = 'addError'>You can up load only:-".implode(',',$permited)."</span> <br>" ;
                    return $alert;
                }

                move_uploaded_file($file_temp,$upload_image);
                $query = "UPDATE tbl_product SET
                        PRODUCT_NAME = '$product_name'
                        ,CATEGORY_ID = '$category_id'
                        ,PRICE = '$price'
                        ,PRODUCT_DESCRIPTION = '$product_desc'
                        ,TYPE = '$type'
                        ,IMAGE = '$unique_image'
                        WHERE PRODUCT_ID ='$product_id_edit'";

                $result = $this->db->update($query);

                if($result)
                {
                    $query = "SELECT * FROM tbl_product where PRODUCT_ID = '$product_id_edit'";
                    $result_product = $this->db->select($query)->fetch_assoc();

                    $product_id = $result_product['PRODUCT_ID'];
                    $file_name_desc = $_FILES['product_img_desc']['name'];
                    $file_tmp_desc = $_FILES['product_img_desc']['tmp_name'];

                    if($file_name_desc[0] != null)
                    {   
                        $query_select_image_desc = "SELECT * FROM tbl_product_image_description WHERE PRODUCT_ID = '$product_id_edit'";
                        $select_image_desc = $this->db->select($query_select_image_desc);
        
                        while($image_desc = $select_image_desc->fetch_assoc())
                        {
                            unlink("Uploads_desc/".$image_desc['PRO_IMG_DES']);
                        }

                        foreach($file_name_desc as $key => $value)
                        {
                            move_uploaded_file($file_tmp_desc[$key], "Uploads_desc/".$value);
                            $query = "UPDATE tbl_product_image_description SET
                                    PRO_IMG_DES = '$value'
                                    where PRODUCT_ID = '$product_id'";
                            $result_product_img_desc = $this->db->update($query);
                        }
                    }
                }
                $alert = "<span class = 'addSuccess'>Edit product successfully</span> <br>";
                return $alert;
            }
            //If not enter new image
            else{
                move_uploaded_file($file_temp,$upload_image);
                $query = "UPDATE tbl_product SET
                          PRODUCT_NAME = '$product_name'
                          ,CATEGORY_ID = '$category_id'
                          ,PRICE = '$price'
                          ,PRODUCT_DESCRIPTION = '$product_desc'
                          ,TYPE = '$type'
                          WHERE PRODUCT_ID ='$product_id_edit'";

                $result = $this->db->update($query);

                if($result)
                {
                    $query = "SELECT * FROM tbl_product where PRODUCT_ID = '$product_id_edit'";
                    $result_product = $this->db->select($query)->fetch_assoc();

                    $product_id = $result_product['PRODUCT_ID'];
                    $file_name_desc = $_FILES['product_img_desc']['name'];
                    $file_tmp_desc = $_FILES['product_img_desc']['tmp_name'];

                    if($file_name_desc[0] != null)
                    {   
                        $query_select_image_desc = "SELECT * FROM tbl_product_image_description WHERE PRODUCT_ID = '$product_id_edit'";
                        $select_image_desc = $this->db->select($query_select_image_desc);
        
                        while($image_desc = $select_image_desc->fetch_assoc())
                        {
                            unlink("Uploads_desc/".$image_desc['PRO_IMG_DES']);
                        }

                        foreach($file_name_desc as $key => $value)
                        {
                            move_uploaded_file($file_tmp_desc[$key], "Uploads_desc/".$value);
                            $query = "UPDATE tbl_product_image_description SET
                                    PRO_IMG_DES = '$value'
                                    where PRODUCT_ID = '$product_id'";
                            $result_product_img_desc = $this->db->update($query);
                        }
                    }
                }
                $alert = "<span class = 'addSuccess'>Edit product successfully</span> <br>";
                return $alert;
            }
            $alert = "<span class = 'addError'>Can not edit product</span> <br>";
            return $alert;
        }

        // Show product information
        public function show_product_list(){
            $query = "SELECT tbl_product.*, tbl_category.CATEGORY_NAME
            FROM tbl_product
            INNER JOIN tbl_category
            ON tbl_product.CATEGORY_ID = tbl_category.CATEGORY_ID
            ORDER BY tbl_product.PRODUCT_ID DESC";
            $result = $this->db->select($query);
            return $result;
        }

        // Show featured product information
        public function show_featured_product_list(){
            $query = "SELECT tbl_product.*, tbl_category.CATEGORY_NAME 
            FROM tbl_product
            INNER JOIN tbl_category
            ON tbl_product.CATEGORY_ID = tbl_category.CATEGORY_ID
            WHERE type = 1
            ORDER BY tbl_product.PRODUCT_ID DESC";
            $result = $this->db->select($query);
            return $result;
        }

        // Show featured product information
        public function show_best_seller_product_list(){
            $query = "SELECT tbl_product.*, tbl_category.CATEGORY_NAME 
            FROM tbl_product
            INNER JOIN tbl_category
            ON tbl_product.CATEGORY_ID = tbl_category.CATEGORY_ID
            WHERE type = 2
            ORDER BY tbl_product.PRODUCT_ID DESC";
            $result = $this->db->select($query);
            return $result;
        }

        // Show featured product information by id
        public function show_product_list_by_id($product_id){
            $query = "SELECT tbl_product.*, tbl_category.CATEGORY_NAME 
            FROM tbl_product
            INNER JOIN tbl_category
            ON tbl_product.CATEGORY_ID = tbl_category.CATEGORY_ID
            WHERE product_id = '$product_id'
            ORDER BY tbl_product.PRODUCT_ID DESC LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }

        // Show featured product information by id
        public function show_product_desc_by_id($product_id){
            $query = "SELECT * FROM tbl_product_image_description WHERE PRODUCT_ID = '$product_id' LIMIT 3";
            $result = $this->db->select($query);
            return $result;
        }

        //Show product by category
        public function get_product_by_cate($cateID){
            $query = "SELECT * FROM tbl_product WHERE CATEGORY_ID = '$cateID'";
            $result = $this->db->select($query);
            return $result;
        }

        //Get product number order
        public function get_product_number_order($product_id){
            $query = "SELECT tbl_product.PRODUCT_ID, SUM(tbl_cart.QUANTITY) AS NUM
            FROM tbl_product
            INNER JOIN tbl_cart
            ON tbl_product.PRODUCT_ID = tbl_cart.PRODUCT_ID
			WHERE tbl_cart.STATUS = 1 AND tbl_product.PRODUCT_ID = '$product_id'
			GROUP BY tbl_product.PRODUCT_ID";
            $result = $this->db->select($query);
            return $result;
        }
    }
?>