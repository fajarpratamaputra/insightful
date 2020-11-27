<div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Psychologist</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Psychologist</a></li>
                    </ol>
                </div>
                <!-- row -->
                <form action="<?=base_url('psikolog/update');?>" enctype="multipart/form-data" method="post">
                <div class="row">
                    
                    <div class="col-xl-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Form Personal</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <div class="form-group">
                                        <label for="">Full Name</label>
                                        <input type="text" name="fullname" class="form-control input-default " value="<?=$psiko->fullname?>">
                                        <input type="hidden" name="id" value="<?=$psiko->id?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="number" name="phone" class="form-control input-rounded" value="<?=$psiko->phone?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <textarea class="form-control" name="address" rows="4" id="comment"><?=$psiko->address?></textarea>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="<?=base_url()?>/psikolog" class="btn btn-primary">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Form Account</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" name="email" class="form-control input-default " value="<?=$psiko->email?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Photo</label>
                                        <input type="file" name="file" class="form-control input-default " value="<?=$psiko->photo?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                </form>
            </div>
        </div>