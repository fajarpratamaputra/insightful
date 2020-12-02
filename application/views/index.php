<!DOCTYPE html>
<html lang="en">

<head>
<?php $this->load->view('_part/head') ?>
	<?php $this->load->view('_part/css') ?>
</head>
<body>

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <!-- <img class="logo-abbr" src="<?=base_url('assets')?>/images/logo.png" alt="">
                <img class="logo-compact" src="<?=base_url('assets')?>/images/logo-text.png" alt="">
                <img class="brand-title" src="<?=base_url('assets')?>/images/logo-text.png" alt=""> -->
				Insightful
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
        <?php $this->load->view('_part/header') ?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
		<?php $this->load->view('_part/sidebar') ?>
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		
		<!--**********************************
            Content body start
        ***********************************-->
        <?=$content?>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <?php $this->load->view('_part/footer') ?>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
	
	<?php $this->load->view('_part/js') ?>
</body>
</html>