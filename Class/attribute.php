<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Web_Final_Project/Lib/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Web_Final_Project/Helpers/format.php';
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
            ORDER BY tbl_size.SIZE_ID DESC";
            $result = $this->db->select($query);
            return $result;
        }

        //Delete category information
        public function delete_size($size_del_id){
            $query = "DELETE FROM tbl_size WHERE SIZE_ID = '$size_del_id'";
            $result = $this->db->delete($query);
        }

        /*COLOR AREA*/
        //Show color list
        public function show_color_list($product_id_color){
            $query = "SELECT tbl_color.*, tbl_product.PRODUCT_NAME
            FROM tbl_color INNER JOIN tbl_product
            ON tbl_color.PRODUCT_ID = tbl_product.PRODUCT_ID
            WHERE tbl_color.PRODUCT_ID = '$product_id_color'
            ORDER BY tbl_color.COLOR_ID DESC";
            $result = $this->db->select($query);
            return $result;
        }
        
        //Delete color information
        public function delete_color($color_del_id){
            $query = "DELETE FROM tbl_color WHERE COLOR_ID = '$color_del_id'";
            $result = $this->db->delete($query);
        }
    }
?>