<?php
    include "Include_main/header.php";
?>
    
    <!--CONTACT AREA-->
    <section class="featured-product-area contact-area w-100">

        <div class="alert-success">
            <span>Message Sent! Thank you for contacting us.</span>
        </div>

        <div class="alert-error">
            <span></span>
        </div>

        <div class="contact-section">
            <div class="contact-info">
                <div><i class="fa-solid fa-location-dot"></i>154 Le Loi St, Da Nang city, Viet Nam</div>
                <div><i class="fa-solid fa-location-dot"></i>duy.tran190201@vnuk.edu.vn</div>
                <div><i class="fa-solid fa-location-dot"></i>+84 905988777</div>
                <div><i class="fa-solid fa-location-dot"></i>Mon-Fri 08:00 AM to 05:00 PM</div>
            </div>
            <div class="contact-form">
                <h2>Contact Us</h2>
                <form class="contact" method="post">
                    <input type="text" name="name" class="text-box name" placeholder="Your Name" required/>
                    <input type="email" name="email" class="text-box email" placeholder="Your Email" required/>
                    <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
                </form>
                <button class="send-btn">Send</button>
            </div>
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
      <script src="./Vendors/js/jquery.waypoints.min.js">
    </script>
  
</body>
</html>