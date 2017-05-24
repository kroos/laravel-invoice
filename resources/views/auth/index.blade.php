<?php

namespace App\Http\Controllers;

// load model
use App\Sales;
use App\SalesItems;
use App\SlipPostage;
use App\Customers;
use App\Product;
use App\ProductCategory;
use App\Payments;
use App\SlipNumbers;
use App\SalesTax;
use App\SalesCustomers;
use App\Preferences;

use Form;
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">

<title>{!! config('app.name') !!}</title>
<link rel="icon" href="favicon.png" type="image/png">
<link rel="shortcut icon" href="favicon.ico" type="img/x-icon">

<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800italic,700italic,600italic,400italic,300italic,800,700,600' rel='stylesheet' type='text/css'>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/font-awesome.css" rel="stylesheet" type="text/css">
<link href="css/responsive.css" rel="stylesheet" type="text/css">
<link href="css/animate.css" rel="stylesheet" type="text/css">

<!--[if IE]><style type="text/css">.pie {behavior:url(PIE.htc);}</style><![endif]-->

<script type="text/javascript" src="js/jquery.1.8.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery-scrolltofixed.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.isotope.js"></script>
<script type="text/javascript" src="js/wow.js"></script>
<script type="text/javascript" src="js/classie.js"></script>
<script src="contactform/contactform.js"></script>


</head>
<body>
<header class="header" id="header"><!--header-start-->
	<div class="container">
    	<figure class="logo animated fadeInDown delay-07s">
        	<a href="#"><img src="img/logo.png" alt=""></a>	
        </figure>	
        <h1 class="animated fadeInDown delay-07s">Welcome To {!! Preferences::find(1)->company_name !!} {!! config('app.name') !!}</h1>
        <ul class="we-create animated fadeInUp delay-1s">
        	<li>We are a semi digital agency that loves crafting beautiful websites and wants a mother look gorgeous during pregnancy and postnatal.</li>
        </ul>
            <!-- <a class="link animated fadeInUp delay-1s" href="#">Get Started</a> -->
    </div>
</header><!--header-end-->

<nav class="main-nav-outer" id="test"><!--main-nav-start-->
	<div class="container">
        <ul class="main-nav">
        	<li><a href="">Home</a></li>
            <!-- <li><a href="#service">Services</a></li> -->
            <!-- <li><a href="#Portfolio">Portfolio</a></li> -->
            <li class="small-logo"><a href=""><img src="img/small-logo.png" alt=""></a></li>
            <!-- <li><a href="#client">Clients</a></li> -->
            <li><a href="{!! route('login') !!}">Login</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        <a class="res-nav_click" href="#"><i class="fa-bars"></i></a>
    </div>
</nav><!--main-nav-end-->



<section class="main-section" id="service"><!--main-section-start-->
	<div class="container">
    	<h2>Services</h2>
    	<h6>We offer exceptional service with complimentary hugs.</h6>
        <div class="row">
        	<div class="col-lg-4 col-sm-6 wow fadeInLeft delay-05s">
            	<div class="service-list">
                	<div class="service-list-col1">
                    	<i class="fa-paw"></i>
                    </div>
                	<div class="service-list-col2">
                        <h3>v spa</h3>
                        <p>come visit out spa for having a good self time while pampert yourself.</p>
                    </div>
                </div>
                <div class="service-list">
                	<div class="service-list-col1">
                    	<i class="fa-gear"></i>
                    </div>
                	<div class="service-list-col2">
                        <h3>range of pregnancy, birth and postnatal productproduct</h3>
                        <p>pregnancy pants for more comfortable during office hour, a pack of "tools" while delivering a baby and vagina spa to help you get better soon.</p>
                    </div>
                </div>
                <div class="service-list">
                	<div class="service-list-col1">
                    	<i class="fa-apple"></i>
                    </div>
                	<div class="service-list-col2">
                        <h3>{!! config('app.name') !!}</h3>
                        <p>this is a demo version of {!! config('app.name') !!}.</p>
                        <p>please login with this credential :</p>
                        <ul>
                        	<li>user : demo@demo.com</li>
                        	<li>password : 123123</li>
                        </ul>
                    </div>
                </div>
                <div class="service-list">
                	<div class="service-list-col1">
                    	<i class="fa-medkit"></i>
                    </div>
                </div>
            </div>
            <figure class="col-lg-8 col-sm-6  text-right wow fadeInUp delay-02s">
            	<img src="img/macbook-pro.png" alt="" class="img-responsive img-rounded">
            </figure>
        
        </div>
	</div>
</section><!--main-section-end-->



<section class="main-section alabaster"><!--main-section alabaster-start-->
	<div class="container">
    	<div class="row">
			<figure class="col-lg-5 col-sm-4 wow fadeInLeft">
            	<img  src="img/iphone.png" alt="">
            </figure>
        	<div class="col-lg-7 col-sm-8 featured-work">
            	<h2>featured work</h2>
            	<P class="padding-b">Proin iaculis purus consequat sem cure digni ssim. Donec porttitora entum suscipit aenean rhoncus posuere odio in tincidunt. Proin iaculis purus consequat sem cure digni ssim. Donec porttitora entum suscipit.</P>
            	<div class="featured-box">
                	<div class="featured-box-col1 wow fadeInRight delay-02s">
                    	<i class="fa-magic"></i>
                    </div>	
                	<div class="featured-box-col2 wow fadeInRight delay-02s">
                        <h3>magic of theme development</h3>
                        <p>Proin iaculis purus consequat sem cure digni ssim. Donec porttitora entum suscipit aenean rhoncus posuere odio in tincidunt. </p>
                    </div>    
                </div>
                <div class="featured-box">
                	<div class="featured-box-col1 wow fadeInRight delay-04s">
                    	<i class="fa-gift"></i>
                    </div>	
                	<div class="featured-box-col2 wow fadeInRight delay-04s">
                        <h3>neatly packaged</h3>
                        <p>Proin iaculis purus consequat sem cure digni ssim. Donec porttitora entum suscipit aenean rhoncus posuere odio in tincidunt. </p>
                    </div>    
                </div>
                <div class="featured-box">
                	<div class="featured-box-col1 wow fadeInRight delay-06s">
                    	<i class="fa-dashboard"></i>
                    </div>	
                	<div class="featured-box-col2 wow fadeInRight delay-06s">
                        <h3>SEO optimized</h3>
                        <p>Proin iaculis purus consequat sem cure digni ssim. Donec porttitora entum suscipit aenean rhoncus posuere odio in tincidunt. </p>
                    </div>    
                </div>
                <a class="Learn-More" href="#">Learn More</a>
            </div>
        </div>
	</div>
</section><!--main-section alabaster-end-->



<section class="main-section paddind" id="Portfolio"><!--main-section-start-->
	<div class="container">
    	<h2>Portfolio</h2>
    	<h6>Fresh range of quality products that will keep you wanting more.</h6>
      <div class="portfolioFilter">  
        <ul class="Portfolio-nav wow fadeIn delay-02s">
        	<li><a href="#" data-filter="*" class="current" >All</a></li>
            <li><a href="#" data-filter=".branding" >Corset</a></li>
            <li><a href="#" data-filter=".webdesign" >Maternity Pants</a></li>
            <li><a href="#" data-filter=".printdesign" >Maternity Belly Wrap</a></li>
            <li><a href="#" data-filter=".photography" >V Spa</a></li>
        </ul>
       </div> 
        
	</div>
    <div class="portfolioContainer wow fadeInUp delay-04s">
            	<div class=" Portfolio-box printdesign">
                	<!-- <a href="#"> -->
                        <img src="img/Portfolio-pic1.jpg" alt="">
                    <!-- </a> -->
                	<h3>Delivery set</h3>
                    <p>Maternity Belly Wrap</p>
                </div>
                <div class="Portfolio-box webdesign">
                	<!-- <a href="#"> -->
                        <img src="img/Portfolio-pic2.jpg" alt="">
                    <!-- </a> -->
                	<h3>Range of Sizes and Design Maternity Pants</h3>
                    <p>Maternity Pants</p>
                </div>
                <div class=" Portfolio-box branding">
                	<!-- <a href="#"> -->
                        <img src="img/Portfolio-pic3.jpg" alt="">
                    <!-- </a> -->
                	<h3>KurV</h3>
                    <p>Corset</p>
                </div>
                <div class=" Portfolio-box photography" >
                	<!-- <a href="#"> -->
                        <img src="img/Portfolio-pic4.jpg" alt="">
                    <!-- </a> -->
                	<h3>V treatment using natural herbs. No artificial ingredients whatsoever.</h3>
                    <p>V Spa</p>
                </div>
                <div class=" Portfolio-box branding">
                	<!-- <a href="#"> -->
                        <img src="img/Portfolio-pic5.jpg" alt="">
                    <!-- </a> -->
                	<h3>KurV Features</h3>
                    <p>Corset</p>
                </div>
                <div class=" Portfolio-box photography">
                	<!-- <a href="#"> -->
                        <img src="img/Portfolio-pic6.jpg" alt="">
                    <!-- </a> -->
                	<h3>V treatment</h3>
                    <p>V Spa</p>
                </div>
    </div>
</section><!--main-section-end-->


<section class="main-section client-part" id="client"><!--main-section client-part-start-->
	<div class="container">
		<b class="quote-right wow fadeInDown delay-03"><i class="fa-quote-right"></i></b>
    	<div class="row">
        	<div class="col-lg-12">
            	<p class="client-part-haead wow fadeInDown delay-05">It was a pleasure to visit Butik Mama Moden. They made sure 
I have enough rest all the time!</p>
            </div>
        </div>
    	<ul class="client wow fadeIn delay-05s">
        	<li><a href="#">
            	<img src="img/client-pic1.jpg" alt="">
                <h3>Puan Jan</h3>
                <span>Suri Rumah</span>
            </a></li>
        </ul>
    </div>
</section><!--main-section client-part-end-->
<div class="c-logo-part"><!--c-logo-part-start-->
	<div class="container">
    	<ul>
<!--         	<li><a href="#"><img src="img/c-liogo1.png" alt=""></a></li>
            <li><a href="#"><img src="img/c-liogo2.png" alt=""></a></li>
            <li><a href="#"><img src="img/c-liogo3.png" alt=""></a></li>
            <li><a href="#"><img src="img/c-liogo4.png" alt=""></a></li>
            <li><a href="#"><img src="img/c-liogo5.png" alt=""></a></li> -->
    	</ul>
	</div>
</div><!--c-logo-part-end-->
<section class="main-section team" id="team"><!--main-section team-start-->
	<div class="container">
        <h2>team</h2>
        <h6>Take a closer look into our amazing team. We won’t bite.</h6>
        <div class="team-leader-block clearfix">
            <div class="team-leader-box">
                <div class="team-leader wow fadeInDown delay-03s"> 
                    <div class="team-leader-shadow"><a href="#"></a></div>
                    <img src="img/team-leader-pic1.jpg" alt="">
                    <ul>
                        <!-- <li><a href="#" class="fa-twitter"></a></li> -->
                        <li><a href="https://www.facebook.com/azalihaayus" class="fa-facebook"></a></li>
                        <li><a href="https://www.linkedin.com/in/azalihaabdullah" class="fa-linkedin"></a></li>
                        <!-- <li><a href="#" class="fa-pinterest"></a></li> -->
                        <!-- <li><a href="#" class="fa-google-plus"></a></li> -->
                    </ul>
                </div>
                <h3 class="wow fadeInDown delay-03s">azaliha abdullah</h3>
                <span class="wow fadeInDown delay-03s">Founder</span>
                <p class="wow fadeInDown delay-03s">laaa.. mai laa.. awat yang tak mai lagi.. V SPA kita tgh buat promosi ni. Kalau hampa bawak mai 3 org tak termasuk hampa, hampa bertangas tu kami bagi pree saja.</p>
            </div>
            <div class="team-leader-box">
                <div class="team-leader  wow fadeInDown delay-06s"> 
                    <div class="team-leader-shadow"><a href="#"></a></div>
                    <img src="img/team-leader-pic2.jpg" alt="">
                    <ul>
                        <!-- <li><a href="#" class="fa-twitter"></a></li> -->
                        <li><a href="https://www.facebook.com/azalihaabdullah" class="fa-facebook"></a></li>
                        <!-- <li><a href="#" class="fa-pinterest"></a></li> -->
                        <!-- <li><a href="#" class="fa-google-plus"></a></li> -->
                    </ul>
                </div>
                <h3 class="wow fadeInDown delay-06s">Nur Fatihah Abd Halim</h3>
                <span class="wow fadeInDown delay-06s">Pegawai Jualan</span>
                <p class="wow fadeInDown delay-06s">Mai laa sini kalau nak relek relek, rehatkan badan sambil sambil dok luloq (lulur).. syok woo.. hampa penah try dah?</p>
            </div>
            <div class="team-leader-box">
                <div class="team-leader wow fadeInDown delay-09s"> 
                    <div class="team-leader-shadow"><a href="#"></a></div>
                    <img src="img/team-leader-pic3.jpg" alt="">
                    <ul>
                        <!-- <li><a href="#" class="fa-twitter"></a></li> -->
                        <li><a href="https://www.facebook.com/profile.php?id=100010437943425" class="fa-facebook"></a></li>
                        <!-- <li><a href="#" class="fa-pinterest"></a></li> -->
                        <!-- <li><a href="#" class="fa-google-plus"></a></li> -->
                    </ul>
                </div>
                <h3 class="wow fadeInDown delay-09s">Syazwani Shakri</h3>
                <span class="wow fadeInDown delay-09s">Pegawai SPA</span>
                <p class="wow fadeInDown delay-09s">Mai laa sini.. wani tolong buat luloq. Insyaallah, kulit boleh putih balik.. kita buat cara tradisional. Mudah, selamat dan puasss..</p>
            </div>
        </div>
    </div>
</section><!--main-section team-end-->



<section class="business-talking"><!--business-talking-start-->
	<div class="container">
        <h2>contact us.</h2>
    </div>
</section><!--business-talking-end-->
<div class="container">
<section class="main-section contact" id="contact">
	
        <div class="row">
        	<div class="col-lg-6 col-sm-7 wow fadeInLeft">
            	<div class="contact-info-box address clearfix">
                	<h3><i class=" icon-map-marker"></i>Address:</h3>
                	<span>A33, tingkat atas, susuran bandar baru mergong, mergong, alorsetar, kedah.</span>
                </div>
                <div class="contact-info-box phone clearfix">
                	<h3><i class="fa-phone"></i>Phone:</h3>
                	<span>04-430-1429</span>
                </div>
                <div class="contact-info-box email clearfix">
                	<h3><i class="fa-pencil"></i>email:</h3>
                	<span>ayusline [at] gmail [dot] com</span>
                </div>
            	<div class="contact-info-box hours clearfix">
                	<h3><i class="fa-clock-o"></i>Hours:</h3>
                	<span><strong>Monday - Saturday:</strong> 10am - 7pm<br><strong>Sunday:</strong> Best not to ask.</span>
                </div>
                <ul class="social-link">
                	<!-- <li class="twitter"><a href="#"><i class="fa-twitter"></i></a></li> -->
                    <li class="facebook"><a href="https://www.facebook.com/setbersalinayus/"><i class="fa-facebook"></i></a></li>
                    <!-- <li class="pinterest"><a href="#"><i class="fa-pinterest"></i></a></li> -->
                    <!-- <li class="gplus"><a href="#"><i class="fa-google-plus"></i></a></li> -->
                    <!-- <li class="dribbble"><a href="#"><i class="fa-dribbble"></i></a></li> -->
                </ul>
            </div>
        	<div class="col-lg-6 col-sm-5 wow fadeInUp delay-05s">
                <div class="form">

<div class="row has-error">
    <div class="col-sm-8 col-sm-offset-2">
        @if(count($errors) > 0 )
        <ul class="list-group">
            @foreach($errors->all() as $err)
            <li class="list-group-item list-group-item-danger">
                {!! $err !!}
            </li>
            @endforeach
        </ul>
        @endif
    </div>
</div>
                    <div id="sendmessage">Your message has been sent. Thank you!</div>
<div id="errormessage">
</div>
                    {!! Form::open(['route' => 'contactus', 'class' => 'form-horizontal contactForm', 'role' => 'form', 'autocomplete' => 'off']) !!}
                    
                        <div class="form-group {!! ( count($errors->get('name')) ) >0 ? 'has-error' : '' !!}">
                            <input type="text" name="name" class="form-control input-text" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group {!! ( count($errors->get('email')) ) >0 ? 'has-error' : '' !!}">
                            <input type="email" class="form-control input-text" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group {!! ( count($errors->get('subject')) ) >0 ? 'has-error' : '' !!}">
                            <input type="text" class="form-control input-text" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group {!! ( count($errors->get('message')) ) >0 ? 'has-error' : '' !!}">
                            <textarea class="form-control input-text text-area" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                            <div class="validation"></div>
                        </div>
                        
                        <div class="text-center">
                        	<button type="submit" class="input-btn">Send Message</button>
                        </div>
                    </form>
                </div>	
            </div>
        </div>
</section>
</div>
<footer class="footer">
    <div class="container">
        <div class="footer-logo"><a href=""><img src="img/footer-logo.png" alt=""></a></div>
    </div>
</footer>


<script type="text/javascript">
    $(document).ready(function(e) {
        $('#test').scrollToFixed();
        $('.res-nav_click').click(function(){
            $('.main-nav').slideToggle();
            return false    
            
        });
        
    });
</script>

  <script>
    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100
      }
    );
    wow.init();
  </script>


<script type="text/javascript">
	$(window).load(function(){
		
		$('.main-nav li a').bind('click',function(event){
			var $anchor = $(this);
			
			$('html, body').stop().animate({
				scrollTop: $($anchor.attr('href')).offset().top - 102
			}, 1500,'easeInOutExpo');
			/*
			if you don't want to use the easing effects:
			$('html, body').stop().animate({
				scrollTop: $($anchor.attr('href')).offset().top
			}, 1000);
			*/
			event.preventDefault();
		});
	})
</script>

<script type="text/javascript">

$(window).load(function(){
  
  
  var $container = $('.portfolioContainer'),
      $body = $('body'),
      colW = 375,
      columns = null;

  
  $container.isotope({
    // disable window resizing
    resizable: true,
    masonry: {
      columnWidth: colW
    }
  });
  
  $(window).smartresize(function(){
    // check if columns has changed
    var currentColumns = Math.floor( ( $body.width() -30 ) / colW );
    if ( currentColumns !== columns ) {
      // set new column count
      columns = currentColumns;
      // apply width to container manually, then trigger relayout
      $container.width( columns * colW )
        .isotope('reLayout');
    }
    
  }).smartresize(); // trigger resize to set container width
  $('.portfolioFilter a').click(function(){
        $('.portfolioFilter .current').removeClass('current');
        $(this).addClass('current');
 
        var selector = $(this).attr('data-filter');
        $container.isotope({
			
            filter: selector,
         });
         return false;
    });
  
});

</script>

</body>
</html>