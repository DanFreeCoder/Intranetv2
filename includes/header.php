<?php
//Intranet DB
include 'config/clsConnectionIntranet.php';
include 'objects/clsCategory_Memo.php';
include 'objects/clsCategory_Form.php';
include 'objects/clsPosts.php';
include 'objects/clsUsers.php';
include 'objects/clsContacts.php';
include 'config/clsConnection.php';
include 'objects/clsDepartment.php';
include 'objects/clsPostAttachments.php';
include 'objects/clsJobVacancies.php';


$database2 = new clsConnectionIntranet();
$db2 = $database2->connect();

$memo_cat = new MemoCategories($db2);
$post = new Posts($db2);
$form_category = new FormCategories($db2);
$users = new Users($db2);
$contacts = new Contacts($db2);
$post = new Posts($db2);
$dept = new department($db2);
$attach = new PostAttachments($db2);
$job = new Jobs($db2);

//employee connection
$database = new clsConnection();
$db = $database->connect();

//  $view_sel = $users->view_account_settings();
//intranet connection
?>
<!-- Date Picker CSS-->
<link href="bower_components/bootstrap/dist/css/datepicker3.min.css" rel="stylesheet" type="text/css">
<!-- Datimepicker bootstrap -->
<link href="bootstrap-timepicker/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css">
<!-- Date Picker JS -->
<script src="bower_components/bootstrap/dist/js/bootstrap-datepicker.js"></script>
<!-- datetime picker -->
<script src="bootstrap-timepicker/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>

<!-- Fixed navbar -->
<div class="navbar navbar-inverse navbar-fixed-top" style="background:url(images/bg.png)">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <!-- i use conditional ternary operatior here Author: Dan -->
    <a class="navbar-brand" href="<?php echo ($_SESSION['access_type_id'] == 1) ? 'admin.php' : (($_SESSION['access_type_id'] == 2) ? 'hr.php' : 'user.php'); ?>"><img src="images/logo.png" /></a>
    <center>
      <div class="navbar-collapse collapse" id="navbar-main" style="padding-top:1%;">
        <form class="navbar-form navbar-left" name="search" method="post">
          <div class="form-group"><input type="text" class="form-control input-sm" id="search_val" placeholder="Search for itemcodes here..." style="width:250px;" required="required" />&nbsp;
            <input type="submit" value="Search" id="gobutton" name='search' class="btn btn-success btn-sm">

            <div class="btn-group" role="group">
              <button id="btnGroupVerticalDrop1" type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-expanded="false">Forms<span class="caret"></span>
              </button>
              <ul class="dropdown-menu" role="menu" aria-labelledby="btnGroupVerticalDrop1" style="text-align:left">
                <li><a href="http://innogroup.com.ph/isearch/form.php?find=Accounting Forms">Accounting Forms</a></li>
                <li><a href="http://innogroup.com.ph/isearch/form.php?find=Engineering Forms">Engineering Forms</a></li>
                <li><a href="http://innogroup.com.ph/isearch/form.php?find=HR Forms">HR Forms</a></li>
                <li><a href="http://innogroup.com.ph/isearch/form.php?find=IT Forms">IT Forms</a></li>
                <li><a href="http://innogroup.com.ph/isearch/forms.php?find=Legal Forms">Legal</a></li>
                <li><a href="http://innogroup.com.ph/isearch/form.php?find=Marketing Forms">Marketing Forms</a></li>
                <li><a href="http://innogroup.com.ph/isearch/form.php?find=Monitoring Forms">Monitoring Forms</a></li>
                <li><a href="http://innogroup.com.ph/isearch/form.php?find=PMC Forms">Project Document Controller</a></li>
                <li><a href="http://innogroup.com.ph/isearch/form.php?find=PMO Forms">PMO Forms</a></li>
                <li><a href="http://innogroup.com.ph/isearch/form.php?find=PPEs Forms">PPEs Forms</a></li>
                <li><a href="http://innogroup.com.ph/isearch/form.php?find=Purchasing Forms">Purchasing Forms</a></li>
                <li><a href="http://innogroup.com.ph/isearch/forms.php?find=References Forms">References</a></li>
                <li><a href="http://innogroup.com.ph/isearch/forms.php?find=Safety Forms">Safety</a></li>
            </div>
            <div class="btn-group" role="group">
              <a href="http://innogroup.com.ph/isearch/policy-memos.php" class="btn btn-success btn-sm" role="button">Policies and Memos</a>
            </div>
            <div class="btn-group" role="group">
              <a href="http://innogroup.com.ph/isearch/process-flow.php" class="btn btn-success btn-sm" role="button">Process Flow/Map</a>
            </div>
            <div class="btn-group" role="group">
              <a href="http://innogroup.com.ph/isearch/iso-process.php" class="btn btn-success btn-sm" role="button">ISO Processes & Forms</a>
            </div>
          </div>
        </form>
        <ul class="nav nav-pills navbar-form navbar-right" role="tablist">
          <li class="dropdown">
            <a href="#" style="color:#009933;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <?php echo $_SESSION['fullname']; ?>&nbsp;<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="btnGroupVerticalDrop1" style="text-align:left">
              <li><a href="" data-toggle="modal" data-target="#accountmodal" id="editaccount"><span class="glyphicon glyphicon-cog"></span> &nbsp;Account Settings</a></li>
              <!--<li><a href="manageslider.php"><span class="glyphicon glyphicon glyphicon-file"></span> &nbsp;Manage Slider</a></li>-->
              <?php
              if ($_SESSION['access_type_id'] == 1) {
                echo ' <li><a href="manage.php"><span class="glyphicon glyphicon-lock"></span> &nbsp;View as Administrator</a></li>';
              }
              ?>
              <li role="separator" class="divider"></li>
              <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> &nbsp;Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </center>
  </div>
</div>

<!-- ACCOUNT SETTING MODAL -->
<div id="accountmodal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="row">
          <div class="col-md-8">
            <h4 class="modal-title"><b>Account Settings</b></h4>
          </div>
          <div class="col-md-4">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <label>Name:</label>
            <input type="text" class="form-control" value="<?php echo $_SESSION['fullname']; ?>" id="fullname" disabled>
          </div>
        </div><br>
        <div class="row">
          <div class="col-sm-12">
            <label>Username:</label>
            <input type="text" class="form-control" value="<?php echo $_SESSION['username']; ?>" id="acc_username" disabled>
            <input type="hidden" class="form-control" value="<?php echo $_SESSION['user-id']; ?>" id="account_id" disabled>
          </div>
        </div><br>
        <div class="row">
          <div class="col-sm-12">
            <label>Password</label>
            <input type="password" class="form-control" id="newpass">
          </div>
        </div><br>
        <div class="row">
          <div class="col-sm-12">
            <label>Re-type Password:</label>
            <input type="password" class="form-control" id="repass">
          </div>
        </div>
        <!-- alerts -->
        <div class="row">
          <span id="account_alert" class="alert" style="color:red"></span>
          <div class="alert alert-danger" id="acc_error_msg">
            <!--ALERTS-->
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="upd_account" type="button" class="btn btn-success">Save Changes</button>
      </div>
    </div>
  </div>
</div>