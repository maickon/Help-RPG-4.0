<section class="utilitarios-content">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        <?php echo $language->LANGUAGE_PAGE_TITLE; ?>
                        <small><?php echo $language->LANGUAGE_PAGE_MSG; ?></small>
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="<?php echo URL_BASE; ?>" class=" waves-effect waves-block"><?php echo $language->MENU_HOME; ?></a></li>
                                <li><a href="<?php echo URL_BASE.'login/'; ?>" class=" waves-effect waves-block"><?php echo $language->MENU_LOGIN; ?></a></li>
                                <li><a href="<?php echo URL_BASE.'inscreverse'; ?>" class=" waves-effect waves-block"><?php echo $language->RECOVER_PASSWORD_SUBSCRIBE_LINK; ?></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="row">
                        <?php foreach ($idiomas->bandeiras as $key => $value) { ?>
                            <div class="col-md-1">
                                <div class="thumbnail">
                                    <a href="<?php echo URL_BASE.'idioma/linguagem/'.$value; ?>">
                                        <img src="<?php echo URL_BASE.'app/assets/img/bandeiras/'.$key.'.jpg'; ?>">
                                    </a>
                                </div>  
                            </div>  
                        <?php } ?>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</section>