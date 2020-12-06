    
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
                  <form action="<?=base_url('analytics/index');?>" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                      <label for="">Date</label>
                      <input type="date" name="date" class="form-control input-default " placeholder="date">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                    <button type="submit" class="btn btn-primary">Reset</button>
                  </form>
                </div>
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
            if (count($graph)>0) {
              foreach ($graph as $data) {
                echo "'" .date('d-m-Y', strtotime($data->datetime))."',";
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
                if (count($graph)>0) {
                   foreach ($graph as $data) {
                    echo "'" .($data->value)."',";
                  }
                }
              ?>
            ]
        }]
      },
    });
</script>