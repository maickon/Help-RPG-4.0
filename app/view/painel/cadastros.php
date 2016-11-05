<?php require 'partials/home_page.php'; ?>

    <section class="content">

        <div class="col-lg-9">
            <div class="block-header">
                <h2>
                    CADASTROS
                </h2>
            </div>
            <div class="card">
                <div class="row clearfix">
                    <div class="body">
                        <?php foreach ($cadastros as $key => $value) { ?>
                            <div class="col-lg-3">
                                <div class="thumbnail">
                                    <div class="caption">
                                        <h6 class="center">
                                            <?php echo $value['nome']; ?>
                                        </h6>
                                        <div class="center demo-google-material-icon">
                                            <a href="<?php echo $value['link'];?>" target="blank">
                                                <i class="material-icons">launch</i>
                                            </a>
                                            
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>  
            </div>
        </div>
    </section>


<?php require 'partials/footer_page.php'; ?>