<div class="row" style="padding-top:25px; padding-left:15px; padding:right:15px; margin-right:5px;">
  <div class="col-md-3">
       <div class="panel panel-default">
          <div class="panel-heading"><i class="fa fa-calendar"></i> SELECT PERIOD</div>
            <div class="panel-body">
                <div class="list-group">
                    <a href="#" class="list-group-item">
                    <i class="fa fa-calendar-o"></i> January
                        </span>
                    </a>
                    <a href="#" class="list-group-item">
                    <i class="fa fa-calendar-o"></i> February
                        </span>
                    </a>
                    <a href="#" class="list-group-item">
                    <i class="fa fa-calendar-o"></i> March
                        </span>
                    </a>
                    <a href="#" class="list-group-item">
                    <i class="fa fa-calendar-o"></i> April
                        </span>
                    </a>
                    <a href="#" class="list-group-item">
                    <i class="fa fa-calendar-o"></i> May
                        </span>
                    </a>
                    <a href="#" class="list-group-item">
                    <i class="fa fa-calendar-o"></i> June
                        </span>
                    </a>
                    <a href="#" class="list-group-item">
                    <i class="fa fa-calendar-o"></i> July
                        </span>
                    </a>
                    <a href="#" class="list-group-item">
                    <i class="fa fa-calendar-o"></i> August
                        </span>
                    </a>
                    <a href="#" class="list-group-item">
                    <i class="fa fa-calendar-o"></i> September
                        </span>
                    </a>
                     <a href="#" class="list-group-item">
                     <i class="fa fa-calendar-o"></i> October
                        </span>
                    </a>
                     <a href="#" class="list-group-item">
                     <i class="fa fa-calendar-o"></i> November
                        </span>
                    </a>
                     <a href="#" class="list-group-item">
                     <i class="fa fa-calendar-o"></i> December
                        </span>
                    </a>
                </div>
                <a href="#" class="btn btn-default btn-block">View All Logs</a>
                
            </div>
        </div>
  </div>
  
  <div class="col-md-9">
     <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> DAILY TIME RECORD FOR THE <?php echo  strtoupper(date('F Y')); ?>
                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            Actions
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li><a href="#">Add to Overtime</a>
                            </li>
                            <li><a href="#">Add to Leave</a>
                            </li>
                            <li><a href="#">Add to Undertime</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#">File for Manual Encode</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
             <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-area-chart" class="morris"></div>
                            
                            <div class="dataTable_wrapper">
                              
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="font-size:10px">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox"></input></th>
                                            <th>Date</th>
                                            <th>Day</th>
                                            <th>Time In</th>
                                            <th>Time Out</th>
                                            <th>Leave</th>
                                            <th>Overtime</th>
                                            <th>LWOP</th>
                                            <th>Schedule</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td><input type="checkbox" /></td>
                                            <td>7/01/2015</td>
                                            <td>WED</td>
                                            <td>08:00 AM</td>
                                            <td>06:00 PM</td>
                                            <td>0.0</td>
                                            <td>0.0</td>
                                            <td>0.0</td>
                                            <td>08:00 AM-06:00 PM</td>
                                            <td class="center">OK</td>
                                        </tr>
                                         <tr class="odd gradeX">
                                            <td><input type="checkbox" /></td>
                                            <td>7/02/2015</td>
                                            <td>THU</td>
                                            <td>08:00 AM</td>
                                            <td>06:00 PM</td>
                                            <td>0.0</td>
                                            <td>0.0</td>
                                            <td>0.0</td>
                                            <td>08:00 AM-06:00 PM</td>
                                            <td class="center">OK</td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
       </div><!-- /panel-heading -->
  </div><!-- column 2 DTR -->
<div>
      