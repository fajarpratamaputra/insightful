    
        <div class="content-body rightside-event">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">   
                	<div class="col-xl-12">
					<div class="card">
						<div class="card-header">
                                <h4 class="card-title">Basic Datatable</h4>
                            </div>
							<div class="card-body">
                                <div class="table-responsive">
                                    <table id="example4" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>User</th>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
												$no = 1;
												foreach($consultation as $consul){
											?>
                                            <tr>
                                                <td><?=$no++?></td>
                                                <td><?=$consul->username_user?></td>
                                                <td><a href="<?=base_url('consultation/detailConsultation?email='.$consul->email_user)?>" class="btn btn-warning btn-sm px-4">Detail</a></td>                                    
                                            </tr>
                                            <?php } ?>
                                        </tbody>
										<tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>User</th>
                                                <th>Detail</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
					</div>
				</div>
            </div>
        </div>
    