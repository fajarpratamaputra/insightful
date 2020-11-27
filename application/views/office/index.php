<div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Datatable</a></li>
                    </ol>
                </div>
                <!-- row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">List Office</h4>
                                <div class="col-lg-3 mb-4 mb-lg-0">
                                    <a href="<?=base_url()?>/office/addOffice" class="btn btn-primary light btn-lg btn-block rounded shadow px-2">+New Office</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example4" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Office Name</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Phone </th>
												<th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no = 0;
                                                foreach($office as $off){
                                            ?>
                                            <tr>
                                                <td><?=++$no;?></td>
                                                <td><?=$off->name?></td>
                                                <td><?=$off->email?></td>
                                                <td><?=$off->address?></td>
                                                <td><?=$off->phone?></td>
                                                <td>
                                                    <div class="dropdown ml-auto text-right">
														<div class="btn-link" data-toggle="dropdown">
															<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="<?=base_url('office/edit/'.$off->id)?>">Edit</a>
															<a class="dropdown-item" href="<?=base_url('office/delete/'.$off->id)?>">Delete</a>
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