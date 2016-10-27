<section class="utilitarios-content">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        UTILITÁRIOS
                        <small>Aqui você encontra os utilitários do Help RPG e o de terceiros.</small>
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="<?php echo URL_BASE; ?>" class=" waves-effect waves-block">Home</a></li>
                                <li><a href="<?php echo URL_BASE.'login/'; ?>" class=" waves-effect waves-block">Login</a></li>
                                <li><a href="<?php echo URL_BASE.'inscreverse'; ?>" class=" waves-effect waves-block">Criar uma conta</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <?php require 'nav-tabs.php'; ?>

                    <?php require 'tab-panels.php'; ?>
                </div>
            </div>
        </div>
    </div>
</section>