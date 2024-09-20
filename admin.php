<?php
session_start();
//Function for isearch(item code)   
if (isset($_POST['search'])) {
  if (empty($_POST['find'])) {
    echo "<script type=\"text/javascript\">  
      window.alert(\"Keyword is empty for searching!.\")
      window.location.href='index.php';     
      </script>";
  } else {
    $find = $_POST["find"];
    header("Location: http://innogroup.com.ph/isearch/items/index.php?page=1&find=" . $find . "");
    exit;
  }
}
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
  <link href="css/custom_user.css" rel="stylesheet" type="text/css">
  <link href="dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="dist/css/style.css" rel="stylesheet">
  <link href="dist/css/responsive-calendar.css" rel="stylesheet" />
  <link href="dist/css/bootstrap-multiselect.css" rel="stylesheet" />
  <link href="dist/css/dataTables.css" rel="stylesheet" />
  <link href="dist/css/bootstrap-datepicker.min.css" rel="stylsheet" />
  <link rel="stylesheet" href="dist/datatable/bootstrap.css">
  <link rel="stylesheet" href="dist/datatable/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="toastr/toastr.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

  <style>
    .counter {
      color: #f27f21;
      font-family: 'Open Sans', sans-serif;
      text-align: center;
      height: 140px;
      width: 140px;
      padding: 25px 25px;
      margin-bottom: 10px;
      margin-left: 20px;
      margin-right: 20px;
      margin-top: 20px;
      border: 3px solid #f27f21;
      border-radius: 20px 20px;
      position: relative;
      z-index: 1;
    }

    .counter:before,
    .counter:after {
      content: "";
      background: #f3f3f3;
      border-radius: 15px;
      box-shadow: 4px 4px 2px rgba(0, 0, 0, 0.2);
      position: absolute;
      left: 15px;
      top: 15px;
      bottom: 15px;
      right: 15px;
      z-index: -1;
    }

    .counter:after {
      background: transparent;
      width: 100px;
      height: 100px;
      border: 15px solid #f27f21;
      border-top: none;
      border-right: none;
      border-radius: 0 0 0 20px;
      box-shadow: none;
      top: auto;
      left: -10px;
      bottom: -10px;
      right: auto;
    }

    .counter .counter-icon {
      font-size: 35px;
      line-height: 35px;
      margin: 0 0 15px;
      transition: all 0.3s ease 0s;
    }

    .counter:hover .counter-icon {
      transform: rotateY(360deg);
    }

    .counter .counter-value {
      color: #555;
      font-size: 30px;
      font-weight: 600;
      line-height: 20px;
      margin: 0 0 20px;
      display: block;
      transition: all 0.3s ease 0s;
    }

    .counter:hover .counter-value {
      text-shadow: 2px 2px 0 #d1d8e0;
    }

    .counter h3 {
      font-size: 17px;
      font-weight: 700;
      text-transform: uppercase;
      margin: 0 0 15px;
    }

    .counter.blue {
      color: #4accdb;
      border-color: #4accdb;
    }

    .counter.blue:after {
      border-bottom-color: #4accdb;
      border-left-color: #4accdb;
    }

    .counter.green {
      color: #2ed573;
      border-color: #2ed573;
    }

    .counter.green:after {
      border-bottom-color: #2ed573;
      border-left-color: #2ed573;
    }

    .counter.pink {
      color: #ff4757;
      border-color: #ff4757;
    }

    .counter.pink:after {
      border-bottom-color: #ff4757;
      border-left-color: #ff4757;
    }

    .counter.dark {
      color: #57606f;
      border-color: #57606f;
    }

    .counter.dark:after {
      border-bottom-color: #57606f;
      border-left-color: #57606f;
    }

    @media screen and (max-width:990px) {
      .counter {
        margin-bottom: 40px;
      }
    }

    .tab-label {
      font-size: small;
      font-family: Arial, Helvetica, sans-serif;
      font-weight: 600;
    }

    .accordion {
      background-color: #eee;
      color: #444;
      cursor: pointer;
      padding: 18px;
      width: 100%;
      border: none;
      text-align: left;
      outline: none;
      font-size: 12px;
      transition: 0.4s;
    }

    .active,
    .accordion:hover {
      background-color: #ccc;
    }

    #reff {
      padding: 0 18px;
      display: none;
      background-color: white;
      overflow: hidden;
    }

    #shared_table tr td {
      text-align: center;
    }

    table tr td:nth-child(2) {
      font-weight: 800;
    }

    #shared_table tr th:nth-child(2) {
      font-weight: 800;
    }

    #second-table tr th:nth-child(2) {
      font-weight: 800;
    }
  </style>
</head>

<body>
  <?php include 'includes/header.php'; ?>

  <blockquote>
    <p><br></p>
  </blockquote>

  <div class="container">
    <div class="container-content">
      <div class="row" style="background-color:#FFFFFF; padding:0px; -webkit-border-radius: 5px;-moz-border-radius: 5px; border-radius: 5px; height:100%;">
        <!-- Carousel  -->
        <?php include 'includes/slideshow.php'; ?>
        <input style="display:none" id="log_count" value="<?php echo $_SESSION['logcount']; ?>">
      </div><br>
      <div class="row">
        <div class="col-lg-12">
          <div id="content">
            <?php include 'Chart/table.php'; ?>
            <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
              <li class="active"><a href="#home" data-toggle="tab" style="color:#009900;">Home &nbsp&nbsp;<span class="badge">0</span></a></li>
              <li><a href="#contacts" data-toggle="tab" style="color:#009900;">Local Numbers &nbsp&nbsp;</a></li>
              <li><a href="#jobvacancies" data-toggle="tab" style="color:#009900;">Job Vacancies &nbsp&nbsp;<span class="badge">0</span></a></li>
            </ul>
            <div id="my-tab-content" class="tab-content">
              <!-- JOB VACANCIES TAB -->
              <div class="tab-pane" id="jobvacancies">
                <div class="page-header" style="padding-left:30px;">
                  <h5><span class="glyphicon glyphicon-briefcase" style="font-size:20px;"></span><strong> JOB VACANCIES </strong></h5>
                </div>
                <div class="row" style="padding-left:100px">
                  <div class="jumbotron" style="width:90%; padding-top:15px;">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="card-header">Add a Job Vacancies
                          <input type="text" class="form-control" placeholder="Position" aria-label="Username" id="job_position">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="card-header">Number of Vacancies
                          <input type="text" class="form-control" placeholder="No. of Vacancies" aria-label="Username" aria-describedby="addon-wrapping" id="job_no">
                        </div>
                      </div>
                    </div>
                    <div class="row" style="padding-top:5px;">
                      <div class="col-md-12">Job Summary
                        <textarea class="form-control" style="width:100%;" rows="7" placeholder="Job Qualifications" id="job_summary"></textarea>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <button type="button" class="btn btn-success" id="add_job">Add</button>
                        <button type="button" class="btn btn-info" id="job_clear">Clear</button>
                      </div>
                    </div>
                  </div><!-- end of jumbotron -->
                </div>
                <!--end of row-->
                <div class="row">
                  <div class="col-md-12">
                    <div class="alert alert-success" role="alert" id="job_success" style="height:10%">Job Vacancies successfully added.</div>
                    <div class="alert alert-danger" role="alert" id="job_alert">Adding failed. Some of fields are empty.</div>
                    <div class="alert alert-danger" role="alert" id="job_error">Adding failed. Please contact the administrator.</div>
                  </div>
                </div><!-- end of alerts div -->
                <!-- JOB VACANCIES POSTING -->
                <div id="job_post" class="col-md-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <strong><i>Innoland need of following position below</i></strong>
                    </div>
                    <div class="panel-body">
                      <div class="panel panel-default">
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-sm-3">
                              <b><u>Position</u></b>
                            </div>
                            <div class="col-sm-1">
                              <b><u>Vacancies</u></b>
                            </div>
                            <div class="col-sm-6">
                              <center><b><u>Job Summary</u></b></center>
                            </div>
                            <div class="col-sm-2">
                              <center><b><u>Action</u></b></center>
                            </div><!-- end of column -->
                          </div><!-- end of job header -->
                          <div class="row">
                            <hr>
                          </div>
                          <div class="row" id="jobs-body">
                            <?php
                            //view the job details from database
                            $view = $job->view_job();
                            while ($row = $view->fetch(PDO::FETCH_ASSOC)) {
                              extract($row);
                              echo '
                                    <div class="col-sm-3">' . $row['position'] . '</div>
                                    <div class="col-sm-1"><center>' . $row['no_of_job'] . '</center></div>
                                    <div class="col-sm-6">
                                      <div class="text-container">
                                          <div class="content hideContent">' . nl2br($row['summary']) . '</div>
                                          <div class="show-more">
                                            <a id="show_job" href="#">Show more</a>
                                          </div><br>
                                      </div>
                                    </div>
                                    <div class="col-sm-2">
                                      <center><a href="#" value=' . $row['id'] . ' id="edit_job">Edit</a> <b>|</b><a href="#" value=' . $row['id'] . ' id="remove_job"> Remove</a></center>
                                    </div>
                                  ';
                            }
                            ?>
                          </div><!-- end of jobs-body -->
                        </div> <!-- end of inner panel-body -->
                      </div><!-- end of panel default -->
                    </div><!-- end of outer panel-body -->
                  </div>
                  <!--end of panel group-->
                </div><!-- end of panel-success -->
                <!-- SUBMIT INSTRUCTION -->
                <div id="job_apply" class="col-md-12">
                  <div class="panel panel-info">
                    <div class="panel-heading"><strong><i>Please submit your requirements thru:</i></strong></div>
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-sm-12"><b><i>WALK IN:</b></i><br> 15th Floor TGU Tower JM Del Mar St. Cebu IT Park Apas Cebu City<br></div>
                      </div><br>
                      <!-- <div class="row">
                      <div class="col-sm-12"><b><i>EMAIL TO:</b></i><br> concepcion.vasquez@innogroup.com.ph or cebu.careers@innoland.com.ph</div>
                    </div><br> -->
                    </div><!-- end of panel-body -->
                  </div><!-- end of panel-info -->
                </div><!-- end of job_apply -->
              </div><!-- End of JOB VACANCIES -->
              <!--start of CONTACTS tab Pane-->
              <div class="tab-pane" id="contacts">
                <div class="row" style="padding-left:35px; padding-right:15px;">
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
                                <tbody>
                                  <?php
                                  //access model to view
                                  $view_cebulocals = $contacts->getcebulocals();
                                  while ($row = $view_cebulocals->fetch(PDO::FETCH_ASSOC)) {
                                    extract($row);
                                    echo '
                                      <tr>
                                        <td>' . $row['local_no'] . '</td>
                                        <td>' . $row['name'] . '</td>
                                        <td>' . $row['department'] . '</td>
                                      </tr>
                                      ';
                                  }
                                  ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!-- end of 1st column -->
                    <div class="col-sm-6">
                      <!--start of 2nd column-->
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
                                <tbody>
                                  <?php
                                  //access model to view
                                  $view_manilalocals = $contacts->getmanilalocals();
                                  while ($row = $view_manilalocals->fetch(PDO::FETCH_ASSOC)) {
                                    extract($row);
                                    echo '
                                      <tr>
                                        <td>' . $row['local_no'] . '</td>
                                        <td>' . $row['name'] . '</td>
                                        <td>' . $row['department'] . '</td>
                                      </tr>';
                                  }
                                  ?>
                                </tbody>
                              </table>
                            </div>
                            <!--end of panel-body-->
                          </div>
                          <!--end of collapse-one-->
                        </div>
                        <!--end of panel primary-->
                      </div>
                      <!--end of panel group-->
                    </div><!-- end of 2nd column -->
                  </div>
                  <!--end of column-->
                </div>
                <!--end of row-->
              </div>
              <!--end of CONTACTS column-->
              <div class="tab-pane active" id="home">
                <div class="row" style="padding-right:15px; padding-left:0px; padding-top:25px;">
                  <div class="col-md-4">
                    <div class="col-sm-12">
                      <!-- Add Event in calendar(HIDDEN) -->
                      <div id="new_event" class="panel panel-default">
                        <div class="panel-heading"><b>Add New Event</b></div>
                        <div class="panel-body">
                          <label>Event Date: </label><br>
                          <div class='input-group date'>
                            <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                            <input id="event_date" type='text' class="form-control datepicker" />
                          </div><br>
                          <label>Event Name: </label><br>
                          <div class='input-group date'>
                            <span class="input-group-addon">
                              <span class="glyphicon glyphicon-comment"></span>
                            </span>
                            <input id="event_name" type='text' class="form-control" />
                          </div><br>
                          <button id="save_event" type="button" class="btn btn-success">Save Event</button>
                          <button id="clear_event" type="button" class="btn btn-default">Close</button>
                        </div>
                      </div>
                      <!-- start of COMPANY CALENDAR -->
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <div class="row">
                            <div class="col-lg-12">
                              <!--<div id="set_event" class="btn btn-success pull-right">Set Event</div>-->
                              <a id="set_event" class="pull-right"> Set Events</a>
                              <h2 class="panel-title">Company Calendar</h2>
                            </div>
                          </div>
                        </div>
                        <div class="panel-body">
                          <?php include 'calendar.php'; ?>
                        </div>
                      </div>
                    </div> <!-- end of IGC CALENDAR -->
                    <!-- GOVERNMENT LINKS / WEBSITES -->
                    <div class="col-sm-12">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h3 class="panel-title"><b>Government Websites</b></h3>
                        </div>
                        <div class="panel-body">
                          <div class="row" style="text-align:center">
                            <div class="col-md-6">
                              <a href="https://www.sss.gov.ph/" target="_new"><img src="images/SSS Logo.jpg" class="imgprop" style="height: 90px;"></a>
                            </div>
                            <div class="col-md-6">
                              <a href="https://www.philhealth.gov.ph/" target="_new"><img src="images/PhilHealth Logo.jpg" class="imgprop" style="height: 90px;"></a>
                            </div>
                          </div>
                          <div class="row" style="text-align:center">
                            <div class="col-md-6">
                              <a href="https://www.pagibigfundservices.com/Views/EservicesPage.aspx" target="_new"><img src="images/Pag-Ibig-Logo.jpg" class="imgprop" style="height: 90px;"></a>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- HR Training Schedule -->
                    <div class="col-sm-12">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h3 class="panel-title"><b>Training Videos</b></h3>
                        </div>
                        <div class="panel-body">
                          <!--content projects-->
                          <p>Hi,<br>Please see below list of recorded training videos/webinars available upon request. If you are interested, kindly send email request to Mitch Bernades, HR Supervisor.<br><br>Thank you.</p>
                          <hr>
                          <p><b>Wellness</b><br></p>
                          <ul>
                            <li>Intellicare Orientation</li>
                            <li>Health talk – Covid 19 Vaccine with Dr. Ambrocio</li>
                            <li>Intellicare Orientation</li>
                          </ul>
                          <p><b>Engineering and Architecture</b><br></p>
                          <ul>
                            <li>Construction Project QA and QC (Cebu Contractors Association)</li>
                            <li>Introduction to Project Control with Engr. Tala</li>
                          </ul>
                          <p><b>Accounting</b><br></p>
                          <ul>
                            <li>Best Practices in Financial and Operational Budgeting (ARIVA)</li>
                          </ul>
                          <p><b>HR</b><br></p>
                          <ul>
                            <li>Engaging Employees in Designing and Implementing Productivity Incentive Schemes</li>
                          </ul>
                          <p><b>PMO</b><br></p>
                          <ul>
                            <li>PCAPI Training</li>
                          </ul>
                          <p><b>Netsuite Courses</b><br></p>
                          <ul>
                            <li>Closing of Book</li>
                          </ul>
                          <p><b>Others Available Webinars (recorded)</b><br></p>
                          <ul>
                            <li>How to Conduct Audit (AGF)</li>
                            <li>How to Detect Fake and Spurious Certification of Land Title (Center for Global Practices)</li>
                            <li>Cebu Property Market Briefing (Colliers)</li>
                          </ul>
                          <!--content projects-->
                        </div>
                        <!--end of body panel-->
                      </div>
                      <!--end of panel-->
                    </div><!-- HR Training -->
                    <!-- WEB APPLICATION -->
                    <div class="col-sm-12">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h3 class="panel-title"><b>Web Applications</b></h3>
                        </div>
                        <div class="panel-body">
                          <div class="row" style="text-align:center">
                            <div class="col-md-6">
                              <a href="http://innogroup.com.ph/contractscheduler" target="_new"><img src="images/ContractScheduler.png" class="imgprop"></a>
                            </div>
                            <div class="col-md-6">
                              <a href="http://innogroup.com.ph/ams" target="_new"><img src="images/AMS.png" class="imgprop"></a>
                            </div>
                          </div>
                        </div>
                        <!--end of body panel-->
                      </div>
                      <!--end of panel-->
                    </div><!-- web apps -->
                    <!-- INtranet user counter -->
                    <div class="col-sm-12">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h3 class="panel-title"><b>Intranet Counter</b></h3>
                        </div>
                        <div class="panel-body row">
                          <!-- WEB COUNTER START -->
                          <div class="row sm-6">
                            <div class="col-md-5 col-sm-6">
                              <div class="counter blue">
                                <div class="counter-icon">
                                  <i class="fa fa-thumbs-up"></i>
                                </div>
                                <span class="counter-day"></span>
                                <h3>Daily</h3>
                              </div>
                            </div>
                            <div class="col-md-5 col-sm-6">
                              <div class="counter green">
                                <div class="counter-icon">
                                  <i class="fa fa-bar-chart"></i>
                                </div>
                                <span class="counter-week"></span>
                                <h3>Weekly</h3>
                              </div>
                            </div>
                          </div>
                          <div class="row sm-6">
                            <div class="col-md-5 col-sm-6">
                              <div class="counter pink">
                                <div class="counter-icon">
                                  <i class="fa fa-rocket"></i>
                                </div>
                                <span class="counter-month"></span>
                                <h3>Monthly</h3>
                              </div>
                            </div>
                            <div class="col-md-5 col-sm-6">
                              <div class="counter dark">
                                <div class="counter-icon">
                                  <i class="fa fa-line-chart"></i>
                                </div>
                                <span class="counter-year"></span>
                                <h3>Yearly</h3>
                              </div>
                            </div>
                          </div>
                          <!-- WEB COUNTER ENDS -->
                        </div>
                        <!--end of body panel-->
                      </div>
                      <!--end of panel-->
                    </div><!-- /intranet counter -->
                  </div><!-- end of column-md-4 -->
                  <!-- button -->
                  <div class="col-md-8">
                    <a href="https://www.innogroup.com.ph/ticketing" class="btn btn-success" target="_blank" style="color: white"><i class="mdi mdi-arrow-right-box"></i> Make IT Ticket Request</a>
                    <a id="new_post" class="btn btn-success" style="color: white"><i class="mdi mdi-arrow-right-box"></i> New Post</a><br><br>
                    <div>
                      <!-- This is for the blog -->
                      <div id="new-post" class="panel panel-default" style="width:100%" hidden>
                        <div class="panel-heading"><b>New Post</b></div>
                        <div class="panel-body">
                          <div class="row">
                            <?php
                            $id = $post->display_next_postid();
                            $post_id = "";

                            while ($row = $id->fetch(PDO::FETCH_ASSOC)) {
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
                                while ($row = $view->fetch(PDO::FETCH_ASSOC)) {
                                  echo '<option value="' . $row['id'] . '">' . $row['department'] . '</option>';
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
                        </div>
                      </div>
                      <!--end of new-post -->
                    </div>
                    <!--view blog post starts here-->
                    <div class="row">
                      <div id="postview" class="col-md-12">
                        <!-- get and display the GENERAL ANNOUNCEMENT -->
                        <?php
                        echo '
                        <div class="panel panel-primary">
                          <div class="panel-heading"><h4>General Announcement</div>
                            <div class="panel-body">';
                        $get = $dept->view_announcement();
                        while ($row = $get->fetch(PDO::FETCH_ASSOC)) {
                          $display_post = $post->display_announcement();
                          while ($row1 = $display_post->fetch(PDO::FETCH_ASSOC)) {
                            $date_added = $row1['date_added'];
                            $date_add = date("F d, Y", strtotime($date_added));
                            echo '
                                    <div class="panel panel-default">
                                      <div class="panel-heading">
                                        <strong>' . $row1['type'] . '</strong>                   
                                      </div>
                                        <div class="panel-body">
                                          
                                            <p>' . $row1['details'] . '</p><br>';
                            $attach->attach_id = $row1['post_ID'];
                            $disp_attach = $attach->display_attach();
                            while ($row2 = $disp_attach->fetch(PDO::FETCH_ASSOC)) {
                              if ($row2['attach_id'] == $row1['post_ID']) {
                                echo '<center><img id="attachImage" src="' . $row2['image_path'] . '" style="width:100%; height:100%;"/></center>';
                              }
                            }
                            echo '
                                      </div>
                                      <div class="panel-footer" align="right"><i> Date Posted: ' . $date_add . ' </i></div>
                                    </div>';
                          }
                        }
                        echo '</div>
                          </div>';
                        ?>
                        <!-- display the departmental post & news -->
                        <?php include 'includes/viewpost.php'; ?>
                      </div><!-- end of post-view -->
                    </div> <!-- end of view post row -->
                  </div><!-- end of column-8 -->
                </div><!-- end of post row -->
              </div>
              <!--end of home row tabpane-->
              <!--end of home tabpane-->
            </div>
            <!--end of tab content-->
          </div>
          <!--end of content-->
        </div>
        <!--end of col-lg-12-->
      </div>
      <!--end of row-->
    </div>
    <!--end of container content-->
  </div>
  <!--end of container-->
  <br>
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
                      <option value="3">SERENIS NORTH</option>
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

  <!-- EDIT JOB VANCANCIES Modal -->
  <div class="modal fade" id="editjob_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <div class="row">
            <div class="col-md-6">
              <h5 class="modal-title" id="exampleModalLabel"><strong>Update Job Vacancies</strong></h5>
            </div>
            <div class="col-md-6">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        </div>
        <div class="modal-body" id="jobmodal-body">

          <div class="alert alert-danger" role="alert" id="update_error">Update failed. Please contact the administrator.</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="save_update">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- CHANGE PASSWORD MODAL IF LOGCOUNT 0 -->
  <div id="changepass" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><b>Account Settings</b></h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="alert alert-info" role="alert">
              <b>First Time to log-in? You must changed the default password to secure your account before you proceed.</b>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <label>Username:</label>
              <input type="text" class="form-control" value="<?php echo $_SESSION['username']; ?>" id="username" disabled>
              <input type="hidden" class="form-control" value="<?php echo $_SESSION['user-id']; ?>" id="id" disabled>
            </div>
          </div><br>
          <div class="row">
            <div class="col-sm-12">
              <label>Password</label>
              <input type="password" class="form-control" id="new_pass">
            </div>
          </div><br>
          <div class="row">
            <div class="col-sm-12">
              <label>Re-type Password:</label>
              <input type="password" class="form-control" id="re_pass">
            </div>
          </div>
          <!-- alerts -->
          <div class="row">
            <span id="pass_alert" class="alert" style="color:red"></span>
            <div class="alert alert-danger" id="error_msg">
              <!--ALERTS-->
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button id="later_pass" type="button" class="btn btn-secondary" data-dismiss="modal">Change Later</button>
          <button id="upd_pass" type="button" class="btn btn-success">Save Changes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- modal after successful change of password -->
  <div id="notice_modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><b>NOTICE</b></h4>
        </div>
        <div class="modal-body">
          <p>Congratulation, your password has been successfully updated. You need to login again to complete the process <a href="logout.php"><b><u>Click here</b></u></a> to continue.</p>
        </div>
        <div class="modal-footer">
          <a class="btn btn-primary" href="logout.php">Logout</a>
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
            <input type="hidden" name="post_id" class="post_id" value="<?php echo $post_id ?>" />
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

  <script src="dist/js/jquery.min.js?v=1.1" type="text/javascript"></script>
  <script src="dist/js/bootstrap.js" type="text/javascript"></script>
  <script src="dist/js/bootstrap-multiselect.js" type="text/javascript"></script>
  <script src="dist/js/jquery.dataTables.js" type="text/javascript"></script>
  <script src="dist/js/responsive-calendar.js" type="text/javascript"></script>
  <script src="dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
  <script src="toastr/jquery.toast.js"></script>
  <script src="toastr/toastr.js"></script>

  <script>
    $(document).ready(function() {
      $('.accordion').on('click', () => {
        $('#reff').toggle(500);
      })
      //Author:Dan
      $('#table-modal').modal('show');
    })
  </script>
  <!-- ATTACH IMAGE POST event handler -->
  <script>
    //hide after selecting a photo
    $("#done").on('click', function(e) {
      e.preventDefault();
      $("#upload_image").modal('hide');
    });

    //show modal
    $("#attach").on('click', function(e) {
      e.preventDefault();
      $("#upload_image").modal('show');
    });

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
    }
    //PREVIEW EVENT HANDLER
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#preview_image').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    function show() {
      document.getElementById('btnUpload').style.visibility = "visible";
    }
  </script>
  <!-- Item Code search engine function -->
  <script type="text/javascript">
    $('#gobutton').on('click', function(e) {
      e.preventDefault();
      var itemcode = $('#search_val').val();

      if (itemcode == '' || itemcode == null) {
        alert('ERROR! need itemcode or item description to proceed.');
      } else {
        window.location = 'http://innogroup.com.ph/isearch/itemcode.php?itemcode=' + itemcode;
      }

    })
  </script>

  <!-- show div for post module -->
  <script>
    $('#new_post').click(function(e) {
      e.preventDefault();

      $('#new-post').toggle();
      $('#ticket-request').hide();
    })
  </script>

  <!-- get the subcategory -->
  <script>
    $(document).ready(function() {

      //get counter data
      $.ajax({
        type: 'POST',
        url: 'controls/selectvisit.php',
        dataType: 'json',
        cache: false,
        success: function(result) {
          var day = result[0];
          var week = result[1];
          var month = result[2];
          var year = result[3];
          $('.counter-day').text(day);
          $('.counter-week').text(week);
          $('.counter-month').text(month);
          $('.counter-year').text(year);
        }
      });

      $('.category').change(function() {

        var id = $(this).val();

        $.ajax({
          type: 'POST',
          url: 'controls/ticketing/get_subcat.php',
          data: {
            id: id
          },

          success: function(html) {
            $('.sub-category').html(html);
          }
        })
      })
    })
  </script>

  <!-- clear request detail -->
  <script>
    $('#clear-req').click(function(e) {
      e.preventDefault();

      $('#category option:eq(0)').prop('selected', 'selected');
      $('#sub-category').val('Select Sub-Category Here');
      $('#urgency option:eq(0)').prop('selected', 'selected');
      $('#detail').val('');
    })
  </script>

  <!-- set the current date of calendar -->
  <script>
    //to get the current date
    var d = new Date();
    var cur_date = d.getDate();
    var cur_month = d.getMonth() + 1;
    var cur_year = d.getFullYear();
    var today = cur_year + "-" + cur_month + "-" + cur_date;

    $(".responsive-calendar").responsiveCalendar({
      time: today
    });
  </script>

  <!-- EVENTS CALENDAR functions -->
  <script>
    //initializa datepicker
    $(function() {
      $('.datepicker').datepicker();
    });

    /*EVENT MODULE*/
    /*HIDE the new_event div upon load of page*/
    $(document).ready(function() {
      $('#new_event').hide();
    });
    /*show the event div */
    $("#set_event").on("click", function(e) {
      e.preventDefault();

      $('#new_event').slideDown();
      $('#set_event').hide();
    });

    //clear or hide the event div
    $('#clear_event').on('click', function() {
      $('#new_event').slideUp();
      $('#set_event').show();
      $('#event_date').val('');
      $('#event_name').val('');
    });

    //save the event in DB
    $('#save_event').on('click', function(e) {
      e.preventDefault();

      var date = $('#event_date').val();
      var name = $('#event_name').val();
      var myData = 'event_date=' + date + '&event_name=' + name;
      //alert(myData);
      $.ajax({
        type: "POST",
        url: "controls/save_event.php",
        data: myData,

        success: function(response) {
          alert(response);
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(thrownError);
        }
      });
    });
  </script>

  <!-- show more/show less function for JOB QUALIFICATION -->
  <script>
    $(".show-more a").on("click", function(e) {
      e.preventDefault();
      var $this = $(this);
      var $content = $this.parent().prev("div.content");
      var linkText = $this.text().toUpperCase();

      if (linkText === "SHOW MORE") {
        linkText = "Show less";
        $content.addClass('showContent', 400).removeClass('hideContent', 400);
      } else {
        linkText = "Show more";
        $content.addClass('hideContent', 400).removeClass('showContent', 400);
      };

      $this.text(linkText);
    });
  </script>

  <!-- ACCOUNT SETTINGS FUNCTION -->
  <script>
    /*check if password match*/
    $("#repass").keyup(function() {
      var new_pass = $("#newpass").val();
      var re_pass = $(this).val();

      if (new_pass != re_pass) {
        document.getElementById("account_alert").innerHTML = "<label class='text text-danger'>ERROR: Password not match</label>";
      } else {
        document.getElementById("account_alert").innerHTML = "<label class='text text-success'>Password match</label>";
      }
      return true;
    });

    /*save changes that made*/
    $(document).on('click', '#upd_account', function(e) {
      e.preventDefault();

      var id = $('#account_id').val();
      var pass = $('#newpass').val();
      var pass2 = $('#repass').val();
      var remark = 1;
      var myData = 'id=' + id + '&password=' + pass + '&remark=' + remark;

      if (pass == "" || pass2 == "") {
        $('#acc_error_msg').html("WARNING: Please fill-up all fields to proceed");
        $(".alert-danger").show().fadeOut(5000);
        return false;
      } else {
        if (pass != pass2) {
          $('#acc_error_msg').html("ERROR: Password not match. Please try again");
          $(".alert-danger").show().fadeOut(5000);
          return false;
        } else {
          $.ajax({
            type: "POST",
            url: "controls/update_pass.php",
            data: myData,

            success: function(response) {
              //alert(response);
              if (response > 0) {
                $('#accountmodal').hide();
                $("#notice_modal").modal({
                  backdrop: 'static',
                  keyboard: false
                });
              } else {
                $('#acc_error_msg').html("ERROR: Update failed. Please contact the administrator for assistance.");
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
  </script>

  <!-- check the log-count if 0 for update -->
  <script>
    $(document).ready(function() {
      var logcount = $("#log_count").val();

      if (logcount == "0" || logcount == 0) {
        $("#changepass").modal({
          backdrop: 'static',
          keyboard: false
        });
        //alert("Hi You need to change password before you can proceed");
      }
    });
  </script>

  <!-- save changes in USER ACCOUNT/USER SETTINGS -->
  <script>
    $(document).on('click', '#upd_pass', function(e) {
      e.preventDefault();
      var emp_id = $('#id').val();
      var password = $("#new_pass").val();
      var password2 = $("#re_pass").val();
      var remark = 1; //update password 0-later
      var myData = 'id=' + emp_id + '&password=' + password + '&remark=' + remark;

      if (password == "" || password2 == "") {
        $('#error_msg').html("WARNING: Please fill-up all fields to proceed");
        $(".alert-danger").show().fadeOut(5000);
        return false;
      } else {
        if (password != password2) {
          $('#error_msg').html("ERROR: Password not match. Please try again");
          $(".alert-danger").show().fadeOut(5000);
          return false;
        } else {
          $.ajax({
            type: "POST",
            url: "controls/update_pass.php",
            data: myData,

            success: function(response) {
              //alert(response);
              if (response > 0) {
                $('#changepass').hide();
                $("#notice_modal").modal({
                  backdrop: 'static',
                  keyboard: false
                });
              } else {
                $('#error_msg').html("ERROR: Update failed. Please contact the administrator for assistance.");
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

    /*CHANGED THE PASSWORD LATER*/
    $(document).on('click', '#later_pass', function(e) {
      e.preventDefault();
      var remark = 0;
      var id = $('#id').val();
      var myData = 'id=' + id + '&remark=' + remark;

      $.ajax({
        type: "POST",
        url: "controls/update_pass.php",
        data: myData,

        success: function(response) {
          //alert(response);
          if (response > 0) {
            $('#changepass').fadeOut('slow');
          } else {
            $('#error_msg').html("ERROR: Update failed. Please contact the administrator for assistance.");
            $(".alert-danger").show().fadeOut(5000);
            return false;
          }
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(thrownError);
        }
      });
    });
    //check if password match
    $("#re_pass").keyup(function() {
      var new_pass = $("#new_pass").val();
      var re_pass = $(this).val();

      if (new_pass != re_pass) {
        document.getElementById("pass_alert").innerHTML = "<label class='text text-danger'>ERROR: Password not match</label>";
      } else {
        document.getElementById("pass_alert").innerHTML = "<label class='text text-success'>Password match</label>";
      }
      return true;
    });
  </script>

  <!-- JOB VACANCIES -->
  <script>
    $(document).ready(function() {
      $('#job_success').hide();
      //$('#changepass_success').hide(); 
    });
  </script>

  <!-- VIEW JOB DETAILS FUNCTION -->
  <script>
    $(document).on('click', '#edit_job', function(e) {
      e.preventDefault();

      var id = $(this).attr('value');
      var myData = 'id=' + id;

      $.ajax({
        type: "POST",
        url: "controls/view_job.php",
        data: myData,

        success: function(html) {
          //alert(html);
          $("#jobmodal-body").html(html);
          $("#editjob_modal").modal('show');
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(thrownError);
        }
      });
    });
  </script>

  <!-- SAVE EDITED JOB DETAILS -->
  <script>
    $(document).on('click', '#save_update', function(e) {
      e.preventDefault();
      var id = $("#job_id").val();
      var edit_position = $("#edit_position").val();
      var edit_job_no = $("#edit_job_no").val();
      //var edit_qual = $("#edit_qual").val();
      var edit_summary = $("#edit_summary").val();
      var myData = 'id=' + id + '&position=' + edit_position + '&no_of_job=' + edit_job_no + /*'&qualification=' + edit_qual + */ '&summary=' + edit_summary;

      $.ajax({
        type: "POST",
        url: "controls/update_job.php",
        data: myData,

        success: function(response) {
          //alert(response);
          if (response > 0) {
            alert("Job vacancy detials is already updated!");
            $("#editjob_modal").modal('hide');

            //function to show the latest list
            $.ajax({
              type: "POST",
              url: "controls/view_joblist.php",

              success: function(html) {
                $("#jobs-body").fadeOut('slow');
                $("#jobs-body").fadeIn('slow');
                $("#jobs-body").empty().append(html);
              }
            });
          } else {
            $("#update_error").show().fadeOut(5000);
          }
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(thrownError);
        }
      });
    });
  </script>

  <!-- REMOVE JOB VACANCIES FUNCTION -->
  <script>
    $(document).on('click', '#remove_job', function(e) {
      e.preventDefault();

      var id = $(this).attr('value');
      var myData = 'id=' + id;
      //alert(myData);

      $.ajax({
        type: "POST",
        url: "controls/delete_job.php",
        data: myData,

        success: function(response) {
          if (response > 0) {
            //function to show the latest list
            $.ajax({
              type: "POST",
              url: "controls/view_joblist.php",

              success: function(html) {
                $("#jobs-body").fadeOut('slow');
                $("#jobs-body").fadeIn('slow');
                $("#jobs-body").empty().append(html);
              }
            });
          } else {
            alert("Oops! Error encounter. Please contact the administrator.");
          }

        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(thrownError);
        }
      });
    });
  </script>
  <!-- clear inputted data -->
  <script>
    $(document).on('click', '#job_clear', function(e) {
      e.preventDefault();
      $('#job_position').val('');
      $('#job_qual').val('');
      $('#job_no').val('');
    });
    /*ADD JOB FUNCTION*/
    $(document).on('click', '#add_job', function(e) {
      e.preventDefault();

      var position = $('#job_position').val();
      var vacancies = $('#job_no').val();
      //var qualification = $('#job_qual').val();
      var summary = $('#job_summary').val();
      var myData = "position=" + position + "&vacancies=" + vacancies + /*"&qualification=" + qualification +*/ "&summary=" + summary;

      if (position != "" && vacancies != "" && /*qualification != ""*/ summary != "") {
        $.ajax({
          type: "POST",
          url: "controls/save_job.php",
          data: myData,

          success: function(response) {
            //alert(response);
            $('#job_position').val('');
            $('#job_summary').val('');
            $('#job_no').val('');

            if (response > 0) {
              $("#job_success").show().fadeOut(5000);
              //function to show the latest list
              $.ajax({
                type: "POST",
                url: "controls/view_joblist.php",

                success: function(html) {
                  $("#jobs-body").fadeOut('slow');
                  $("#jobs-body").fadeIn('slow');
                  $("#jobs-body").empty().append(html);
                }
              });
            } else {
              $("#job_error").show().fadeOut(5000);
            }
          },
          error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError);
          }
        });
      } else {
        $("#job_alert").show().fadeOut(5000);
      }
    });
  </script>

  <script type="text/javascript">
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

  <script type="text/javascript">
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

  <!-- hide all alert-danger -->
  <script>
    $(document).ready(function() {
      $(".alert-danger").hide();
    });
  </script>

  <!-- function to back to top -->
  <script>
    $(document).on('click', '.back_to_top', function() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    });
  </script>

  <!-- SAVE POST MODULE FUNCTION -->
  <script>
    //savepost event handler
    $('#savepost').click(function(e) {
      e.preventDefault();

      var title = $('#post_title').val();
      var department = $('#sharewith').val();
      var details = $('#details').val();
      var post_id = $('#post_id').val();
      var file_data = $('#filecover').prop('files')[0];

      var form_data = new FormData();
      form_data.append('files', file_data);
      form_data.append('post_id', post_id);
      form_data.append('title', title);
      form_data.append('department', department);
      form_data.append('details', details);

      if (title != '' && department != '') {
        $.ajax({
          type: "POST",
          url: "controls/save_post.php",
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,

          success: function(response) {
            if (response > 0) {
              $.ajax({
                type: "POST",
                url: "upload.php",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,

                success: function(response) {
                  if (response > 0 || response == '') {
                    $('#success_msg').html("MESSAGE: POSTING SUCCESSFUL");
                    $(".alert-success").show();
                    setTimeout(function() {
                      $(".alert-success").hide();
                    }, 3000)
                  } else {
                    $('#fail_msg').html("WARNING: Upload of post attachment is failed. Please contact the system administrator.");
                    $(".alert-danger").show();
                    setTimeout(function() {
                      $(".alert-danger").hide();
                    }, 4000)
                  }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                  alert(thrownError);
                }
              });
            } else {
              $('#fail_msg').html("WARNING: POSTING FAILED! Please contact the Administrator");
              $(".alert-danger").show();
              setTimeout(function() {
                $(".alert-danger").hide();
              }, 4000)
            }
          }
        });
      } else {
        $('#fail_msg').html("WARNING: POSTING FAILED! Please fill out all the fields needed.");
        $(".alert-danger").show();
        setTimeout(function() {
          $(".alert-danger").hide();
        }, 4000)
      }
    });
    //show more post
    // $(document).on('click', '.show_more', function(e){
    //   e.preventDefault();
    //   var date = $(this).attr('id');
    //   var dept_id = $('#dept_id').val();
    //   var dept_id1 = $('#dept_id1').val();
    //   var myData =  "date=" + date + '&dept_id=' + dept_id + '&dept_id1=' + dept_id1;
    //   $('.show_more_post').hide();

    //     $.ajax({
    //       type: "POST",
    //       url: "controls/view_post.php",
    //       data: myData,

    //       success: function(html)
    //       {
    //         if(html != 0)
    //         {
    //           $("#show_more_post" + date).remove();
    //           $('#dept_id').val('');
    //           $('#dept_id1').val('');
    //           $('#dept_id2').val('');
    //           $("#postview").append(html);                
    //         }
    //         else
    //         {
    //           $('.show_more_post').hide();
    //         }
    //       },
    //       error: function(xhr, ajaxOptions, thrownError)
    //       {
    //         alert(thrownError);
    //       }
    //     });
    // });
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
  <script>
    $(document).ready(function() {
      $('#job_vacant').dataTable({
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
      interval: 15000
    })
  </script>
  <script>
    $('#btnopen').click(function(e) {
      e.preventDefault();
      var proj = $('#projects').val();

      if (proj == 1) {
        window.open("http://www.innoprime.com.ph/soa-calyx");
      }
      if (proj == 2) {
        window.open("http://www.innoprime.com.ph/soa-calres");
      }
      if (proj == 3) {
        window.open("http://www.innoprime.com.ph/soa-serenis-north");
      }
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

</body>

</html>