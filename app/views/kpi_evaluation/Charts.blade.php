     

       <?php 
			for( $i = 0; $i < count($dbLabels); $i++){
				
			if(isset($dbLabels[$i]['labels']) ){ // ignore empty offset

			echo ' <div class="row">
				<div class="col-md-6"> 
				<h4><i>Bar Chat for Data against '.$titles[$i].' </i></h4>
				<canvas id="mybarChart'.$i.'">
				</canvas>
				<button class="btn btn-sm btn-default" id="saveImg'.$i.'"> <i class="fa fa-download"></i> Export</button>
				</div>					
					<div class="col-md-6"> 
				<h4><i>line Chat for Data against '.$titles[$i].' </i></h4>
				<canvas id="mylineChart'.$i.'">
				</canvas>
				<button class="btn btn-sm btn-default" id="linesaveImg'.$i.'"> <i class="fa fa-download"></i> Export</button>
				</div></div>
					
					
				';
				
				//return var_dump($dataset);
		?>                       

				
        <script type="text/javascript">

		
		var i = {{$i}};
		var barimg = '#saveImg'+i;
		var pieimg = '#piesaveImg'+i;
		var lineimg = '#linesaveImg'+i;
		var barid = 'mybarChart'+i;
		var pieid = 'mypieChart'+i;
		var lineid = 'mylineChart'+i;
		var bar = '#mybarChart'+i;
		var pie = '#mypieChart'+i;
		var line = '#mylineChart'+i;
		
		$(barimg).click(function() {
		   $(bar).get(0).toBlob(function(blob){
		   saveAs(blob, "chart.png")
		   });
		});
		
		$(pieimg).click(function() {
		   $(pie).get(0).toBlob(function(blob){
		   saveAs(blob, "chart.jpg")
		   });
		});
			$(lineimg).click(function() {
		   $(line).get(0).toBlob(function(blob){
		   saveAs(blob, "chart.jpg")
		   });
		});
	
           if ($(bar).length ){
			  var ctx = document.getElementById(barid).getContext("2d");
			  var mybarChart = new Chart(ctx, {
				type: 'bar',
				data: {
				  labels: {{json_encode(array_values(array_unique($dbLabels[$i]['labels'])))}},
				  datasets: {{json_encode($dataset)}}
				},

				options: {
				  scales: {
					yAxes: [{
					  ticks: {
						beginAtZero: true
					  }
					}]
				  }
				}
			  });

			}
								
			 if ($(line).length ){

			  var ctx = document.getElementById(lineid).getContext("2d");
			  var mylineChart = new Chart(ctx, {
				type: 'line',
				data: {
				  labels: {{json_encode(array_values(array_unique($dbLabels[$i]['labels'])))}},
				  datasets: {{json_encode($linedataset)}}
				},
				options: {
				  scales: {
					yAxes: [{
					  ticks: {
						beginAtZero: true
					  }
					}]
				  }
				  
				}
			  });

			}
			
			 if ($(pie).length ){

			  var ctx = document.getElementById(pieid).getContext("2d");
			  var mypieChart = new Chart(ctx, {
				type: 'pie',
				data: {
				  labels:  {{json_encode(array_values(array_unique($dbLabels[$i]['labels'])))}},
				  datasets: {{json_encode($dataset)}}
				},
				otpions:{
					
					 legend:!1,responsive:!1
				}
				
			  });

			};
		
			
			
        </script>
			
			<?php }}?>
  
				