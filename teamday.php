<?php
				    $pathT="EVENTS-IMAGES/teamdayoctober2014/";
					$imagesT = glob($pathT."*.jpg");
					foreach($imagesT as $imageT) {
					echo '<a href="'.$imageT.'" class="lightview" 
                    data-lightview-group="csr"
                    data-lightview-title="CSR" 
                    data-lightview-caption="Candle Making">CSR: Candle Making</a><br /><br />';
					}
				?>