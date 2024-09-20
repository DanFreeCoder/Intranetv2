<?php
include "../config/clsConnectionIntranet.php";
include "../objects/clsPosts.php";
include "../objects/clsDepartment.php";
include "../objects/clsPostAttachments.php";

$database = new clsConnectionIntranet();
$db = $database->connect();

$post = new Posts($db);
$dept = new Department($db);
$attach = new PostAttachments($db);

	$date = $_POST['date'];
	$dept_id = $_POST['dept_id'];
	$dept_id1 = $_POST['dept_id1'];

	if($dept_id == '')
	{
		$dept_id = $_POST['dept_id1'];
	}
	
	$dept->new_date = $date;
	$dept->id = $dept_id;
	$display_dept = $dept->view_more_dept();
	$countDept = $display_dept->rowCount();

	  while($row=$display_dept->fetch(PDO::FETCH_ASSOC))
	  {
	    extract($row);
	      echo '
	            <div class="panel panel-success">
	              <div class="panel-heading"><h4><strong>'.$dept.'</strong></div>
	                <div class="panel-body">';

	                //display the post by its department
	            	$post->department = $deptId;
                    $display_post = $post->display_post_bydept();

                    while($row=$display_post->fetch(PDO::FETCH_ASSOC))
                    {

                      $date_added = $row['date_added'];
                      $date_add = date("M d, Y", strtotime($date_added));
                      
                      extract($row);
                      echo '
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <strong>'.$type.'</strong>                   
                            </div>
                              <div class="panel-body">
                                <form>
                                  <p>'.$details.'</p><br>';
                                  	//display the image attachment
                                    $attach->attach_id = $post_ID;
                                    $disp_attach = $attach->display_attach();
                                    while($row=$disp_attach->fetch(PDO::FETCH_ASSOC))
                                    {
                                      extract($row);                                                                        
                                      if($attach_id == $post_ID)
                                      {
                                        echo '<center><img id="attachImage" src="'.$image_path.'" style="width: 75%; height:75%;"/></center>';
                                      }                                                                       
                                    }                                                                                        
                            echo '</form>
                            </div>
                            <div class="panel-footer" align="right"><i> Date Posted: '.$date_added.' </i></div>
                          </div>';
                    } 
              echo '</div>
              </div>';

      }

    if($countDept > 4)
	{
		echo '<div class="show_more_post" id="show_more_post<?php echo $new_date; ?>">
	            <center><span id="'.$new_date.'" class="show_more">Show Older Posts</span>
	            <input style="display:none" class="form-control next_id" id="dept_id '.$deptId.'">
	            <input style="display:none" class="form-control next_id" id="dept_id1" value="'.$deptId.'">
	           	<span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></center>                                  
	      	  </div>';
	}
	else
	{
		echo '<div class="back_to_top">
	            <center><a href="#" class="show_more">Back to top</a>
	            <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></center>                                 
	      	  </div><br>';
	}

?>