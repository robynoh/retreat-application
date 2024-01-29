<?php 
ob_start();
session_start();
require_once("class/class.php"); 

$connect =new connection(); 
$connect->connectTodatabase();
$connect->selectDatabase();
$message="";

if(isset($_POST['submit'])){
	
	 
		 
		 $query="INSERT INTO `feedback` (`id`,`lastname`,`firstname`,`email`,`phone`,`address`,`position`,`department`,`note`)VALUES (NULL,'".filter_var($_POST['lastname'], FILTER_SANITIZE_STRING)."','".filter_var($_POST['firstname'], FILTER_SANITIZE_STRING)."','".filter_var($_POST['email'], FILTER_SANITIZE_STRING)."','".filter_var($_POST['phone'], FILTER_SANITIZE_STRING)."','".filter_var($_POST['address'], FILTER_SANITIZE_STRING)."','".filter_var($_POST['position'], FILTER_SANITIZE_STRING)."','".filter_var($_POST['department'], FILTER_SANITIZE_STRING)."','".filter_var($_POST['note'], FILTER_SANITIZE_STRING)."')";
	     if($connect->insertion($query)){
			 $connect->CURLsendsms3($_POST['phone'],$_POST['firstname']);
			 header('location:feedbacksuccess');
		 }
		 
	
		 
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Feedback - BYSG RETREAT 2021</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Company - v4.0.1
  * Template URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
   <?php include('includes/header.php')?><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
		
          <h2 style="font-weight:bold;padding-top:10px">Feedback</h2>
          <ol>
            <li><a href="./">Home</a></li>
            <li>Feedback</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    

    <section id="contact" class="contact">
      <div class="container">
 
      

        <div class="row mt-5 justify-content-center" data-aos="fade-up">
          <div class="col-lg-10">
		  <?php echo $message;?>
            <form action="" method="POST" role="form" class="php-email-form">
			
			<h4 style="font-size:14px">Personal Information</h4>
			
			   <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="lastname" class="form-control" id="name" placeholder="Lastname" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control" name="firstname" id="email" placeholder="Firstname" required>
                </div>
              </div>
             
			   <div class="row">
                <div class="col-md-6 form-group">
                  <input type="email" name="email" class="form-control" id="name" placeholder="Email" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="number" class="form-control" name="phone" id="email" placeholder="Phone" required>
                </div>
              </div>
			   
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="address" id="subject" placeholder="Address" required>
              </div>
			     <div class="form-group mt-3">
                <input type="text" class="form-control" name="position" id="subject" placeholder="Position" required>
              </div>
			  
			   <div class="form-group mt-3">
                <input type="text" class="form-control" name="department" id="subject" placeholder="department" required>
              </div>
			   <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="city" class="form-control" id="name" placeholder="City" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control" name="state" id="email" placeholder="State" required>
                </div>
              </div>
			  
			    <div class="form-group mt-3">
				<p><h4 style="font-size:14px">Note</h4></p>
               <textarea name="note" class="form-control" style="height:300px" required></textarea>
              </div>
			  
			  
             
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><a href="./" style="padding-right:20px">Go back</a><button type="submit" name="submit">Submit</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
     <?php include('includes/footer.php')?><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>