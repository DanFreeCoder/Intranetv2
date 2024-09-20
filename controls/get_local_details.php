<?php
include '../config/clsConnectionIntranet.php';
include '../objects/clsContacts.php';

$database = new clsConnectionIntranet();
$db = $database->connect();

$contacts = new Contacts($db);

$id = IMPLODE(',',$_POST['num_id']);
$contacts->id = $id;

$get = $contacts->view_local_details();
while($row = $get->fetch(PDO:: FETCH_ASSOC))
{
    echo '<div class="row">
            <div class = "col-sm-3"><strong>Trunkline </strong></div>
            <div class = "col-sm-9">
              <select id="upd-trunkline" class="form-control">';
                if($row['trunkline'] == 2){
                  echo '<option class="form-control" value="1">Cebu</option>
                        <option class="form-control" value="2" selected>Manila</option>';
                }elseif($row['trunkline'] == 1){
                  echo '<option class="form-control" value="1" selected>Cebu</option>
                        <option class="form-control" value="2">Manila</option>';
                }else{
                  echo '<option class="form-control" value="1">Cebu</option>
                        <option class="form-control" value="2">Manila</option>';
                }
              echo '</select>
            </div>
          </div><br>
          <div class="row">
            <div class = "col-sm-3"><strong>Local Number </strong></div>
            <div class = "col-sm-9">
                <input class="form-control" id="id" value="'.$row['id'].'" style="display:none"/>
                <input class="form-control" id="local-num" value="'.$row['local_no'].'"/>
            </div>
          </div><br>
          <div class="row">
            <div class = "col-sm-3"><strong>Department </strong></div>
            <div class = "col-sm-9">
                <input class="form-control" id="local-dept" style="text-transform:uppercase" value="'.$row['department'].'"/>
            </div>
          </div><br>
          <div class="row">
            <div class = "col-sm-3"><strong>Name</strong></div>
            <div class = "col-sm-9">
                <input class="form-control" id="local-name" value="'.$row['name'].'"/>
            </div>
          </div>';
}
?>