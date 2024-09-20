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
	    	#divbody, #div_container
	    	{
	    		resize: both;
    			overflow: auto;
	    	}
	    </style>
  </head>
<body>
  <?php 
  include 'includes/header.php'; 
  include_once('/config/clsConnection.php');
  include_once('/config/clsConnectionIntranet.php');
  include_once('/objects/clsDepartment.php');

  $database = new clsConnection();
  $db = $database->connect();

  $database2 = new clsConnectionIntranet();
  $db2 = $database2->connect();
  $dept = new department($db2);

  ?>
  <br><br><br><br><br>
	<div id="div_container" class="well well-lg"  style="background-color:#FFFFFF">
	  <div class="container-content">
	  	<ol class="breadcrumb">
	  	  <li><a href="admin.php">Home</a></li>
		  <li class="active">Policies and Memos</li>
		</ol>
	  	<div class="row">
	  		<div class="col-sm-3">
	  		  <div class="well well-lg">
				<h5><strong>Please Choose a Year:</strong></h5>
	  			<div id="accordion">
				  <div class="card">
				    <div class="card-header" id="headingTwo">
				      <h5 class="mb-0">
				        <a class="collapsed pointer" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
				          Year 2018
				        </a>
				      </h5>
				    </div>
				    <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
				      <div class="card-body">
				      	<div class="col-lg-4">
				        	THIS IS A TEST
				        </div>
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <div class="card-header" id="headingTwo">
				      <h5 class="mb-0">
				        <a class="collapsed pointer" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				          Year 2017
				        </a>
				      </h5>
				    </div>
				    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
				      <div class="card-body">
				      	<div class="col-lg-4">
				        	2nd TEST
				        </div>
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <div class="card-header" id="headingThree">
				      <h5 class="mb-0">
				        <a class="collapsed pointer" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
				          Year 2016
				        </a>
				      </h5>
				    </div>
				    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
				      <div class="card-body">
				      	<div class="col-lg-4">
				        	3rd TEST
				        </div>
				      </div>
				    </div>
					</div>				  
				</div>
			  </div>
			</div>
			<div class="col-sm-9">
				 <div id="divbody" style="background-color:#FFFFFF;">
				 	<div class="table-responsive">
					 	<table id="example" class="table table-striped table-bordered" style="width:100%">
					 		<thead>
					            <tr>
					                <th>Name</th>
					                <th>Position</th>
					                <th>Office</th>
					                <th>Age</th>
					                <th>Start date</th>
					                <th>Salary</th>
					            </tr>
					        </thead>
					        <tbody>
					        	<tr>
					                <td>Tiger Nixon</td>
					                <td>System Architect</td>
					                <td>Edinburgh</td>
					                <td>61</td>
					                <td>2011/04/25</td>
					                <td>$320,800</td>
					            </tr>
					        </tbody>
					 	</table>
					</div>
				 </div>
			</div>
		</div>
	  </div>
</div>
<?php include 'includes/footer.php';?>

	<script src="dist/js/jquery.min.js" type="text/javascript"></script>
    <script src="dist/js/bootstrap.js" type="text/javascript"></script>  
    <script src="dist/js/bootstrap-multiselect.js" type="text/javascript"></script>
    <script src="dist/js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="dist/js/dataTables.bootstrap.min.js" type="text/javascript"></script>

</body>
</html>

