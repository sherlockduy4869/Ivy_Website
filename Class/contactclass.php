<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Lib/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Helpers/format.php';
?>

<?php

    class contact
    {
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        //Sending customer contact information
        public function sending_customer_contact_information($data){

            $customer_name = mysqli_real_escape_string($this->db->link, $data['customer_name']);
            $customer_email = mysqli_real_escape_string($this->db->link, $data['customer_email']);
            $customer_message = mysqli_real_escape_string($this->db->link, $data['customer_message']);
            $date = date('d-m-y h:i:s');

            $customer_name = $data['customer_name'];
            $customer_email = $data['customer_email'];
            $subject = "Customer From Ivy Website";
            $customer_message = $data['customer_message'];

            $mailheader = "From:".$customer_name."<".$customer_email.">\r\n";

            $recipient = "duy.tran190201@vnuk.edu.vn";

            mail($recipient, $subject, $customer_message, $mailheader) or die("Error!");
            
            header('Location:contact-successful.php');
        }

    }
?>