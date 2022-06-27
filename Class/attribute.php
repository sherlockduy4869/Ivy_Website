<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Lib/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Helpers/format.php';
?>

<?php

    class attribu
    {
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        /*SIZE AREA*/
        //Show size list
        public function show_size_list($product_id_size){
            $query = "SELECT tbl_size.*, tbl_product.PRODUCT_NAME
            FROM tbl_size INNER JOIN tbl_product
            ON tbl_size.PRODUCT_ID = tbl_product.PRODUCT_ID
            WHERE tbl_size.PRODUCT_ID = '$product_id_size'
            ORDER BY tbl_size.SIZE_ID";
            $result = $this->db->select($query);
            return $result;
        }

        //Delete size information
        public function delete_size($size_del_id){
            $query = "DELETE FROM tbl_size WHERE SIZE_ID = '$size_del_id'";
            $result = $this->db->delete($query);
        }

        //Insert size information
        public function insert_size($size_value,$product_id_size){
            $size_value = $this->fm->validation($size_value);
            $product_id_size = $this->fm->validation($product_id_size);
            $size_value = mysqli_real_escape_string($this->db->link, $size_value);
            $product_id_size = mysqli_real_escape_string($this->db->link, $product_id_size);

            $query = "INSERT INTO tbl_size(PRODUCT_ID,SIZE_VALUE) VALUES('$product_id_size','$size_value')";
            $result = $this->db->insert($query);

            header('Location:Admin/sizelist.php?product_id_size='.$product_id_size);
        }

        /*COLOR AREA*/
        //Show color list
        public function show_color_list($product_id_color){
            $query = "SELECT tbl_color.*, tbl_product.PRODUCT_NAME
            FROM tbl_color INNER JOIN tbl_product
            ON tbl_color.PRODUCT_ID = tbl_product.PRODUCT_ID
            WHERE tbl_color.PRODUCT_ID = '$product_id_color'
            ORDER BY tbl_color.COLOR_ID";
            $result = $this->db->select($query);
            return $result;
        }
        
        //Delete color information
        public function delete_color($color_del_id){
            $query = "DELETE FROM tbl_color WHERE COLOR_ID = '$color_del_id'";
            $result = $this->db->delete($query);
        }

        //Insert color information
        public function insert_color($color_value,$product_id_color){
            $color_value = $this->fm->validation($color_value);
            $product_id_color = $this->fm->validation($product_id_color);
            $color_value = mysqli_real_escape_string($this->db->link, $color_value);
            $product_id_color = mysqli_real_escape_string($this->db->link, $product_id_color);

            $query = "INSERT INTO tbl_color(PRODUCT_ID,COLOR_VALUE) VALUES('$product_id_color','$color_value')";
            $result = $this->db->insert($query);

            header('Location:Admin/colorlist.php?product_id_color='.$product_id_color);
        }
    }
?>