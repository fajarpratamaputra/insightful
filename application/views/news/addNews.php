<div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Summernote</a></li>
                    </ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Summernote Editor</h4>
                            </div>
                            <div class="card-body">
                            <form action="<?=base_url('news/insert');?>" enctype="multipart/form-data" method="post">
                                    <div class="form-group">
                                        <label for="">Title</label>
                                        <input type="text" name="title" class="form-control input-default " placeholder="Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Category</label>
                                        <select name="category" id="single-select">
                                            <option value="">--Choice--</option>
                                            <?php
                                                $no = 0;
                                                foreach($category as $cat){
                                            ?>
                                                <option value="<?=$cat->id?>"><?=$cat->category?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Author</label>
                                        <input type="text" name="author" class="form-control input-default " placeholder="Author">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Banner</label>
                                        <input type="file" name="file" class="form-control input-default ">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea class="summernote" name="description" id="" cols="30" rows="10"></textarea>
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