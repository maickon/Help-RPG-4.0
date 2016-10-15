<div class="user-info" style="background: url('<?php echo $_SESSION['capa_link']; ?>'); no-repeat no-repeat; width: 100% !important;">
    <div class="image">
        <img src="<?php echo $_SESSION['foto_link']; ?>" width="48" height="48" alt="User" />
    </div>
    <div class="info-container">
        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['nome']; ?></div>
        <div class="email"><?php echo $_SESSION['email']; ?></div>
        <div class="btn-group user-helper-dropdown">
            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
            <ul class="dropdown-menu pull-right">
                <li>
                    <a href="<?php echo URL_BASE.'usuario/profile'; ?>"><i class="material-icons">person</i>Profile</a>
                </li>
                <li role="seperator" class="divider"></li>
                    <li>
                        <a href="javascript:void(0);"><i class="material-icons">group</i>Amigos</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);"><i class="material-icons">widgets</i>Utilitários</a>
                    </li>
                    <li>
                        <a href="<?php echo URL_BASE.'usuario/feitos'; ?>"><i class="material-icons">fingerprint</i>Seus Feitos</a>
                    </li>
                    <li role="seperator" class="divider">
                </li>
                    <li><a href="<?php echo URL_BASE.'login/sair'; ?>"><i class="material-icons">input</i>Sair</a>
                </li>
            </ul>
        </div>
    </div>
</div>