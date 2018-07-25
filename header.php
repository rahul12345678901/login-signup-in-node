<!DOCTYPE html>
<html lang="en">
<head>
<title>Bluesky Hotels & Resorts </title>
<meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="assets/style.css"/>
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.js"></script>
  <script src="assets/script.js"></script>
    <script src="assets/redirection.js"></script>
    <link rel="shortcut icon" href="images/favicon.jpg" type="image/x-icon"/>
 <link rel="stylesheet" href="assets/Fonts/font-awesome.min.css">
<!-- Owl stylesheet -->
<link rel="stylesheet" href="assets/owl-carousel/owl.carousel.css">
<link rel="stylesheet" href="assets/owl-carousel/owl.theme.css">
<script src="assets/owl-carousel/owl.carousel.js"></script>
<link rel="stylesheet" type="text/css" href="assets/slitslider/css/style.css" />
<link rel="stylesheet" type="text/css" href="assets/slitslider/css/custom.css" />
<link rel="stylesheet" type="text/css" href="assets/main.css" />
<script type="text/javascript" src="assets/slitslider/js/modernizr.custom.79639.js"></script>
<script type="text/javascript" src="assets/slitslider/js/jquery.ba-cond.min.js"></script>
<script type="text/javascript" src="assets/slitslider/js/jquery.slitslider.js"></script>

</head>

<body>
<div class="jain_container">

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
<div class="container1 container-fluid"> 
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
<span class="sr-only">Toggle navigation</span>
<i class="icon-menu"></i> Menu
</button>
<a class="navbar-brand" href="#"> <img src="images/logo.jpg" class="img-responsive"/></a>
</div>


 <div class="col-md-8">
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


<div class="col-md-12">
<ul class="nav navbar-nav">

<li class="dropdown mega-dropdown">
    			<a href="#" class="dropdown-toggle" data-toggle="dropdown">FIND YORU HOTEL <span class="caret"></span></a>				
				<ul class="dropdown-menu mega-dropdown-menu">
					<li class="col-sm-4">
    					<ul>
							<li class="dropdown-header">HOTEL AND RESORT</li>
							<li><a href="#">Country Resort- Khajjiar</a></li>
                            <li><a href="#">Country Resort- Dalhousie</a></li>
                            <li><a href="#">Yours Homes Stay- Dalhousie</a></li>
							
							<!-- <li class="divider"></li>
							<li class="dropdown-header">Fonts</li>
                            <li><a href="#">Glyphicon</a></li>
							<li><a href="#">Google Fonts</a></li> -->
						</ul>
					</li>
					<li class="col-sm-4">
						<ul>
							<li class="dropdown-header">HOTEL AND RESORT</li>
							<li><a href="#">Sylvan Woods Cottage- Manali</a></li>
                            <li><a href="#">Pinewood Cottage- Joatpass(HP)</a></li>
                            <li><a href="#">Sky Height Home Stay(HP)</a></li>
									
						</ul>
					</li>
					<li class="col-sm-4">
						<ul>
							<li class="dropdown-header">Much more</li>
                            <li><a href="#">Radhe Krishna Palace</a></li>
                            <li><a href="#">Khajjiar</a></li>
                            <li><a href="#">Manali</a></li>
							                    
						</ul>
					</li>
                   
				</ul>				
			</li>


				<li><a href="about-company/">ABOUT US</a></li>
				<li><a href="about-company/blog.php">HOLIDAYS PACKAGES</a></li>
				<li><a href="about-company/hotels-resort.php">HOTELS & RESORT</a></li>
				
				<li><a href="about-company/contact.php">CONTACT US</a></li>

				</ul>
			</div>
<div class="col-md-12">
<form class="form-horizontal form-horizontal_x">
<div class="col-md-12">
    <div class="form-group">
	  <div class="col-sm-4">
      <div class="category_div" id="category_div">
            <select name="category" class="form-control" id="category" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value);">
                <option value="">Select Country</option>
                <option value="India">India</option>
            </select>
        </div>
		</div>
		  <div class="col-sm-4">   
        <div class="sub_category_div" class="form-control" id="sub_category_div">
            <script type="text/javascript" language="JavaScript">
                document.write('<select name="subcategory" class="form-control" id="subcategory" onchange="javascript: dynamicdropdownone(this.options[this.selectedIndex].value);"><option value="">Please select Place</option></select>')
            </script>
            <noscript>
                <select name="subcategory" class="form-control" id="subcategory" >
                    <option value="">Please select Place</option>
                </select>
            </noscript>
        </div>
        </div>
		  <div class="col-sm-4">   
        <div class="sub_subcategory_div" class="form-control" id="sub_subcategory_div">
            <script type="text/javascript" language="JavaScript">
                document.write('<select name="sub_subcategory" class="form-control" onchange="javascript: urlRedirectTo(this.options[this.selectedIndex].value);" id="sub_subcategory"><option value="">Please select Website</option></select>')
            </script>
            <noscript>
                <select name="sub_subcategory" class="form-control" id="sub_subcategory" >
                    <option value="">Please select website</option>
                </select>
            </noscript>
        </div>
        </div>
    </div>
	</div>
	
  </form>     
  </div>
  
</div>
</div>

<div class="col-md-2 medias">

<ul> 
<li> <a href="#"> <i class="fa fa-facebook" ></i></a></li>
<li> <a href="#"> <i class="fa fa-twitter" ></i></a></li>
<li> <a href="#"> <i class="fa fa-google-plus" ></i></a></li>
<li> <a href="#"> <i class="fa fa-pinterest-p"></i></a></li>

</ul>

		<div class="classus">

			<p> Call us +91 7210098673</p>

		</div>



</div>

 
</div>
 
</nav>


<div class="banner_home">
  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
   <!--    <li data-target="#myCarousel" data-slide-to="3"></li> -->
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="images/1.png" alt="Bluesky Hotels & Resorts"/>
		<div class="carousel-caption">
       <div class="tagline">
        <h3 style="color:#fff;">Bluesky Hotels & Resorts

		<hr/>
		<span style="color:#fff;">Experience Of Bluesky </span>
		</h3>
		<div class="new_years">
		<div class="new_years_inner">
		<h4 > Special Offer</h4>
      <a href="about-company/hotels-resort.php">  Grab it now ></a>
	  </div>
		</div>
		</div>
      </div>
		
		
      </div>

      <div class="item">
          <img src="images/3.jpg" alt="Bluesky Hotels Resorts"/>
		<div class="carousel-caption">
       <div class="tagline">
        <h3 style="color:#fff;">Bluesky Hotels & Resorts

		<hr/>
		<span style="color:#fff;">Experience Of Bluesky </span>
		</h3>
		<div class="new_years">
		<div class="new_years_inner">
		<h4> Special Offer</h4>
      <a href="about-company/hotels-resort.php">  Grab it now ></a>
	  </div>
		</div>
		</div>
      </div>
		
		
      </div>
    
      <div class="item">
          <img src="images/2.jpg" alt="Bluesky Hotels Resorts"/>
		 <div class="carousel-caption">
       <div class="tagline">
        <h3 style="color:#fff;">Bluesky Hotels & Resorts

		<hr/>
		<span style="color:#fff;">Experience Of Bluesky </span>
		</h3>
		<div class="new_years">
		<div class="new_years_inner">
		<h4> Special Offer</h4>
      <a href="about-company/hotels-resort.php">  Grab it now ></a>
	  </div>
		</div>
		</div>
      </div>
      </div>

    
    </div>

   
  </div>
</div>
</div>