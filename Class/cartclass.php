<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Lib/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Helpers/format.php';
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
        public function add_to_cart($product_id,$quantity,$size,$color){

            $quantity = $this->fm->validation($quantity);
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $product_id = mysqli_real_escape_string($this->db->link, $product_id);
            $session_id = session_id();

            $query = "SELECT * FROM tbl_product WHERE PRODUCT_ID = '$product_id'";
            $result = $this->db->select($query)->fetch_assoc();

            $product_name = $result['PRODUCT_NAME'];
            $price = $result['PRICE'];
            $image = $result['IMAGE'];

            $check_cart = "SELECT * FROM tbl_cart WHERE SESSION_ID = '$session_id' AND PRODUCT_ID = '$product_id' AND SIZE = '$size' AND COLOR = '$color'";
            $result_check_cart = $this->db->select($check_cart);
            if($result_check_cart)
            {
                $message = "<span class = 'addError mt-2'>This product has already added !</span> <br>";
                return $message;
            }
            else
            {
                $query_insert_cart = "INSERT INTO tbl_cart(PRODUCT_ID,SESSION_ID,PRODUCT_NAME,PRICE,SIZE,COLOR,QUANTITY,IMAGE) 
                VALUES('$product_id','$session_id','$product_name','$price','$size','$color','$quantity','$image')";
                $insert_cart = $this->db->insert($query_insert_cart);

                if($insert_cart)
                {
                    echo "<script>location='https://web-ivy.herokuapp.com/cart.php'</script>";
                }
                else{
                    echo "<script>location='https://web-ivy.herokuapp.com/404.php'</script>";
                }
            }
        }

        //Get product cart
        public function get_product_cart(){
            $session_id = session_id();
            $query = "SELECT * FROM tbl_cart WHERE SESSION_ID = '$session_id' ORDER BY CART_ID DESC";
            $result = $this->db->select($query);
            return $result;
        }

        //Delete product cart
        public function delete_product_cart($cart_id){
            $cart_id = mysqli_real_escape_string($this->db->link, $cart_id);
            $query = "DELETE FROM tbl_cart WHERE CART_ID = '$cart_id'";
            $result = $this->db->delete($query);
            echo "<script>location='https://web-ivy.herokuapp.com/cart.php'</script>";
        }
    }
?>