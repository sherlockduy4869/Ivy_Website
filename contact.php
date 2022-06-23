<?php
    include_once "Include_main/header.php";
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $customer_name = $_POST['customer_name'];
        $customer_email = $_POST['customer_email'];
        $subject = $_POST['subject'];
        $customer_message = $_POST['customer_message'];

        $mail_header = "From: ".$customer_name."<".$customer_email.">\r\n";
        $recipient = "duy.tran190201@vnuk.edu.vn";

        mail($recipient, $subject, $customer_message, $mail_header)
        or die("Error!");

        echo "message sent";
    }
?>
    <!--CONTACT AREA-->
    <section class="featured-product-area py-5 ">
            <div class="container justify-content-center">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="section-title">
                            <h2 class="pt-5">Our Contact</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12 w-50 mt-3">
                        <div class="map-area">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.
                            613424461478!2d108.21076231448666!3d16.03362694465075!2m3!1f0!2f0!3f0!3
                            m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219be7b228ff5%3A0xaf09bd245a438009
                            !2zVuG6rXQgdMawIGluIGzhu6VhIMSQw6AgTuG6tW5n!5e0!3m2!1svi!2s!4v1655132868
                            057!5m2!1svi!2s" allowfullscreen="" referrerpolicy="no-referrer-when-
                            downgrade"></iframe>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12 w-50 mt-3">
                        <div class="contact-form w-100">
                            <form action="contact.php" method="POST">
                                <div class="mb-3 form-floating">
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="customer_name" placeholder="Your Name Here">
                                </div>
                                <div class="mb-3 form-floating">
                                    <input type="email" class="form-control" aria-describedby="emailHelp" name="customer_email" placeholder="Your Email Here">
                                </div>
                                <div class="mb-3 form-floating">
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="subject" placeholder="Type Subject Here">
                                </div>
                                <div class="mb-3 form-floating">
                                    <textarea class="form-control" cols="30" rows="10" name="customer_message" placeholder="Your Message"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary text-uppercase w-50">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    
<?php
    include "Include_main/footer.php";
?>