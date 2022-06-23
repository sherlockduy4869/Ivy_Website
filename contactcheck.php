<?php
$to = "duy.tran190201@vnuk.edu.vn";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: webmaster@example.com" . "\r\n";

mail($to,$subject,$txt,$headers);
?>