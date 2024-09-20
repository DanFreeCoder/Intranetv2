<?php
$display = $dept->view_dept();
//display post by department
while($row=$display->fetch(PDO::FETCH_ASSOC))
{
    echo '
        <div class="panel panel-success">
          <div class="panel-heading"><h4><strong>'.$row['dept'].'</strong></div>
            <div class="panel-body">';
              $post->department = $row['dept_id'];
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
                          
                            <p>'.$details.'</p><br>';
                              $attach->attach_id = $row['post_ID'];
                              $disp_attach = $attach->display_attach();
                              while($row=$disp_attach->fetch(PDO::FETCH_ASSOC))
                              {
                                extract($row);                                                                        
                                if($attach_id == $post_ID)
                                {
                                  echo '<center><img id="attachImage" src="'.$row['image_path'].'" style="width: 75%; height: 75%;"/></center>';
                                }                                                                       
                              }                                                                                        
                      echo '
                      </div>
                      <div class="panel-footer" align="right"><i> Date Posted: '.$date_add.' </i></div>
                    </div>';
              }                                                     
      echo '</div>
          </div>';
}//end of while loop
?>