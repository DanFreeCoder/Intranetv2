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
  <link href="dist/css/responsive-calendar.css" rel="stylesheet" />
  <link href="dist/css/bootstrap-multiselect.css" rel="stylesheet" />
  <link href="dist/css/dataTables.css" rel="stylesheet" />
  <link rel="stylesheet" href="toastr/toastr.css">

  <style>
    body {
      padding-top: 50px;
    }

    #myCarousel .nav a small {
      display: block;
    }

    #myCarousel .nav {
      background: #eee;
    }

    #myCarousel .nav a {
      border-radius: 0px;
    }

    .alert {
      width: 80%;
      margin: auto;
      padding: 10px;
    }
  </style>
</head>

<body>
  <?php
  session_start();
  include 'includes/header.php';
  ?>
  <br>
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
                <li class="active"><a href="#"><b>Administrator</b></a></li>
                <li><a href="#" class="showPosts">Posts</a></li>
                <!-- <li><a href="#" class="showPosts">HR Trainings & Seminars</a></li> -->
                <li><a href="#" class="showForms">Local Numbers</a></li>
                <!-- <li><a href="#" class="showMemos">Policies and Memos</a></li>
                  <li><a href="#" class="showCategories">Categories</a></li>
                  <li><a href="#" class="showDepartments">Departments</a></li> -->
                <li><a href="#" class="showApps">Web Applications</a></li>
                <li><a href="#" class="showUsers">Users</a></li>
                <!-- <li><a href="#">Comments <span class="badge">1,118</span></a></li> -->
              </ul>
            </div>
            <!--/.nav-collapse -->
          </div>
        </div>
      </div>
      <div class="col-sm-9 right-sidebar">
        <!-- POSTS -->
        <div class="table-holder posts-table-div">
          <!--hidden -->
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header">
                <h4><span class="glyphicon glyphicon-list-alt"></span> Posts</h4>
              </div>
              <a class="btn btn-primary btnEditPost"><b><span class="glyphicon glyphicon-pencil"></span> Edit</b></a>
              <!-- <a class = "btn btn-success activate-post"><b><span class="glyphicon glyphicon-check"></span> Activate</b></a> -->
              <a class="btn btn-danger remove-post"><b><span class="glyphicon glyphicon-trash"></span> Remove</b></a>
              <br><br>
              <div class="panel panel-default" style="padding:15px;">
                <table id="post-table" class="table table-striped table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th><input type="checkbox"></input></th>
                      <th>Post Title</th>
                      <th>
                        <center>Department</center>
                      </th>
                      <th>
                        <center>Date Posted</center>
                      </th>
                      <th>
                        <center>Status</center>
                      </th>
                    </tr>
                  </thead>
                  <tbody id="post-body">
                    <?php
                    $get = $post->view_all_post();
                    while ($row = $get->fetch(PDO::FETCH_ASSOC)) {
                      $date = date('m/d/Y', strtotime($row['date_added']));
                      if ($row['status'] == 1) {
                        $status = '<center><p style="color: green;">ACTIVE</p></center>';
                      } else {
                        $status = '<center><p style="color: red;">INACTIVE</p></center>';
                      }
                      //
                      echo '<tr>
                                <td><input type="checkbox" name="checklist" class="checklist" value="' . $row['post-id'] . '"></td>
                                <td>' . $row['type'] . '</td>
                                <td><center>' . $row['dept-name'] . '</center></td>
                                <td><center>' . $date . '</center></td>
                                <td>' . $status . '</td>
                            </tr>';
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- LOCAL CONTACT NUMBER -->
        <div class="table-holder form-table-div hidden">
          <!--hidden -->
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header">
                <h4><span class="glyphicon glyphicon-phone-alt"></span> Local Numbers</h4>
              </div>
              <div class="panel panel-default" style="padding:15px;">
                <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                  <li class="active"><a href="#manualforms" data-toggle="tab">Cebu Locals</a></li>
                  <li><a href="#onlineforms" data-toggle="tab">Manila Locals</a></li>
                </ul>
                <div id="my-tab-content" class="tab-content"><br>
                  <!-- CEBU LOCALS TAB PANE -->
                  <div class="tab-pane active" id="manualforms">
                    <button class="btn btn-success btnAddNum" data-toggle="modal" data-target="#AddLocalNumModal">+ New</button>
                    <button class="btn btn-primary btnEditNum"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
                    <button class="btn btn-danger btnRemoveNum"><span class="glyphicon glyphicon-trash"></span> Remove</button>
                    <br><br>
                    <table id="form-table-manual" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th><input type="checkbox" id="checkboxall"></input></th>
                          <th>Local No.</th>
                          <th>Name</th>
                          <th>
                            <center>Department</center>
                          </th>
                          <th>
                            <center>Status</center>
                          </th>
                        </tr>
                      </thead>
                      <tbody id="cebuLocal-body">
                        <?php
                        $view = $contacts->getcebulocals();
                        while ($row = $view->fetch(PDO::FETCH_ASSOC)) {
                          if ($row['status'] == 1) {
                            $status = '<center><p style="color: green">ACTIVE</p></center>';
                          } else {
                            $status = '<center><p style="color: red">INACTIVE</p></center>';
                          }
                          echo '
                              <tr>
                                <td><input type="checkbox" name="checklist" class="checklist" value="' . $row['id'] . '"></td>
                                <td>' . $row['local_no'] . '</td>
                                <td>' . $row['name'] . '</td>
                                <td><center>' . $row['department'] . '</center></td>
                                <td><center>' . $status . '</center></td>
                              </tr>';
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- MANILA LOCALS TAB PANE -->
                  <div class="tab-pane" id="onlineforms">
                    <button class="btn btn-success btnAddNum" data-toggle="modal" data-target="#AddLocalNumModal">+ New</button>
                    <button class="btn btn-primary btnEditNum"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
                    <button class="btn btn-danger btnRemoveNum"><span class="glyphicon glyphicon-trash"></span> Remove</button>
                    <br><br>
                    <table id="form-table-online" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th><input type="checkbox"></input></th>
                          <th>Local No.</th>
                          <th>Name</th>
                          <th>Department</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody id="manilaLocal-body">
                        <?php
                        $view = $contacts->getmanilalocals();
                        while ($row = $view->fetch(PDO::FETCH_ASSOC)) {
                          if ($row['status'] == 1) {
                            $status = '<center><p style="color: green">ACTIVE</p></center>';
                          } else {
                            $status = '<center><p style="color: red">INACTIVE</p></center>';
                          }
                          echo '
                              <tr>
                                <td><input type="checkbox" name="checklist" class="checklist" value="' . $row['id'] . '"></td>
                                <td>' . $row['local_no'] . '</td>
                                <td>' . $row['name'] . '</td>
                                <td><center>' . $row['department'] . '</center></td>
                                <td><center>' . $status . '</center></td>
                              </tr>';
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- USER MODULE -->
        <div class="table-holder users-table-div hidden">
          <!--hidden -->
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header">
                <h4><span class="glyphicon glyphicon-user"></span> Users</h4>
              </div>
              <a class="btn btn-default" data-toggle="modal" data-target=".new_user_form" id="new_user_form">+ New</a>
              <a href="#" class="btn btn-default" data-toggle="modal" data-target=".editUser_modal" id="edit_user" onclick="getEditUser()"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
              <a href="#" class="btn btn-info" id="reset_password"><span class="glyphicon glyphicon-lock"></span> Reset Password</a>
              <a href="#" class="btn btn-danger" id="delete"><span class="glyphicon glyphicon-trash"></span> Remove</a>
              <br><br>
              <div class="panel panel-default" style="padding:10px;">
                <table id="users-table" class="table table-striped table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th><input type="checkbox" id="checkall_user" name="checkall_user"></input></th>
                      <th>Firstname</th>
                      <th>Lastname</th>
                      <th>Username</th>
                      <th>Role</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="users_data_table">
                    <?php
                    $display_users = $users->view_users();
                    while ($row = $display_users->fetch(PDO::FETCH_ASSOC)) {
                      if ($row['access_type_id'] == 1) {
                        $role = 'Administrator';
                      } elseif ($row['access_type_id'] == 2) {
                        $role = 'HR';
                      } else {
                        $role = 'Staff';
                      }
                      echo "<tr>
                                  <td><input type='checkbox' value='" . $row['id'] . "' name='form_user' id='form_user' class='form_user'></input></td>
                                  <td>" . $row['firstname'] . "</td>
                                  <td>" . $row['lastname'] . "</td>
                                  <td>" . $row['username'] . "</td>
                                  <td>" . $role . "</td>
                                  <td align='center'><a href='#' data-toggle='modal' value='" . $row['id'] . "' class='viewUserbyID'><span class='glyphicon glyphicon-fullscreen' tooltip='Expand'></span></a></td>
                                </tr>";
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div><!-- end of User Module -->

      </div>
    </div>
  </div>
  <!-- MODAL SECTION -->
  <!--UPDATE POST MODAL-->
  <div id="EditPostModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"> Update Post </h4>
        </div>
        <div class="modal-body" id="edit-post-body">
          <!--body of modal has been place here-->
        </div>
        <!--ALERT-->
        <div class="alert alert-danger" id="upd_fail"></div>
        <div class="modal-footer">
          <button class="btn btn-success btn-sm" id="update-post">Update</button>
          <button class="btn btn-default btn-sm" data-dismiss="modal" value="Close">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!--NEW LOCAL NUMBER MODAL-->
  <div id="AddLocalNumModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="gridSystemModalLabel"> Local Number Details </h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-3"><strong>Trunkline </strong></div>
            <div class="col-sm-9">
              <select id="trunkline" class="form-control">
                <option class="form-control" value="0" selected disabled>Select Trunkline here</option>
                <option class="form-control" value="1">Cebu</option>
                <option class="form-control" value="2">Manila</option>
              </select>
            </div>
          </div><br>
          <div class="row">
            <div class="col-sm-3"><strong>Local Number </strong></div>
            <div class="col-sm-9">
              <input class="form-control" id="add-local-num" />
            </div>
          </div><br>
          <div class="row">
            <div class="col-sm-3"><strong>Department </strong></div>
            <div class="col-sm-9">
              <input class="form-control" id="add-local-dept" style="text-transform:uppercase" />
            </div>
          </div><br>
          <div class="row">
            <div class="col-sm-3"><strong>Name</strong></div>
            <div class="col-sm-9">
              <input class="form-control" id="add-local-name" />
            </div>
          </div>
        </div>
        <!--ALERT-->
        <div class="alert alert-danger" id="upd_fail"></div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-success btn-sm" value="Save" id="save_local" />
          <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Close" id="Close" />
        </div>
      </div>
    </div>
  </div>

  <!--UPDATE LOCAL NUMBER MODAL-->
  <div id="EditNumModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="gridSystemModalLabel"> Update Details </h4>
        </div>
        <div class="modal-body" id="edit-num-body">
          <!--body of modal has been place here-->
        </div>
        <!--ALERT-->
        <div class="alert alert-danger" id="upd_fail"></div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-success btn-sm" value="Update" id="update_local" />
          <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Close" id="Close" />
        </div>
      </div>
    </div>
  </div>

  <!--NEW USERS MODAL-->
  <div class="modal fade new_user_form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" style="width: 35%">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-plus"></span> New User </h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-4"><strong>Firstname: </strong></div>
            <div class="col-sm-8"><input class="form-control fname" id="firstname" placeholder="Firstname" /></div>
          </div><br>
          <div class="row">
            <div class="col-sm-4"><strong>Lastname: </strong></div>
            <div class="col-sm-8"><input class="form-control lname" id="lastname" placeholder="Lastname" /></div>
          </div><br>
          <div class="row">
            <div class="col-sm-4"><strong>Email Address: </strong></div>
            <div class="col-sm-8"> <input class="form-control" id="email_address" placeholder="Email Address" /></div>
          </div><br>
          <div class="row">
            <div class="col-sm-4"><strong>Username: </strong></div>
            <div class="col-sm-8"><input class="form-control username" type="text" id="username" placeholder="Username"></div>
          </div><br>
          <div class="row">
            <div class="col-sm-4"><strong>Password: </strong></div>
            <div class="col-sm-8"><input class="form-control" type="password" value="123456" id="pword" placeholder="Password" disabled /></div>
          </div><br>
          <div class="row">
            <div class="col-sm-4"><strong>Department: </strong></div>
            <div class="col-md-8">
              <select class="form-control" id="department" style="width: 100%">
                <?php
                $dept = array('Accounting', 'Ancillary', 'Business Process', 'Business Development', 'Customer Relation Group', 'Engineering', 'Executive Office', 'Human Resource', 'Information Technology', 'Leasing', 'Marketing', 'Operations', 'PMC', 'PMO', 'Purchasing', 'Sales', 'Special Project', 'Retail Business');

                foreach ($dept as $key => $value) {
                  echo '<option>' . $value . '</option>';
                }
                ?>
              </select>
            </div>
          </div><br>
          <div class="row">
            <div class="col-sm-4"><strong>Access Type: </strong></div>
            <div class="col-sm-8">
              <select name="status" id="access_type_id" class="form-control" required>
                <option value="1">Admin</option>
                <option value="2">Human Resource</option>
                <option value="3" selected>Users</option>
              </select>
            </div>
          </div><br>
          <!--ALERTS-->
          <div class="alert alert-danger" id="fail_msg" style="width: 100%"></div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-success btn-sm" value="Save" id="save_new_user" />
            <input type="button" class="btn btn-default btn-sm" value="Clear" id="clear_user" />
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--UPDATE USER MODAL-->
  <div class="modal fade editUser_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="gridSystemModalLabel"> Update User </h4>
        </div>
        <div class="modal-body" id="edit-user-body">
          <!--body of modal has been place here-->
        </div>
        <!--ALERT-->
        <div class="alert alert-danger" id="upd_fail"></div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-success btn-sm" value="Update" id="update_user" />
          <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Close" id="Close" />
        </div>
      </div>
    </div>
  </div>

  <!--Viewing the user details modal-->
  <div class="modal fade viewUser_modal" id="viewUser_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="gridSystemModalLabel"><span class="glyphicon glyphicon-list-alt"></span> User Details </h4>
        </div>
        <div class="modal-body" id="view-user-body">
          <!--body of modal has been place here-->
        </div>
        <div class="modal-footer">
          <a class="btn btn-default" data-dismiss="modal" href="#">Close</a>
        </div>
      </div>
    </div>
  </div>

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
            <!-- <input type="hidden" name="post_id" class="post_id" value="<?php echo $post_id ?>"/> -->
            <img src="uploads/no-image.png" style="width:550px; height:300px;" id="coverpreview"></input><br><br>
            <input type="file" id="filecover" name="files[]" value="Browse" onchange="readURL(this);" />
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
  <!-- /.modal -->

  <script src="dist/js/jquery.min.js" type="text/javascript"></script>
  <script src="dist/js/jquery.dataTables.js" type="text/javascript"></script>
  <script src="dist/js/dataTables.bootstrap.js" type="text/javascript"></script>
  <script src="dist/js/bootstrap.js" type="text/javascript"></script>
  <script src="dist/js/bootstrap-multiselect.js" type="text/javascript"></script>
  <script src="bower_components/bootstrap/dist/js/bootstrap-datepicker.js"></script>
  <script src="bootstrap-timepicker/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="toastr/jquery.toast.js"></script>
  <script src="toastr/toastr.js"></script>

  <!-- TOAST -->
  <script>
    //toast
    function showToast() {
      var title = 'Loading...';
      var duration = 500;
      $.Toast.showToast({
        title: title,
        duration: duration,
        image: 'images/loading.gif'
      });
    }

    function hideLoading() {
      $.Toast.hideToast();
    }
  </script>
  <!-- LOCAL NUMBER EVENT HANDLER & FUNCTIONS -->
  <script>
    //SAVE NEW LOCAL NUMBER
    $('#save_local').on('click', function(e) {
      e.preventDefault();

      var trunkline = $('#trunkline').val();
      var local = $('#add-local-num').val();
      var dept = $('#add-local-dept').val();
      var name = $('#add-local-name').val();
      var myData = 'trunkline=' + trunkline + '&local=' + local + '&dept=' + dept + '&name=' + name;

      $.ajax({
        type: 'POST',
        url: 'controls/save_local_num.php',
        data: myData,
        beforeSend: function() {
          showToast();
        },
        success: function(response) {
          if (response > 0) {
            toastr.success('Local number successfully added.');
            //get the updated list
            if (trunkline == 1) {
              $.ajax({
                type: 'POST',
                url: 'controls/view_all_local.php',
                data: {
                  trunkline: trunkline
                },
                success: function(html) {
                  $('#cebuLocal-body').fadeIn();
                  $('#cebuLocal-body').html(html);
                }
              })
            } else {
              $.ajax({
                type: 'POST',
                url: 'controls/view_all_local.php',
                data: {
                  trunkline: trunkline
                },
                success: function(html) {
                  $('#manilaLocal-body').fadeIn();
                  $('#manilaLocal-body').html(html);
                }
              })
            }
          } else {
            toastr.error('ERROR! Please contact the system administrator.');
          }
        }
      })

    })
    //EDIT BUTTON EVENT HANDLER
    $('.btnEditNum').on('click', function(e) {
      e.preventDefault();

      var num_id = [];
      $('input:checkbox[name=checklist]:checked').each(function() {
        num_id.push($(this).val());
      })

      $.ajax({
        type: 'POST',
        url: 'controls/get_local_details.php',
        data: {
          num_id: num_id
        },
        beforeSend: function() {
          showToast();
        },
        success: function(html) {
          $('#EditNumModal').modal('show');
          $('#edit-num-body').html(html);
        }
      })
    })
    // LOCAL UPDATE BUTTON EVENT HANDLER
    $('#update_local').on('click', function(e) {
      e.preventDefault();

      var id = $('#id').val();
      var num = $('#local-num').val();
      var dept = $('#local-dept').val();
      var name = $('#local-name').val();
      var trunkline = $('#upd-trunkline').val();
      var myData = 'id=' + id + '&num=' + num + '&dept=' + dept + '&name=' + name + '&trunkline=' + trunkline;

      $.ajax({
        type: 'POST',
        url: 'controls/update_local_no.php',
        data: myData,
        beforeSend: function() {
          showToast();
        },
        success: function(response) {
          if (response > 0) {
            toastr.success('Local number successfully updated.');
            if (trunkline == 1) {
              $.ajax({
                type: 'POST',
                url: 'controls/view_all_local.php',
                data: {
                  trunkline: trunkline
                },
                success: function(html) {
                  $('#cebuLocal-body').fadeIn();
                  $('#cebuLocal-body').html(html);
                }
              })
            } else {
              $.ajax({
                type: 'POST',
                url: 'controls/view_all_local.php',
                data: {
                  trunkline: trunkline
                },
                success: function(html) {
                  $('#manilaLocal-body').fadeIn();
                  $('#manilaLocal-body').html(html);
                }
              })
            }
          } else {
            toastr.error('ERROR! Please contact the system administrator.');
          }
        }
      })
    })
    //REMOVE LOCAL NUMBER
    $('.btnRemoveNum').on('click', function(e) {
      e.preventDefault();

      var num_id = [];
      $('input:checkbox[name=checklist]:checked').each(function() {
        num_id.push($(this).val());
      })

      $.ajax({
        type: 'POST',
        url: 'controls/delete_num.php',
        data: {
          num_id: num_id
        },
        beforeSend: function() {
          showToast();
        },
        success: function(response) {
          if (response) {
            toastr.success('Local number successfully set Inactive.');
            location.reload();
          } else {
            toastr.error('ERROR! Please contact the system administrator.');
          }
        }
      })
    })
  </script>
  <!-- POST EVENT HANDLER & FUNCTIONS -->
  <!-- Preview of attached image -->
  <script>
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#coverpreview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
  <script>
    //EDIT button event handler
    $('.btnEditPost').on('click', function(e) {
      e.preventDefault();

      var post_id = [];
      $('input:checkbox[name=checklist]:checked').each(function() {
        post_id.push($(this).val());
      })

      $.ajax({
        type: 'POST',
        url: 'controls/get_post_details.php',
        data: {
          post_id: post_id
        },
        beforeSend: function() {
          showToast();
        },
        success: function(html) {
          $('#EditPostModal').modal('show');
          $('#edit-post-body').html(html);
        }
      })
    })

    //UPDATE POST
    $('#update-post').click(function(e) {
      e.preventDefault();

      var id = $('#post-id').val();
      var title = $('#title').val();
      var department = $('#department').val();
      var details = $('#details').val();
      var myData = 'id=' + id + '&title=' + title + '&department=' + department + '&details=' + details;

      //post_attachment Table
      var file_data = $('#filecover').prop('files')[0];
      var form_data = new FormData();
      form_data.append('files', file_data);
      form_data.append('id', id);

      if (title != '' && department != '') {
        $.ajax({
          type: "POST",
          url: "controls/update_post.php",
          data: myData,

          success: function(response) {
            if (response > 0) {
              toastr.success('Post successfully updated.');
              setTimeout(function() {
                location.reload();
              }, 3000)
              if (file_data) {
                $.ajax({
                  type: "POST",
                  url: "upd_upload.php",
                  data: form_data,
                  contentType: false,
                  cache: false,
                  processData: false,

                  success: function(response) {
                    if (response > 0) {
                      setTimeout(function() {
                        location.reload();
                      }, 3000)
                    } else {
                      alert('Error!');
                    }
                  },
                  error: function(xhr, ajaxOptions, thrownError) {
                    alert(thrownError);
                  }
                });
              }
            } else {
              $('#fail_msg').html("WARNING: POSTING FAILED!");
              $(".alert-danger").show().fadeOut(6000);
              return false;
            }
          }
        });
      } else {
        $('#fail_msg').html("WARNING: POSTING FAILED! Please fill out all the fields needed.");
        $(".alert-danger").show().fadeOut(6000);
        return false;
      }
    });

    //remove post
    $('.remove-post').click(function(e) {
      e.preventDefault();

      var post_id = [];
      $('input:checkbox[name=checklist]:checked').each(function() {
        post_id.push($(this).val());
      })

      $.ajax({
        type: 'POST',
        url: 'controls/delete_post.php',
        data: {
          post_id: post_id
        },
        beforeSend: function() {
          showToast();
        },
        success: function(response) {
          if (response > 0) {
            toastr.success('Post successfully removed.');
            //get all the post with current status
            $.ajax({
              url: 'controls/view_all_post.php',
              success: function(html) {
                $('#post-body').fadeIn();
                $('#post-body').html(html);
              }
            })
          } else {
            toastr.error('ERROR! Please contact the system administrator.');
          }
        }
      })
    })

    //This function will validate image before uploading
    $('#done').prop("disabled", true);
    var a = 0;
    //bind to onchange event of your input field
    $('#filecover').bind('change', function() {
      if ($('input:submit').attr('disabled', false)) {
        $('input:submit').attr('disabled', false);
      }
      //check the extension of the image if valid
      var ext = $('#filecover').val().split('.').pop().toLowerCase();
      if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
        $('#done').prop("disabled", true);
        $('#error1').slideDown("slow");
        $('#error2').slideUp("slow");
        a = 0;
      } else {
        var size = (this.files[0].size);
        if (size > 1048576) {
          $('#done').prop("disabled", true);
          $('#error2').slideDown("slow");
          a = 0;
        } else {
          a = 1;
          $('#error2').slideUp("slow");
        }

        $('#error1').slideUp("slow");
        if (a == 1) {
          $('#done').attr('disabled', false);
        }
      }
    });
    //this is to get the name of file to check if it exist in destination
    var fullpath = document.getElementById('filecover').value;
    if (fullpath) {
      var startIndex = (fullpath.indexOf('\\') >= 0 ? fullpath.lastIndexOf('\\') : fullpath.lastIndexOf('/'));
      var filename = fullpath.substring(startIndex);
      if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
        filename = filename.substring(1);
      }
      //alert(filename);
    }
  </script>

  <!-- event handler form category -->
  <script>
    $('#save_cat_form').click(function() {
      var cat_name = $("#cat_form_name").val();
      var myData = 'name=' + cat_name;

      $.ajax({
        type: "POST",
        url: "controls/save_form_category.php",
        data: myData,

        success: function(html) {

          if (response > 0) {
            alert("Category of the form succesfully save!");
            $("#body_form_category").html(htm);
          } else {
            alert("Wa na save!");
          }
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(thrownError);
        }
      });

    });
  </script>

  <script>
    $('#save_webappnew').click(function(e) {
      e.preventDefault();
      var logo = $('#logo').val();
      var link = $('#new_webapp_link').val();
      var myData = 'logo=' + logo + '&link=' + link;

      //alert(myData);

      $.ajax({
        type: "POST",
        url: "controls/save_webapp.php",
        data: myData,

        success: function(response) {
          //alert(response);
          if (response > 0) {
            alert("Web Application successfully saved!");
          } else {
            alert("Unsuccessfully saved!");
          }
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(thrownError);
        }
      });
    });
  </script>

  <script>
    $(document).ready(function() {
      $(".alert-danger").hide();
    });

    $(document).ready(function() {
      $(".alert-success").hide();
    });
  </script>

  <!-- save new user -->
  <script>
    $('#save_new_user').click(function() {
      var firstname = $('#firstname').val();
      var lastname = $('#lastname').val();
      var email = $('#email_address').val();
      var department = $('#department').val();
      var username = $('#username').val();
      var password = $('#pword').val();
      var access_type_id = $('#access_type_id').val();

      var myData = 'firstname=' + firstname +
        '&lastname=' + lastname +
        '&email=' + email +
        '&department=' + department +
        '&username=' + username +
        '&password=' + password +
        '&access_type_id=' + access_type_id;

      //alert(myData);
      if (firstname != '' && lastname != '' && username != '' && password != '' && access_type_id != null) {
        $.ajax({
          type: "POST",
          url: "controls/checkifexist.php",
          data: myData,

          success: function(response) {
            //alert(response);
            if (response > 0) {
              $('#fail_msg').html("<span class='glyphicon glyphicon-exclamation-sign'></span><b> WARNING:</b> User already exist! Please try again.");
              $(".alert-danger").show().fadeOut(6000);
              return false;
            } else {
              $.ajax({
                type: "POST",
                url: "controls/save_new_user.php",
                data: myData,

                success: function(response) {
                  //alert(response);
                  if (response > 0) {
                    //query to display latest list of users
                    $.ajax({
                      type: "POST",
                      url: "controls/display_user.php",

                      success: function(html) {
                        $("#users_data_table").html(html);
                        $('input[type=text], textarea').val('');
                        $('input[type=password], textarea').val('');
                        $(".new_user_form").hide();
                        return false;
                      }
                    });
                  } else {
                    $('#fail_msg').html("<center><span class='glyphicon glyphicon-exclamation-sign'></span> <b>WARNING:</b> Adding user failed!! Please contact the Administrator.</center>");
                    $(".alert-danger").show().fadeOut(5000);
                    return false;
                  }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                  alert(thrownError);
                }
              });
            }
          }
        });
      } else {
        $('#fail_msg').html("<span class='glyphicon glyphicon-exclamation-sign'></span> <b>WARNING:</b> Please fill-up all required fields!");
        $(".alert-danger").show().fadeOut(6000);
        return false;
      }
    });
  </script>

  <!-- USERNAME AUTO GENERATE -->
  <script>
    $('.fname').blur(function(e) {
      e.preventDefault();

      var str = $('.fname').val();
      var fname = str.replace(/\s/g, '');
      var f = fname.toLowerCase();
      var str1 = $('.lname').val();
      var lname = str1.replace(/\s/g, '');
      var l = lname.toLowerCase();
      var username = f.concat('.').concat(l);
      $('.username').val(username);
    })
    $('.lname').blur(function(e) {
      e.preventDefault();

      var str = $('.fname').val();
      var fname = str.replace(/\s/g, '');
      var f = fname.toLowerCase();
      var str1 = $('.lname').val();
      var lname = str1.replace(/\s/g, '');
      var l = lname.toLowerCase();
      var username = f.concat('.').concat(l);
      $('.username').val(username);
    })
  </script>

  <!--select and hide the EDIT button when multiple selection happens-->
  <script>
    $("#checkall_user").change(function(e) {
      e.preventDefault();
      if ($(this).prop('checked')) {
        //GET CLOSEST TABLE FIRST
        var table = $(e.target).closest('table');
        $('tbody tr td input[type="checkbox"]').each(function() {
          $('td input:checkbox', table).prop('checked', true);
        });
        $("#edit_user").hide();
      } else {
        $('tbody tr td input[type="checkbox"]').each(function() {
          $('td input:checkbox', table).prop('checked', false);
        });
        $("#edit_user").show();
      }
    });

    $(".form_user").change(function(e) {
      e.preventDefault();
      var arrayselected = $.map($('input[name="form_user"]:checked'), function(c) {
        return c.value;
      });
      var alength = arrayselected.length;
      if (alength > 1) {
        $("#edit_user").hide();
      } else {
        $("#edit_user").show();
      }
    });
  </script>

  <!--Event in updating the USER-->
  <script>
    $('#update_user').click(function(e) {
      e.preventDefault();
      var id = $('#upd_id').val();
      var firstname = $('#upd_firstname').val();
      var lastname = $('#upd_lastname').val();
      var email = $('#upd_email').val();
      var username = $('#upd_username').val();
      var access_type_id = $('#upd_access_type_id').val();

      var myData = 'id=' + id +
        '&firstname=' + firstname +
        '&lastname=' + lastname +
        '&email=' + email +
        '&username=' + username +
        '&access_type_id=' + access_type_id;

      if (firstname != '' && lastname != '' && email != '' && username != '' && access_type_id != '') {
        $.ajax({
          type: "POST",
          url: "controls/update_user.php",
          data: myData,

          success: function(response) {
            if (response > 0) {
              //query to display latest list of users
              $.ajax({
                type: "POST",
                url: "controls/display_user.php",

                success: function(html) {
                  $('input[type=text], textarea').val('');
                  $('input[type=password], textarea').val('');
                  $(".editUser_modal").fadeOut('slow');
                  $("#users_data_table").html(html);
                  return false;
                }
              });
            } else {
              $('#upd_fail').html("WARNING : Update user failed!! Please try again.");
              $(".alert-danger").show().fadeOut(5000);
              return false;
            }
          },
          error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError);
          }
        });
      } else {
        $('#upd_fail').html("WARNING : Please fill-up all required fields!");
        $(".alert-danger").show().fadeOut(6000);
        return false;
      }
    });
  </script>

  <script>
    $("#edit_user").on('click', function() {
      var id = []
      $('input:checkbox[name=form_user]:checked').each(function() {
        id.push($(this).val())
      });

      var myData = 'id=' + id;
      //alert(id);
      $.ajax({
        type: "POST",
        url: "controls/update_user_modal.php",
        data: myData,

        success: function(html) {
          $("#edit-user-body").html(html);
        }
      });
    });
  </script>

  <!-- Reset user password -->
  <script>
    $('#reset_password').click(function(e) {
      e.preventDefault();

      var id = []
      $('input:checkbox[name=form_user]:checked').each(function() {
        id.push($(this).val())
      });
      var remark = 1;
      var password = '123456';
      var myData = 'id=' + id + '&remark=' + remark + '&password=' + password;

      $.ajax({
        type: 'POST',
        url: 'controls/update_pass.php',
        data: myData,

        success: function(response) {
          if (response > 0) {
            alert('User password successfully reset to default');
          } else {
            alert('Reset failed. Please check the code!')
          }
        }
      })
    })
  </script>

  <!--delete/removing the user from datatable when it press-->
  <script>
    $("#delete").click(function() {
      var id = []
      $('input:checkbox[name=form_user]:checked').each(function() {
        id.push($(this).val())
      })

      //alert(id);
      if (confirm('Warning: Are you sure you want to remove this user?')) {
        $.each(id, function(key, value) {
          $.ajax({
            type: "POST",
            data: {
              id: value
            },
            url: "controls/delete_user.php",
            cache: false,

            success: function(response) {
              if (response > 0) {
                //ajax query to reload/view new record
                $.ajax({
                  type: "POST",
                  url: "controls/display_user.php",

                  success: function(html) {
                    $("#users_data_table").html(html);
                    alert('User Successfully removed!');
                  }
                });
              } else {
                alert("Error on deleting the user!");
              }
            },
            error: function(xhr, ajaxOptions, thrownError) {
              alert(thrownError);
            }
          });
        });
      }
    });
  </script>

  <script>
    $(document).on('click', '.viewUserbyID', function(e) {
      e.preventDefault();
      var id = $(this).attr('value');
      var myData = 'id=' + id;

      $.ajax({
        type: "POST",
        url: "controls/view_user_byID.php",
        data: myData,

        success: function(html) {
          //alert(html)
          $("#view-user-body").html(html);
          $("#viewUser_modal").modal('show');
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
    });

    $(".showPosts").on("click", function() {
      // alert("show categories");
      $(".table-holder:not(.hidden)").addClass("hidden");
      $(".posts-table-div").removeClass("hidden");
    });

    $(".showForms").on("click", function() {
      $(".table-holder:not(.hidden)").addClass("hidden");
      $(".form-table-div").removeClass("hidden");
    });

    $(".showMemos").on("click", function() {
      $(".table-holder:not(.hidden)").addClass("hidden");
      $(".memos-table-div").removeClass("hidden");
    });

    $(".showCategories").on("click", function() {
      $(".table-holder:not(.hidden)").addClass("hidden");
      $(".categories-table-div").removeClass("hidden");
    });

    $(".showDepartments").on("click", function() {
      $(".table-holder:not(.hidden)").addClass("hidden");
      $(".departments-table-div").removeClass("hidden");
    });

    $(".showUsers").on("click", function() {
      $(".table-holder:not(.hidden)").addClass("hidden");
      $(".users-table-div").removeClass("hidden");
    });

    $(".showApps").on("click", function() {
      $(".table-holder:not(.hidden)").addClass("hidden");
      $(".apps-table-div").removeClass("hidden");
    });
  </script>

  <script>
    $(document).ready(function() {
      $('#cebu_local').dataTable({
        /* Disable initial sort */
        "aaSorting": [],
        "bLengthChange": false,
        "iDisplayLength": 10
      });
    })
  </script>
  <script>
    $(document).ready(function() {
      $('#manila_local').dataTable({
        /* Disable initial sort */
        "aaSorting": [],
        "bLengthChange": false,
        "iDisplayLength": 10
      });
    })
  </script>

  <script type="text/javascript">
    $("#login").click(function(e) {
      e.preventDefault();
      var uname = $("#user").val();
      var pass = $("#pass").val();
      var mydata = 'uname=' + uname + '&pass=' + pass;
      $.ajax({
        type: "POST",
        url: "checklogin.php",
        data: mydata,

        success: function(response) {
          if (response > 0) {
            window.location = "index.php";

          } else {
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
    $('#btnopen').click(function(e) {
      e.preventDefault();
      var proj = $('#projects').val();

      if (proj == 1) {
        window.open("http://www.innogroup.com.ph/soa-calyx");
      }
      if (proj == 2) {
        window.open("http://www.innogroup.com.ph/soa-calres");
      }
    });
  </script>

  <script src="dist/js/responsive-calendar.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#save-account').hide();
      $('#cancel-edit').hide();

      $('#sorry').hide();
      $('#congrats').hide();

      $.ajax({
        type: "POST",
        url: "/class/calendar.php",
        data: "",

        dataType: "json",

        success: function(data) {
          alert('hasola');
        }
      });

      $(".responsive-calendar").responsiveCalendar({
        time: '2017-08',
        events: {
          "2017-02-14": {
            "number": 1
          },
          "2017-02-24": {
            "number": 1
          },
          "2017-02-25": {
            "number": 1
          }
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
    $('#edit-account').click(function(e) {
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

    $('#cancel-edit').click(function(e) {
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

    $('#password').blur(function(e) {
      e.preventDefault();
      var l = $('#password').val().length;
      if (l < 8) {
        $('#password').val('');
        $('#password2').val('');
        document.getElementById("pwHelp1").innerHTML = "Oops! Sorry, Password must contain an at least eight(8) characters...";
        document.getElementById("pwHelp1").style.color = "#ff0000";
      } else {
        document.getElementById("pwHelp1").innerHTML = "Password is STRONG...";
        document.getElementById("pwHelp1").style.color = "#558b48";
      }

    });
    $('#password2').blur(function(e) {
      e.preventDefault();
      var p1 = $('#password').val();
      var p2 = $('#password2').val();
      if (p1 != p2) {
        $('#password2').val('');
        document.getElementById("pwHelp2").innerHTML = "Oops! Sorry, the password you entered does not match...";
        document.getElementById("pwHelp2").style.color = "#ff0000";
      } else {
        if (p2 != "") {
          document.getElementById("pwHelp2").innerHTML = "Password MATCHED...";
          document.getElementById("pwHelp2").style.color = "#558b48";
        }

      }

    });
    $('#security_q').blur(function(e) {
      e.preventDefault();
      var q = $('#security_q').val().length;
      if (q < 1) {
        document.getElementById("qHelp").innerHTML = "Oops! Sorry, Please select security question...";
        document.getElementById("qHelp").style.color = "#ff0000";
      } else {
        document.getElementById("qHelp").innerHTML = "Thank you for selecting a security question...";
        document.getElementById("qHelp").style.color = "#558b48";
      }

    });

    $('#security_a').blur(function(e) {
      e.preventDefault();
      var a = $('#security_a').val().length;
      if (a < 1) {
        document.getElementById("aHelp").innerHTML = "Oops! Sorry, Security Answer is required...";
        document.getElementById("aHelp").style.color = "#ff0000";
      } else {
        document.getElementById("aHelp").innerHTML = "Thank You for answering...";
        document.getElementById("aHelp").style.color = "#558b48";
      }

    });

    $('#save-account').click(function(e) {
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
      if (password == "" || security_a == "" || security_q == "" || p2 == "") {
        $('#sorry').show();
      } else {
        $.ajax({
          type: "POST",
          url: "controls/saveaccountchanges.php",
          data: mydata,

          success: function(response) {
            if (response > 0) {
              $('#congrats').show();
            } else {
              alert("Sorry, there is something wrong with your query!");
            }
          },
          error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError);
          }
        });
      }
    });
  </script>

  <script>
    $("#form_category_all").change(function(e) {
      e.preventDefault();
      if ($(this).prop('checked')) {
        //GET CLOSEST TABLE FIRST
        var table = $(e.target).closest('table');
        $('tbody tr td input[type="checkbox"]').each(function() {
          $('td input:checkbox', table).prop('checked', true);
        });
        $("#remove_cat_form").hide();
      } else {

        $('tbody tr td input[type="checkbox"]').each(function() {
          $('td input:checkbox', table).prop('checked', false);
        });
        $("#remove_cat_form").show();
        //var arrayselected = $.map($('input[name="form_category"]:checked'), function(c){return c.value;});
      }

    });

    $(".form_category").change(function(e) {
      e.preventDefault();
      var arrayselected = $.map($('input[name="form_category"]:checked'), function(c) {
        return c.value;
      });
      var alength = arrayselected.length;
      if (alength > 1) {
        $("#remove_cat_form").hide();
      } else {
        $("#remove_cat_form").show();
      }
    });
  </script>

  <script>
    $('#lname').blur(function(e) {
      e.preventDefault();
      var str = $('#fname').val();
      var fname = str.replace(/\s/g, '');
      var f = fname.toLowerCase();
      var str1 = $('#lname').val();
      var lname = str1.replace(/\s/g, '');
      var l = lname.toLowerCase();

      var username = f.concat('.').concat(l);

      $('#username').val(username);
    });
  </script>

  <script>
    $('#lastname').blur(function(e) {
      e.preventDefault();

      var str = $('#firstname').val();
      var fname = str.replace(/\s/g, '');
      var f = fname.toLowerCase();
      var str1 = $('#lastname').val();
      var lname = str1.replace(/\s/g, '');
      var l = lname.toLowerCase();
      var username = f.concat('.').concat(l);
      $('#username').val(username);
    })

    $('#firstname').blur(function(e) {
      e.preventDefault();

      var str = $('#firstname').val();
      var fname = str.replace(/\s/g, '');
      var f = fname.toLowerCase();
      var str1 = $('#lastname').val();
      var lname = str1.replace(/\s/g, '');
      var l = lname.toLowerCase();
      var username = f.concat('.').concat(l);
      $('#username').val(username);
    })
  </script>

  <script>
    $(document).ready(function() {
      $('#birthdate').datepicker({
          format: 'yyyy/mm/dd'
        })
        .on('changeDate', function(e) {
          // Revalidate the date field
          //$('#eventForm').formValidation('revalidateField', 'date');
        });
    });
  </script>

  <script>
    $('#clear_user').click(function() {
      $('input[type=text], textarea').val('');
      $('input[type=password], textarea').val('');
    });
  </script>

</body>

</html>