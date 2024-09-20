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

    <!--<link href="dist/css/bootstrap.css" rel="stylesheet" type="text/css">-->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="dist/css/style.css" rel="stylesheet">
    
	<style>
		body { padding-top: 25px; }
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
    
    <script type="text/javascript">
		/* 
		
		COUNTDOWN
		-------------------------------------------------------------------
		replace UTC with your time zone (eg. UTC+01 for Paris)
		list of time zone codes: http://en.wikipedia.org/wiki/Time_zone#UTC
		
		*/
		Counter(new Date("Oct 20 2012 12:00:00 UTC"));
		var done_message = "It's here!";
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
               <div class="row" style="background-color:#FFFFFF; padding:0px; -webkit-border-radius: 5px;-moz-border-radius: 5px; border-radius: 5px; height:100%; padding-top:15px;">	
                <div class="col-md-3"></div>
                <div class="col-md-6">
                   <div class="panel panel-success">
                       <div class="panel-heading">
                         <h6 class="panel-title">Welcome</h6>
                       </div>
                      <div class="panel-body">
                         <div class="alert alert-success">
                           <i class="glyphicon glyphicon-ok-sign">

                          </i>
                          Congratulations, you have already updated securely your account. Please click the button below to login.
                         </div>
                  
                        
                        <br>
                    <a class="btn btn-success btn-sm" style="float:right;" href="logout.php">Go to Login Page <i  class = "glyphicon glyphicon-arrow-right"></i></a>
                </form>
                      </div>
                   </div>
                   <a style="COLOR:GREEN"><b></b></a><br><br>
                 </div>
               </div> <!-- row -->
               
             </div><!-- slide container -->
          </div>              
	  </div>

        <?php
		if(isset($_POST['search'])) {
					if(empty($_POST['find'])) {
						echo"<script type=\"text/javascript\">	
						window.alert(\"Keyword is empty for searching!.\")
						window.location.href='index.php';			
						</script>";			
					}
					else {
						$find = $_POST["find"];
						header( "Location: http://innogroup.com.ph/isearch/items/index.php?page=1&find=".$find."" );
						exit;
					}
				}
     ?>
      <div id="footer">
         <div class="link-footer">
          <div class="footer-message">
  
          </div>
      </div>
     </div>
     <script src="dist/js/jquery.min.js" type="text/javascript"></script>
     <script src="dist/js/bootstrap.js" type="text/javascript"></script>     
                  <script type="text/javascript">
					   $("#login").click(function(e){
					         e.preventDefault();
							 var uname = $("#user").val();
							 var pass = $("#pass").val();
							 var mydata = 'uname=' + uname + '&pass=' + pass;
							 $.ajax({
							     type: "POST",
								 url: "checklogin.php",
								 data: mydata,
								 
								 success: function(response){
								    if(response>0)
									{
									   window.location = "index.php";
									   
									 }
									else
									{
									  alert("Invalid username or password");
									}
								 }
							 });
				      });
			      </script>
            <script>
             $('#password').blur(function(e){
        e.preventDefault();
        var l = $('#password').val().length;
        if(l < 8)
        {
          $('#password').val('');
          $('#password2').val('');
          document.getElementById("pwHelp1").innerHTML="Oops! Sorry, Password must contain an at least eight(8) characters...";
          document.getElementById("pwHelp1").style.color = "#ff0000";
        }
        else
        {
          document.getElementById("pwHelp1").innerHTML="Password is STRONG...";
          document.getElementById("pwHelp1").style.color = "#558b48";
        }

     });
     $('#password2').blur(function(e){
        e.preventDefault();
        var p1 = $('#password').val();
        var p2 = $('#password2').val();
        if(p1 != p2)
        {
          $('#password2').val('');
          document.getElementById("pwHelp2").innerHTML="Oops! Sorry, the password you entered does not match...";
          document.getElementById("pwHelp2").style.color = "#ff0000";
        }
        else
        {
          if(p2 != "")
          {
            document.getElementById("pwHelp2").innerHTML="Password MATCHED...";
            document.getElementById("pwHelp2").style.color = "#558b48";
          }
          
        }

     });

</script>

<script>
$('#security_a').blur(function(e){
        e.preventDefault();
        var a = $('#security_a').val().length;
        if(a < 1)
        {
          document.getElementById("sHelp2").innerHTML="Oops! Sorry, Security Answer is required...";
          document.getElementById("sHelp2").style.color = "#ff0000";
        }
        else
        {
          document.getElementById("sHelp2").innerHTML="Verifying...";
          document.getElementById("sHelp2").style.color = "#558b48";
        }
        var aval = $('#security_a').val();

        var mydata = 'a=' + aval;
        $.ajax({
           type: "POST",
           url: "controls/verifysecurity.php",
           data:mydata,

           success: function(response)
           {
            if(response > 0)
            {
              
            }
            else
            {
              alert("Sorry, your answer is incorrect.");
            }
           },
           error: function(xhr, ajaxOptions, thrownError)
           {
            alert(thrownError);
           }
        });
     });
</script>

<script>
    $('.carousel').carousel({
    interval: 5000
    })
</script>
                  </body>
 </html>
