     <!-- Table -->
     <div class="modal fade" id="table-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog" style="width: 90%;">
             <div class="modal-content">
                 <div class="modal-body mb-0">
                     <h3 align="center" style="color: #57606f; margin-top: 0;">SHARED GOALS FOR 2023</h3>
                     <br>
                     <div class="table-responsive">
                         <table class="table table-bordered table-sm table-responsive" id="shared_table" style="width: 100%; font-size: 1.3rem;">
                             <tr style="background-color: #71b643;">
                                 <th>UNITS TO BE SOLD</th>
                                 <th>TARGET-2023</th>
                                 <!-- <th>Jan</th>
                                 <th>Feb</th>
                                 <th>Mar</th>
                                 <th>Apr</th>
                                 <th>May</th>
                                 <th>Jun</th>
                                 <th>Jul</th>
                                 <th>Aug</th>
                                 <th>Sep</th>
                                 <th>Oct</th>
                                 <th>Nov</th>
                                 <th>Dec</th>
                                 <th>RETURNS</th> -->
                                 <th>YTD Total</th>
                                 <th>Jan-24</th>
                                 <th>Feb-24</th>
                                 <th>Mar-24</th>
                                 <th>Apr-24</th>
                                 <th>May-24</th>
                                 <th>Jun-24</th>
                                 <th>Jul-24</th>
                                 <th>Aug-24</th>
                                 <th>Sep-24</th>
                                 <th>Oct-24</th>
                                 <th>Nov-24</th>
                                 <th>Dec-24</th>
                                 <th>Variance</th>
                             </tr>
                             <tbody>
                                 <tr>
                                     <?php
                                        //These are the value of the its the same above commented column in th 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, '', '', 
                                        $serenisNorth = ['Serenis North', 7, 2, '', '', '', '', '', '', '', '', '', '', '', '', -5];
                                        foreach ($serenisNorth as $val) {
                                            echo '<td>' . $val . '</td>';
                                        }
                                        ?>
                                 </tr>
                                 <tr>

                                     <?php
                                        //These are the value of the its the same above commented column in th  1, 6, 3, 1, 2, 1, 0, 0, 0, 0, 0, '', '',
                                        $serenisSouth = ['Serenis South', 31,  14, '', '', '', '', '', '', '', '', '', '', '', '', -17];
                                        foreach ($serenisSouth as $val) {
                                            echo '<td>' . $val . '</td>';
                                        }
                                        ?>
                                 </tr>
                                 <tr>
                                     <?php
                                        //These are the value of the its the same above commented column in th   5, 4, 4, 2, 5, 5, 1, 4, 0, 0, 0, '', '',
                                        $ThenMedian = ['The Median', 27, 30, '', '', '', '', '', '', '', '', '', '', '', '', 3];
                                        foreach ($ThenMedian as $val) {
                                            echo '<td>' . $val . '</td>';
                                        }
                                        ?>
                                 </tr>
                                 <tr>
                                     <?php
                                        //These are the value of the its the same above commented column in th  27, 15, 15, 18, 16, 19, 15, 27, 0, 0, 0, '', '',
                                        $ThenMedianFlats = ['The Median Flats', 480,  160, '', '', '', '8', '', '', '', '', '', '', '', '', -320];
                                        foreach ($ThenMedianFlats as $val) {
                                            echo '<td>' . $val . '</td>';
                                        }
                                        ?>
                                 </tr>
                                 <tr>
                                     <?php
                                        //These are the value of the its the same above commented column in th  0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '',
                                        $CalyxCentre = ['Calyx Centre', 5,  0, '', '', '', '', '', '', '', '', '', '', '', '', -5];
                                        foreach ($CalyxCentre as $val) {
                                            echo '<td>' . $val . '</td>';
                                        }
                                        ?>
                                 </tr>
                                 <tr>
                                     <?php
                                        //These are the value of the its the same above commented column in th  0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '',
                                        $CalyxRes = ['Calyx Residences', 2,  0, '', '', '', '', '', '', '', '', '', '', '', '', -2];
                                        foreach ($CalyxRes as $val) {
                                            echo '<td>' . $val . '</td>';
                                        }
                                        ?>
                                 </tr>
                                 <tr>
                                     <?php
                                        //These are the value of the its the same above commented column in th  34, 25, 22, 21, 23, 26, 16, 31, 0, 0, 0, '', '',
                                        $total = ['Total', 552,  198, '', '', '', '', '', '', '', '', '', '', '', '', -354];
                                        foreach ($total as $val) {
                                            echo '<td>' . $val . '</td>';
                                        }
                                        ?>
                                 </tr>
                             </tbody>
                         </table>


                         <table class="table table-bordered table-sm table-responsive" id="second-table" style="width: 100%; font-size: 1.3rem;">
                             <tr style="background-color: #55bcb0;">
                                 <th>UNITS FOR TURN OVER</th>
                                 <th>TARGET-2023</th>
                                 <th>YTD</th>
                                 <!-- <th>Jun</th>
                                 <th>Jul</th>
                                 <th>Aug</th>
                                 <th>Sep</th>
                                 <th>Oct</th>
                                 <th>Nov</th>
                                 <th>Dec</th> -->
                                 <th>Jan-24</th>
                                 <th>Feb-24</th>
                                 <th>March-24</th>
                                 <th>Apr-24</th>
                                 <th>May-24</th>
                                 <th>Jun-24</th>
                                 <th>Jul-24</th>
                                 <th>Aug-24</th>
                                 <th>Sep-24</th>
                                 <th>Oct-24</th>
                                 <th>Nov-24</th>
                                 <th>Dec-24</th>
                             </tr>
                             <tbody>
                                 <tr>
                                     <?php
                                        //   25, 10, 3, 1, 0, 0,
                                        $turnover = ['The Median', 503, 483, '', '', '', '', '', '', '', '', '', '', '', ''];
                                        foreach ($turnover as $val) {
                                            echo '<td>' . $val . '</td>';
                                        }
                                        ?>
                                 </tr>
                             </tbody>
                             <tr style="background-color: #71b643;">
                                 <th>UNITS FOR COLLECTION</th>
                                 <th>TARGET-2023</th>
                                 <th>YTD</th>
                                 <!-- <th>Jun</th>
                                 <th>Jul</th>
                                 <th>Aug</th>
                                 <th>Sep</th>
                                 <th>Oct</th>
                                 <th>Nov</th>
                                 <th>Dec</th> -->
                                 <th>Jan-24</th>
                                 <th>Feb-24</th>
                                 <th>March-24</th>
                                 <th>Apr-24</th>
                                 <th>May-24</th>
                                 <th>Jun-24</th>
                                 <th>Jul-24</th>
                                 <th>Aug-24</th>
                                 <th>Sep-24</th>
                                 <th>Oct-24</th>
                                 <th>Nov-24</th>
                                 <th>Dec-24</th>
                             </tr>
                             <tbody>
                                 <tr>
                                     <?php
                                        //  0, 4, 11, 8, 0, 0,
                                        $turnover = ['The Median', 491, 499, '', '', '', '', '', '', '', '', '', '', '', ''];
                                        foreach ($turnover as $val) {
                                            echo '<td>' . $val . '</td>';
                                        }
                                        ?>
                                 </tr>
                             </tbody>
                             <tr style="background-color: #55bcb0;">
                                 <th>SQM TO BE LEASED (90%)</th>
                                 <th>GLA-2023</th>
                                 <th>YTD</th>
                                 <!-- <th>Jun</th>
                                 <th>Jul</th>
                                 <th>Aug</th>
                                 <th>Sep</th>
                                 <th>Oct</th>
                                 <th>Nov</th>
                                 <th>Dec</th> -->
                                 <th>Jan-24</th>
                                 <th>Feb-24</th>
                                 <th>March-24</th>
                                 <th>Apr-24</th>
                                 <th>May-24</th>
                                 <th>Jun-24</th>
                                 <th>Jul-24</th>
                                 <th>Aug-24</th>
                                 <th>Sep-24</th>
                                 <th>Oct-24</th>
                                 <th>Nov-24</th>
                                 <th>Dec-24</th>
                             </tr>
                             <tbody>
                                 <tr>
                                     <?php
                                        //  Jun='78.95%', Jul='78.95%', Aug='78.95%', Sep='78.95%', Oct='78.95%', Nov='78.95%', Dec='79.25%',
                                        $turnover = ['Manila Offices', '73,068.31', '60,399.99', '79.25%', '81.18%', '82.66%', '', '', '', '', '', '', '', '', ''];
                                        foreach ($turnover as $val) {
                                            echo '<td>' . $val . '</td>';
                                        }
                                        ?>
                                 </tr>
                                 <tr>
                                     <?php
                                        //  Jun='90.35%', Jul='95.34%', Aug='96.38%', Sep='96.38%', Oct='96.38%', Nov='97.9%', Dec='97.9%',
                                        $turnover = ['Cebu Offices', '123,369.91', '119,565.87', '96.92%', '96.92%', '96.92%', '', '', '', '', '', '', '', '', ''];
                                        foreach ($turnover as $val) {
                                            echo '<td>' . $val . '</td>';
                                        }
                                        ?>
                                 </tr>
                                 <tr>
                                     <?php
                                        $turnover = ['Industrial/Warehouses', '62,689.23', '62,689.23', '100.00%', '100.00%', '100.00%', '', '', '', '', '', '', '', '', ''];
                                        foreach ($turnover as $val) {
                                            echo '<td>' . $val . '</td>';
                                        }
                                        ?>
                                 </tr>
                             </tbody>
                         </table>
                     </div>
                     <button class="accordion" style="position:relative;">
                         <!-- <b style="float:right;"><img id="down" style="height:15px;" src="fonts/arrowdown.png" alt=""></b> -->
                         <center>
                             <b>NUMBER OF REFERRALS BY EMPLOYEES </b>
                             <div style="margin: 0; padding:0;"><em style="text-decoration: underline; color:blue;">Click for more details</em></div>
                         </center>
                     </button>
                     <table class="table table-bordered table-sm" id="reff" style="width: 100%; font-size: 1.3rem;">
                         <tr style="background-color: #71b643;">
                             <th>NO OF REFERRALS BY EMPLOYEES</th>
                             <th>JUN-23</th>
                             <th>JULY-23</th>
                             <th>AUG-23</th>
                             <th>SEP-23</th>
                             <th>OCT-23</th>
                             <th>NOV-23</th>
                             <th>DEC-23</th>
                         </tr>
                         <tbody>
                             <tr>
                                 <td>Legal Compliance</td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                             </tr>
                             <tr>
                                 <td>Leasing</td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                             </tr>
                             <tr>
                                 <td>Marketing</td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                             </tr>
                             <tr>
                                 <td>Sales</td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                             </tr>
                             <tr>
                                 <td>Engineering</td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                             </tr>
                             <tr>
                                 <td>Operations</td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                             </tr>
                             <tr>
                                 <td>PMC</td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                             </tr>
                             <tr>
                                 <td>PMO</td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                             </tr>
                             <tr>
                                 <td>Accounting</td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                             </tr>
                             <tr>
                                 <td>Business Proc-Sup Services</td>
                                 <td></td>
                                 <td>2</td>
                                 <td>6</td>
                                 <td>1</td>
                                 <td>5</td>
                                 <td></td>
                                 <td>2</td>
                             </tr>
                             <tr>
                                 <td>HR</td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                             </tr>
                             <tr>
                                 <td>IT</td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                             </tr>
                             <tr>
                                 <td>SCM</td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                             </tr>
                         </tbody>
                     </table>
                 </div>
                 <div class="modal-footer mt-0">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 </div>
             </div> <!-- end of modal-content -->
         </div><!-- end of modal dialog -->
     </div> <!-- end of modal -->