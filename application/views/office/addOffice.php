<div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Office</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Office</a></li>
                    </ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Form Input</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="<?=base_url('office/insert');?>" enctype="multipart/form-data" method="post">
                                        <div class="form-group">
                                            <label for="">Office Name</label>
                                            <input type="text" name="office" class="form-control input-default " placeholder="Office Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Phone</label>
                                            <input type="number" name="phone" class="form-control input-rounded" placeholder="Phone">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" name="email" class="form-control input-default " placeholder="Office Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Address</label>
                                            <textarea class="form-control" name="address" rows="4" id="comment"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Insert</button>
                                        <a href="<?=base_url()?>/office" class="btn btn-primary">Back</a>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
                </div>
            </div>
        </div>