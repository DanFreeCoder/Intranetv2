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
     include_once('/objects/clsUsers.php');
     include_once('/objects/clsEmployee.php');

     $database = new clsConnection();
     $db = $database->connect();

     //check if the users data in users table(intranet)
     $users = new Users($db);
     $users->empid = $_SESSION['empid'];
     $view_sel = $users->view_account_settings();
    
    $employee = new Employee($db);
    $employee->id = $_SESSION['empid'];
    $view_emailadd = $employee->view_employee();

    $email = "";
    $name = "";

    while($row = $view_emailadd->fetch(PDO::FETCH_ASSOC))
    {
      $email = $row["emailadd"];
      $name = $row["Firstname"];
    }
  ?>
  
   <blockquote>
      <p><br>
      </p>
  </blockquote>
  
    <div class="container">
      <div class="container-content">
               <div class="row">
                 <div class="col-lg-12">
                   <div id="content">
                      <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                          <li class="active"><a href="#settings" data-toggle="tab" style="color:#009900;">Account Settings &nbsp&nbsp;</a></li>
                      </ul>
                      <div id="my-tab-content" class="tab-content">
                        
                         <!-- ACCOUNT SETTINGS -->
                        <div class="tab-pane active" id="settings">
                          <div class="row" style="padding-left:35px; padding:right:15px;">
                            <br>
                              <div class = "alert alert-success">
                                  Message: <br><br>
                                  Hi <?php echo $name; ?>, Welcome to our Innogroup of Company's Intranet.<br>
                                  Before using, we are requesting to please update your account settings below to secure your login credentials the next time you sign in.
                                  <br><br>
                                  Best Regards,<br>
                                  Administrator
                              </div>
                              <form>
                                  <div class = "form-group" style="padding-right:50px;">
                                      <?php
                                      if($row = $view_sel->fetch(PDO::FETCH_ASSOC))
                                      {
                                        extract($row);
                                        $fullname = str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($row['firstname'])))) . ' ' . str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($row['lastname']))));
                                      }
                                      ?>
                                        <label>New Password:</label>
                                        <input type="password" class="form-control" id="password" value = ""></input>
                                        <small id="pwHelp1" class="form-text text-muted">Password must contain at least eight(8) characters...</small><br>
                                        <label>Re-type your Password:</label>
                                        <input type="password" class="form-control" id="password2" value = ""></input>
                                        <small id="pwHelp2" class="form-text text-muted">Password must contain at least eight(8) characters...</small><br>
                                        <label>Security Question:</label>
                                        <select class="form-control" id="security_q">
                                          <option></option>
                                          <option>What is the first name of the person you first kissed?</option>
                                          <option>What is the last name of the teacher who gave you your first failing grade?</option>
                                          <option>What was the name of your elementary or primary school?</option>
                                          <option>What is your pet's name?</option>
                                          <option>In what city or town does your nearest sibling live?</option>
                                          <option>Who is your favorite cartoon character?</option>
                                          <option>Who is your most hated famous artist?</option>
                                       </select>
                                        <small id="qHelp" class="form-text text-muted">Please select a security question...</small><br>
                                        <label>Security Answer:</label>
                                        <?php
                                          echo '<input type="password" class="form-control" id="security_a" value = ""></input>';
                                        ?>
                                        
                                        <small id="aHelp" class="form-text text-muted">Note: Security password is case-sensitive.</small><br>  
                                  </div><br><!--end of form-group-->

                                    <input type="button" class="btn btn-success" id="save-account" value="Save Account Settings"></input> 
                                    <input type="button" class="btn btn-warning" id="cancel-edit" value="Cancel"></input>
                                    <span class = "alert alert-danger alert-sm" id = "sorry">Sorry, some fields are empty. Kindly please check...</span><span class = "alert alert-success alert-sm" id = "congrats">Congratulations, your account settings has been succesfully updated.</span>
                              </form>
                          </div>
                        </div><!-- /ACCOUNT SETTINGS -->
                      </div><!--endof Tab-content-->
                    </div><!--end of Content-->
                  </div>               
	              </div><!--end of row-->
      </div><!--end of container-content-->
    </div><!--end of container-->
      
      <br><br><br>
      <?php include 'includes/footer.php'; ?>
     
        <!-- Modal -->
        <div class="modal fade" id="soalist" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:35%">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                         <h4 class="modal-title">Select Project</h4>
                    </div>
                    <div class="modal-body">
                      <div class="te">
                          <form class="form-horizontal">
                              <fieldset>
                              <!-- Select Basic -->
                              <div class="control-group">
                                <label class="control-label" for="selectbasic"></label>
                                <div class="controls">
                                  <select id="projects" name="projects" class="input-xlarge" style="height:30px;">
                                     <option value="0">Select one to open...</option>
                                    <option value="1">THE CALYX CENTRE CONDOMINIUM CORP.</option>
                                    <option value="2">CALLYX RESIDENCES CONDOMINIUM CORP.</option>
                                  </select>
                                </div>
                              </div>
                              </fieldset>
                          </form>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="btnopen">Open</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    <script src="dist/js/jquery.min.js" type="text/javascript"></script>
    <script src="dist/js/bootstrap.js" type="text/javascript"></script>  
    <script src="dist/js/bootstrap-multiselect.js" type="text/javascript"></script>
    <script src="dist/js/bootstrap-multiselect-collapsible-groups.js" type="text/javascript"></script>
     
     
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
          time: '2015-05',
          events: {
            "2015-04-30": {"number": 5, "url": "http://www.innogroup.com.ph"},
            "2015-04-26": {"number": 1, "url": "http://www.innoland.com.ph"}, 
            "2015-05-03":{"number": 1}, 
            "2015-06-12": {}
			   }
        });
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
      
      var password = $('#password').val();
      var security_q = $('#security_q').val();
      var security_a = $('#security_a').val();

      var p2 = $('#password2').val();
      $('#sorry').hide();

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
            url: "controls/saveaccountchanges .php",
            data:mydata,

            success: function(response)
            {
              if(response > 0)
              {
                $('#congrats').show();
                window.location = "index.php";
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