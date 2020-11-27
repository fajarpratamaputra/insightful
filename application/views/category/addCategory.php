<div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Category</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Category</a></li>
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
                                    <form action="<?=base_url('category/insert');?>" enctype="multipart/form-data" method="post">
                                        <div class="form-group">
                                            <label for="">Category</label>
                                            <input type="text" name="category" class="form-control input-default " placeholder="Category">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Insert</button>
                                        <a href="<?=base_url()?>/category" class="btn btn-primary">Back</a>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
                </div>
            </div>
        </div>