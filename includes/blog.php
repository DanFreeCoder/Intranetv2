<?php

	require_once('config.php');
  include_once "config/clsConnectionIntranet.php";
  include_once "objects/clsPosts.php";
  include_once "objects/clsDepartment.php";
	//Opens a connection
  $database = new clsConnectionIntranet();
  $db = $database->connect();

  $post = new Posts($db);
  $dept = new Department($db);
	/*$db = new Database();
	$conn = $db->connect();
	$db->selectdb($conn, "intranetdb");*/
	
	//Opens a connection to payroll database
	// $pdb = new Database();
	// $connp = $pdb->connect();
	// $pdb->selectdb($connp, "timesheetsdb");
                        
?>
<div id="new-post" class="panel panel-default" style="width:100%" hidden>
  <div class="panel-heading"><b>New Post</b></div>
    <div class="panel-body">
      <div class="container" style="width:100%;">
        <div class="row">
          <?php
            $id = $post->display_next_postid();
            $post_id = "";

            while($row=$id->fetch(PDO::FETCH_ASSOC))
            {
              extract($row);
              $post_id = $row['post_id'] + 1;
            }
          ?>
            <div class="col-md-5">
                <input class="form-control" id="post_id" type="hidden" style="width:90%; height:28px; font-size:12px;" value="<?php echo $post_id ?>">
            </div>
        </div><!-- end of row -->
        <div class="row">
          <div class="col-md-2">
              <label>Title </label>
          </div>
          <div class="col-md-5">
              <input class="form-control" id="post_title" type="text" style="width:90%; height:30px; font-size:12px;" placeholder="Title of your post">
          </div>
        </div><!-- end of row -->
        <div class="row" style="padding-top:5px;">
          <div class="col-md-2">
            <label>Department </label>    
          </div>
          <div class="col-md-5">                 
            <select class="form-control" id="sharewith" style="width:90%; height:30px; font-size:12px;">
              <?php
              //to view all the department saved in database
                $view = $dept->view();
                while($row = $view->fetch(PDO::FETCH_ASSOC))
                {
                  echo '<option value="'.$row['id'].'">'.$row['department'].'</option>';
                }
              ?>                            
            </select>
          </div>
        </div><!-- end of row -->
        <div class="row" style="padding-top:5px;">
          <div class="col-md-2">
              <!--<label>Attach Photo:</label> -->   
          </div>
          <div class="col-md-5">
              <div>
                <button type="button" class="btn btn-success" id="attach">+ Attach Photo</button>
              </div>
          </div>
        </div><!-- end of row -->    
        <div class="row" style="padding-top:5px;">
          <div class="col-md-12">
            <textarea class="form-control" id="details" style="width:100%; max-width:100%; min-width:100%; max-height:15%" placeholder="Good day!! Want to post something?"></textarea><br>
          </div>
        </div><!-- end of row -->
        <div class="row" style="padding-top:0px;">
          <div class="col-md-12">
            <button id="savepost" class="btn btn-success btn-sm" style="float:right">POST</button>
          </div>
        </div><br><!-- end of row -->
        <!--Alerts-->
        <div class="alert alert-danger" id="fail_msg" style="display: none;"></div>
        <div class="alert alert-success" id="success_msg" style="display: none;"></div>
      </div><!-- end of container -->
    </div><!-- end of panel-body -->
  </div><!-- end of panel-heading -->
</div> <!--end of new-post -->

<!--Upload photo modal-->
<div class="modal fade" aria-hidden="true" id="upload_image" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"> Upload Photo</h4>
      </div>
        <div class="modal-body">
            <form name="form" method="post" action="" enctype="multipart/form-data">
              <input type="hidden" name="post_id" class="post_id" value="<?php echo $post_id ?>"/>
              <img src = "uploads/no-image.png" style="width:550px; height:300px;" id="coverpreview"></input><br><br>
              <input type="file" id="filecover" name = "files[]" value="Browse" onchange="readURL(this);"/>
                <p id="error1" style="display:none; color:#FF0000;">
                Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
                </p>
                <p id="error2" style="display:none; color:#FF0000;">
                Maximum File Size Limit is 1MB.
                </p>
            </form>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="done">Done</button>
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" />   
        </div>
    </div>
  </div>
</div>

<script>
//hide after selecting a photo
$("#done").on('click', function(e){
  e.preventDefault();
  $("#upload_image").modal('hide');
});

//show modal
$("#attach").on('click', function(e){
  e.preventDefault();
  $("#upload_image").modal('show');
});

//This function will validate image before uploading
$('#done').prop("disabled", true);
var a = 0;
//bind to onchange event of your input field
$('#filecover').bind('change', function(){
    if($('input:submit').attr('disabled',false))
    {
      $('input:submit').attr('disabled', false);
    }
    //check the extension of the image if valid
    var ext = $('#filecover').val().split('.').pop().toLowerCase();
    if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1)
    {
      $('#done').prop("disabled", true);
      $('#error1').slideDown("slow");
      $('#error2').slideUp("slow");
      a = 0;
    }
    else
    {
      var size = (this.files[0].size);
      if(size > 1048576)
      {
        $('#done').prop("disabled", true);
        $('#error2').slideDown("slow");
        a = 0;
      }
      else
      {
        a=1;
        $('#error2').slideUp("slow");
      }

      $('#error1').slideUp("slow");
      if(a==1)
      {
        $('#done').attr('disabled',false);
      }
    }
});
//this is to get the name of file to check if it exist in destination
var fullpath = document.getElementById('filecover').value;
if(fullpath)
{
  var startIndex = (fullpath.indexOf('\\') >= 0 ? fullpath.lastIndexOf('\\') : fullpath.lastIndexOf('/'));
  var filename = fullpath.substring(startIndex);
  if(filename.indexOf('\\') === 0 || filename.indexOf('/') === 0)
  {
    filename = filename.substring(1);
  }
}
//PREVIEW EVENT HANDLER
function readURL(input) {
  if(input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#preview_image').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

function show()
{
  document.getElementById('btnUpload').style.visibility="visible";
}
</script>