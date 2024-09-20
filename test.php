<?php
   include_once "/controls/checklogin.php";
?>
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
    
    <link href="dist/css/responsive-calendar.css" rel="stylesheet" />
    <link href="dist/css/bootstrap-multiselect.css" rel="stylesheet" />
    <link href="dist/css/dataTables.css" rel="stylesheet" />

    
    <style>
		body { padding-top: 50px; }
		#myCarousel .nav a small {
			display:block;`
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

  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
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
     
  <?php 

     include 'includes/header.php'; 

     include_once('/config/clsConnection.php');
     include_once('/config/clsConnectionIntranet.php');
     include_once('/objects/clsUsers.php');
     include_once('/objects/clsContacts.php');

     $database = new clsConnection();
     $db = $database->connect();

     $users = new Users($db);
     $users->empid = $_SESSION['empid'];
     $view_sel = $users->view_account_settings();


     $database2 = new clsConnectionIntranet();
     $db2 = $database2->connect();
     $contacts = new Contacts($db2);

  ?>

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>




  
   <blockquote>
      <p><br>
      </p>
  </blockquote>
  
    <div class="container">
    <div class="row">
    <div class="col-xs-12 col-md-6"><div id="app-form">
    <label> <b>Last Name: (Required)</b>
        [text* c7lname id:c7lname] </label>
    <label> <b>First Name: (Required)</b>
        [text* c7fname id:c7fname] </label>
    <label> <b>Middle Name: (Required)</b>
        [text* c7mname id:c7mname] </label>
    <label> <b>Address: (Required)</b>
        [text* c7address id:c7address] </label>
    <label> <b>Contact No: (Required)</b>
        [text* c7contact id:c7contact] </label>
    <label> <b>Email Address (Required)</b>
        [email* c7email id:c7email] </label>
    <label> <b>Civil Status:</b>
      [select* c7civilstatus id:c7civilstatus "Single" "Married" "Divorced" "Widowed"] </label>
    <label> <b>Position Desired:</b>
      [select* c7position id:c7position "Engineering" "IT" "Accounting" "Sales" "PMO" "Leasing & Liason"] </label>
    <label><b>How will your skills and/or knowledge help our company grow? (Provide details in 300 words or less.)</b>
    [textarea c7about id:c7about]
    </label>
    <label>
    <b>Resume :</b> (We accept file attachments with .pdf or .doc extension only)
    [file* c7resume limit:600 filetypes:.doc|.docx|.pdf id:c7resume]
    </label>

    [submit "Submit Application"]
    </div>
  </div>
    <div class="col-xs-12 col-md-6"><img src="http://innoland.com.ph/wp-content/uploads/2017/09/leftsidepic.jpg" class="img-responsive">
    </div>
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
     <script src="dist/js/jquery.min.js" type="text/javascript"></script>
     <script src="dist/js/bootstrap.js" type="text/javascript"></script>  
     <script src="dist/js/bootstrap-multiselect.js" type="text/javascript"></script>
     <script src="dist/js/jquery.dataTables.js" type="text/javascript"></script>
     <script src="dist/js/dataTables.bootstrap.min.js" type="text/javascript"></script>


     <script>
      $(document).ready( function() {
       $('#cebu_local').dataTable({
         /* Disable initial sort */
         "aaSorting": [],
         "bLengthChange": false,
         "iDisplayLength": 10
       });
      })
     </script>
     <script>
      $(document).ready( function() {
       $('#manila_local').dataTable({
         /* Disable initial sort */
         "aaSorting": [],
         "bLengthChange": false,
         "iDisplayLength": 10
       });
      })
     </script>
        
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
    $('.carousel').carousel({
    interval: 3000
    })
</script>
<script>
    $('#btnopen').click(function(e){
	 e.preventDefault();
	 var proj = $('#projects').val();
	 
	 if(proj == 1)
	 {
	    window.open("http://www.innogroup.com.ph/soa-calyx");
	 }
	 if(proj == 2)
	 {
	    window.open("http://www.innogroup.com.ph/soa-calres");
	 }
    });
</script>

<script src="dist/js/responsive-calendar.js" type="text/javascript"></script>
<script type="text/javascript">
      $(document).ready(function () {
	    $('#save-account').hide(); 
      $('#cancel-edit').hide();  

      $('#sorry').hide(); 
      $('#congrats').hide(); 

		  $.ajax({
		    type: "POST",
			  url: "/class/calendar.php",
			  data:"",
			
			 dataType: "json",
			
			success: function(data)
			{
			    alert('hasola');
			}
		});
		
        $(".responsive-calendar").responsiveCalendar({
          time: '2017-08',
          events: {
            "2017-02-14": {"number": 1},
            "2017-02-24": {"number": 1}, 
            "2017-02-25":{"number": 1}
			   }
        });

        /*$(".responsive-calendar").responsiveCalendar({
          time: '2017-02',
          events: {
            "2017-02-14": {"number": 1, "url": "http://www.innogroup.com.ph"},
            "2017-02-24": {"number": 1, "url": "http://www.innoland.com.ph"}, 
            "2017-02-25":{"number": 1}
         }
        });*/
		
      });
    </script>
    <script>
    $('#edit-account').click(function(e){
      //alert('I am click');
      e.preventDefault();
      $('#password').prop("disabled", false);
      $('#password2').prop("disabled", false);
      $('#security_a').prop("disabled", false);
      $('#security_q').prop("disabled", false);
      $('#save-account').show(); 
      $('#cancel-edit').show(); 
      $('#sorry').hide();
      $('#congrats').hide();
    });

     $('#cancel-edit').click(function(e){
      e.preventDefault();
      $('#password').prop("disabled", true);
      $('#password2').prop("disabled", true);
      $('#security_a').prop("disabled", true);
      $('#security_q').prop("disabled", true);
      $('#save-account').hide(); 
      $('#cancel-edit').hide(); 
      $('#sorry').hide();
      $('#congrats').hide();
    });

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
     $('#security_q').blur(function(e){
        e.preventDefault();
        var q = $('#security_q').val().length;
        if(q < 1)
        {
          document.getElementById("qHelp").innerHTML="Oops! Sorry, Please select security question...";
          document.getElementById("qHelp").style.color = "#ff0000";
        }
        else
        {
          document.getElementById("qHelp").innerHTML="Thank you for selecting a security question...";
          document.getElementById("qHelp").style.color = "#558b48";
        }

     });

      $('#security_a').blur(function(e){
        e.preventDefault();
        var a = $('#security_a').val().length;
        if(a < 1)
        {
          document.getElementById("aHelp").innerHTML="Oops! Sorry, Security Answer is required...";
          document.getElementById("aHelp").style.color = "#ff0000";
        }
        else
        {
          document.getElementById("aHelp").innerHTML="Thank You for answering...";
          document.getElementById("aHelp").style.color = "#558b48";
        }

     });

     $('#save-account').click(function(e){
      e.preventDefault();
      $('#password').prop("disabled", true);
      $('#password2').prop("disabled", true);
      $('#security_a').prop("disabled", true);
      $('#security_q').prop("disabled", true);
      $('#save-account').hide(); 
      $('#cancel-edit').hide(); 
      
      var password = $('#password').val();
      var security_q = $('#security_q').val();
      var security_a = $('#security_a').val();

      var p2 = $('#password2').val();

      var mydata = 'p=' + password + '&q=' + security_q + '&a=' + security_a;

      //alert(mydata);

      //ajax save here
      if(password == "" || security_a == "" || security_q == "" || p2 == "")
      {
        $('#sorry').show();
      }
      else
      {
        $.ajax({
            type: "POST",
            url: "controls/saveaccountchanges.php",
            data:mydata,

            success: function(response)
            {
              if(response > 0)
              {
                $('#congrats').show();
              }
              else
              {
                alert("Sorry, there is something wrong with your query!");
              }
            },
            error: function(xhr, ajaxOptions, thrownError)
            {
              alert(thrownError);
            }
        });
      }
    });
    </script>

  </body>
 </html>