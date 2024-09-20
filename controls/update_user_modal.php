<?php
include_once('../config/clsConnectionIntranet.php');
include_once('../objects/clsUsers.php');

$database = new clsConnectionIntranet();
$db = $database->connect();

$users = new Users($db);

if(isset($_POST['id']))
{
  $users->id = $_POST['id'];
  $view_sel = $users->view_user_byID();

  if($row = $view_sel->fetch(PDO::FETCH_ASSOC))
  {
  	extract($row);
    $id = $_POST['id'];
  	$firstname = $row['firstname'];
  	$lastname = $row['lastname'];
  	$email = $row['email'];
  	$username = $row['username'];
    $password = $row['password'];
    $access_type_id = $row['access_type_id'];

  	echo ' 
          <div class="row">
              <div class = "col-sm-9">
              <input type="hidden" role="form" style="width:250px;" name ="intranet_id" id="upd_id" required value="'.$id.'"/></div>
          </div>
          <div class="row">
              <div class = "col-sm-4 text-right"><strong>Firstname: </div>
              <div class = "col-sm-8"><input class="form-control" type="text" role="form" style="width:250px;" id="upd_firstname" required value="'.$firstname.'"/></div>
          </div><br>
          <div class="row">
              <div class = "col-sm-4 text-right"><strong>Lastname: </div>
              <div class = "col-sm-8"><input class="form-control" type="text" role="form" style="width:250px;" id="upd_lastname" required value="'.$lastname.'"/></div>
          </div><br>
          <div class="row">
              <div class="col-sm-4 text-right"<strong>Birthday:</div>
                <div class="col-sm-8"> 
                  <input class="form-control" type="text" role="form" style="width:250px;" name ="lname" id="upd_email" required value="'.$email.'"/>
                </div>
          </div><br>
          <div class="row">
              <div class = "col-sm-4 text-right"><strong>Username: </div>
              <div class = "col-sm-8"><input class="form-control" type="text" role="form" style="width:250px;" id="upd_username" disabled value="'.$username.'"/></div>
          </div><br>
          <div class="row">
              <div class="col-sm-4 text-right"><strong>Access Type:</div>
                <div class="col-sm-8">
                  <select name="status" id="upd_access_type_id" class="form-control" style="width:250px;" required>';
                    if($access_type_id == 0)
                      {
                      	echo '<option value="0" disabled selected>Type</option>
                           	  <option value="1">Admin</option>
                              <option value="2">Human Resource</option>
                           	  <option value="3">Users</option>';
                      }
                      elseif($access_type_id == 1)
                      {
                      	echo '<option value="0" disabled>Type</option>
                           	  <option value="1" selected>Admin</option>
                              <option value="2">Human Resource</option>
                           	  <option value="3">Users</option>';
                      }
                      elseif($access_type_id == 2)
                      {
                       	echo '<option value="0" disabled>Type</option>
                           	  <option value="1">Admin</option>
                              <option value="2" selected>Human Resource</option>
                           	  <option value="3">Users</option>';
                        }
                         elseif($access_type_id == 3)
                        {
                       	echo '<option value="0" disabled>Type</option>
                           	  <option value="1">Admin</option>
                              <option value="2">Human Resource</option>
                           	  <option value="3" selected>Users</option>';
                       }
                  echo '</select>  
                </div>
              </div>
            </div>';
  }
}
else
{
  echo "No data has been passed!! Try Again";
}

?>

<script>
  $('#upd_firstname').blur(function(e){
    e.preventDefault();
    var str = $('#upd_firstname').val();
    var fname = str.replace(/\s/g,'');
    var f = fname.toLowerCase();
    var lname = $('#upd_lastname').val();
    var l = lname.toLowerCase();
        
    var username = f.concat('.').concat(l);     
    $('#upd_username').val(username);
  });
</script>

<script>
  $('#upd_lastname').blur(function(e){
    e.preventDefault();
    var str = $('#upd_firstname').val();
    var fname = str.replace(/\s/g,'');
    var f = fname.toLowerCase();
    var str1 = $('#upd_lastname').val();
    var lname = str1.replace(/\s/g,'');
    var l = lname.toLowerCase();
        
    var username = f.concat('.').concat(l);
    $('#upd_username').val(username);
  });
</script>

<script>
  $('#empid_e').blur(function(e){
    e.preventDefault();

    var password = $('#empid_e').val();
    $('#password_e').val(password);
  });
</script>

<script>
  $(document).ready(function() {
    $('#birthdate_e').datepicker({
      format: 'yyyy/mm/dd'
      })
      .on('changeDate', function(e) {
    });
  });
</script>

