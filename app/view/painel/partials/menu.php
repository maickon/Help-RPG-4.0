<div class="menu">
    <ul class="list">
        <li class="header">Menu Principal</li>
        <li class="active">
            <a href="<?php echo URL_BASE.'painel'; ?>">
                <i class="material-icons">home</i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">menu</i>
                <span>Sobre</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="<?php echo URL_BASE . 'paginas/sobre'; ?>">
                        <span>Help RPG</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URL_BASE . 'paginas/uso'; ?>">
                        <span>Como Usar</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URL_BASE . 'paginas/versoes'; ?>">
                        <span>Versão Estrangeira</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URL_BASE . 'paginas/doacao'; ?>">
                        <span>Doação</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URL_BASE . 'paginas/parceria'; ?>">
                        <span>Parceria</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URL_BASE . 'paginas/eu'; ?>">
                        <span>Quem sou</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?php echo URL_BASE.'usuario/listar'; ?>">
                <i class="material-icons">people</i>
                <span>Pessoas</span>
            </a>
        </li>
        <li>
            <a href="<?php echo URL_BASE.'linguagem'; ?>">
                <i class="material-icons">translate</i>
                <span>Linguagem</span>
            </a>
        </li>
        <li>
            <a href="<?php echo URL_BASE.'utilitarios'; ?>">
                <i class="material-icons">widgets</i>
                <span>Utilitários</span>
            </a>
        </li>
        <li>
            <a href="<?php echo URL_BASE.'mesas'; ?>">
                <i class="material-icons">assignment</i>
                <span>Mesa de RPG</span>
            </a>
        </li>
        <li>
            <a href="<?php echo URL_BASE.'painel/cadastros'; ?>">
                <i class="material-icons">create</i>
                <span>Cadastrar</span>
            </a>
        </li>
        <li>
            <a href="<?php echo URL_BASE.'galeria/imagens'; ?>">
                <i class="material-icons">photo_camera</i>
                <span>Galeria de Imagem</span>
            </a>
        </li>
        <li>
            <a href="<?php echo URL_BASE.'painel/ranking/geral'; ?>">
                <i class="material-icons">change_history</i>
                <span>Ranking</span>
            </a>
        </li>
        <li>
            <a href="<?php echo URL_BASE.'videos/galeria'; ?>">
                <i class="material-icons">ondemand_video</i>
                <span>Vídeos</span>
            </a>
        </li>
        <?php if ($usuario->adm == 1 and $usuario->login == 'Maickon') { ?>
        <li>
            <a href="<?php echo URL_BASE.'painel/adm'; ?>">
                <i class="material-icons">content_paste</i>
                <span>Administração</span>
            </a>
        </li>
        <?php } ?>
    </ul>
</div>