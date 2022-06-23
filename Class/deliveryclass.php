<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Lib/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Helpers/format.php';
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

        //Insert customer information
        public function insert_customer_information($data){

            $customer_name = mysqli_real_escape_string($this->db->link, $data['customer_name']);
            $phone_number = mysqli_real_escape_string($this->db->link, $data['phone_number']);
            $city = mysqli_real_escape_string($this->db->link, $data['city']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $session_id = session_id();
            $full_address = $address.', '.$city;

            $date = date('d-m-y h:i:s');

            $query = "INSERT INTO tbl_order(SESSION_ID,CUSTOMER_NAME,CUSTOMER_PHONE,CUSTOMER_EMAIL,CUSTOMER_ADDRESS,DATE_ORDER) 
                  VALUES('$session_id','$customer_name','$phone_number','$email','$full_address','$date' )";
            $result = $this->db->insert($query);
            if($result){
                $query = "UPDATE tbl_cart SET STATUS = 1 WHERE SESSION_ID = '$session_id'";
                $result = $this->db->update($query);
            }
            header('Location:order-sucessful.php');
        }
        
        //Get customer information
        public function get_customer_information(){
            $session_id = session_id();
            $query = "SELECT * FROM tbl_order WHERE SESSION_ID = '$session_id'";
            $result = $this->db->select($query);
            return $result;
        }

        //Get order information
        public function get_order_information(){
            $query = "SELECT tbl_order.*,tbl_cart.* 
                      FROM tbl_order INNER JOIN tbl_cart
                      ON tbl_order.SESSION_ID = tbl_cart.SESSION_ID";
            
            $result = $this->db->select($query);
            return $result;
        }
    }
?>