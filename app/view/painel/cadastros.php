<?php require URL_BASE_INTERNAL.'app/view/painel/partials/home_page.php'; ?>

<section class="content">
    <div class="row clearfix">
        <div class="col-lg-9 timeline-item">
            <div class="card">
                <div class="header">
                    CADASTRO
                </div>
                <div class="body">
                    <div class="row clearfix">
                    <?php foreach ($cadastros as $key => $value) { ?>
                        <div class="col-lg-3">
                            <div class="thumbnail">
                                <div class="center"><?php echo $value; ?></div>
                                <a href="<?php echo URL_BASE."{$value}";?>" target="blank">
                                    <img width="128" height="128" src="<?php echo  URL_BASE."app/assets/img/icons/{$value}.png" ?>"" title="<?php echo $value ?>">
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="header">
                    <h2>
                        <?php echo $language->PANEL_ADVERTISING; ?>
                    </h2>
                </div>
                <div class="body">
                    <div class="form-line">

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?php require 'partials/footer_page.php'; ?>
<