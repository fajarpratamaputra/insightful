    
        <div class="content-body rightside-event">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">   
          <div class="col-xl-4 col-xxxl-12 col-lg-4">
						<div class="card">
              <div class="card-header border-0 pb-0">
                <h4 class="card-title">Filter Grafik</h4>
              </div>
              <div class="card-body">
                <div class="basic-form">
                  <form action="<?=base_url('downloader/index');?>" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                      <label for="">Date</label>
                      <input type="date" name="date" class="form-control input-default " placeholder="date">
                    </div>
                    <button name="submit" type="submit" value="search" class="btn btn-primary">Search</button>
                    <button name="submit" type="submit" value="all" class="btn btn-primary">All</button>
                    <button name="submit" type="submit" value="reset" class="btn btn-primary">Reset</button>
                  </form>
                </div>
                <?php 
                    if(!empty($all)) { 
                      echo "</br><h6>Total download : ".$count->value."</h6>"; 
                    } elseif(!empty($count_search)) {
                      echo "</br><h6 style='font-size:10pt;'>Total download Pada ".date('d-m-Y',strtotime($count_search->datetime))." = ".$count_search->value."</h6>"; 
                    }
                ?>
              </div>
            </div>
          </div>
          <div class="col-xl-8">
						<div class="card">
							<div class="card-body">
								<p class="font-w100 fs-20 text-black">Download Grafik</p>
								<div class="row mx-0">
									<div class="col-sm-12 col-lg-12 px-0">
										<canvas id="downloadGrafik" height="150"></canvas>
									</div>
								</div>
							</div>
						</div>

					</div>              
				</div>
      </div>
    </div>
    
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <script type="text/javascript">
    var ctx = document.getElementById('downloadGrafik').getContext('2d');
    var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
          <?php
            if(!empty($graph)) {
              if (count($graph)>0) {
                foreach ($graph as $data) {
                  echo "'" .date('d-m-Y', strtotime($data->datetime))."',";
                }
              }
            } else {
              foreach ($all as $data) {
                echo "'Total Download',";
              }
            }
          ?>
        ],
        datasets: [{
            label: 'Downloads',
            backgroundColor: '#FF6347',
            borderColor: '##93C3D2',
            data: [
              <?php
                if(!empty($graph)){
                  if (count($graph)>0) {
                    foreach ($graph as $data) {
                     echo "'" .($data->value)."',";
                   }
                  }
                }else {
                  foreach ($all as $data) {
                    echo "'" .($data->value)."',";
                  }
                }
                
              ?>
            ]
        }]
      },
    });
</script>