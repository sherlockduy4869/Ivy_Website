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

        //Insert customer information
        public function insert_customer_information($data){

            $customer_name = mysqli_real_escape_string($this->db->link, $data['customer_name']);
            $phone_number = mysqli_real_escape_string($this->db->link, $data['phone_number']);
            $city = mysqli_real_escape_string($this->db->link, $data['city']);
            $district = mysqli_real_escape_string($this->db->link, $data['district']);
            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $session_id = session_id();

            $query = "INSERT INTO tbl_customer_information(customer_name,phone_number,city,district,address,session_id) 
                  VALUES('$customer_name','$phone_number','$city','$district','$address','$session_id')";
            $result = $this->db->insert($query);
            header('Location:order-sucessful.php');
        }
        
        //Get customer information
        public function get_customer_information(){
            $session_id = session_id();
            $query = "SELECT * FROM tbl_customer_information WHERE session_id = '$session_id'";
            $result = $this->db->select($query);
            return $result;
        }
    }
?>