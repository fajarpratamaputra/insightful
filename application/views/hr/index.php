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
                                <h4 class="card-title">List Human Resource Department</h4>
                                <div class="col-lg-3 mb-4 mb-lg-0">
                                    <a href="<?=base_url()?>/hr/addHr" class="btn btn-primary light btn-lg btn-block rounded shadow px-2">+New HRD</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example4" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Address </th>
												<th>Office </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no = 0;
                                                foreach($hrd as $hr){
                                            ?>
                                            <tr>
                                                <td><?=++$no?></td>
                                                <td><?=$hr->fullname?></td>
                                                <td><?=$hr->phone?></td>
                                                <td><?=$hr->address?></td>
                                                <td><?=$hr->name?></td>
                                                <td>
                                                    <div class="dropdown ml-auto text-right">
														<div class="btn-link" data-toggle="dropdown">
															<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="<?=base_url('hr/edit/'.$hr->id)?>">Edit</a>
															<a class="dropdown-item" href="<?=base_url('hr/delete/'.$hr->id)?>">Delete</a>
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