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

    //     public function show_category_list(){
    //         $query = "SELECT * FROM tbl_category ORDER BY cateID DESC";
    //         $result = $this->db->insert($query);
    //         return $result;
    //     }
        
    //     public function get_cate_name_by_id($cateID){
    //         $query = "SELECT * FROM tbl_category WHERE cateID = '$cateID'";
    //         $result = $this->db->select($query);
    //         return $result;
    //     }

    //     public function edit_category($cateID, $cateName){

    //         $cateName = $this->fm->validation($cateName);
    //         $cateName = mysqli_real_escape_string($this->db->link, $cateName);

    //         $query = "UPDATE tbl_category SET cateName = '$cateName' WHERE cateID = '$cateID'";
    //         $result = $this->db->update($query);
    //         if($result)
    //         {
    //             $alert = "<span class = 'addSuccess'>Edit category successfully</span>";
    //             return $alert;
    //         }
    //         else{
    //             $alert = "<span class = 'addError'>Can not edit category</span>";
    //             return $alert;
    //         }
    //     }

    //     public function delete_category($delID){
    //         $query = "DELETE FROM tbl_category WHERE cateID = '$delID'";
    //         $result = $this->db->delete($query);

    //         header('Location:categorylist.php');
    //     }
    }

?>