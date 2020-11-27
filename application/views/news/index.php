<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
                <div class="row">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header">
                                <h4 class="card-title">List News</h4>
                                <div class="col-lg-3 mb-4 mb-lg-0">
                                    <a href="<?=base_url()?>news/addNews" class="btn btn-primary light btn-lg btn-block rounded shadow px-2">+Add News</a>
                                </div>
                            </div>
							<div class="card-body px-4 py-3 py-md-2">
								<div class="row align-items-center">
									<div class="col-sm-12 col-md-7">
										<ul class="nav nav-pills review-tab">
											<li class="nav-item">
												<a href="#navpills-1" class="nav-link active px-2 px-lg-3" data-toggle="tab" aria-expanded="false">All Review</a>
											</li>
											<li class="nav-item">
												<a href="#navpills-2" class="nav-link px-2 px-lg-3" data-toggle="tab" aria-expanded="false">Published</a>
											</li>
										</ul>
									</div>
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
												<th style="width:250px;">Title</th>
                                                <th class="d-none d-lg-table-cell">Description</th>
                                                <th class="d-none d-lg-table-cell">Thumbnail</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<?php
                                                $no = 0;
                                                foreach($news as $n){
                                            ?>
											<tr>
											<td class="d-none d-lg-table-cell">
													<?php echo word_limiter($n->title, 5) ?>
												</td>
												<td class="d-none d-lg-table-cell">
													<?php echo word_limiter($n->description, 5) ?>
												</td>
												<td>
                                                <img class="img-fluid rounded mr-3 d-none d-xl-inline-block" width="70" src="<?=base_url('assets/profile/'.$n->banner)?>" alt="DexignZone">
												</td>
												<td>
													<div class="d-flex">
														<a href="<?=base_url('news/editNews/'.$n->id)?>" class="btn btn-warning btn-sm px-4">Edit</a>
														<a href="<?=base_url('news/publish/'.$n->id)?>" class="btn btn-primary btn-sm ml-2 px-4">
															<?php if($n->status == 1) { ?>
																unpublish
															<?php } elseif($n->status == 0) { ?>
																publish
															<?php } ?>
														</a>
														<a href="<?=base_url('news/delete/'.$n->id)?>" class="btn btn-danger  btn-sm ml-2 px-4">Delete</a>
													</div>
												</td>
											</tr>
										<?php } ?>	
										</tbody>
									</table>
								</div>
							</div>
							<div id="navpills-2" class="tab-pane">
								<div class="table-responsive table-hover fs-14">
									<table class="table display mb-4 dataTablesCard fs-14" id="example4">
										<thead>
											<tr>
												<th style="width:250px;">Title</th>
												<th class="d-none d-lg-table-cell">Description</th>
												<th class="d-none d-lg-table-cell">Image</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<tr>
                                                <td>
													<div class="media align-items-center">
														<div class="media-body">
															<h4 class="text-black font-w600 mb-1 wspace-no">Glee Smiley</h4>
															<span>Sunday, 24 July 2020 04:55 PM</span>
														</div>
													</div>
												</td>
												<td class="d-none d-lg-table-cell">The Story of Danau Toba (Musical Drama)</td>
												<td>
                                                <img class="img-fluid rounded mr-3 d-none d-xl-inline-block" width="70" src="<?=base_url('assets')?>/images/avatar/2.jpg" alt="DexignZone">
												</td>
												<td>
													<div class="d-flex">
														<a href="javascript:;" class="btn btn-primary btn-sm px-4">Publish</a>
														<a href="javascript:;" class="btn btn-danger  btn-sm ml-2 px-4">Delete</a>
													</div>
												</td>
                                            </tr>
                                            <tr>
                                                <td>
													<div class="media align-items-center">
														<div class="media-body">
															<h4 class="text-black font-w600 mb-1 wspace-no">Glee Smiley</h4>
															<span>Sunday, 24 July 2020 04:55 PM</span>
														</div>
													</div>
												</td>
												<td class="d-none d-lg-table-cell">The Story of Danau Toba (Musical Drama)</td>
												<td>
                                                <img class="img-fluid rounded mr-3 d-none d-xl-inline-block" width="70" src="<?=base_url('assets')?>/images/avatar/2.jpg" alt="DexignZone">
												</td>
												<td>
													<div class="d-flex">
														<a href="javascript:;" class="btn btn-primary btn-sm px-4">Publish</a>
														<a href="javascript:;" class="btn btn-danger  btn-sm ml-2 px-4">Delete</a>
													</div>
												</td>
											</tr>

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