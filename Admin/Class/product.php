<?php
    include_once "Lib/database.php";
    include_once "Helpers/format.php";
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

        public function insert_product($data, $files){

            $product_name = mysqli_real_escape_string($this->db->link, $data['product_name']);
            $category_id = mysqli_real_escape_string($this->db->link, $data['category_id']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);


            $permited = array('jpg','jpeg','png');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];
            
            $div = explode('.',$file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $upload_image = "Uploads/".$unique_image;

            move_uploaded_file($file_temp,$upload_image);
            $query = "INSERT INTO tbl_product(product_name,category_id,price,product_desc,type,image) 
                      VALUES('$product_name','$category_id','$price','$product_desc','$type','$unique_image')";
            $result = $this->db->insert($query);

            
            if($result)
            {
                $query = "SELECT * FROM tbl_product ORDER BY product_id DESC LIMIT 1";
                $result_product = $this->db->select($query)->fetch_assoc();

                $product_id = $result_product['product_id'];
                $file_name_desc = $_FILES['product_img_desc']['name'];
                $file_tmp_desc = $_FILES['product_img_desc']['tmp_name'];
                foreach($file_name_desc as $key => $value)
                {
                    move_uploaded_file($file_tmp_desc[$key], "Uploads_desc/".$value);
                    $query = "INSERT INTO tbl_product_img_desc(product_id,product_img_desc) VALUES ('$product_id','$value')";
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

        public function show_product_list(){
            $query = "SELECT * FROM tbl_product ORDER BY product_id DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function delete_product($delID,$product_image){

            $query_select_image_desc = "SELECT * FROM tbl_product_img_desc WHERE product_id = '$delID'";
            $select_image_desc = $this->db->select($query_select_image_desc);

            while($image_desc = $select_image_desc->fetch_assoc())
                {
                    unlink("Uploads_desc/".$image_desc['product_img_desc']);
                }
                
            unlink("Uploads/".$product_image);

            $query = "DELETE FROM tbl_product WHERE product_id = '$delID'";
            $query_img_desc = "DELETE FROM tbl_product_img_desc WHERE product_id = '$delID'";
            $result = $this->db->delete($query);
            $result_img_desc = $this->db->delete($query_img_desc);

            

            
            header('Location:productlist.php');
        }
        public function get_product_by_id($product_id){
            $query = "SELECT * FROM tbl_product WHERE product_id = '$product_id'";
            $result = $this->db->select($query)->fetch_assoc();
            return $result;
        }

        public function edit_product($data, $files,$product_id){

            $product_name = mysqli_real_escape_string($this->db->link, $data['product_name']);
            $category_id = mysqli_real_escape_string($this->db->link, $data['category_id']);
            $product_id = mysqli_real_escape_string($this->db->link, $data['product_id']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);


            $permited = array('jpg','jpeg','png');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];
            
            $div = explode('.',$file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $upload_image = "Uploads/".$unique_image;

            move_uploaded_file($file_temp,$upload_image);
            $query = "UPDATE tbl_product
                    SET product_name = '$product_name',
                         category_id = '$category_id',
                         price = '$price',
                         product_desc = '$product_desc',
                         type = '$type',
                         image = '$unique_image' 
                    WHERE product_id = '$product_id'";

            $result = $this->db->update($query);

            
            if($result)
            {
                $query = "SELECT * FROM tbl_product ORDER BY product_id DESC LIMIT 1";
                $result_product = $this->db->select($query)->fetch_assoc();

                $product_id = $result_product['product_id'];
                $file_name_desc = $_FILES['product_img_desc']['name'];
                $file_tmp_desc = $_FILES['product_img_desc']['tmp_name'];
                foreach($file_name_desc as $key => $value)
                {
                    move_uploaded_file($file_tmp_desc[$key], "Uploads_desc/".$value);
                    $query = "INSERT INTO tbl_product_img_desc(product_id,product_img_desc) VALUES ('$product_id','$value')";
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

        
    }

?>