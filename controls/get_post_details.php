<?php
include '../config/clsConnectionIntranet.php';
include '../objects/clsPosts.php';
include '../objects/clsDepartment.php';

$database = new clsConnectionIntranet();
$db = $database->connect();

$post = new Posts($db);
$dept = new Department($db);

$id = IMPLODE(',',$_POST['post_id']);
$post->id = $id;

$get = $post->view_post_details();
while($row = $get->fetch(PDO:: FETCH_ASSOC))
{
    echo '<div class="row">
            <div class = "col-sm-3"><strong>Title </strong></div>
            <div class = "col-sm-6">
                <input class="form-control" id="post-id" value="'.$row['id'].'" style="display:none"/>
                <input class="form-control" id="title" placeholder="input Post title here" value="'.$row['type'].'"/>
            </div>
          </div><br>
          <div class="row">
            <div class = "col-sm-3"><strong>Department </strong></div>
            <div class = "col-sm-6">
                <select class="form-control" id="department">';
                    $view = $dept->view();
                    while($row1 = $view->fetch(PDO::FETCH_ASSOC))
                    {
                        if($row['department'] == $row1['id']){
                            echo '<option value="'.$row1['id'].'" selected>'.$row1['department'].'</option>';
                        }else{
                            echo '<option value="'.$row1['id'].'">'.$row1['department'].'</option>';
                        }
                    }              
            echo '</select>
            </div>
          </div><br>
          <div class="row" style="padding-top:5px;">
            <div class="col-md-12">
                <textarea class="form-control" id="details" placeholder="Good day!! Want to post something?" rows="4">'.$row['details'].'</textarea>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-success form-control" id="attach" style="width: 30%">+ Replace Photo</button>
            </div>
        </div>';
}
?>
<!-- hide after selecting a photo -->
<script>
  $("#done").on('click', function(e){
    e.preventDefault();
    $("#upload_image").modal('hide');
  });

  //show modal
  $("#attach").on('click', function(e){
    e.preventDefault();
    $("#upload_image").modal('show');
  });
</script>