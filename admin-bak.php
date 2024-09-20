<?php
   include_once "/controls/checklogin.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    .alert {
      width:100%;
      position: left;
    }
    .show_more_post {
    margin: auto;
    width: 100%;
    }
    .back_to_top {
    margin: auto;
    width: 100%;
    } 
    .show_more {
    background-color: #f8f8f8;
    border: 1px solid;
    border-color: #d3d3d3;
    color: #333;
    font-size: 12px;
    outline: 0;
    }
    .show_more {
    cursor: pointer;
    display: block;
    padding: 10px 0;
    text-align: center;
    font-weight:bold;
    }
    #loding_txt {
    background-image: url(innogroupv2/images/loading.gif);
    background-position: left;
    background-repeat: no-repeat;
    border: 0;
    display: inline-block;
    height: 16px;
    padding-left: 20px;
    }
    #loding {
    background-color: #e9e9e9;
    border: 1px solid;
    border-color: #c6c6c6;
    color: #333;
    font-size: 12px;
    display: block;
    text-align: center;
    padding: 10px 0;
    outline: 0;
    font-weight:bold;
}
 .panel-heading .btn-group {
   float: right;
 }
  .panel-collapsable .panel-heading h4:after {
   font-family: 'Glyphicons Halflings';
   content: "\e114";
   float: right;
   color: white;
   margin-right: 5px;
   cursor: pointer;
 }
 .panel-collapsable .collapsed h4:after {
   content: "\e080";
 }
 #attachImage {
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px;
    width: 150px;
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
     include_once('/objects/clsPosts.php');
     include_once('/objects/clsContacts.php');
     include_once('/objects/clsDepartment.php');
     include_once('/objects/clsPostAttachments.php');

     $database = new clsConnection();
     $db = $database->connect();

     $users = new Users($db);
     $users->empid = $_SESSION['empid'];
     $view_sel = $users->view_account_settings();

     $database2 = new clsConnectionIntranet();
     $db2 = $database2->connect();
     $contacts = new Contacts($db2);
     $post = new Posts($db2);
     $dept = new department($db2);
     $attach = new PostAttachments($db2);
  ?>
  
   <blockquote>
      <p><br>
      </p>
  </blockquote>
  
    <div class="container">
      <div class="container-content">
        <div class="row" style="background-color:#FFFFFF; padding:0px; -webkit-border-radius: 5px;-moz-border-radius: 5px; border-radius: 5px; height:100%;">	
          <!-- Carousel  -->
          <?php include 'includes/slideshow.php';?>
        </div> <!-- row -->
        <br>
          <div class="row">
            <div class="col-lg-12">
              <div id="content">
                  <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                      <li class="active"><a href="#home" data-toggle="tab" style="color:#009900;">Home &nbsp&nbsp;<span class="badge">0</span></a></li>
                      <li><a href="#contacts" data-toggle="tab" style="color:#009900;">Local Numbers &nbsp&nbsp;</a></li>
                      <li><a href="#settings" data-toggle="tab" style="color:#009900;">Account Settings &nbsp&nbsp;</a></li>
                  </ul>
                    <div id="my-tab-content" class="tab-content">
                        <div class="tab-pane active" id="home">
                            <div class="row" style="padding-right:15px; padding-left:0px; padding-top:25px;">
                                <div class="col-md-4">
                                    <div class="col-sm-12">
                                       <div class="panel panel-default">
                                          <div class="panel-heading">
                                              <h3 class="panel-title">Company Calendar</h3>
                                          </div>
                                          <div class="panel-body">
                                          	<?php include 'calendar.php'; ?>
                                          </div>
                                       </div>
                                    </div>
                                    
                                    <div class="col-sm-12"><!-- start of web apps -->
                                        <div class="panel panel-default">
                                             <div class="panel-heading">
                                                <h3 class="panel-title">Web Applications</h3>
                                             </div>
                                             <div class="panel-body">
                                                <!--content projects-->
                                                <div class="row" style="text-align:center">
                                                   <div class="col-md-6">
                                                      <a href="../timesheets" target="_new"><img src="images/eas.jpg" class="imgprop"></a>
                                                   </div>
                                                   <div class="col-md-6">
                                                      <a href="#" data-target="#soalist" data-toggle="modal"><img src="images/SOA.jpg" class="imgprop"></a>
                                                   </div>
                                                </div>
                                                <div class="row" style="text-align:center">
                                                   <div class="col-md-6">
                                                      <a href="http://www.innogroup.com.ph/warehousing" target="_new"><img src="images/IWH.jpg" class="imgprop"></a>
                                                   </div>
                                                   <div class="col-md-6">
                                                      <a href="" target="_new"><img src="images/PRS.jpg" class="imgprop"></a>
                                                   </div>
                                                </div>
                                                <div class="row" style="text-align:center">
                                                   <div class="col-md-6">
                                                      <a href="http://mail.innogroup.com.ph" target="_new"><img src="images/webmail.jpg" class="imgprop"></a>
                                                   </div>
                                                   <div class="col-md-6">
                                                      <a href=""><img src="images/PO.jpg" class="imgprop" target="_new"></a>
                                                   </div>
                                                </div>
                                               <!--content projects-->
                                             </div><!--end of body panel-->
                                        </div><!--end of panel-->
                                    </div><!-- web apps -->
                                </div><!--end of column-->

                                <!--start of blog module-->
                                <div class="col-md-8">
                                    <!-- This is for the blog -->
                                    <?php include 'includes/blog.php'; ?>
                                    <!--Modal for uploading a photo-->
                                </div><!-- end of blog -->
                                <!--view blog post starts here-->
                                  <div id="postview" class="col-md-8">
                                    <?php include 'includes/viewpost.php';?>
                                  </div><!--end of view post module-->
                            </div><!--end of post module-->                                
                        </div><!--end of home row tabpane-->
                    <!--end of home tabpane-->

                        <!--start of CONTACTS tab Pane-->
                    <div class="tab-pane" id="contacts">                        
                        <div class="row" style="padding-left:35px; padding:right:15px;">
                          <div class="page-header">
                            <h5> <span class="glyphicon glyphicon-phone-alt" style="font-size:20px;"></span> Contacts</h5>
                          </div>
                          <div class="col-sm-12">
                                <div class="col-sm-6">
                                  <div class="panel-group" id="accordion">
                                     <div class="panel panel-success" id="panel1">
                                          <div class="panel-heading" role="tab" id="headingOne">
                                              <h4 class="panel-title">
                                                  <a href="#collapseOne" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="collapseOne">
                                                      CEBU LOCALS
                                                  </a>
                                              </h4>
                                          </div>
                                          <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                               <div class="panel-body">
                                                  <table id="cebu_local" class="table table-striped table-bordered center" cellspacing="0" width="100%">
                                                    <thead>
                                                      <tr>
                                                      <td>Local No.</td>
                                                      <td>Name</td>
                                                      <td>Department</td>
                                                    </tr>
                                                    </thead>
                                                      <?php
                                                        //access model to view
                                                        $view_cebulocals = $contacts->getcebulocals();
                                                        while($row = $view_cebulocals->fetch(PDO::FETCH_ASSOC))
                                                        {
                                                          extract($row);
                                                           echo '
                                                            <tr>
                                                              <td>'.$row['local_no'].'</td>
                                                              <td>'.$row['name'].'</td>
                                                              <td>'.$row['department'].'</td>
                                                            </tr>
                                                           ';
                                                        }
                                                      ?>
                                                 </table>
                                               </div>
                                          </div>
                                      </div>
                                   </div>  
                                </div><!-- end of 1st column -->
                                    
                                <div class="col-sm-6"><!--start of 2nd column-->
                                    <div class="panel-group" id="accordion">
                                     <div class="panel panel-primary" id="panel1">
                                          <div class="panel-heading" role="tab" id="headingOne">
                                              <h4 class="panel-title">
                                                  <a href="#collapseOne" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="collapseOne">
                                                      MANILA LOCALS
                                                  </a>
                                              </h4>
                                          </div>
                                          <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                               <div class="panel-body">
                                                <table id="manila_local" class="table table-striped table-bordered center" cellspacing="0" width="100%">
                                                    <thead>
                                                      <tr>
                                                      <td>Local No.</td>
                                                      <td>Name</td>
                                                      <td>Department</td>
                                                    </tr>
                                                    </thead>
                                                      <?php
                                                        //access model to view
                                                        $view_manilalocals = $contacts->getmanilalocals();
                                                        while($row = $view_manilalocals->fetch(PDO::FETCH_ASSOC))
                                                        {
                                                          extract($row);
                                                           echo '
                                                            <tr>
                                                              <td>'.$row['local_no'].'</td>
                                                              <td>'.$row['name'].'</td>
                                                              <td>'.$row['department'].'</td>
                                                            </tr>';
                                                        }
                                                      ?>
                                                 </table>
                                               </div><!--end of panel-body-->
                                          </div><!--end of collapse-one-->
                                      </div><!--end of panel primary-->
                                   </div><!--end of panel group--> 
                              </div><!-- end of 2nd column -->
                          </div><!--end of column-->
                        </div><!--end of row-->
                    </div><!--end of CONTACTS column-->
                        
                         <!-- ACCOUNT SETTINGS -->
                        <div class="tab-pane" id="settings">
                          <div class="row" style="padding-left:35px; padding:right:15px;">
                              <div class="page-header">
                                <h5> <span class="glyphicon glyphicon-cog" style="font-size:20px;"></span> Account Settings</h5>
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

                                      <label>Full Name:</label>
                                      <?php 
                                         echo '<input type="text" class="form-control" id="fullname" disabled value = "'.$fullname.'"></input>';
                                      ?>
                                      <label>Email Address:</label>
                                      <?php
                                         echo '<input type="text" class="form-control" id="emailaddress" disabled value = "'.$row['emailadd'].'"></input>'; 
                                      ?>
                                      <label>Username:</label>
                                      <?php
                                        echo '<input type="text" class="form-control" id="username" disabled value = "'.$row['username'].'"></input>'; 
                                      ?>
                                      
                                      <label>Password:</label>
                                      <input type="password" class="form-control" id="password" disabled value = ""></input>
                                      <small id="pwHelp1" class="form-text text-muted">Password must contain at least eight(8) characters...</small><br>
                                      <label>Re-type your Password:</label>
                                      <input type="password" class="form-control" id="password2" disabled value = ""></input>
                                      <small id="pwHelp2" class="form-text text-muted">Password must contain at least eight(8) characters...</small><br>
                                      <label>Security Question:</label>
                                      <select class="form-control" id="security_q" disabled>
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
                                        echo '<input type="password" class="form-control" id="security_a" disabled value = ""></input>';
                                      ?>
                                      
                                      <small id="aHelp" class="form-text text-muted">Note: Security password is case-sensitive.</small><br>
                                      
                                </div><br>
                                
                                <input type="button" class="btn btn-default" id ="edit-account" value="Edit"></input> 
                                <input type="button" class="btn btn-success" id="save-account" value="Save"></input> 
                                <input type="button" class="btn btn-warning" id="cancel-edit" value="Cancel"></input>
                                <span class = "alert alert-danger alert-sm" id = "sorry">Sorry, some fields are empty. Kindly please check...</span><span class = "alert alert-success alert-sm" id = "congrats">Congratulations, your account settings has been succesfully updated.</span>
                              </form>
                          </div><!--end of row-->
                        </div><!-- End of ACCOUNT SETTINGS -->   
                    </div><!--end of tab content-->
                  </div><!--end of content-->
                </div><!--end of col-lg-12-->               
	           </div><!--end of row-->
      </div><!--end of container content-->
    </div><!--end of container-->   
      
      <br><br><br>
      <?php 
	    include 'includes/footer.php';
	  ?>

    <!-- Preview Modal -->
    <div id="prevModal" class="modal previewModal">
      <span id="xprevModal" class="close closeModal">&times;</span><br><br>
      <img class="modal-content content" id="image">
    </div>
     
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
          </div>
        <!-- /.modal-content -->
        </div>
      <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
     
     
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

     <!--<script>
        function CKupdate(){
          for (instance in CKEDITOR.instances){
            CKEDITOR.instances[instance].updateElement();
            CKEDITOR.instances[instance].setData('');
          }
        }
     </script>-->
     <!--this script is to preview the post image-->
     <script>
      /*var modal = document.getElementById('prevModal');
      var img = document.getElementById('attachImage');
      var modalimg = document.getElementById("image");
      img.onclick = function(){
           $("#prevModal").fadeIn(500);
          modalimg.src = this.src;
      }

      window.onclick = function(event){
          if(event.target == modal)
          {
            $("#prevModal").fadeOut(500);
            /*$("#prevModal").empty();
            $("#attachImage").empty();
            $("#image").empty();
          }
      }

      var span = document.getElementsByClassName("closeModal")[0];
      span.onclick = function(){
          $("#prevModal").fadeOut(500);
          /*$("#prevModal").empty();
          $("#attachImage").empty();
          $("#image").empty();
      }

      $(document).keydown(function(e){
          if(e.keyCode == 27){
            $("#prevModal").fadeOut(500);
            /*$("#prevModal").empty();
            $("#attachImage").empty();
            $("#image").empty();
          }
      });*/
     </script>

     <script type="text/javascript">
        function readURL(input) {
              if (input.files && input.files[0]) {
                  var reader = new FileReader();

                  reader.onload = function (e) {
                      $('#coverpreview').attr('src', e.target.result);
                  }
                  reader.readAsDataURL(input.files[0]);
              }
          }
      </script>

     <script>
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace( 'details' );
     </script>

      <script>
      $(document).ready(function(){
        $(".alert-danger").hide();
      });
      </script>

      <script>
        $(document).on('click','.back_to_top',function(){
          location.reload();
        });
      </script>

      <script>
        $(document).ready(function(){
          $(document).on('click','.show_more',function(){
            var date = $(this).attr('id');
            var dept_id = $('#dept_id').val();

            $('.show_more_post').hide();

            $.ajax({
              type: "POST",
              url: "controls/view_post.php",
              data: "date=" + date + '&dept_id=' + dept_id,
              beforeSend: function(html)
              {
                $('#loding_txt').show();
                $('#loding').show();
              },
              success: function(html)
              {
                if(html != 0)
                {
                  $("#show_more_post" + date).remove();
                  $("#postview").append(html);                
                }
                else
                {
                  $('.show_more_post').hide();
                }
              }
            });
          });
        });
      </script>

     <script>
       $(document).on('click', '#savepost', function(){
          var file_data = $('#filecover').prop('files')[0];
          var post_id = $('#post_id').val();
          var form_data = new FormData();
          form_data.append('files', file_data);
          form_data.append('post_id', post_id);
          //alert(form_data);
          if(file_data)
          {
            $.ajax({
              url: "controls/upload.php",
              type: "POST",
              data: form_data,
              contentType: false,
              cache: false,
              processData: false,
              beforeSend : function()
              {
                $('#msg').show();
              },
              success: function(data)
              {
                alert(data);
              },
              error: function(e)
              {
                //alert("Try Again");
              }
            });
          }
          else
          {
            //alert("no attachment? Proceed");
          }
        });
      </script>

     <script>
      $('#savepost').click(function(e){
      e.preventDefault();
      var data = CKEDITOR.instances.details.getData();

      var title = $('#post_title').val();
      var department = $('#sharewith').val();
      var details = data;
      var myData = 'title=' + title + '&department=' + department + '&details=' + details;
      //alert(myData);
      
      if(title != '' && department != '' && details != '')
      {
        $.ajax({
          type:"POST",
          url: "controls/save_post.php",
          data: myData,

          success: function(response)
          {
            alert(response);
            if(response > 0)
            { 
              $('#post_title').val("");
              $('#no_post').hide();
              CKEDITOR.instances['details'].setData('');
              location.reload();
              return true;
            }
            else
            {
                $('#fail_msg').html("WARNING: POSTING FAILED!");
                $(".alert-danger").show().fadeOut(6000);
                return false;
            }
          }
        });
      }
      else
      {
        $('#fail_msg').html("WARNING: POSTING FAILED! Please fill out all the fields needed.");
        $(".alert-danger").show().fadeOut(6000);
        return false;
      }

      });
     </script>
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
          time: '2018-05',
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