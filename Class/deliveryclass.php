<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Web_Final_Project/Lib/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Web_Final_Project/Helpers/format.php';
?>

<?php

    class delivery
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
        
    }
?>