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
  	$firstname = $row['firstname'];
  	$lastname = $row['lastname'];
  	$email = $row['email'];
  	$username = $row['username'];
    $access_type_id = $row['access_type_id'];

  	echo '
          <div class="row">
              <div class = "col-sm-3"><strong>Firstname: </div>
              <div class = "col-sm-9"><input type="text" class="form-control" role="form" style="width:250px;" name ="fname" id="firstname_e" disabled value="'.$firstname.'"/></div>
          </div><br>
          <div class="row">
              <div class = "col-sm-3"><strong>Lastname: </div>
              <div class = "col-sm-9"><input type="text" class="form-control" role="form" style="width:250px;" name ="lname" id="lastname_e" disabled value="'.$lastname.'"/></div>
          </div><br>
          <div class="row">
              <div class="col-sm-3"><strong>Email Address:</div>
              <div class = "col-sm-9"><input type="text" class="form-control" role="form" style="width:250px;" name ="lname" id="email_e" disabled value="'.$email.'"/></div>
          </div><br>
          <div class="row">
              <div class = "col-sm-3"><strong>Username: </div>
              <div class = "col-sm-9"><input type="text" class="form-control" role="form" style="width:250px;" name ="username" id="username_e" disabled value="'.$username.'"/></div>
          </div><br>
          <div class="row">
              <div class = "col-sm-3"><strong>Password: </div>
              <div class = "col-sm-9"><input type="password" class="form-control" role="form" style="width:250px;" name ="password" id ="password_e" disabled value="****"/></div>
          </div><br>
          <div class="row">
              <div class="col-sm-3"><strong>Access Type:</div>
                <div class="col-sm-5">
                  <select name="status" id="access_type_id_e" class="form-control" disabled> ';
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
