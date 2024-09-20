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
    <link href="dist/css/baguetteBox.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="dist/css/gallery-grid.css" />
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

    
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
    //    Styles
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

     $database = new clsConnection();
     $db = $database->connect();

     $users = new Users($db);
     $users->empid = $_SESSION['empid'];
     $view_sel = $users->view_account_settings();

     include_once('/config/clsConnectionIntranet.php');
     include_once('/objects/clsCategory_Form.php');

     $database3 = new clsConnectionIntranet();
     $db3 = $database3->connect();

     $form_category = new FormCategories($db3);


     //get local number
     include_once('/config/clsConnectionIntranet.php');
     include_once('/objects/clsSliderCategories.php');
     include_once('/objects/clsSliders.php');

     $database2 = new clsConnectionIntranet();
     $db2 = $database2->connect();

     $slider_category = new SliderCategories($db2);

  ?>
  
   <blockquote>
      <p>
          <br>
      </p>
  </blockquote>
  
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <div class="sidebar-nav">
            <div class="navbar navbar-default" role="navigation">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <span class="visible-xs navbar-brand">Sidebar menu</span>
              </div>
              <div class="navbar-collapse collapse sidebar-navbar-collapse">
                <ul class="nav navbar-nav">
                  <li class="active" style="font-weight:bold;"><a href="#">SLIDER CATEGORIES</a></li>
                  <?php 
                    $view_cat = $slider_category->view();

                    while($row = $view_cat->fetch(PDO::FETCH_ASSOC))
                    {
                      extract($row);
                      echo '<li style="padding-left:10px;"><a href="#" data = "'.$row['id'].'" title = "'.$row['name'].'" class="showPosts col-md-9">'.$row['name'].'</a><a href="#" data = "'.$row['id'].'" title = "'.$row['name'].'" data-toggle = "modal" data-target = ".edit_cat_form" class="col-md-3 btn_edit"><span class="glyphicon glyphicon-pencil"></span></a></li>';
                    }
                  ?>
                 
                </ul>
              </div><!--/.nav-collapse -->
            </div>
          </div>
        </div>
        <div class="col-sm-9 right-sidebar">

          <div class="table-holder posts-table-div"> <!--hidden -->

            <div class="row">
              <div class="col-sm-12"> 
                <div class="page-header cat-title">
                  <h4><span class="glyphicon glyphicon-picture"></span> 
                    <?php
                      $slider_category->id = '1';
                      $view_cat_first = $slider_category->getfirst();
                      while($row = $view_cat_first->fetch(PDO::FETCH_ASSOC))
                      {
                       extract($row);
                       echo $row['name'];
                      }
                    ?>
                  </h4>
                </div>
                
                <div class ="panel panel-default" style="padding:15px;">  
                  <div class = "page-header">
                    <b>Cover Photo</b> | <a style="" class = "btn btn-default" data-toggle = "modal" data-target = ".new_cover"><b>+ Change Cover</b></a> 
                    <input type = "hidden" id = "cover_id" value = "1"></input>
                    <a class = "btn btn-success" style="float:right"><b><span class="glyphicon glyphicon-floppy-disk"></span> Save</b></a>
                  </div>

                  <div class="tz-gallery" id = "cover-photo">
                      <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <!--<a class="lightbox" href = "uploads/park.jpg">
                                <img src="uploads/park.jpg" alt="Park" />

                            </a>-->
                            <?php
                                $slider = new Sliders($db2);
                                $slider->status = '1';
                                $slider->title = '1';

                                $view = $slider->view();
                                if($row = $view->fetch(PDO::FETCH_ASSOC))
                                {
                                  extract($row);
                                  echo '<a class="lightbox" href = "'.$row['feature_image_path'].'">
                                        <img src="'.$row['feature_image_path'].'" alt="Park" />
                                        </a>';
                                }
                                else
                                {
                                  echo '<a class="lightbox">
                                        <img src="uploads/no-image.png" alt="No-Image" />
                                        </a>';  
                                }

                            ?>
                        </div>
                        <div class="col-sm-6 col-md-9">
                           <i> Reminder: The cover photo should have 1200 x 400 pixels in size. </i>
                        </div>
                      </div>

                  </div>
                </div>

                <div class ="panel panel-default" style="padding:15px;">
                  <div class = "page-header">
                    <b>Slider Photos</b> | <a class = "btn btn-default" data-toggle = "modal" data-target = ".new_photos"><b>+ Upload Photo</b></a> 
                    <a class = "btn btn-danger"><b><span class="glyphicon glyphicon-trash"></span> Remove</b></a>
                    <a class = "btn btn-success" style="float:right;"><b><span class="glyphicon glyphicon-floppy-disk"></span> Save</b></a>
                  </div>

                  <div class="tz-gallery" id = "slider-photos">
                      <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <a class="lightbox">
                              <label class="image-checkbox">
                                <img src="uploads/bridge.jpg" alt="Park">
                                <input type="checkbox" name="image[]" value="" />
                                <i class="fa fa-check hidden"></i>
                              </label>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4">
                             <a class="lightbox">
                              <label class="image-checkbox">
                                <img src="uploads/bridge.jpg" alt="Park">
                                <input type="checkbox" name="image[]" value="" />
                                <i class="fa fa-check hidden"></i>
                              </label>
                            </a>
                        </div>
                        <div class="col-sm-12 col-md-4">
                             <a class="lightbox">
                              <label class="image-checkbox">
                                <img src="uploads/tunnel.jpg" alt="Park">
                                <input type="checkbox" name="image[]" value="" />
                                <i class="fa fa-check hidden"></i>
                              </label>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <a class="lightbox">
                              <label class="image-checkbox">
                                <img src="uploads/coast.jpg" alt="Park">
                                <input type="checkbox" name="image[]" value="" />
                                <i class="fa fa-check hidden"></i>
                              </label>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <a class="lightbox">
                              <label class="image-checkbox">
                                <img src="uploads/rails.jpg" alt="Park">
                                <input type="checkbox" name="image[]" value="" />
                                <i class="fa fa-check hidden"></i>
                              </label>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <a class="lightbox">
                              <label class="image-checkbox">
                                <img src="uploads/traffic.jpg" alt="Park">
                                <input type="checkbox" name="image[]" value="" />
                                <i class="fa fa-check hidden"></i>
                              </label>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4">
                             <a class="lightbox">
                              <label class="image-checkbox">
                                <img src="uploads/park.jpg" alt="Park">
                                <input type="checkbox" name="image[]" value="" />
                                <i class="fa fa-check hidden"></i>
                              </label>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <a class="lightbox">
                              <label class="image-checkbox">
                                <img src="uploads/park.jpg" alt="Park">
                                <input type="checkbox" name="image[]" value="" />
                                <i class="fa fa-check hidden"></i>
                              </label>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4">
                             <a class="lightbox">
                              <label class="image-checkbox">
                                <img src="uploads/park.jpg" alt="Park">
                                <input type="checkbox" name="image[]" value="" />
                                <i class="fa fa-check hidden"></i>
                              </label>
                            </a>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            </div>

        </div>
      </div>
      </div>
      
      <!-- MODALS -->
      <!-- /#wrapper -->
        <div class="modal fade edit_cat_form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="gridSystemModalLabel"> Edit Slider Category for <i class="sname"></i></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                      <div class = "col-sm-5">New Category Name:</div>
                      <div class = "col-sm-7">
                        <input type="text" role="form" style="width:250px;" id ="cat_name"></input>
                        <input type="text" role="form" style="width:250px;" id ="cat_id" hidden></input>
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                   <input type="submit" class="btn btn-success btn-sm" value = "Save" id = "update_cat_form"/>
                   <input type="button" class="btn btn-default btn-sm" value= "Cancel" />
                </div>
            </div>
          </div>
        </div>
      <!-- MODALS -->

      <!-- MODALS -->
      <!-- /#wrapper -->
        <div class="modal fade new_cover" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="gridSystemModalLabel"> Upload Photo</h4>
                </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
                <div class="modal-body">
                  <form method="post" name="multiple_upload_form" id="coveruploadform" enctype="multipart/form-data">
                    <input type="hidden" name = "slide-id" class = "slide-id" value="1"/>
                    <img src = "uploads/no-image.png" style="width:550px; height:200px;" id = "coverpreview"/><br><br>
                    <input type="file" id="filecover" name = "files[]" value="Browse" onchange="readURL(this);"/>
                </div>
                <div class="modal-footer">
                  <div class="row" id="msg" hidden>
                    <div class="col-md-4"><img src = "uploads/attach.gif" style="width:100%; height:100%; float:"/></div>
                    <div class="col-md-8" id = "msgreturn"><div class="page-header">Uploading....Please wait</div></div>
                  </div>
                   <img src = "uploads/attach.gif" style="width:25%; height:25%; float:" hidden/>
                   <input type="submit" class="btn btn-success btn-sm" value = "Upload" id = "uploadcover"/>
                   <input type="button" class="btn btn-default btn-sm" value= "Cancel" />
                 </form>
                </div>
            </div>
          </div>
        </div>
      <!-- MODALS -->
<!-- MODALS -->
      <!-- /#wrapper -->
        <div class="modal fade new_photos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="gridSystemModalLabel"> Upload Photo</h4>
                </div>
                <div class="modal-body">
                    <img src = "uploads/park.jpg" style="width:25%; height:25%"/><br><br>
                    <input type="file" name="files[]" multiple="multiple" />
                </div>
                <div class="modal-footer">
                   <input type="submit" class="btn btn-success btn-sm" value = "Upload" id = "save_cat_form"/>
                   <input type="button" class="btn btn-default btn-sm" value= "Clear" />
                </div>
            </div>
          </div>
        </div>
      <!-- MODALS -->


      <br><br><br>
      <?php 
      include 'includes/footer.php';
    ?>
     
     <!-- Modal -->
<div class="modal fade" id="soalist" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:35%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Select Project</h4>

            </div>
            <div class="modal-body"><div class="te">
            
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

            
            </div></div>
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
     <script src="dist/js/jquery.dataTables.js" type="text/javascript"></script>
     <script src="dist/js/dataTables.bootstrap.js" type="text/javascript"></script>
     <script src="dist/js/bootstrap.js" type="text/javascript"></script>  
     <script src="dist/js/bootstrap-multiselect.js" type="text/javascript"></script>
     
     <script src="dist/js/baguetteBox.min.js" type="text/javascript"></script>
     <script src="dist/js/responsive-calendar.js" type="text/javascript"></script>

     <script>
        baguetteBox.run('.tz-gallery');
     </script>

    <script>
        $('#update_cat_form').click(function(){
            var cat_name = $("#cat_name").val();
            var cat_id = $("#cat_id").val();
            var myData = 'name=' + cat_name + '&id=' + cat_id;

            $.ajax({
              type: "POST",
              url: "controls/update_slider_category.php",
              data:myData,

              success: function(response)
              {
                if(response > 0)
                {
                  window.location = "manageslider.php";
                }
                else
                {
                  alert("There is something wrong with your query!");
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
      //table, datatable and GUI Controls
      $(document).ready(function() {

          $('#post-table').DataTable();
          $('#form-table-manual').DataTable();
          $('#form-table-online').DataTable();
          $('#memos-table').DataTable();
          $('#categories-table').DataTable();
          $('#departments-table').DataTable();
          $('#users-table').DataTable();
          $('#apps-table').dataTable();
      } );

      $(".showPosts").on("click",function(){
        //$(".table-holder:not(.hidden)").addClass("hidden");
        //$(".posts-table-div").removeClass("hidden");
        var cat_id = $(this).attr("data");
        var title = $(this).attr("title");
        
        var html = "<h4><span class='glyphicon glyphicon-picture'></span> " + title + "</h4>";

        $('.cat-title').html(html);
        $('#cover_id').val(cat_id);
        $('.slide-id').val(cat_id);

        var myData = 'title=' + cat_id;
        alert(myData);
        //get the cover photo
        $.ajax({
          type: "POST",
          url: "controls/viewcoverphoto.php",
          data:myData,

          success:function(html)
          {
            alert(html);
            $('#cover-photo').html(html);
          },
          error: function(xhr, ajaxOptions, thrownError)
          {
            alert(thrownError);
          }
        });

      });

       $(".btn_edit").on("click",function(){
        //$(".table-holder:not(.hidden)").addClass("hidden");
        //$(".posts-table-div").removeClass("hidden");
        var cat_id = $(this).attr("data");
        var title = $(this).attr("title");

        $('#cat_id').val(cat_id);

        //alert(title);
        
        var html = "<b>" + title + "</b>";

        $('.sname').html(html);

      });

      $(".showForms").on("click",function(){
        $(".table-holder:not(.hidden)").addClass("hidden");
        $(".form-table-div").removeClass("hidden");
      });

      $(".showMemos").on("click",function(){
        $(".table-holder:not(.hidden)").addClass("hidden");
        $(".memos-table-div").removeClass("hidden");
      });

      $(".showCategories").on("click",function(){
        $(".table-holder:not(.hidden)").addClass("hidden");
        $(".categories-table-div").removeClass("hidden");
      });

       $(".showDepartments").on("click",function(){
        $(".table-holder:not(.hidden)").addClass("hidden");
        $(".departments-table-div").removeClass("hidden");
      });

      $(".showUsers").on("click",function(){
        $(".table-holder:not(.hidden)").addClass("hidden");
        $(".users-table-div").removeClass("hidden");
      });

       $(".showApps").on("click",function(){
        $(".table-holder:not(.hidden)").addClass("hidden");
        $(".apps-table-div").removeClass("hidden");
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
     $(document).ready(function (e) {
       $("#coveruploadform").on('submit',(function(e) {
        e.preventDefault();
        alert(new FormData(this));
        $.ajax({
               url: "controls/uploadphoto.php",
               type: "POST",
               data:  new FormData(this),
               contentType: false,
               cache: false,
               processData:false,
               beforeSend : function()
               {
                 $('#msg').show();
               },
               success: function(data)
               {
                    if(data=='invalid file')
                    {
                     // invalid file format.
                     //$("#err").html("Invalid File !").fadeIn();
                     alert('Invalid File');
                    }
                    else
                    {
                      var html = '<div class="page-header">'+ data +'</div>';
                      $('#msgreturn').html(html);
                    }
                },
                error: function(e) 
                {
                  //$("#err").html(e).fadeIn();*/
                }          
              });
          }));
      });
    </script>

  </body>
 </html>;