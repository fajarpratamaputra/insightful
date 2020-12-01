<div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Chat Group</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Read</a></li>
                    </ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="DZ_W_TimeLine" class="widget-timeline dz-scroll" style="height:600px">
                                    <?php
                                        $no = 0;
                                        foreach($chat_group as $cp){
                                            if($cp->karyawan == 'Psikolog') {
                                    ?>

                                    <div class="d-flex justify-content-start mb-4">
                                        <div class="msg_cotainer">
                                            <b><?=$cp->username?></b> </br>
                                            <?=$cp->chat?>
                                           <br> <span class="msg_time"><h6><?=date('D, M Y H:i', strtotime($cp->datetime))?></h6></span>
                                        </div>
                                    </div>

                                    <?php } elseif(($cp->karyawan == 'Karyawan') || ($cp->karyawan == 'Non-Karyawan')) { ?>
                                    <div class="d-flex justify-content-end mb-4" style="text-align:right;">
                                        <div class="msg_cotainer_send">
                                            <b><?=$cp->username?></b> </br>
                                            <?=$cp->chat?>
                                            <br><span class="msg_time_send"><h6><?=date('D, M Y H:i', strtotime($cp->datetime))?></h6></span>
                                        </div>
                                     </div>
                                    <?php 
                                            } 
                                        } 
                                    ?>
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>