<div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">HRD</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Add HRD</a></li>
                    </ol>
                </div>
                <!-- row -->
                <form action="<?=base_url('hr/update');?>" enctype="multipart/form-data" method="post">
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
                                        <input type="text" name="fullname" class="form-control input-default " value="<?=$hrd->fullname?>">
                                        <input type="hidden" name="id" class="form-control input-default " value="<?=$hrd->id?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="number" name="phone" class="form-control input-rounded" value="<?=$hrd->phone?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <textarea class="form-control" name="address" rows="4" id="comment"><?=$hrd->address?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Office</label>
                                        <select name="office" id="single-select">
                                            <option value="">--Choice--</option>
                                            <?php
                                                $no = 0;
                                                foreach($office as $off){
                                            ?>
                                                <option <?php if($hrd->office_id == $off->id) echo "selected"; ?> value="<?=$off->id?>"><?=$off->name?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Insert</button>
                                    <a href="<?=base_url()?>hr" class="btn btn-primary">Back</a>
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
                                        <label for="">Photo</label>
                                        <input type="file" name="file" class="form-control input-default " value="<?=$hrd->photo?>">
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" name="email" class="form-control input-default " value="<?=$hrd->email?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                </form>
            </div>
        </div>