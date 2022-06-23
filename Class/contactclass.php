<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Lib/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Helpers/format.php';
    include_once "Class/contactclass.php";
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
            $customer_email = mysqli_real_escape_string($this->db->link, $data['customer_email']);
            $customer_message = mysqli_real_escape_string($this->db->link, $data['customer_message']);
            $date = date('d-m-y h:i:s');

            $query = "INSERT INTO tbl_contact(CUSTOMER_NAME,CUSTOMER_EMAIL,CUSTOMER_MESSAGE,DATE_CONACT) 
                  VALUES('$customer_name','$customer_email','$customer_message','$date')";
            $result = $this->db->insert($query);

            if($result){
                header('Location:contact.php');
            }
            else{
                header('Location:404.php');
            }
        }

    }
?>