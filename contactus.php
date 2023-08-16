<?php
session_start();
include('header.php');
include('topbar.php');
include('menubar.php');
?>

<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Contact</h2>
      <ol>
        <li><a href="index.html">Home</a></li>
        <li>Contact Us</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs -->

<section id="contact" class="contact">
    <div class="container">
    <?php
            if(isset($_SESSION['message']) && $_SESSION['message'] !='')
            {
                echo '<div class="alert alert-warning ms-3" role="alert">'.$_SESSION['message'].'</div>';
                unset($_SESSION['message']);
            }
        ?>
    <div class="row justify-content-center" data-aos="fade-up">

        <div class="col-lg-10">

        <div class="info-wrap">
            <div class="row">
            <div class="col-lg-4 info">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Behind Taamah Street<br>Opp. Nasarawa Polytechnic <br>Nasarawa LGA <br> Nasarawa State.</p>
            </div>

            <div class="col-lg-4 info mt-4 mt-lg-0">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@boideas.com<br>contactus@boideas.com</p>
            </div>

            <div class="col-lg-4 info mt-4 mt-lg-0">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+234 810 888 9654<br>+234 810 888 0984</p>
            </div>
            </div>
        </div>

        </div>

    </div>

    <div class="row mt-5 justify-content-center" data-aos="fade-up">
        <div class="col-lg-10 card shadow p-4">
       
            <form action="forms/contact.php" method="post">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <center>
                <div class="text-align-center" ><button class="btn btn-dark mt-3" type="submit" name="submit">Send Message</button></div>
                </center>
            </form>
        </div>

    </div>

    </div>
</section><!-- End Contact Section -->



<?php
include('footer.php');
include('script.php');
?>