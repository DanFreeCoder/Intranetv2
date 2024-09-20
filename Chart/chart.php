     <!-- Chart -->
     <div class="modal fade" id="chart-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog modal-xl" style="width: 90%;">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title"><span style="color:green">Inno</span>Chart</h4>
                 </div>
                 <div class="modal-body">
                     <center>
                         <h3>SHARED GOALS FOR 2023</h3>
                     </center>
                     <ul class="nav nav-tabs" data-tabs="tabs">
                         <li role="presentation" class="active tab-label"><a href="#unitToBeSold" data-toggle="tab">UNITS TO BE SOLD</a></li>
                         <li role="presentation" class="tab-label"><a href="#unit_for_turnover" data-toggle="tab">UNITS FOR TURN OVER</a></li>
                         <li role="presentation" class="tab-label"><a href="#unit_for_collection" data-toggle="tab">UNITS FOR COLLECTION</a></li>
                         <li role="presentation" class="tab-label"><a href="#sqm_to_leased" data-toggle="tab">SQM TO BE LEASED</a></li>
                         <li role="presentation" class="tab-label"><a href="#no_refferals" data-toggle="tab">NO. OF REFFERALS BY EMPLOYEES</a></li>
                         <li role="presentation" class="tab-label"><a href="#combined_occupancy" data-toggle="tab">COMBINED OCCUPANCY</a></li>
                     </ul>
                     <div id="my-tab-content" class="tab-content">
                         <div class="tab-pane active" id="unitToBeSold">
                             <!-- UNITS TO BE SOLD CHART -->
                             <canvas id="unitToBeSoldChart" style="position: relative; height:30vh; width:50vw;background-color:whitesmoke;"></canvas>
                         </div>
                         <div class="tab-pane" id="unit_for_turnover">
                             <!-- UNITS FOR TURN OVER CHART -->
                             <canvas id="unitsForTurnOver" style="position: relative; height:30vh; width:50vw; background-color:whitesmoke;"></canvas>
                         </div>
                         <div class="tab-pane" id="unit_for_collection">
                             <!-- UNITS FOR COLLECTION CHART -->
                             <canvas id="unitsForCollection" style="position: relative; height:30vh; width:50vw; background-color:whitesmoke;"></canvas>
                         </div>
                         <div class="tab-pane" id="sqm_to_leased">
                             <!-- SQM TO BE LEASED -->
                             <canvas id="sqmToBeLeased" style="position: relative; height:30vh; width:50vw; background-color:whitesmoke;"></canvas>
                         </div>
                         <div class="tab-pane" id="no_refferals">
                             <!-- NO. OF REFFERALS BY EMPLOYEES -->
                             <canvas id="Refferals" style="position: relative; height:30vh; width:50vw; background-color:whitesmoke;"></canvas>
                         </div>
                         <div class="tab-pane" id="combined_occupancy">
                             <!-- COMBINED OCCUPANCY -->
                             <canvas id="combined" style="position: relative; height:30vh; width:50vw; background-color:whitesmoke;"></canvas>
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 </div>
             </div>
         </div>
     </div>
     <!-- End of Chart -->