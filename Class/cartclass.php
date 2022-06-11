<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Web_Final_Project/Lib/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Web_Final_Project/Helpers/format.php';
?>

<?php

    class cart
    {
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        //Save information about cart items in contemporary session
        public function add_to_cart($product_id,$quantity,$size){

            $quantity = $this->fm->validation($quantity);
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $product_id = mysqli_real_escape_string($this->db->link, $product_id);
            $session_id = session_id();

            $query = "SELECT * FROM tbl_product WHERE product_id = '$product_id'";
            $result = $this->db->select($query)->fetch_assoc();

            $product_name = $result['product_name'];
            $price = $result['price'];
            $image = $result['image'];

            $check_cart = "SELECT * FROM tbl_cart WHERE session_id = '$session_id' AND product_id = '$product_id' AND size = '$size'";
            $result_check_cart = $this->db->select($check_cart);
            if($result_check_cart)
            {
                $message = "<span class = 'addError mt-2'>This product has already added !</span> <br>";
                return $message;
            }
            else
            {
                $query_insert_cart = "INSERT INTO tbl_cart(producT_id,session_id,product_name,price,size,quantity,image) 
                VALUES('$product_id','$session_id','$product_name','$price','$size','$quantity','$image')";
                $insert_cart = $this->db->insert($query_insert_cart);

                if($insert_cart)
                {
                    header('Location:cart.php');
                }
                else{
                    header('Location:404.php');
                }
            }
        }

        //Get product cart
        public function get_product_cart(){
            $session_id = session_id();
            $query = "SELECT * FROM tbl_cart WHERE session_id = '$session_id'";
            $result = $this->db->select($query);
            return $result;
        }
    }
?>