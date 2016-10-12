<?php require 'partials/home_page.php'; ?>
<?php require 'cadastros/cadastros_link.php'; ?>

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
                        <?php foreach ($_CADASTROS as $key => $value) { ?>
                            <div class="col-lg-3">
                                <a href="<?php echo $_CADASTROS[$key][3]; ?>" data-sub-html="<?php echo $_CADASTROS[$key][2]; ?>">
                                    <img class="img-responsive thumbnail" title="<?php echo $_CADASTROS[$key][1]; ?>" src="<?php echo $_CADASTROS[$key][0]; ?>">
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>  
            </div>
        </div>
    </section>


<?php require 'partials/footer_page.php'; ?>