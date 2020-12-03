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
                    <?php 
                        foreach($consultation as $consul) { 
                            $report_kurungawal = str_replace('{', '', $consul->report);
                            $report_kurungakhir = str_replace('}', '', $report_kurungawal);
                            $report = str_replace('[', '', $report_kurungakhir);
                            $report_akhir = str_replace(']', '', $report);
                            $hasil_report = explode(',', $report_akhir);
                    ?>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header d-block">
                                <h4 class="card-title"><?=date('D M Y', strtotime($consul->datetime))?></h4>
                            </div>
                            <div class="card-body">
                                <!-- Default accordion -->
                                <div id="accordion-one" class="accordion accordion-primary">
                                    <div class="accordion__item">
                                        <div class="accordion__header rounded-lg" data-toggle="collapse" data-target="#default_collapseOne">
                                            <span class="accordion__header--text"><?php $consul->email_psikolog ?></span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="default_collapseOne" class="collapse accordion__body show" data-parent="#accordion-one">
                                            <div class="accordion__body--text">
                                                <?php 
                                                    foreach($hasil_report as $hr) {                                            
                                                ?>
                                                <?=$hr.'</br>';?>
                                                <?php } ?>
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