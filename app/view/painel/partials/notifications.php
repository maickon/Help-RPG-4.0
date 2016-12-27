<li class="dropdown">
    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
        <i class="material-icons">notifications</i>
        <span class="label-count"><?php echo count($notificacoes); ?></span>
    </a>
    <ul class="dropdown-menu">
        <li class="header">NOTIFICAÇÕES</li>
        <li class="body scroll">
            <ul class="menu">
                <?php if(count($notificacoes) != 0) { ?>
                    <?php foreach($notificacoes as $key => $value) { ?>
                        <li>
                            <a href="<?php echo URL_BASE.$value->tipo.'/visualizar/'.$value->id_cadastro; ?>">
                                <div class="icon-circle bg-blue-grey">
                                    <i class="material-icons">public</i>
                                </div>
                                <div class="menu-info">
                                    <h4><?php echo "{$value->dono} criou {$value->tipo}."; ?></h4>
                                    <p>
                                        <i class="material-icons">access_time</i> <?php echo $time_ago->time_elapsed_string($value->cadastrado_em); ?>
                                    </p>
                                </div>
                            </a>
                        </li>
                    <?php }?>
                <?php }?>
            </ul>
        </li>
        <?php if(count($notificacoes) == 0) { ?>
            <li class="footer">
                <a href="javascript:void(0);">Não existe notificações no momento.</a>
            </li>
        <?php } else {?>
        <li class="footer">
                <a href="javascript:void(0);">Visualizar todas as notificações.</a>
            </li>
        <?php }?>
    </ul>
</li>