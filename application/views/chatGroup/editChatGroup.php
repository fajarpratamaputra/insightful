<div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Category Chat Group</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Category Chat Group</a></li>
                    </ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Form Category</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="<?=base_url('chatGroup/update');?>" enctype="multipart/form-data" method="post">
                                        <div class="form-group">
                                            <label for="">Category</label>
                                            <input name="title" type="text" class="form-control input-default " value="<?=$chatgroup->title?>">
                                            <input name="id" type="hidden" value="<?=$chatgroup->id?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Date</label>
                                            <input name="date" type="date" class="form-control input-rounded" value="<?=$chatgroup->date?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Time</label>
                                            <input name="time" type="time" class="form-control input-rounded" value="<?=$chatgroup->time?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Psychologist</label>
                                            <select name="psycolog" id="single-select" class="form-control input-rounded">
                                                <option value="1">Pilih</option>
                                                <?php
                                                        $no = 0;
                                                        foreach($psyco as $psy){
                                                ?>
                                                        <option <?php if($chatgroup->psychologist_id = $psy->id) {echo 'selected';} ?> value="<?=$psy->id?>"><?=$psy->fullname?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="<?=base_url()?>chatgroup" class="btn btn-primary">Back</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>