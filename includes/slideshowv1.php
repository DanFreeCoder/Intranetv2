<link rel="stylesheet" href="dist/css/lightview.css"/>

<script src="dist/js/jquery.min.js" type="text/javascript"></script>
<script src="dist/js/swfobject.js" type="text/javascript"></script>
<script src="dist/js/excanvas/excanvas.js" type="text/javascript"></script>
<script src="dist/js/lightview/lightview.js" type="text/javascript"></script>
<script src="dist/js/spinners/spinners.min.js" type="text/javascript"></script>

<?php 
  error_reporting(E_ALL ^ E_DEPRECATED);
?>

<?php

echo '  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
      
        <div class="item active">
          <img src="images/slides/FEBBDAY2.jpg">
           <div class="carousel-caption" style="height:100%">
		   ';
		   ?>
		   <?php 
		   
		      mysql_connect('192.168.2.2','admin','admin') or die (mysql_error());
					mysql_select_db("slideshow") or die (mysql_error());
					
					$month = date('F');
					
					$birth=mysql_query("SELECT * FROM tblbirthdays WHERE birth_date LIKE '%February 2017%' ORDER BY birth_id") or die (mysql_error());
					
					while($rows=mysql_fetch_array($birth)){
						$path=$rows['birth_path'];
						$images2 = glob($path."".$rows['birth_imgname']);
						foreach($images2 as $image2) {
							echo '<div style="padding-top:40%">
							<a href="'.$image2.'" class="lightview btn btn-default btn-lg" 
							data-lightview-group="fadf"
							data-lightview-title="'.$rows['birth_name'].'"
							data-lightview-caption="'.$rows['birth_date'].'">View</a></div>';
						}
					}
		   
?>
			<?php 
			echo'
            <p></p>
          </div>
        </div><!-- End Item -->
         
         <div class="item">
          <img src="images/slides/christmas2016.jpg">
           <div class="carousel-caption" style="height:100%;">
           ';
		   ?>   
           <?php
				   $pathT="EVENTS-IMAGES/Christmas/Photos/";
					 $imagesT = glob($pathT."*.jpg");
					 foreach($imagesT as $imageT) {
					  
					 echo '<div style="padding-top:40%; font-weight:bold">
				           	<a href="'.$imageT.'" class="lightview btn btn-default btn-lg" 
                            data-lightview-group="Christmas"
                            data-lightview-title="Christmass" 
                            data-lightview-caption="Innogroup Christmas 2016">View Photos</a><br>
				 		   </div>';
				     }
				?>
		   
            <?php 
		   echo'
            <p></p>
            </div>
        </div><!-- End Item -->
          
        <div class="item">
          <img src="images/slides/csrfeeding.jpg" >
           <div class="carousel-caption"style="height:100%;">
		   ';
		   ?>
           <?php 
		    $pathT="EVENTS-IMAGES/CSR/csrfeeding/";
					$imagesT = glob($pathT."*.jpg");
					foreach($imagesT as $imageT) {
					 
					echo '<div style="padding-top:40%">
				          	<a href="'.$imageT.'" class="lightview btn btn-default btn-lg" 
                           data-lightview-group="csr"
                           data-lightview-title="CSR" 
                           data-lightview-caption="CSR: Feeding Program by Sales and Engineering Department">View Photos</a><br>
						   </div>';
				    }
				?>
		   
           <?php
		    echo '<p></p>
          </div>
        </div><!-- End Item -->
        
        <div class="item">
          <img src="images/slides/upcomingevents.jpg">
           <div class="carousel-caption" style="height:100%">
           ';
		   ?>
              <?php 
		    $pathupcom="";
					$imagesupcom = glob($pathupcom."*.jpg");
					foreach($imagesupcom as $imageupcom) {
					 
					echo '<div style="padding-top:40%">
				          	<a href="'.$imageupcom.'" class="lightview btn btn-default btn-lg" 
                           data-lightview-group="news"
                           data-lightview-title="Done" 
                           data-lightview-caption="News and Events"></a><br>
						   </div>';
				    }
				?>
           <?php echo'
            <p></p>
          </div>
        </div><!-- End Item -->
                
      </div><!-- End Carousel Inner -->


		<ul class="nav nav-pills nav-justified">
          <li data-target="#myCarousel" data-slide-to="0"><a href="#" style="background:url(images/bg.png); color:#FFFFFF";>Innogroup Christmas 2016<small></small></a></li>
          <li data-target="#myCarousel" data-slide-to="1"><a href="#" style="color:#000000;">CSR : Feeding Program<small></small></a></li>
          <li data-target="#myCarousel" data-slide-to="2"><a href="#" style="color:#000000;">News & Events<small></small></a></li>
          <li data-target="#myCarousel" data-slide-to="3"><a href="#" style="color:#000000;">Birthdays<small></small></a></li>
        </ul>


    </div><!-- End Carousel -->';
?>
        <div class="modal" id="bday" role="dialog">
          <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal">x</button><br>
                <h3 class="modal-title"></h3>
            </div>
            <div class="modal-body">
                <div id="modalCarousel"  class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="item"><!-- Start Item -->
                    </div>
                    <!-- End Item --> 
                  </div>
                  
                  <a class="carousel-control left" href="#modaCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                  <a class="carousel-control right" href="#modalCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                  
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
           </div>
          </div>
        </div>




 <div class="modal fade" id="teamday">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true" data-dismiss = "modal">&times;</button>
                    <h4 class="modal-title">Christmas Party 2016</h4>
                </div>
                <div class="modal-body next">
                <?php
				    $pathT="EVENTS-IMAGES/teamdayoctober2014/";
					$imagesT = glob($pathT."*.jpg");
					if(is_dir($pathT))
					{
					   if($dh = opendir($pathT))
					   {
					      while(($file = readdir($dh)) !== false)
						  {
						     //echo '<img src="'.$pathT.'/'.$file.'" style="width:100%"></img>';
							  
						  }
					   }
					}
				?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
   


<script>

/* copy loaded thumbnails into carousel */
$('.row .thumbnail').on('load', function() {
  
}).each(function(i) {
  if(this.complete) {
      var item = $('<div class="item"></div>');
    var itemDiv = $(this).parents('div');
    var title = $(this).parent('a').attr("title");
    
    item.attr("title",title);
  	$(itemDiv.html()).appendTo(item);
  	item.appendTo('.carousel-inner'); 
    if (i==0){ // set first item active
     item.addClass('active');
    }
  }
});

/* activate the carousel */
$('#modalCarousel').carousel({interval:false});

/* change modal title when slide changes */
$('#modalCarousel').on('slid.bs.carousel', function () {
  $('.modal-title').html($(this).find('.active').attr("title"));
})

/* when clicking a thumbnail */
$('#viewbirthdays').click(function(){
    var idx = $(this).parents('div').index();
  	var id = parseInt(idx);
  	$('#birthdays').modal('show'); // show the modal
    $('#modalCarousel').carousel(id); // slide carousel to selected
  	
});
              
</script>
