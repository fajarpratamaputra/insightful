<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
                <div class="row">
					<div class="col-xl-12">
						<div class="card">
							
							<div class="card-header">
                                <h4 class="card-title">List Category Chat Group</h4>
                                <div class="col-lg-3 mb-4 mb-lg-0">
                                    <a href="<?=base_url()?>chatgroup/addChatGroup" class="btn btn-primary light btn-lg btn-block rounded shadow px-2">+New Category</a>
                                </div>
                            </div>
						</div>
					</div>
					<div class="col-xl-12">	
						<div class="tab-content">
							<div id="navpills-1" class="tab-pane active">
								<div class="table-responsive table-hover fs-14">
									<table class="table display mb-4 dataTablesCard fs-14" id="example5">
										<thead>
											<tr>
												<th style="width:250px;">Category</th>
                                                <th class="d-none d-lg-table-cell">Date & Time</th>
                                                <th class="d-none d-lg-table-cell">Psychologist</th>
												<th class="d-none d-lg-table-cell">Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
                                                $no = 0;
                                                foreach($chatgroup as $chat){
                                            ?>
											<tr>
												<td>
													<div class="media align-items-center">
														<div class="media-body">
															<h4 class="text-black font-w600 mb-1 wspace-no"><?=$chat->title?></h4>
														</div>
													</div>
												</td>
												<td class="d-none d-lg-table-cell">
													<span><?=date('D, M Y', strtotime($chat->date)).' '.$chat->time?></span>
												</td>
												<td>
													<div class="media align-items-center">
														<div class="media-body">
															<h4 class="text-black font-w600 mb-1 wspace-no"><?=$chat->fullname?></h4>
														</div>
													</div>
												</td>
												<td>
													<div class="media align-items-center">
														<div class="media-body">
															<span><?php echo ($chat->status == 1 ? 'Accept' : 'Waiting' ); ?></span>
														</div>
													</div>
												</td>
												<td>
													<div class="dropdown ml-auto text-right">
														<div class="btn-link" data-toggle="dropdown">
															<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="<?=base_url('category/edit/')?>">Publish</a>
															<a class="dropdown-item" href="<?=base_url('chatGroup/edit/'.$chat->id)?>">Edit</a>
															<a class="dropdown-item" href="<?=base_url()?>chatGroup/chat">Detail</a>
															<a class="dropdown-item" href="<?=base_url('chatGroup/delete/'.$chat->id)?>">Delete</a>
														</div>
													</div> 
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>

						</div>
					</div>
				</div>
            </div>
        </div>

        <script>
		(function($) {
			var table = $('#example5').DataTable({
				searching: false,
				paging:true,
				select: false,
				//info: false,         
				lengthChange:false 
				
			});
			var table = $('#example3').DataTable({
				searching: false,
				paging:true,
				select: false,
				//info: false,         
				lengthChange:false 
				
			});
			var table = $('#example4').DataTable({
				searching: false,
				paging:true,
				select: false,
				//info: false,         
				lengthChange:false 
				
			});
			$('#example tbody').on('click', 'tr', function () {
				var data = table.row( this ).data();
				
			});
		})(jQuery);
	</script>