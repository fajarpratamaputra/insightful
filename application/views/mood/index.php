    
        <div class="content-body rightside-event">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">   
                	<div class="col-xl-12">
						<div class="card">
							<div class="card-body">
								<p class="font-w100 fs-20 text-black">Mood Grafik</p>
								<div class="row mx-0">
									<div class="col-sm-12 col-lg-12 px-0">
										<canvas id="ticketSold" height="150"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>                 
					<div class="col-xl-12 col-xxxl-12 col-lg-12">
						<div class="card widget-media">
							<div class="card-header border-0 pb-0 ">
								<h4 class="text-black">Mood Table</h4>
								<div class="dropdown ml-auto text-right">
									<div class="btn-link" data-toggle="dropdown">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="12" cy="5" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="19" r="2"></circle></g></svg>
									</div>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="javascript:void(0);">View Detail</a>
										<a class="dropdown-item" href="javascript:void(0);">Edit</a>
										<a class="dropdown-item" href="javascript:void(0);">Delete</a>
									</div>
								</div>
							</div>
							<div class="card-body timeline pb-2">
							<?php
                                $no = 1;
                                foreach($mood as $m){
                        	?>
								<div class="timeline-panel align-items-end">
									<div class="media mr-3">
										<h5><?=$no++?></h5>
									</div>
									<div class="media-body">
										<h5 class="mb-1"><?=$m->employee_email?></h5>
									</div>
									<div class="media-body">
										<h5 class="mb-1">
											<?php 
												if($m->mood == 1) {
													echo "Sedih";
												} elseif($m->mood == 2) {
													echo "Biasa";
												} elseif($m->mood == 3) {
													echo "Senang";
												}
											?>
										</h5>
									</div>
									<p class="mb-0 fs-14"><?=$m->date?></p>
								</div>
							<?php }?>
							</div>
							<div class="card-footer border-0 pt-0 text-center">
								<a href="javascript:void(0);" class="btn-link">View more <i class="fa fa-angle-down ml-2 scale-2"></i></a>
							</div>
						</div>
                    </div>
                    
				</div>
            </div>
        </div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <script type="text/javascript">
    var ctx = document.getElementById('ticketSold').getContext('2d');
    var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
          <?php
            if (count($graph)>0) {
              foreach ($graph as $data) {
                echo "'" .$data->date ."',";
              }
            }
          ?>
        ],
        datasets: [{
            label: 'Tertekan',
            backgroundColor: '#FF6347',
            borderColor: '##93C3D2',
            data: [
              <?php
                if (count($graph)>0) {
                   foreach ($graph as $data) {
					$mood_count = $this->db->query("select COUNT(mood) as a from `mood_record` where mood = 1 and date = '$data->date' group by mood ;")->row();
					if(!empty($mood_count->a)) {
						echo $mood_count->a . ", ";
					} else {
						echo 0 , ", ";
					}
					
                  }
                }
              ?>
            ]
        },{
            label: 'Nyaman',
            backgroundColor: '#ADD8E6',
            borderColor: '##93C3D2',
            data: [
              <?php
                if (count($graph)>0) {
                   foreach ($graph as $data) {
					$mood_count = $this->db->query("select COUNT(mood) as a from `mood_record` where mood = 2 and date = '$data->date' group by mood ;")->row();
					if(!empty($mood_count->a)) {
						echo $mood_count->a . ", ";
					} else {
						echo 0 , ", ";
					}
					
                  }
                }
              ?>
            ]
        },{
            label: 'Semangat',
            backgroundColor: '#FF8C00',
            borderColor: '##93C3D2',
            data: [
              <?php
                if (count($graph)>0) {
                   foreach ($graph as $data) {
					$mood_count = $this->db->query("select COUNT(mood) as a from `mood_record` where mood = 3 and date = '$data->date' group by mood ;")->row();
					if(!empty($mood_count->a)) {
						echo $mood_count->a . ", ";
					} else {
						echo 0 , ", ";
					}
					
                  }
                }
              ?>
            ]
        }]
    },
});
</script>