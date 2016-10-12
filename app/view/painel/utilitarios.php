<?php require 'partials/home_page.php'; ?>
<?php require 'utilitarios/utilitarios_link.php'; ?>

    <section class="content">

        <div class="col-lg-9">
            <div class="block-header">
                <h2>
                    UTILITÁRIOS
                </h2>
            </div>
            <div class="card">
                <div class="row clearfix">
                    <div class="body">
                        <?php foreach ($_IMG_UTILITARIES as $key => $value) { ?>
                            <div class="col-lg-3">
                                <a href="<?php echo $_IMG_UTILITARIES[$key][3]; ?>" data-sub-html="<?php echo $_IMG_UTILITARIES[$key][2]; ?>">
                                    <img class="img-responsive thumbnail" title="<?php echo $_IMG_UTILITARIES[$key][2]; ?>" src="<?php echo $_IMG_UTILITARIES[$key][0]; ?>">
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>  
            </div>
        </div>
    </section>


<?php require 'partials/footer_page.php'; ?>
