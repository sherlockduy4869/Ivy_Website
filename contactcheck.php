<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $customer_name = $_POST['customer_name'];
        $customer_email = $_POST['customer_email'];
        $subject = $_POST['subject'];
        $customer_message = $_POST['customer_message'];
        $msg = wordwrap($customer_message, 70);

        $mail_header = "From: ".$customer_name."<".$customer_email.">\r\n";
        $recipient = "duy.tran190201@vnuk.edu.vn";

        mail($recipient, $subject, $msg, $mail_header)
        or die("Error!");

        echo "message sent";
    }
?>