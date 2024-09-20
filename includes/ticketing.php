<?php
include_once('config/clsConnectionTicketing.php');
include_once('objects/clsTicketing.php');
//Ticketing connection
$database = new clsConnectionTicketing();
$db = $database->connect();

$ticket = new Ticketing($db);
?>
<br>
<div id="new-ticket" class="panel panel-default" hidden>
    <div class="panel-heading"><h4>Ticket Request Details</h4></div>
	    <div class="panel-body">
            <div class="form-group row">
                <label class="col-sm-3 text-right control-label col-form-label">Location</label>
                <div class="col-md-7">
                    <select class="form-control" id="location" style="width: 100%; height:40px;">
                        <option value="0" selected disabled>Select Location Here</option>
                        <option value="1">Cebu</option>
                        <option value="2">Manila</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 text-right control-label col-form-label">Category</label>
                <div class="col-md-7">
                    <input id="user-id" class="form-control" value="<?php echo $_SESSION['user-id']?>" style="display: none">
                    <select class="select2 form-control category" id="category" style="width: 100%; height:40px;">
                        <option value="0" selected disabled>Select Category Here</option>
                        <?php
                            $view = $ticket->get_categories();

                            while($row=$view->fetch(PDO::FETCH_ASSOC))
                            {
                                echo '<option value="'.$row['id'].'">'.$row['category'].'</option>';
                            }
                        ?>      
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 text-right control-label col-form-label">Sub-Category</label>
                <div class="col-md-7">
                    <select class="select2 form-control sub-category" id="sub-category" style="width: 100%; height:40px;">
                       <option value="0" selected disabled>Select Sub-Category Here</option>
                        <!-- sub category list here -->
                    </select>
                </div>
            </div>
             <div class="form-group row">
                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Urgency</label>
                <div class="col-md-7">
                    <select class="select2 form-control" id="urgency" style="width: 100%; height:40px;">
                        <option value="0" selected disabled>Select Urgency Here</option>
                        <option value="1">Low Urgency</option>
                        <option value="2">Med Urgency</option>
                        <option value="3">High Urgency</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">                
                <label for="fname" class="col-sm-3 control-label col-form-label text-right">Additional Details</label>
                <div class="col-sm-7">
                   <textarea id="detail" class="form-control" rows="4" placeholder="Additional details of your request here. . ."></textarea>
                </div>
            </div>
            <div>
                <div class="col-sm-12">
                    <div id="warning" class="alert alert-danger" role="alert" style="display: none;"></div>
                    <div id="success" class="alert alert-success" role="alert" style="display: none;"></div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-10 text-right">
                    <a id="submit" class="btn btn-success" style="color: white"><i class="mdi mdi-arrow-right-box"></i> Submit Request</a>
                    <a id="clear-req" class="btn btn-info" style="color: white"><i class="mdi mdi-arrow-right-box"></i> Clear</a><br>
                </div>
            </div>
    	</div>
</div>
<script>
$('#new_ticket').click(function(e){
	e.preventDefault();

	$('#ticket-request').toggle();
})
</script>