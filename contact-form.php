<?php
if(isset($_POST['submit'])) 
{

$message=
'Full Name:	'.$_POST['fullname'].'<br />
Subject:	'.$_POST['subject'].'<br />
Email:	'.$_POST['emailid'].'<br />
Comments:	'.$_POST['comments'].'
';
    require "phpmailer/class.phpmailer.php"; //include phpmailer class
      
    // Instantiate Class  
    $mail = new PHPMailer();  
      
    // Set up SMTP  
    $mail->IsSMTP();                // Sets up a SMTP connection  
    $mail->SMTPAuth = true;         // Connection with the SMTP does require authorization    
    $mail->SMTPSecure = "ssl";      // Connect using a TLS connection  
    $mail->Host = "smtp.gmail.com";  //Gmail SMTP server address
    $mail->Port = 465;  //Gmail SMTP port
    $mail->Encoding = '7bit';
    
    // Authentication  
    $mail->Username   = "CustomerGradroomFeedback@gmail.com"; // Your full Gmail address
    $mail->Password   = "customerfeedback"; // Your Gmail password
      
    // Compose
    $mail->SetFrom($_POST['emailid'], $_POST['fullname']);
    $mail->AddReplyTo($_POST['emailid'], $_POST['fullname']);
    $mail->Subject = "Feedback Form";      // Subject (which isn't required)  
    $mail->MsgHTML($message);
 
    // Send To  
    $mail->AddAddress("GradroomTeam@gmail.com", "Gradroom Team"); // Where to send it - Recipient
    $result = $mail->Send();		// Send!  
	$message = $result ? 'Successfully Sent!' : 'Sending Failed!';      
	unset($mail);

}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="gradRoomStyle.css">
<link rel="stylesheet" href="dipti.css">

 <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

</head>


<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<!-- start of navbar section -->
 <div class="modal fade" id="openModal1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
    <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      <center>    <h4 class="modal-title">Search GradRoom</h4>
        </div>
 
   <h2>Search</h2>
   <br/>
   <p><form> 
What are you looking for?: <input type="text" onkeyup="showHint(this.value)">
</form></p>
   <p>Suggestions: <span id="txtHint"></span></p>
</div>
</div>
</div>





<!-- end of this modal -->
<script>
function showHint(str) {
   if (str.length == 0) { 
       document.getElementById("txtHint").innerHTML = "";
       return;
   } else {
       var xmlhttp = new XMLHttpRequest();
       xmlhttp.onreadystatechange = function() {
           if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
               document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
           }
       };
       xmlhttp.open("GET", "gethint.php?q=" + str, true);
       xmlhttp.send();
   }
}
</script>



<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>

 <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>


   <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="glyphicon glyphicon-menu-hamburger"></span>
        </button>
          <a class="navbar-brand" href="profile.php"><img src="img/gradLogo.png" width="160" height="35"></a>
           

      </div>



      <div class="collapse navbar-collapse" id="myNavbar" >
        <ul class="nav navbar-nav navbar-right" >
        <li class="dropdown" style="z-index:90001;">
          <button class="dropbtn" > <a class="page-scroll" href="profile.php#msinus" >MS in US</a> &#9662</button>
          <div class="dropdown-content">
            <a href="listofuniversities.html">List Of Universities</a>
            <a href="trend.html">Admit Trends</a>
            <a href="index_forum.php">Discussion forum</a>
           <a href="newsFeed.html">What's New?</a>
          </div>
        </li>
           <li class="dropdown" style="z-index:90001;">
          <button class="dropbtn" > <a class="page-scroll" href="profile.php#uniGuide" >UniGuide</a> &#9662</button>
          <div class="dropdown-content">
            <a href="uniSearch.html">UniSearch</a>
            <a href="searchUni.html">UniPredictor</a>
            <a href="univRating.html">UniReview</a>
          </div>
        </li>
        <li class="dropdown" style="z-index:90000;">
          <button class="dropbtn"><a class="page-scroll" href="profile.php#resources" >Resources</a> &#9662</button>
          <div class="dropdown-content">
            <a href="sop1.html">SOP/LOR</a>
            <a href="gretoefl.html">GRE/TOEFL</a>
            <a href="appAssist.html">Application Assist</a>
              <a href="visainterview.html">Visa Interview</a>
                <a href="faq-1.html">FAQs</a>
          </div>
        </li>
        <li>
           <a class="page-scroll" href="profile.php#aboutus" style="font-size:16px">About us</a>
       </li>
        <li>
           <a class="page-scroll" href="profile.php#contact" style="font-size:16px">Contact</a>
       </li>
<li>
       <a href="#openModal1" data-toggle="modal" title="Search" data-placement="bottom" style="font-size:16px"><span class="glyphicon glyphicon-search"></span></a>
      
      </li>
	  <li>

       <a href="logout.php" data-toggle="tooltip" title="Logout" data-placement="bottom" style="font-size:16px"><span class="glyphicon glyphicon-log-out"></span></a>
      </li>
  
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navigation -->

  <script>
$(document).ready(function(){       
   var scroll_start = 0;
   var startchange = $('#msinus');
   var offset = startchange.offset();
    if (startchange.length){
   $(document).scroll(function() { 
      scroll_start = $(this).scrollTop();
      if(scroll_start > offset.top) {
          $(".navbar-default").css('background-color', 'black');
       } else {
          $('.navbar-default').css('background-color', 'transparent');
       }
   });
    }
});
</script>

        <!-- /.container -->
<!-- end of navbar section -->


<div class= "row">


<div class="col-sm-12 test">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>

    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

    
      <div class="item active">
        <img src="img/studyab1.jpg"  width="460px" height="345px">
      </div>

      <div class="item">
        <img src="img/app.jpg"  width="460px" height="345px">
      </div>



      <div class="item">
        <img src="img/grad.jpg"  width="460px" height="345px">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

</div>

</div>



<!-- MS in US starts -->


<div class="container test backgroundimage" id="msinus">
<br><br><br><br><br>
<br><br>
<div class="opaquebg">
<br>
<center> <h1 style="color:red" > MS in US </h1>
<h4 style="color:blue"> Be the master of your future! </h4>

</center>
<br>
</div>

<br><br><br><br>
<br><br><br><br>
  <div class="row">

    <div class="col-sm-4">
    <center><a href="trend.html"><img class="circ" src="img/admit1.jpg"></a></center>
    </br></br></br>
    </div>

    <div class="col-sm-4">
    <center><a href="listofuniversities.html"> <img class="circl" src="img/list1.jpg"></a> </center>
    <br></br></br>
   </div>
    <div class="col-sm-4">
   <center><a href="index_forum.php"><img class="circle" src="img/discussion1.jpg"></a> </center>
   </br></br></br>
    </div>
</div>
<br><br><br><br>
<br><br>
</div>


<!-- MS in US ends -->


 <!--Resources Section starts-->
 <section class="packages" id="resources">
    <div class ="row">
    <div class="col-sm-12">
        <div class="resources" >
            <center><h1><strong><font color="white">RESOURCES</h1>
                        Refer to the following material for better guidance</font></strong>
            </center><br>
        
      
            <div class="col-lg-3 col-sm-3">
      <div class="package">
        <div class="package-header green-bg">
                                    
                                    <h3><center>SOP/LOR SAMPLES</center></h3>
        </div>
        <div class="price dark-bg">

<ul class="ratingsList">        
    <li class="userRating"><span class="glyphicons glyphicons-star"></span></li>
    <li class="userRating"><span class="glyphicons glyphicons-star"></span></li>
    <li class="userRating"><span class="glyphicons glyphicons-star"></span></li>
    <li class="userRating"><span class="glyphicons glyphicons-star"></span></li>
    <li class="userRatingNormal"><span class="glyphicons glyphicons-star"></span></li>
</ul>

        </div>
                            
        <ul>
          <li class="ok"><span class="halflings halflings-ok"></span>50 Sample Examples</li>
          <li class="ok"><span class="halflings halflings-ok"></span>Free Online Help</li>
          <li class="ok"><span class="halflings halflings-remove"></span>Access to Tutorials</li>
          <li class="remove"><span class="halflings halflings-remove"></span>Free Download</li>
          
        </ul>
                            <center><a href="sop1.html" class="btn btn-primary custom-button green-btn">
                                    View </a></center>
      </div>
    </div>
<!--            End of first section-->
<!--        </div>-->
<div class="col-lg-3 col-sm-3">
      <div class="package">
        <div class="package-header blue-bg">
                                    
                                    <h3><center>GRE/TOEFL SAMPLES</center></h3>
        </div>
        <div class="price dark-bg">
          
<ul class="ratingsList">        
    <li class="userRating"><span class="glyphicons glyphicons-star"></span></li>
    <li class="userRating"><span class="glyphicons glyphicons-star"></span></li>
    <li class="userRating"><span class="glyphicons glyphicons-star"></span></li>
    <li class="userRating"><span class="glyphicons glyphicons-star"></span></li>
    <li class="userRating"><span class="glyphicons glyphicons-star"></span></li>
</ul>
        </div>
                            
        <ul>
          <li class="ok"><span class="halflings halflings-ok"></span>50 Sample Examples</li>
          <li class="ok"><span class="halflings halflings-ok"></span>Free Online Help</li>
          <li class="ok"><span class="halflings halflings-remove"></span>Access to Tutorials</li>
          <li class="remove"><span class="halflings halflings-remove"></span>Free Download</li>
          
        </ul>
                            <center><a href="gretoefl.html" class="btn btn-primary custom-button blue-btn">
                                    View </a></center>
      </div>
    </div>
<!--End of section two-->
<div class="col-lg-3 col-sm-3">
      <div class="package">
        <div class="package-header red-bg">
                                    
                                    <h3><center>Application assist</center></h3>
        </div>
        <div class="price dark-bg">
<ul class="ratingsList">        
    <li class="userRating"><span class="glyphicons glyphicons-star"></span></li>
    <li class="userRating"><span class="glyphicons glyphicons-star"></span></li>
    <li class="userRating"><span class="glyphicons glyphicons-star"></span></li>
    <li class="userRating"><span class="glyphicons glyphicons-star"></span></li>
    <li class="userRatingNormal"><span class="glyphicons glyphicons-star"></span></li>
</ul>
        </div>
                            
        <ul>
          <li class="ok"><span class="halflings halflings-ok"></span>First Seminar Free</li>
          <li class="ok"><span class="halflings halflings-ok"></span>Free Online Help</li>
          <li class="ok"><span class="halflings halflings-ok"></span>Access to Tutorials</li>
          <li class="ok"><span class="halflings halflings-ok"></span>All Universities</li>
          
        </ul>
                            <center><a href="appAssist.html" class="btn btn-primary custom-button red-btn">
                                    View </a></center>
      </div>
    </div>
<!--End of section three-->
<div class="col-lg-3 col-sm-3">
      <div class="package">
        <div class="package-header yellow-bg">
                                    
                                    <h3><center>VISA INTERVIEW</center></h3>
        </div>
        <div class="price dark-bg">
          <ul class="ratingsList">        
    <li class="userRating"><span class="glyphicons glyphicons-star"></span></li>
    <li class="userRating"><span class="glyphicons glyphicons-star"></span></li>
    <li class="userRating"><span class="glyphicons glyphicons-star"></span></li>
    <li class="userRatingNormal"><span class="glyphicons glyphicons-star"></span></li>
    <li class="userRatingNormal"><span class="glyphicons glyphicons-star"></span></li>
</ul>
        </div>
                            
        <ul>
          <li class="ok"><span class="halflings halflings-ok"></span>First Seminar Free</li>
          <li class="ok"><span class="halflings halflings-ok"></span>Free Online Help</li>
          <li class="ok"><span class="halflings halflings-ok"></span>Access to Tutorials</li>
          <li class="ok"><span class="halflings halflings-ok"></span>All Universities</li>
          
        </ul>
                            <center><a href="visainterview.html" class="btn btn-primary custom-button yellow-btn">
                                    View </a></center>
      </div>
    </div>
<!--End of section foue-->
    </div>
        </div>
    </div><br><br>
     </section>
 <!--Resources section ends-->
<!--About Us Section    -->


        <div class="aboutus" id="aboutus">
            <div class ="row">
    <div class="col-sm-12"><br>
            <center><h1><strong><font color="white">ABOUT US</h1>
                        WE GUARANTEE YOUR SUCCESS !</font></strong>
            </center>
            <br><br>
            <div class="row">
            <div class="col-md-4">
    <div class="big-intro" >
                    <p> <font color="#330000">Effective And Informed Decisions About Education</font></p>
      </div>
    </div>
                
                <div class="col-md-4">
                    <p><strong><font size="3px">
         GradRoom started off in February 2016 as a college review website that offers students' opinions on 
                                 everything you have to know about colleges, courses and universities.<br/><br/>
                                 Over time, we generated an 
                                 extensive pool of content that helps students throughout their undergraduate journey.
<br/><br/>
Today, thousands of students use GradRoom's study resources and information to excel in academics 
and make informed choices about their careers.</font>
</strong></p>

    </div>
                <div class="col-md-4">
                    <ul>
                        <li>
                            <div class="clearfix">
                                <div class="c100 p85 small">
                    <span>85%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                        
                    </div>
                    
                </div>
                                <br/>
                                <strong>
                                    <font size="4px">Success Rate since year 2010    </font> </strong>
              </div>
                            
                        </li>
<!--<div style="display: inline; width: 64px; height: 200px;">
    <canvas id="myCanvas" width="578" height="200"></canvas>
    <input type="text" value="86" data-thickness=".2" class="rating" readonly="readonly" style="width: 36px; height: 21px; position: absolute; vertical-align: middle; margin-top: 21px; margin-left: -50px; border: 0px; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 12px; line-height: normal; font-family: Arial; text-align: center; color: rgb(255, 255, 255); padding: 0px; -webkit-appearance: none; background: none;">
</div>-->
                        <li>
                            <div class="clearfix">
                                <div class="c100 p93 small">
                    <span>93%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>
                                <br/>
                                <font size="4px"><strong>Successful College Match!! </strong>   </font>
              </div>
                        </li>
                        
                        <li>
                            <div class="clearfix">
                                <div class="c100 p12 small">
                    <span>12%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>
                                <br/>
                                <font size="4px"><strong>Non-Admits since year 2010</strong>    </font>
              </div>
                        </li>
                            
<!--                            <h6>Success Rate</h6>
                            <p>This is a testing line.This is a testing line.</p>-->
                            
                        
                    </ul>
                    
                </div>
            </div>
        </div>
    </div><br><br><br>
            <div class = "panel panel-default" style="text-align:center;">
      
      <div class = "panel-heading panel-heading" style="background-color:#009966 !important;">
        <h4 class = "panel-title">
            <a data-toggle = "collapse" data-parent = "#accordion" href = "#view">
                <b><font color=white><strong>MEET OUR TEAM >></strong></font></b>
            </a>
         </h4>
      </div>
      
      <div id = "view" class = "panel-collapse collapse">
         <div class = "panel-body" style="background-image: url(img/forum1.jpg);">
           <div class="row">
               <div class="col-lg-4 col-md-2 col-sm-4">
                   <br/>
                   <!--<img class="img-circle" src="img/Dipti.jpg"/>-->
                   <div class="img-circle" style="background:url(img/Dipti.jpg);">
                       <p class="imgDescription"><br/><br/><br/><br/><br/><br/><strong>Dipti Pamnani<br/><br/>
                       Co-founder & Web Developer</strong></p>
                   </div>
               </div>
               
               <div class="col-lg-4 col-md-2 col-sm-4">
                   <br/>
                   <!--<img class="img-circle" src="img/Dipti.jpg"/>-->
                   <div class="img-circle" style="background:url(img/Vega.jpg);">
                       <p class="imgDescription"><br/><br/><br/><br/><br/><br/><strong>Vega Shetty
                           <br/><br/>
                       Co-founder & Web Developer</strong></p>
                   </div>
               </div>
               
               <div class="col-lg-4 col-md-2 col-sm-4">
                   <!--<img class="img-circle" src="img/Dipti.jpg"/>-->
                   <br/>
                   <div class="img-circle" style="background:url(img/Tanisha.jpg);">
                       <p class="imgDescription"><br/><br/><br/><br/><br/><br/><strong>Tanisha Jain
                           <br/><br/>
                       Co-founder & Web Developer</strong></p>
                   </div>
               </div>
               
           </div>
         </div>
</div>
<!--About US section ends-->
<script>

      var canvas = document.getElementById('myCanvas');
      var context = canvas.getContext('2d');
      var centerX = canvas.width / 2;
      var centerY = canvas.height / 2;
      var radius = 20;

      context.beginPath();
      context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
      context.fillStyle = 'green';
      context.fill();
      context.lineWidth = 5;
//      context.strokeStyle = '#003300';
//      context.stroke();

</script>



<div class="container contact test3">

<div class= "row" id="contact">




<!-- Get in touch section starts here -->

<div class="container contact test3">

<div class= "row" id="contact" style="color:black;">


<br/><br/>
<center id="get"><font size="350">Get in Touch</font><br/><br/>
<b id="we">We would love to hear from you!</b><br/><br/></br>
</center>


<form ng-app="myApp" ng-controller="validateCtrl" name="form1" id="form1" action="contact-form.php" method="post" novalidate>
<fieldset>
<div class="col-sm-4 test">
<center>
<input type="text"  class="form-control" name="fullname" ng-model="fullname" value="" placeholder="Full Name" required>&nbsp <br/>
<span style="color:red" ng-show="form1.fullname.$touched && form1.fullname.$invalid">
<span ng-show="form1.fullname.$error.required">Fullname is required.</span>
</span>
</span>
<br/><br/>
</center>
</div>

<div class="col-sm-4 test">
  <center>
<input type="text"  class="form-control" name="subject" ng-model="subject" value="" placeholder="Subject" required>&nbsp<br/>
<span style="color:red" ng-show="form1.subject.$touched && form1.subject.$invalid">
<span ng-show="form1.subject.$error.required">Subject is required.</span>
</span>
</span>
 <br/><br/>
 </center>
</div>


<div class="col-sm-4 test">
  <center>
<input type="email"  class="form-control" name="emailid" ng-model="emailid" value="" placeholder="E-mail" required>&nbsp </br> 
<br/>
<span style="color:red" ng-show="form1.emailid.$touched && form1.emailid.$invalid">
<span ng-show="form1.emailid.$error.required">Email is required.</span>
<span ng-show="form1.emailid.$error.email">Invalid email address.</span>


<!-- <span ng-show="form1.emailid.$error.email">Invalid email address.</span> -->
</span>

<br/><br>
</center>
</div>


<div class="col-sm-12 test4">
 <center>
 
<textarea placeholder="Comments" class="form-control" ng-model="comments" value="" style="min-width:80%" rows="7" name="comments" required></textarea><br/><br/>  <br/>

<!-- <input type="submit" class="btn btn-primary" value="Send Message"/> -->

<br/>
<span style="color:red" ng-show="form1.comments.$touched && form1.comments.$invalid">
<span ng-show="form1.comments.$error.required">Comments are required.</span>
</span>
</span>

</center>
</div>
	<div ng-init="init()">
  <input type="submit" class="btn-primary btn-lg" ng-disabled="form1.fullname.$touched && form1.fullname.$invalid || form1.fullname.$untouched || form1.comments.$touched && form1.comments.$invalid || form1.comments.$untouched || form1.emailid.$touched && form1.emailid.$invalid || form1.emailid.$untouched  || form1.subject.$touched && form1.subject.$invalid || form1.subject.$untouched "  name="submit" value="Send" />
 </div><br/><br/>
  </fieldset>
</form>
<p><?php if(!empty($message)) echo '<script type="text/javascript">

alert("'.$message.'")

</script>'; ?></p>



<script>
var app = angular.module('myApp', []);
app.controller('validateCtrl', function($scope) {
    $scope.fullname = '';
 $scope.emailid = '';
  $scope.comments = '';
   $scope.subject = '';
});
</script>

</div>

</div>


<!-- Get in touch section ends here -->




<div class= "row address">


 <div class="col-sm-2"><br/>


  <center><address><img src="img/adresses.png" width="60" height="50" align = "center"><br/>
 <a href="https://www.google.com/maps/@42.3343,-71.1007,15z">
 <h5> 75 Saint Alphonsus St,<br/> Boston<br/>MA-02120</a></address></center></div>


  <div class="col-sm-2"> <br/><center><img src="img/E-Mail-Icon.png" width="60" height="50" align = "center"><br/><br/>
   <h5>  <a href="mailto:vegashetty@gmail.com" target="_top">contact@gradroom.com</a>


  </div>



  <div class="col-sm-2"><br/><center><img src="img/phone-green-icon.png" width="60" height="50" align = "center">
<br/><br/>
   <h5> Call us : <a href="tel:+18578004331">857-800-4331</a>

  </div>

  <div class="col-sm-2"><br/>
   <center><a href="https://www.facebook.com"><img src="img/fb.png" width="60" height="50" align = "center"></a></center> </div> &nbsp &nbsp &nbsp
   <div class="col-sm-2"><br/>
   <center><a href="https://twitter.com"><img src="img/Twitter-icon.png" width="60" height="50" align = "center"></a> </center></div> &nbsp &nbsp &nbsp
    <div class="col-sm-2">
    <center><a href="https://www.instagram.com"><img src="img/insta.png" width="60" height="50" align = "center"></a> </center></div>

  </div>




 <div class="row address">
<div row="col-sm-12">
<footer>


<center> <nav> <a href = "termcon.html"> Terms & Conditions </a>|

 <a href="faq-1.html" >FAQs </a> | 
<small><b>© Copyright 2016, GradRoom</b></small> </nav></center>


</footer>
</div>
</div>


  <!-- Footer -->


</body>
</html>






