    
        <div class="content-body rightside-event">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">   
                <div class="col-xl-12">
						
					<div class="col-xl-12 col-xxxl-12 col-lg-12">
						<div class="card widget-media">
							<div class="card-header border-0 pb-0 ">
								<h4 class="text-black">List User</h4>
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
							<?php
                                $no = 1;
                                foreach($consultation as $consul){
                        	?>
								<div class="card-body timeline pb-2">
									<div class="timeline-panel align-items-end">
										<div class="media-body">
											<h5><?=$no++;?></h5>
										</div>
										<div class="media-body">
											<h5 class="mb-1"><a class="text-black" href="javascript:void(0);"><?=$consul->email_user;?></a></h5>
										</div>
										<div class="media-body">
											<a href="<?=base_url('consulttaion/detailConsultation/'.$consul->email_user)?>" class="btn btn-warning btn-sm px-4">Detail</a>
										</div>
										
									</div>
								</div>
							<?php } ?>
						</div>
                    </div>
                    
				</div>
            </div>
        </div>
    