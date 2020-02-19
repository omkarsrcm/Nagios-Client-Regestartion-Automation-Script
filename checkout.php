<?php
   if(isset($_POST['reserve'])) {
   
     // EDIT THE 2 LINES BELOW AS REQUIRED
      $email_to = "icognixdeveloper@gmail.com";
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
     $telephone = $_POST['phone']; // not required
     $age = $_POST['age']; // not required
     $address = $_POST['address']; // not required
     $city = $_POST['city']; // not required
     $zip_code = $_POST['country']; // not required
   
     $error_message = "";
     $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
   
     if(!preg_match($email_exp,$email_from)) {
     $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
     }
   
     $string_exp = "/^[A-Za-z .'-]+$/";
   
     //if(!preg_match($string_exp,$first_name)) {
     //$error_message .= 'The First Name you entered does not appear to be valid.<br />';
     //}
   
     //if(!preg_match($string_exp,$last_name)) {
    // $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
    // }
   
     // if(strlen($comments) < 2) {
     // $error_message .= 'The Comments you entered do not appear to be valid.<br />';
     // }
   
    // if(strlen($error_message) > 0) {
    // died($error_message);
    // }
   
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
      header( "Location: cart.php" );
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
      
      <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/ico/apple-touch-icon-144-precomposed.webp">
      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/ico/apple-touch-icon-114-precomposed.webp">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/ico/apple-touch-icon-72-precomposed.webp">
      <link rel="apple-touch-icon-precomposed" href="img/ico/apple-touch-icon-57-precomposed.webp">
      <link rel="shortcut icon" href="img/ico/favicon.png">
   </head>
   <body id="top"  data-target=".navbar" data-offset="260">
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
                           <li><a href="#services" class="scroll-to">Services</a>
                           </li>
                           <li><a href="#vehicles" class="scroll-to">Vehicle Models</a>
                           </li>
                           <li><a href="#locations" class="scroll-to">Locations</a>
                           </li>
                           <li><a href="#contact" class="scroll-to">Contact</a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </nav>
            </div>
         </div>
      </header>
     
     
 
      <!-- Services end -->


     <div class="container">
		<div class=" col-md-12 background-white border border-grey-1 padding-30px ">
			<div class="col-md-6">
				<img src="" class="img-responsive" id="selectedcarimg"/>
			</div>
			<div class="col-md-6">
						<h4>From : <span id="pickupdate"></span> Time : <span id="pickuptime"></span> </h4>
						<h4>To : <span id="dropdate"></span>  Time : <span id="droptime"></span> </h4>
						<h4>Location :<span id="location"> </span> </h4>
						<h4>Price :<span id="totalprice"> </span> </h4>
						<a href="#teaser" class="btn Booking-btn1 submit-message">Change</a>
			</div>
		</div>
	 </div>




<div class="padding-tb-40px background-light-grey">
        <div class="container">
            <div class="row justify-content-center">

                <div class="">

                    <!-- car post -->
                    
                    <!-- // car post -->

                    <!-- form -->
                    <div class=" col-md-12 background-white border border-grey-1 padding-30px margin-tb-30px">
                        <h3 class="text-uppercase text-medium font-weight-700 border-bottom-1 border-second-color  padding-bottom-8px">Product Billing Detais</h3>
                        <div class="padding-top-10px">
                            <form action="#" id="form" method="post" name="form">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputName">Full Name</label>
                                        <input type="text" class="form-control" name="first-name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Last Name </label>
                                        <input type="email" class="form-control"name="last-name">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputName">Email </label>
                                       <input type="email" class="form-control" name="email-address" id="email-address" placeholder="Enter your email address">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Mobile  </label>
                                        <input type="text" class="form-control" name="phone">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputName">Country  </label>
                                        <input type="text" class="form-control" name="country">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">City   </label>
                                        <input type="text" class="form-control" name="city">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Address</label>
                                    <textarea class="form-control" rows="3" name="address"></textarea>
                                </div>
                                <a href="/" class="btn-sm btn-lg text-dark text-center font-weight-bold text-uppercase rounded-0 padding-tb-10px padding-lr-30px background-grey-1 margin-right-20px">Go Home</a>
                                <input type="submit" class="btn-sm btn-lg  background-third-color text-white text-center font-weight-bold text-uppercase rounded-0 padding-tb-10px padding-lr-30px" value="PROCEED TO CHECKOUT" name="reserve">
                            </form>
                        </div>
                    </div>
                    <!-- form -->


                </div>
                <!-- // col-lg-8 -->

            </div>
            <!-- // row -->
        </div>
        <!-- // container -->
    </div>





 

 
      </footer>
      <div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModalLabel" aria-hidden="true" data-backdrop="static">
         <div class="modal-dialog">
            <div class="modal-content">
               <form action="" method="post" id="checkout-form" name="checkout-form">
                  <input type="hidden" name="action" value="send_inquiry_form" />
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     <h4 class="modal-title" id="myModalLabel">Complete reservation</h4>
                  </div>
                  <div class="modal-body">
                     <div class="checkout-info-box">
                        <h3><i class="fa fa-info-circle"></i> Upon completing this reservation enquiry, you will receive::</h3>
                        <p>Your rental voucher to produce on arrival at the rental desk and a toll-free customer support number.</p>
                     </div>
                     <div class="checkout-vehicle-info">
                        <div class="location-date-info">
                           <h3>Location & Date</h3>
                           <div class="info-box">
                              <span class="glyphicon glyphicon-calendar"></span>
                              <h4 class="info-box-title">Pick-Up Time</h4>
                              <p class="info-box-description"><span id="pick-up-date-ph"></span> at <span id="pick-up-time-ph"></span>
                              </p>
                              <input type="hidden" name="pick-up" id="pick-up" value="">
                           </div>
                           <div class="info-box">
                              <span class="glyphicon glyphicon-calendar"></span>
                              <h4 class="info-box-title">Drop-Off Time</h4>
                              <p class="info-box-description"><span id="drop-off-date-ph"></span> at <span id="drop-off-time-ph"></span>
                              </p>
                              <input type="hidden" name="drop-off" id="drop-off" value="">
                           </div>
                           <div class="info-box">
                              <span class="glyphicon glyphicon-map-marker"></span>
                              <h4 class="info-box-title">Pick-Up Location</h4>
                              <p class="info-box-description" id="pickup-location-ph"></p>
                              <input type="hidden" name="pickup-location" id="pickup-location" value="">
                           </div>
                           <div class="info-box">
                              <span class="glyphicon glyphicon-map-marker"></span>
                              <h4 class="info-box-title">Drop-Off Location</h4>
                              <p class="info-box-description" id="dropoff-location-ph"></p>
                              <input type="hidden" name="dropoff-location" id="dropoff-location" value="">
                           </div>
                        </div>
                        <div class="vehicle-info">
                           <h3>Car: <span name="selected-car-ph" id="selected-car-ph"></span></h3>
                           <a href="#vehicles" class="scroll-to">[ Vehicle Models ]</a>
                           <input type="hidden" name="selected-car" id="selected-car" value="">
                           <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <hr>
                     <div class="checkout-personal-info">
                        <div class="alert hidden" id="checkout-form-msg">test</div>
                        <h3>PERSONAL INFORMATION</h3>
                        <div class="form-group left">
                           <label for="first-name">First Name:</label>
                           <input type="text" class="form-control" name="first-name" id="first-name" placeholder="Enter your first name">
                        </div>
                        <div class="form-group right">
                           <label for="last-name">Last Name:</label>
                           <input type="text" class="form-control" name="last-name" id="last-name" placeholder="Enter your last name">
                        </div>
                        <div class="form-group left">
                           <label for="phone-number">Phone Number:</label>
                           <input type="text" class="form-control" name="phone-number" id="phone-number" placeholder="Enter your phone number">
                        </div>
                        <div class="form-group right age">
                           <label for="age">Age:</label>
                           <div class="styled-select-age">
                              <select name="age" id="age">
                                 <option value="18">18</option>
                                 <option value="19">19</option>
                                 <option value="20">20</option>
                                 <option value="21">21</option>
                                 <option value="22">22</option>
                                 <option value="23">23</option>
                                 <option value="24">24</option>
                                 <option value="25">25</option>
                                 <option value="26">26</option>
                                 <option value="27">27</option>
                                 <option value="28">28</option>
                                 <option value="29">29</option>
                                 <option value="30">30</option>
                                 <option value="31">31</option>
                                 <option value="32">32</option>
                                 <option value="33">33</option>
                                 <option value="34">34</option>
                                 <option value="35">35</option>
                                 <option value="36">36</option>
                                 <option value="37">37</option>
                                 <option value="38">38</option>
                                 <option value="39">39</option>
                                 <option value="40">40</option>
                                 <option value="41">41</option>
                                 <option value="42">42</option>
                                 <option value="43">43</option>
                                 <option value="44">44</option>
                                 <option value="45">45</option>
                                 <option value="46">46</option>
                                 <option value="47">47</option>
                                 <option value="48">48</option>
                                 <option value="49">49</option>
                                 <option value="50">50</option>
                                 <option value="51">51</option>
                                 <option value="52">52</option>
                                 <option value="53">53</option>
                                 <option value="54">54</option>
                                 <option value="55">55</option>
                                 <option value="56">56</option>
                                 <option value="57">57</option>
                                 <option value="58">58</option>
                                 <option value="59">59</option>
                                 <option value="50">50</option>
                                 <option value="61">61</option>
                                 <option value="62">62</option>
                                 <option value="63">63</option>
                                 <option value="64">64</option>
                                 <option value="65">65</option>
                                 <option value="66">66</option>
                                 <option value="67">67</option>
                                 <option value="68">68</option>
                                 <option value="69">69</option>
                                 <option value="70">70</option>
                                 <option value="71">71</option>
                                 <option value="72">72</option>
                                 <option value="73">73</option>
                                 <option value="74">74</option>
                                 <option value="75">75</option>
                                 <option value="76">76</option>
                                 <option value="77">77</option>
                                 <option value="78">78</option>
                                 <option value="79">79</option>
                                 <option value="80">80</option>
                                 <option value="81">81</option>
                                 <option value="82">82</option>
                                 <option value="83">83</option>
                                 <option value="84">84</option>
                                 <option value="85">85</option>
                                 <option value="86">86</option>
                                 <option value="87">87</option>
                                 <option value="88">88</option>
                                 <option value="89">89</option>
                                 <option value="90">90</option>
                                 <option value="91">91</option>
                                 <option value="92">92</option>
                                 <option value="93">93</option>
                                 <option value="94">94</option>
                                 <option value="95">95</option>
                                 <option value="96">96</option>
                                 <option value="97">97</option>
                                 <option value="98">98</option>
                                 <option value="99">99</option>
                                 <option value="100">100</option>
                              </select>
                           </div>
                        </div>
                        <div class="form-group left">
                           <label for="email-address">Email Address:</label>
                           <input type="email" class="form-control" name="email-address" id="email-address" placeholder="Enter your email address">
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="newsletter">
                        <div class="form-group">
                           <div class="checkbox">
                              <input id="check1" type="checkbox" name="newsletter" value="yes">
                              <label for="check1">Please send me latest news and updates</label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer"> <span class="btn-border btn-gray"> <button type="button" class="btn btn-default btn-gray" data-dismiss="modal">Cancel</button> </span>  <span class="btn-border btn-yellow"> <input type="submit" class="btn btn-primary btn-yellow" value="Reserve Now" name="reserve"/> </span>
                  </div>
               </form>
            </div>
         </div>
      </div>
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
bannerImg = document.getElementById('selectedcarimg');
bannerImg.src = "data:image/png;base64," + dataImage;




document.getElementById("pickupdate").innerHTML = localStorage.getItem("Pick-up Date");
		document.getElementById("dropdate").innerHTML = localStorage.getItem("Drop Date");
		document.getElementById("location").innerHTML = localStorage.getItem("Pick-up Location");
		document.getElementById("pickuptime").innerHTML = localStorage.getItem("Pick-up Time");
		document.getElementById("droptime").innerHTML = localStorage.getItem("Drop Time");
		document.getElementById("totalprice").innerHTML = localStorage.getItem("Total price");
	  
	  </script>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
   </body>
</html>