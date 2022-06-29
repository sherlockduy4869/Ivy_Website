<?php
    $customer_name = $POST['customer_name'];
    $customer_email = $POST['customer_email'];
    $subject = "Customer From Ivy Website";
    $customer_message = $POST['customer_message'];

    $mailheader = "From:".$customer_name."<".$customer_email.">\r\n";

    $recipient = "duy.tran190201@vnuk.edu.vn";

    mail($recipient, $subject, $customer_message, $mailheader) or die("Error!");

    echo "Email sent";
?>