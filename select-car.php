<?php
  if(isset($_POST['reserve'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
     $email_to = "brownarthur1022@gmail.com";
    $email_subject = "Ezee Car Rent";

    function died($error) {
      // your error code can go here
      echo "We are very sorry, but there were error(s) found with the form you submitted. ";
      echo "These errors appear below.<br /><br />";
      echo $error."<br /><br />";
      echo "Please go back and fix these errors.<br /><br />";
      die();
    }

    // validation expected data exists
    // if(!isset($_POST['car-select']) ||!isset($_POST['pick-up-location']) ||!isset($_POST['pick-up-date']) ||!isset($_POST['pick-up-time']) ||!isset($_POST['drop-off-date']) ||!isset($_POST['drop-off-time']) ||!isset($_POST['first-name']) ||!isset($_POST['last-name']) ||!isset($_POST['phone-number']) ||!isset($_POST['age']) ||!isset($_POST['email-address']) ||!isset($_POST['address']) ||!isset($_POST['city']) ||!isset($_POST['zip-code']))
       // {
      // died('We are sorry, but there appears to be a problem with the form you submitted.');      
    // }

    $car_select = $_POST['selected-car']; // required
    $pick_up_locationt = $_POST['pickup-location']; // required
    $drop_off_locationt = $_POST['dropoff-location']; // required
    $pick_up_date = $_POST['pick-up']; // required
    //$pick_up_time = $_POST['pick-up-time']; // required
    $drop_off_date = $_POST['drop-off']; // required
    //$drop_off_time = $_POST['drop-off-time']; // required
    $first_name = $_POST['first-name']; // required
    $last_name = $_POST['last-name']; // required
    $email_from = $_POST['email-address']; // required
    $telephone = $_POST['phone-number']; // not required
    $age = $_POST['age']; // not required
    $address = $_POST['address']; // not required
    $city = $_POST['city']; // not required
    $zip_code = $_POST['zip-code']; // not required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
    }

    if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
    }

    // if(strlen($comments) < 2) {
    // $error_message .= 'The Comments you entered do not appear to be valid.<br />';
    // }

    if(strlen($error_message) > 0) {
    died($error_message);
    }

    $email_message = "Form details below.\n\n";

    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

    $email_message .= '<html><body>';
    $email_message .= '<img src="https://cdn.shortpixel.ai/client/q_lossy,ret_img/https://ezeecarrent.com/wp-content/uploads/2019/10/carrentzone-e1572349798965.png"/ height="200" width="500" alt="Bike Rental near Goa">';
    $email_message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
    $email_message .='<tr style="background: #eee;"><td><strong>Name:</strong> </td><td>' . strip_tags($first_name) . '</td></tr>';
    $email_message .= '<tr><td><strong>Email:</strong> </td><td>' . strip_tags($email_from) . '</td></tr>' ;
    $email_message .= '<tr><td><strong>Telephone:</strong> </td><td>' . strip_tags($telephone) . '</td></tr>';
    $email_message .= '<tr><td><strong>Pick Up Location:</strong> </td><td>' . strip_tags($pick_up_locationt) . '</td></tr>';
    $email_message .= '<tr><td><strong>Pick Up Date:</strong> </td><td>' . strip_tags($pick_up_date) . '</td></tr>';
    $email_message .= '<tr><td><strong>Drop Off Date:</strong> </td><td>' . strip_tags($drop_off_date) . '</td></tr>';
    $email_message .= '<tr><td><strong>Selected bike:</strong> </td><td>' . strip_tags($car_select) . '</td></tr>';
    //$email_message .= "Selected Car: ".clean_string($car_select)."\n";
    //$email_message .= "First Name: ".clean_string($first_name)."\n";
     // $email_message .= "Last Name: ".clean_string($last_name)."\n";
   //   $email_message .= "Email: ".clean_string($email_from)."\n";
   //   $email_message .= "Telephone: ".clean_string($telephone)."\n";
   //   $email_message .= "Address: ".clean_string($address)."\n";
     // $email_message .= "city: ".clean_string($city)."\n";
     //     $email_message .= "zip-code: ".clean_string($zip_code)."\n";
      //  $email_message .= "Pick Up Location: ".clean_string($pick_up_locationt)."\n";
       // $email_message .= "Pick Up Date: ".clean_string($pick_up_date)."\n";
     //     $email_message .= "Drop Off Date: ".clean_string($drop_off_date)."\n";
     //     $email_message .= "Drop Off Location: ".clean_string($drop_off_locationt)."\n";
    //$email_message .= "Drop Off Time: ".clean_string($drop_off_time)."\n";""

    $email_message .= '</table>';
  $email_message .= '</body></html>';

  // create email headers
  $headers = 'From: '.$email_from."\r\n".
  $headers .= 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-Type: text/html; charset=ISO-8859-1' . "\r\n".
  'Reply-To: '.$email_from."\r\n" .
  'X-Mailer: PHP/' . phpversion();
  @mail($email_to, $email_subject, $email_message, $headers);
  $headerRep  = "From: RentMyBike";
  $headerRep .= 'MIME-Version: 1.0' . "\r\n";
  $headerRep .= 'Content-Type: text/html; charset=ISO-8859-1' . "\r\n".
        $subjectRep =   "Booking Status";
        $messageRep =   "Our Representative will call you soon. You are requiested For :";
        $messageRep .= '<html><body>';
    $messageRep .= '<img src="https://www.rentmybike.co.in/img/rentmybikelogo.png"/ height="200" width="500" alt="Bike Rental Goa">';
    $messageRep .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
    $messageRep .='<tr style="background: #eee;"><td><strong>Name:</strong> </td><td>' . strip_tags($first_name) . '</td></tr>';
    $messageRep .= '<tr><td><strong>Email:</strong> </td><td>' . strip_tags($email_from) . '</td></tr>' ;
    $messageRep .= '<tr><td><strong>Telephone:</strong> </td><td>' . strip_tags($telephone) . '</td></tr>';
    $messageRep .= '<tr><td><strong>Pick Up Location:</strong> </td><td>' . strip_tags($pick_up_locationt) . '</td></tr>';
    $messageRep .= '<tr><td><strong>Pick Up Date:</strong> </td><td>' . strip_tags($pick_up_date) . '</td></tr>';
    $messageRep .= '<tr><td><strong>Drop Off Date:</strong> </td><td>' . strip_tags($drop_off_date) . '</td></tr>';
    $messageRep .= '<tr><td><strong>Selected bike:</strong> </td><td>' . strip_tags($car_select) . '</td></tr>';
    //$email_message .= "Selected Car: ".clean_string($car_select)."\n";
    //$email_message .= "First Name: ".clean_string($first_name)."\n";
     // $email_message .= "Last Name: ".clean_string($last_name)."\n";
   //   $email_message .= "Email: ".clean_string($email_from)."\n";
   //   $email_message .= "Telephone: ".clean_string($telephone)."\n";
   //   $email_message .= "Address: ".clean_string($address)."\n";
     // $email_message .= "city: ".clean_string($city)."\n";
     //     $email_message .= "zip-code: ".clean_string($zip_code)."\n";
      //  $email_message .= "Pick Up Location: ".clean_string($pick_up_locationt)."\n";
       // $email_message .= "Pick Up Date: ".clean_string($pick_up_date)."\n";
     //     $email_message .= "Drop Off Date: ".clean_string($drop_off_date)."\n";
     //     $email_message .= "Drop Off Location: ".clean_string($drop_off_locationt)."\n";
    //$email_message .= "Drop Off Time: ".clean_string($drop_off_time)."\n";""

    $email_message .= '</table>';
  $email_message .= '</body></html>';
        mail($email_from, $subjectRep, $messageRep, $headerRep);
  ?>

    <!-- include your own success html here -->

    <strong>Thank you for contacting us. We will be in touch with you very soon.</strong>

    <?php //from   ww  w  .j  a va2  s .c om
    if ( isset( $_POST["reserve"] ) ) {
      // (deal with the submitted fields here)
       header( "Location: thankyou.html" );
      exit;
    }
    ?>

        <?php

  }
  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
   
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Best Car Rentals at Goa Airport | Self Drive Car Rental at Goa Airport by Joes Car Rentals</title>
    <meta name="description" content="Looking For Car Rental at Goa Airport ? Joes Car Rentals Goa provide the best service in car rentals without any wait at the Dabolim, Goa Airport. Joes Car Rental Goa Airport has the Widest range of cars and Get Car on rent Goa in Less Paperwork. Call us now at 022 6836 3300 for Self drive Car Rental at Goa Airport. " />
    <meta name="google-site-verification" content="fC3IVQA2c3r9pHqsCTUJZMV8GnYuWS9IbdSa4n9I-DE" />
    <meta name="msvalidate.01" content="FF1B47E01F11F03F142FC703CB0444F0" />
    <meta name="keywords" conten="goa airport car rental,Car Rental at Goa Airport,Car Rental in Goa Airport,Self Drive Car Rental Goa Airport,self drive Car Rental at Goa Airport,Self Drive Cars in Goa Airport,Car hire in Goa airport" />
    <link rel="canonical" href="https://www.joescarrentalgoa.com/" />
    <meta property="og:type" content="business.business">
    <meta property="og:title" content="Cheap Goa Airport Car Rental | Self Drive Car Rental Goa Airport by Joes Car Rentals">
    <meta property="og:url" content="https://www.joescarrentalgoa.com/">
    <meta property="og:image" content="https://www.joescarrentalgoa.com/img/home/Joes%20Car%20Rental%20goa%20Logo.webp">
    <meta property="business:contact_data:street_address" content="House No 16, Nr BSNL Telephone Exchange,">
    <meta property="business:contact_data:locality" content="Headland Sada, Vasco da Gama,">
    <meta property="business:contact_data:region" content="Goa">
    <meta property="business:contact_data:postal_code" content="403804">
    <meta property="business:contact_data:country_name" content="India">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="https://twitter.com/GoaJoes">
    <meta name="twitter:title" content="Cheap Goa Airport Car Rental | Self Drive Car Rental Goa Airport by Jo">
    <meta name="twitter:description" content="Looking For Car Rental at Goa Airport? We provide the best service in car rentals without any wait at the Dabolim, Goa Airport. Joes Car Rental Goa Airport has the Widest range of cars and Get Car on">
    <meta name="DC.title" content="Car Rental at Goa Airport | Self Drive Car Rental at Goa Airport" />
    <meta name="geo.region" content="IN-GA" />
    <meta name="geo.placename" content="Dabolim" />
    <meta name="geo.position" content="15.380349;73.834995" />
    <meta name="ICBM" content="15.380349, 73.834995" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/ico/apple-touch-icon-144-precomposed.webp">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/ico/apple-touch-icon-114-precomposed.webp">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/ico/apple-touch-icon-72-precomposed.webp">
    <link rel="apple-touch-icon-precomposed" href="img/ico/apple-touch-icon-57-precomposed.webp">
    <link rel="shortcut icon" href="img/ico/favicon.png">
  </head>

  <body id="top" data-spy="scroll" data-target=".navbar" data-offset="260">
    <header data-spy="affix" data-offset-top="39" data-offset-bottom="0" class="large">
      <div class="row container box">
        <div class="col-md-5">
          <div class="brand">
            <h1><a class="scroll-to " href="#top"><img class="img-responsive logo1" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="" class="" alt="Self drive Car Rental at Goa Airport"></a></h1>
          </div>
        </div>
        <div class="col-md-7">
          <div class="pull-right">
            <div class="header-info pull-right">
              <div class="contact pull-left"><strong style=" font-size: 25px ;"><a href="tel:+919326813033">CONTACT : +919326813033</a></strong>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
              <div class="navbar-header">
                <!-- <a class=" " href="tel:+912268363300" style="">
                  <button class="btn fa fa-phone" id="responsive"></button>
                </a> -->
                <a class="navbar-brand scroll-to" href="#top">
                  <img class="img-responsive logo1" class="" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="img/home/Joes Car Rental goa Logo.png" alt="Self drive Car Rental at Goa Airport">
                </a>
              </div>
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right fontsize">
                  <li class="active"><a href="#top" class="scroll-to">Home</a>
                  </li>
                 
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </header>
    <section id="teaser">
      <div class="container">
        <div class="row">
          <!-- <div class="col-md-7 col-xs-12 pull-right">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="item active">
                  <h3 class="title">  </h3>
                  <div class="car-img">
                    <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="img/home/self-drive-car-hire-at-goa-airport.png" class="img-responsive" alt="Car On Rent In Goa Airport ">
                  </div>
                </div>
             
                </div> <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a> <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a></div>




                  </div> -->

                  <div class="col-md-12 col-xs-12 pull-left"><div class="reservation-form-shadow">
                    <div class="col-md-6  ">
                         <form action="" method="post" name="car-select-form" id="car-select-form"><div class="alert alert-danger hidden" id="car-select-form-msg"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <strong>Note:</strong> All fields required!</div>
                   
                    <div class="location">
                      <div class="input-group pick-up styled-select-car">
                       <p class="input-group-addon ">Car Name</p> <span class="carprice" id="carname"> </span ></p>

                     </div>
                   </div>
               
                 
                <div class="location">
                      <div class="input-group pick-up styled-select-car">
                       <p class="input-group-addon ">Total Amount</p> <span class="carprice" id="totalamt"> </span ></p>

                     </div>
                   </div>






                      <div class="location">
                        <div class="input-group pick-up styled-select-car">


                     <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span> Pick-up</span>
<select name="pick-up-location" id="pick-up-location">
            <option value="">Select your Pickup Location</option>
            <option value="Panjim ">Panjim</option>
            <option value="Vasco da Gama">Vasco da Gama</option>
            <option value="Dabolim Airport">Dabolim Airport</option>
            <option value="Anjuna ">Anjuna</option>
            <option value="Calangute ">Calangute</option>
            <option value="Thivim ">Thivim</option>
            <option value="Karmali ">Karmali</option>
            <option value="Margao ">Margao</option>
            <option value="Goa Airport ">Goa Airport</option>
         </select>
</div>
</div>
<div class="datetime pick-up">
   <div class="date pull-left">
      <div class="input-group"> <span class="input-group-addon pixelfix"><span class="glyphicon glyphicon-calendar"></span> Pick-up</span> <input type="text" readonly="true"  name="pick-up-date" id="pick-up-date" class="form-control datepicker" placeholder="mm/dd/yyyy"></div>
   </div>
   <div class="time pull-right">
      <div class="styled-select-time">
         <select name="pick-up-time" id="pick-up-time">
            <option value="12:00 AM">12:00 AM</option>
            <option value="12:30 AM">12:30 AM</option>
            <option value="01:00 AM">01:00 AM</option>
            <option value="01:30 AM">01:30 AM</option>
            <option value="02:00 AM">02:00 AM</option>
            <option value="02:30 AM">02:30 AM</option>
            <option value="03:00 AM">03:00 AM</option>
            <option value="03:30 AM">03:30 AM</option>
            <option value="04:00 AM">04:00 AM</option>
            <option value="04:30 AM">04:30 AM</option>
            <option value="05:00 AM">05:00 AM</option>
            <option value="05:30 AM">05:30 AM</option>
            <option value="06:00 AM">06:00 AM</option>
            <option value="06:30 AM">06:30 AM</option>
            <option value="07:00 AM">07:00 AM</option>
            <option value="07:30 AM">07:30 AM</option>
            <option value="08:00 AM">08:00 AM</option>
            <option value="08:30 AM">08:30 AM</option>
            <option value="09:00 AM">09:00 AM</option>
            <option value="09:30 AM">09:30 AM</option>
            <option value="10:00 AM">10:00 AM</option>
            <option value="10:30 AM">10:30 AM</option>
            <option value="11:00 AM">11:00 AM</option>
            <option value="11:30 AM">11:30 AM</option>
            <option value="12:00 PM">12:00 PM</option>
            <option value="12:30 PM">12:30 PM</option>
            <option value="01:00 PM">01:00 PM</option>
            <option value="01:30 PM">01:30 PM</option>
            <option value="02:00 PM">02:00 PM</option>
            <option value="02:30 PM">02:30 PM</option>
            <option value="03:00 PM">03:00 PM</option>
            <option value="03:30 PM">03:30 PM</option>
            <option value="04:00 PM">04:00 PM</option>
            <option value="04:30 PM">04:30 PM</option>
            <option value="05:00 PM">05:00 PM</option>
            <option value="05:30 PM">05:30 PM</option>
            <option value="06:00 PM">06:00 PM</option>
            <option value="06:30 PM">06:30 PM</option>
            <option value="07:00 PM">07:00 PM</option>
            <option value="07:30 PM">07:30 PM</option>
            <option value="08:00 PM">08:00 PM</option>
            <option value="08:30 PM">08:30 PM</option>
            <option value="09:00 PM">09:00 PM</option>
            <option value="09:30 PM">09:30 PM</option>
            <option value="10:00 PM">10:00 PM</option>
            <option value="10:30 PM">10:30 PM</option>
            <option value="11:00 PM">11:00 PM</option>
            <option value="11:30 PM">11:30 PM</option>
         </select>
      </div>
   </div>
   <div class="clearfix"></div>
</div>
<div class="datetime drop-off">
   <div class="date pull-left">
      <div class="input-group"> <span class="input-group-addon pixelfix"><span class="glyphicon glyphicon-calendar"></span> Drop-off</span> <input type="text" readonly="true" name="drop-off-date" id="drop-off-date" class="form-control datepicker" placeholder="mm/dd/yyyy"></div>
   </div>
   <div class="time pull-right">
      <div class="styled-select-time">
         <select name="drop-off-time" id="drop-off-time">
            <option value="12:00 AM">12:00 AM</option>
            <option value="12:30 AM">12:30 AM</option>
            <option value="01:00 AM">01:00 AM</option>
            <option value="01:30 AM">01:30 AM</option>
            <option value="02:00 AM">02:00 AM</option>
            <option value="02:30 AM">02:30 AM</option>
            <option value="03:00 AM">03:00 AM</option>
            <option value="03:30 AM">03:30 AM</option>
            <option value="04:00 AM">04:00 AM</option>
            <option value="04:30 AM">04:30 AM</option>
            <option value="05:00 AM">05:00 AM</option>
            <option value="05:30 AM">05:30 AM</option>
            <option value="06:00 AM">06:00 AM</option>
            <option value="06:30 AM">06:30 AM</option>
            <option value="07:00 AM">07:00 AM</option>
            <option value="07:30 AM">07:30 AM</option>
            <option value="08:00 AM">08:00 AM</option>
            <option value="08:30 AM">08:30 AM</option>
            <option value="09:00 AM">09:00 AM</option>
            <option value="09:30 AM">09:30 AM</option>
            <option value="10:00 AM">10:00 AM</option>
            <option value="10:30 AM">10:30 AM</option>
            <option value="11:00 AM">11:00 AM</option>
            <option value="11:30 AM">11:30 AM</option>
            <option value="12:00 PM">12:00 PM</option>
            <option value="12:30 PM">12:30 PM</option>
            <option value="01:00 PM">01:00 PM</option>
            <option value="01:30 PM">01:30 PM</option>
            <option value="02:00 PM">02:00 PM</option>
            <option value="02:30 PM">02:30 PM</option>
            <option value="03:00 PM">03:00 PM</option>
            <option value="03:30 PM">03:30 PM</option>
            <option value="04:00 PM">04:00 PM</option>
            <option value="04:30 PM">04:30 PM</option>
            <option value="05:00 PM">05:00 PM</option>
            <option value="05:30 PM">05:30 PM</option>
            <option value="06:00 PM">06:00 PM</option>
            <option value="06:30 PM">06:30 PM</option>
            <option value="07:00 PM">07:00 PM</option>
            <option value="07:30 PM">07:30 PM</option>
            <option value="08:00 PM">08:00 PM</option>
            <option value="08:30 PM">08:30 PM</option>
            <option value="09:00 PM">09:00 PM</option>
            <option value="09:30 PM">09:30 PM</option>
            <option value="10:00 PM">10:00 PM</option>
            <option value="10:30 PM">10:30 PM</option>
            <option value="11:00 PM">11:00 PM</option>
            <option value="11:30 PM">11:30 PM</option>
         </select>
      </div>
   </div>
   <div class="clearfix"></div>
</div>
<input type="submit" class="submit" name="submit" value="continue car reservation" onclick="store()"></form>

                    </div>
                   
<div class="col-md-6 ">
                      <img src="img/4.png" class="form1" id="carimg">
                    </div>



                 



</div>

</div></div></div> </section>




   







       

 


     



   
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,900,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/datepicker.css" rel="stylesheet">
    <link href="css/styles-red.css" rel="stylesheet">
    <link href=" css/styles-red.css" rel="stylesheet">
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.autocomplete.min.js"></script>
    <script src="js/jquery.placeholder.js"></script>
    <script src="js/locations-autocomplete.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/gmap3.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsr1sFUtzPoVl9GIKmp1dXCS04tcJ9NfI" type="text/javascript"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-124335492-1"></script>
 
    <script async type="text/javascript">
      (function(){var options={whatsapp: "+918828375744",call_to_action:"Contact Us",position:"right",};var proto=document.location.protocol,host="whatshelp.io",url=proto+"//static."+host;var s=document.createElement('script');s.type='text/javascript';s.async=true;s.src=url+'/widget-send-button/js/init.js';s.onload=function(){WhWidgetSendButton.init(host,proto,options);};var x=document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);})();
    </script>
    <script>
      function init(){var imgDefer=document.getElementsByTagName('img');for(var i=0;i<imgDefer.length;i++){if(imgDefer[i].getAttribute('data-src')){imgDefer[i].setAttribute('src',imgDefer[i].getAttribute('data-src'));}}} window.onload=init;
    </script>
    <!--[if !(gte IE 8)]><!-->
    <script src="js/wow.min.js"></script>
    <script>
      new WOW({mobile:false}).init();
    </script>
    <!--<![endif]-->
    <script src="js/custom.js"></script>
	
	
	<script>
		
	  
	  
		var dataImage = localStorage.getItem('imgData');
bannerImg = document.getElementById('carimg');
bannerImg.src = "data:image/png;base64," + dataImage;


document.getElementById("carname").innerHTML = localStorage.getItem("Car Name");
document.getElementById("totalamt").innerHTML = localStorage.getItem("Total Price");


	</script>
	
	
	<script>
		function store()
		{
			
			
			var inputPickup= document.getElementById("pick-up-location");
			localStorage.setItem("Pick-up Location", inputPickup.value);
			var inputPickdate= document.getElementById("pick-up-date");
			localStorage.setItem("Pick-up Date", inputPickdate.value);
			var inputPicktime= document.getElementById("pick-up-time");
			localStorage.setItem("Pick-up Time", inputPicktime.value);
			var inputDropdate= document.getElementById("drop-off-date");
			
			debugger;
			localStorage.setItem("Drop Date", inputDropdate.value);
			var inputDroptime= document.getElementById("drop-off-time");
			localStorage.setItem("Drop Time", inputDroptime.value);
			window.location.href = "checkout.php";
			
			
			
			
			
			
			
			var date1 = new Date($("#pick-up-date").val()); 
			var date2 = new Date($("#drop-off-date").val()); 
			
			var timediff = date2.getTime() - date1.getTime();
			var milliseconds = 1000;
			var minutesHour = 3600;
			var hoursDay = 24;
			
			var dayDiff = timediff / (milliseconds * minutesHour * hoursDay) +1;
			
			
			
			
			
			
			localStorage.setItem("Total Days", JSON.stringify(dayDiff));
			
			
			
			const data = JSON.parse(localStorage.getItem('Total Days'));
const swiftprice = 1300;
const iprice =1100;
const wagonarprice = 1100;
const balenoprice = 1300;
const isprice = 1300;
const iaprice = 1300;
const saprice = 1500;
const hvsprice = 2400;
const hvwsprice = 2200;
const ertprice = 2000;
const ertautoprice = 2800;
const inoprice = 2100;
const inocprice = 2800;
const inocautoprice = 2800;
const tfprice = 4500;
const tfautoprice = 5000;
const tharprice = 2000;
const feprice = 2000;
const audiaprice = 14000;
const bmprice = 15000;
const sentro = 900;





const is = data * isprice;
const bl = data * balenoprice;
const wr = data * wagonarprice;
const sp =  data * swiftprice;
const icar = data * iprice;
const ia = data * iaprice;
const sa = data * saprice;
const hvs = data * hvsprice;
const hvws = data * hvwsprice;
const ert = data * ertprice;
const ertauto = data * ertautoprice;
const ino = data * inoprice;
const inoc = data * inocprice;
const inocauto = data * inocautoprice;
const tf = data * tfprice;
const tfauto = data * tfautoprice;
const thar = data * tharprice;
const fe = data * tharprice;
const audia = data * audiaprice;
const bm = data * bmprice;
const str = data * sentro;






localStorage.setItem("Swift Price", JSON.stringify(sp));
localStorage.setItem("i10 Price", JSON.stringify(icar));
localStorage.setItem("Wagonar Price", JSON.stringify(wr));
localStorage.setItem("Baleno Price", JSON.stringify(bl));
localStorage.setItem("i20 Price", JSON.stringify(is));
localStorage.setItem("i10 automatic Price", JSON.stringify(ia));
localStorage.setItem("Swift automatic Price", JSON.stringify(sa));
localStorage.setItem("Hundai Verna with sunroof", JSON.stringify(hvs));
localStorage.setItem("Hundai Verna without sunroof", JSON.stringify(hvws));
localStorage.setItem("Ertiga", JSON.stringify(ert));
localStorage.setItem("Ertiga Automatic", JSON.stringify(ert));
localStorage.setItem("Innova OLD", JSON.stringify(ino));
localStorage.setItem("Innova Crysta", JSON.stringify(inoc));
localStorage.setItem("Innova Crysta automatic", JSON.stringify(inocauto));
localStorage.setItem("Toyota Fortuner", JSON.stringify(tf));
localStorage.setItem("Toyota Fortuner automatic", JSON.stringify(tfauto));
localStorage.setItem("Thar", JSON.stringify(thar));
localStorage.setItem("Ecosport", JSON.stringify(fe));
localStorage.setItem("Audi A4", JSON.stringify(audia));
localStorage.setItem("BMW 328I", JSON.stringify(bm));
localStorage.setItem("Sentro", JSON.stringify(str));





document.getElementById("swiftprice").innerHTML = localStorage.getItem("Swift Price");
document.getElementById("i10price").innerHTML = localStorage.getItem("i10 Price");
document.getElementById("wagonarprice").innerHTML = localStorage.getItem("Wagonar Price");
document.getElementById("balenoprice").innerHTML = localStorage.getItem("Baleno Price");
document.getElementById("i20price").innerHTML = localStorage.getItem("i20 Price");
document.getElementById("i10a").innerHTML = localStorage.getItem("i10 automatic Price");
document.getElementById("saprice").innerHTML = localStorage.getItem("Swift automatic Price");
document.getElementById("hvsprice").innerHTML = localStorage.getItem("Hundai Verna with sunroof");
document.getElementById("hvwsprice").innerHTML = localStorage.getItem("Hundai Verna without sunroof");
document.getElementById("ertprice").innerHTML = localStorage.getItem("Ertiga");
document.getElementById("ertautoprice").innerHTML = localStorage.getItem("Ertiga Automatic");
document.getElementById("inoprice").innerHTML = localStorage.getItem("Innova OLD");
document.getElementById("inocprice").innerHTML = localStorage.getItem("Innova Crysta");
document.getElementById("inocautoprice").innerHTML = localStorage.getItem("Innova Crysta automatic");
document.getElementById("tfprice").innerHTML = localStorage.getItem("Toyota Fortuner");
document.getElementById("tfautoprice").innerHTML = localStorage.getItem("Toyota Fortuner automatic");
document.getElementById("tharprice").innerHTML = localStorage.getItem("Thar");
document.getElementById("feprice").innerHTML = localStorage.getItem("Ecosport");
document.getElementById("audiaprice").innerHTML = localStorage.getItem("Audi A4");
document.getElementById("bmprice").innerHTML = localStorage.getItem("BMW 328I");
			
			
			
			
		}
		
	</script>
	
	
 
  </body>

  </html>