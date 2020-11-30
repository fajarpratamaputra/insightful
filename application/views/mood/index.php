    
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
										<canvas id="moodGrafik" height="150"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>                 
					<div class="col-xl-12 col-xxxl-12 col-lg-12">
						<div class="card widget-media">
							<div class="card-header border-0 pb-0 ">
								<h4 class="text-black">Mood Table</h4>
							</div>
							<div class="card-body">
										<div class="table-responsive">
											<table id="example4" class="display" style="min-width: 845px">
												<thead>
													<tr>
														<th>No</th>
														<th>Email</th>
														<th>Mood</th>
														<th>Date </th>
													</tr>
												</thead>
												<tbody>
													<?php
														$no = 0;
														foreach($mood as $m){
													?>
													<tr>

														<td><?=++$no?></td>
														<td><?=$m->employee_email?></td>
														<td>
															<?php 
																if($m->mood == 1) {
																	echo "Sedih";
																} elseif($m->mood == 2) {
																	echo "Biasa";
																} elseif($m->mood == 3) {
																	echo "Senang";
																}
															?>
														</td>
														<td><?=$m->date?></td>
														
													</tr>
													<?php } ?>
												</tbody>
												<tfoot>
													<tr>
														<th>No</th>
														<th>Email</th>
														<th>Mood</th>
														<th>Date</th>
													</tr>
												</tfoot>
											</table>
										</div>
									</div>

							
							
						</div>
                    </div>
                    
				</div>
            </div>
        </div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <script type="text/javascript">
    var ctx = document.getElementById('moodGrafik').getContext('2d');
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