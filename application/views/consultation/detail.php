<div class="content-body">
            <!-- container starts -->
            <div class="container-fluid">
                <div class="page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Consultation</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Detail</a></li>
                    </ol>
                </div>
                <!-- row -->
                <!-- Row starts -->
                <div class="row">
                    <!-- Column starts -->
                <?php foreach($consultation as $consul) { ?>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header d-block">
                                <h4 class="card-title">Default Accordion</h4>
                                <p class="m-0 subtitle">Default accordion. Add <code>accordion</code> class in root</p>
                            </div>
                            <div class="card-body">
                                <!-- Default accordion -->
                                <div id="accordion-one" class="accordion accordion-primary">
                                    <div class="accordion__item">
                                        <div class="accordion__header rounded-lg" data-toggle="collapse" data-target="#default_collapseOne">
                                            <span class="accordion__header--text">Accordion Header One</span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="default_collapseOne" class="collapse accordion__body show" data-parent="#accordion-one">
                                            <div class="accordion__body--text">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion__item">
                                        <div class="accordion__header collapsed rounded-lg" data-toggle="collapse" data-target="#default_collapseTwo">
                                            <span class="accordion__header--text">Accordion Header Two</span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="default_collapseTwo" class="collapse accordion__body" data-parent="#accordion-one">
                                            <div class="accordion__body--text">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion__item">
                                        <div class="accordion__header collapsed rounded-lg" data-toggle="collapse" data-target="#default_collapseThree">
                                            <span class="accordion__header--text">Accordion Header Three</span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="default_collapseThree" class="collapse accordion__body" data-parent="#accordion-one">
                                            <div class="accordion__body--text">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
                <!-- Row ends -->
            </div>
            <!-- container ends -->
        </div>