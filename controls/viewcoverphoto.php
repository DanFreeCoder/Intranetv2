<?php
	include "../config/clsConnectionIntranet.php";
	include "../objects/clsSliders.php";

	$database = new clsConnectionIntranet();
	$db = $database->connect();

	$slider = new Sliders($db);
	$slider->status = 1;
	$slider->title = $_POST['title'];

	$view = $slider->view();
	if($row = $view->fetch(PDO::FETCH_ASSOC))
	{
		extract($row);
		echo '<div class="row">
                        <div class="col-sm-6 col-md-3">
                            <a class="lightbox" href = "'. $row['feature_image_path'] .'">
                                <img src="' . $row['feature_image_path'].'" alt="'.$row['feature_image_title'].'" />
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-9">
                           <i> Reminder: The cover photo should have 1200 x 400 pixels in size. </i>
                        </div>
                      </div>
				';
	}
	else
	{
		echo '<div class="row">
                        <div class="col-sm-6 col-md-3">
                            <a class="lightbox" href = "uploads/park.jpg">
                                <img src="uploads/no-image.png" alt="No Image" />

                            </a>
                        </div>
                        <div class="col-sm-6 col-md-9">
                           <i> Reminder: The cover photo should have 1200 x 400 pixels in size. </i>
                        </div>
                      </div>
				';
	}
?>