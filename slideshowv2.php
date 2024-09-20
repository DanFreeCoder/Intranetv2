<link rel="stylesheet" href="dist/css/lightview.css" />
<?php 
  error_reporting(E_ALL ^ E_DEPRECATED);
?>
 <div id="myCarousel" class="carousel slide" data-ride="carousel">
    
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
      
        <div class="item active">
          <img src="images/slides/BIRTHDAYS.jpg">
           <div class="carousel-caption">
            <h3><a href="#bday" data-toggle="modal" class="btn btn-success btn-lg">View Photos ::.</a></h3>
            <p></p>
          </div>
        </div><!-- End Item -->
 
         <div class="item">
          <img src="images/slides/teamday2014.jpg">
           <div class="carousel-caption">
           <h3><a href="#teamday" data-toggle="modal" class="btn btn-success btn-lg">View Photos ::.</a></h3>
            <p></p>
          </div>
        </div><!-- End Item -->
        
        <div class="item">
          <img src="images/slides/csrcandlemaking.jpg">
           <div class="carousel-caption">
           <h3><a href="#csr" class="btn btn-success btn-lg" id="viewphoto" data-id=2>View Photos ::.</a></h3>
            <p></p>
          </div>
        </div><!-- End Item -->
        
        <div class="item">
          <img src="images/slides/upcomingevents.jpg">
           <div class="carousel-caption">
            <h3><a href="#events" class="btn btn-success btn-lg" id="viewphoto" data-id=3>View Photos ::.</a></h3>
            <p></p>
          </div>
        </div><!-- End Item -->
                
      </div><!-- End Carousel Inner -->


		<ul class="nav nav-pills nav-justified">
          <li data-target="#myCarousel" data-slide-to="0"><a href="#" style="background:url(images/bg.png); color:#FFFFFF">February Birthday Celebrants<small></small></a></li>
          <li data-target="#myCarousel" data-slide-to="1"><a href="#" style="color:#000000;">Team Day<small></small></a></li>
          <li data-target="#myCarousel" data-slide-to="2"><a href="#" style="color:#000000;">CSR : Candle Making<small></small></a></li>
          <li data-target="#myCarousel" data-slide-to="3"><a href="#" style="color:#000000;">Upcoming Events<small></small></a></li>
        </ul>


    </div><!-- End Carousel -->';

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
                    <h4 class="modal-title">Teamday Pictures</h4>
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
