<section class="content">
    <div class="row clearfix">
        <div class="col-lg-9">
            <div class="card">
                <div class="header">
                    <h2>
                        <?php echo 'Bem vindo ao Help RPG' ?>
                        <?php echo '<small>Compartilhe suas ideias, faça amigos e conheça nossos utilitários. </small>'; ?>
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="header">
                    <h2>
                        Publicidade
                    </h2>
                </div>
                <div class="body">
                    <div class="form-line">
                    
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <?php foreach ($time_line as $key => $value) { ?>
                <div class="card">
                    <div class="header">
                        <?php echo $value->titulo; ?>
                    <div>
                    <div class="body">
                        <p class="lead">
                            <?php echo $value->data_postagem; ?>
                        </p>
                        <p>
                            <?php echo $value->conteudo; ?>
                        </p>
                    </div>
                    <div class="footer">
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</section>