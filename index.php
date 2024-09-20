<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Intranet | MyPortal</title>
    <!-- Bootstrap Core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="dist/css/style.css" rel="stylesheet">
    
    <script type="text/javascript">
		/* 
		
		COUNTDOWN
		-------------------------------------------------------------------
		replace UTC with your time zone (eg. UTC+01 for Paris) 
		list of time zone codes: http://en.wikipedia.org/wiki/Time_zone#UTC
		
		*/
		// Counter(new Date("Oct 20 2012 12:00:00 UTC"));
		// var done_message = "It's here!";
	</script>
	<!--<link rel="stylesheet" type="text/css" href="css/main.css" media="screen" />
    <link href="css/responsive.css" rel="stylesheet" media="screen and (max-width:979px)">-->
    
    
     <!--///////////////////////////////////////////////////////////////////////////////////////////////////
    //
    //		Styles
    //
    ///////////////////////////////////////////////////////////////////////////////////////////////////--> 
  

    <!-- Custom CSS -->
     

        
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
<style type="text/css">
body { padding-top: 50px; }
#myCarousel .nav a small {
  display:block;
}
#myCarousel .nav {
  background:#eee;
}
#myCarousel .nav a {
  border-radius: 0px;
}
  </style>

  <body>
     
   <!-- Fixed navbar -->
   <div class="navbar navbar-inverse navbar-fixed-top" style="background:url(images/bg.png)">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="images/logo.png"/></a>
        </div>
        <center>
          <div class="navbar-collapse collapse" id="navbar-main" style="padding-top:1%;">
            <form class="navbar-form navbar-right">
              <div class="form-group">
                  <input type="text" class="form-control input-sm" id="username" placeholder="Username" required="" data-toggle="tooltip" data-placement="bottom" title="Please call IT for your username">
              </div>
              <div class="form-group">
                  <input type="password" class="form-control input-sm" id="password" placeholder="Password" required="">
              </div>
              <button id="btn-login" type="submit" class="btn btn-success btn-sm">Sign In</button>
              <a class = "btn btn-danger btn-sm" href="step1.php" data-toggle="tooltip" data-placement="bottom" title="Forgot Password?">Forgot Password?</a>
            </form>
          </div>
        </center>
    </div>
</div>
  
<blockquote>
  <p><br>
  </p>
</blockquote>
  
<div class="container">
  <div class="container-content">
        <div class="container-slide">
           <div class="row" style="background-color:#FFFFFF; padding:0px; -webkit-border-radius: 5px;-moz-border-radius: 5px; border-radius: 5px; height:100%;">	
            <!-- Carousel  -->
             <?php include 'includes/slideshow.php';?>               
            <!-- End -->
           </div> <!-- row -->
          <!-- MISSION VISION -->
          <div class="row">
            <div class="col-sm-6">
              <h2 tyle="padding-left:50px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mission/Vision</h2>
              <p style="padding-left:50px; padding-right:30px; text-align:justify">We are a key player in the real estate industry with brand integrity, serving global emerging markets offering best value products and services to our customers and business partners.<br>
              Our corporate philosopy is anchored on sustainability programs around the environment and commitment to social responsibilty.</p>
            </div><!-- of column -->
            <div class="col-sm-6">
              <h2 class="card-title" style="padding-left:20px">Value Proposition</h2>
              <p class="card-text" style="padding-right:50px; padding-left:20px; text-align:justify">We maintain world-class standards in building real estate structures utilizing cutting-edge technology to provide the best environment for our customers. We invest in research and development to continuously explore different building philosophies that honor the ecosystem, thereby harnessing nature’s strengths.</p>
            </div>
          </div>
        </div><!-- slide container-->
      </div><!-- end div-content-->    
  </div><!-- end of div-container -->

<script src="dist/js/jquery.min.js" type="text/javascript"></script>
<script src="dist/js/bootstrap.js" type="text/javascript"></script>     
<script>
  $('.carousel').carousel({
    interval: 10000
  })

  //login
  $('#btn-login').on('click',function(e){
    e.preventDefault();

    var username = $('#username').val();
    var password = $('#password').val();
    var myData = 'username=' + username + '&password=' + password;

    if(username != '' || password != '')
    {
      $.ajax({
        type: 'POST',
        url: 'controls/login.php',
        data: myData,

        success: function(response)
        {
          if(response > 0)
          {
            window.location = 'controls/checkaccess.php';
          }
          else
          {
            window.location = 'invalidlogin.php';
          }
        }
      })
    }
    else
    {
      window.location = 'invalidlogin.php';
    }
  })
</script>
</body>
</html>