<?php
include "header.php";
include "connection.php";
?>
<!-- inner page section -->
<section class="inner_page_head">
   <div class="container_fuild">
      <div class="row">
         <div class="col-md-12">
            <div class="full">
               <h3>Contact us</h3>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- end inner page section -->
<!-- why section -->
<section class="why_section layout_padding">
   <div class="container">

      <div class="row">
         <div class="col-lg-8 offset-lg-2">
            <div class="full">
               <form method="post">
                  <fieldset>
                     <input type="text" name="name" placeholder="Enter your full name" name="name" required />
                     <input type="email" name="email" placeholder="Enter your email address" name="email" required />
                     <input type="text" name="subject" placeholder="Enter subject" name="subject" required />
                     <textarea name="message" placeholder="Enter your message" required></textarea>
                     <input type="submit" name="btn" value="Submit" />
                  </fieldset>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- end why section -->
<!-- arrival section -->
<section class="arrival_section">
   <div class="container">
      <div class="box">
         <div class="arrival_bg_box">
            <img src="images/arrival-bg.png" alt="">
         </div>
         <div class="row">
            <div class="col-md-6 ml-auto">
               <div class="heading_container remove_line_bt">
                  <h2>
                     #NewArrivals
                  </h2>
               </div>
               <p style="margin-top: 20px;margin-bottom: 30px;">
                  Vitae fugiat laboriosam officia perferendis provident aliquid voluptatibus dolorem, fugit ullam sit earum id eaque nisi hic? Tenetur commodi, nisi rem vel, ea eaque ab ipsa, autem similique ex unde!
               </p>
               <a href="">
                  Shop Now
               </a>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- end arrival section -->
<?php
include "footer.php";

if (isset($_POST['btn'])) {
   $name = $_POST['name'];
   $email = $_POST['email'];
   $subject = $_POST['subject'];
   $message = $_POST['message'];

   $insert = "INSERT INTO Contact_Us(name, email, subject, message) VALUES ('$name','$email','$subject','$message')";

   $result = mysqli_query($conn, $insert);

   if ($result) {
      echo "Successfully";
   } else {
      echo "Something went wrong";
   }
}
?>