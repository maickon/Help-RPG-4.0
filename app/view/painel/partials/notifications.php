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
                            <a href="<?php echo URL_BASE . 'usuario/profile/' . $value->de; ?>">
                                <div class="icon-circle bg-light-green">
                                    <i class="material-icons"><?php echo $value->icon; ?></i>
                                </div>
                                <div class="menu-info">
                                    <h4><?php echo "{$value->nome} quer ser seu amigo."; ?></h4>
                                    <p>
                                        <i class="material-icons">access_time</i> <?php echo $time_ago->time_elapsed_string($value->data); ?>
                                    </p>
                                </div>
                            </a>
                        </li>
                    <?php }?>
                <?php }?>
<!--                 <li>
                    <a href="javascript:void(0);">
                        <div class="icon-circle bg-red">
                            <i class="material-icons">delete_forever</i>
                        </div>
                        <div class="menu-info">
                            <h4><b>Nancy Doe</b> deleted account</h4>
                            <p>
                                <i class="material-icons">access_time</i> 3 hours ago
                            </p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <div class="icon-circle bg-orange">
                            <i class="material-icons">mode_edit</i>
                        </div>
                        <div class="menu-info">
                            <h4><b>Nancy</b> changed name</h4>
                            <p>
                                <i class="material-icons">access_time</i> 2 hours ago
                            </p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <div class="icon-circle bg-blue-grey">
                            <i class="material-icons">comment</i>
                        </div>
                        <div class="menu-info">
                            <h4><b>John</b> commented your post</h4>
                            <p>
                                <i class="material-icons">access_time</i> 4 hours ago
                            </p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <div class="icon-circle bg-light-green">
                            <i class="material-icons">cached</i>
                        </div>
                        <div class="menu-info">
                            <h4><b>John</b> updated status</h4>
                            <p>
                                <i class="material-icons">access_time</i> 3 hours ago
                            </p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <div class="icon-circle bg-purple">
                            <i class="material-icons">settings</i>
                        </div>
                        <div class="menu-info">
                            <h4>Settings updated</h4>
                            <p>
                                <i class="material-icons">access_time</i> Yesterday
                            </p>
                        </div>
                    </a>
                </li> -->
            </ul>
        </li>
        <li class="footer">
            <a href="javascript:void(0);">View All Notifications</a>
        </li>
    </ul>
</li>