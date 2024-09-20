<!-- Bootstrap Core CSS -->
<!--<link href="dist/css/bootstrap.css" rel="stylesheet" type="text/css">-->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<link href="dist/css/style.css" rel="stylesheet">    
<link href="dist/css/responsive-calendar.css" rel="stylesheet" />
<link href="dist/css/bootstrap-multiselect.css" rel="stylesheet" />
<link href="dist/css/dataTables.css" rel="stylesheet" />

<?php 
include_once "config/clsConnectionIntranet.php";
include_once "objects/clsPosts.php";
include_once "objects/clsDepartment.php";
include_once "objects/clsPostAttachments.php";
//Opens a connection
$database = new clsConnectionIntranet();
$db = $database->connect();

$post = new Posts($db);
$dept = new Department($db);
$attach = new PostAttachments($db);
  
  $display = $dept->view_dept();

   while($row=$display->fetch(PDO::FETCH_ASSOC))
   {
      extract($row);
        echo '
              <div class="panel panel-success">
                <div class="panel-heading"><h4><strong>'.$dept.'</strong></div>
                  <div class="panel-body">';

                    $post->department = $dept_id;
                    $display_post = $post->display_post_bydept();

                    while($row=$display_post->fetch(PDO::FETCH_ASSOC))
                    {

                      $date_added = $row['date_added'];
                      $date_add = date("F d, Y", strtotime($date_added));

                      extract($row);
                      echo '
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <strong>'.$type.'</strong>                      
                            </div>
                              <div class="panel-body">
                                <form>
                                  <p>'.$details.'</p><br>';

                                    $attach->attach_id = $post_ID;
                                    $disp_attach = $attach->display_attach();
                                    while($row=$disp_attach->fetch(PDO::FETCH_ASSOC))
                                    {
                                      extract($row);                                                                        
                                      if($attach_id == $post_ID)
                                      {
                                        echo '<center><img id="attachImage" src="'.$image_path.'" style="width:100%; height:auto;"/></center>';
                                      }                                                                       
                                    }                                                                                        
                            echo '</form>
                            </div>
                            <div class="panel-footer" align="right"><i> Date Posted: '.$date_add.' </i></div>
                          </div>';
                    }                                                     
            echo '</div>
                </div>';
    }//end of while loop
?>
 <div class="show_more_post" id="show_more_post <?php echo $new_date; ?>">
   <?php
   echo '<center><span id="'.$new_date.'" class="show_more">Show Older Posts</span>
          <input style="display:none" class="form-control" id="dept_id" value="'.$dept_id.'">
          <span id="loding" style="display: none;"><span id="loding_txt">Loading...</span></center><br>';
  ?>
</div>

<script src="dist/js/jquery.min.js" type="text/javascript"></script>
<script src="dist/js/bootstrap.js" type="text/javascript"></script>  
<script src="dist/js/bootstrap-multiselect.js" type="text/javascript"></script>
<script src="dist/js/jquery.dataTables.js" type="text/javascript"></script>
<script src="dist/js/dataTables.bootstrap.min.js" type="text/javascript"></script>