<section class="content">
    <div class="row clearfix">
        <div class="col-lg-9 timeline-item">
            <?php foreach ($time_line as $key => $value) { ?>
                <div class="card">
                    <div class="header">
                        <?php echo '<a href='.URL_BASE.$value->tipo.'/visualizar/'.$value->id_cadastro.' class="timeline_title">'.$value->titulo.'</a>'; ?>
                         <b>(<?php echo $value->tipo; ?>)</b>
                    </div>
                    <div class="body" id="timeline-body">
                        <i class="material-icons">today</i>
                        <?php echo date('d/m/Y H:i:s', strtotime($value->cadastrado_em)); ?>
                        <i class="material-icons">person</i>
                        <?php echo $value->dono; ?>
                        <i class="material-icons">bookmark_border</i>
                        <?php echo $value->sistema; ?>
                        <br>
                        <br>
                        <?php
                        if (isset($value->exibir)) {
                            $tag->link('href="' . $painel->url->painel_css_path . '/painel.css' . '" rel="stylesheet"');
                            $tag->printer($value->exibir);
                        }
                        ?>
                        <p>
                        <?php $tag->printer(strip_tags($texto->limitar_texto($value->descricao, 1000))); ?>
                        </p>

                        <p class="row">
                            <div class="fb-share-button social_btn"
                                data-href="<?php echo URL_BASE.$value->tipo.'/visualizar/'.$value->id_cadastro;?>"
                                data-layout="button_count">
                            </div>
                            <!-- Posicione esta tag onde você deseja que o botão +1 apareça. -->
                            <div class="g-plusone social_btn" data-size="medium" data-annotation="inline" data-width="300"></div>

                            <a href="https://twitter.com/share" class="twitter-share-button social_btn" data-via="HelpRpgBr" data-hashtags="helprpg">Tweet</a>
                        </p>
                    </div>
                </div>
            <?php } ?>
            <div class="card">
                <div class="header">
                    <div class="footer center" id="counter">
                        <ul class="pagination">
                            <?php if ($params > 1) { ?>
                                <li class="">
                                    <?php $indice_menos = $params - 1; ?>
                                    <a href="<?php echo URL_BASE.'painel/index/'.($indice_menos); ?>">
                                        <i class="material-icons">chevron_left</i>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php for ($i=1; $i < $numero_posts +1; $i++) {
                                $ativo = ($i == $params) ? 'active' : '';
                                echo '<li class="'.$ativo.'"><a href="'.URL_BASE.'painel/index/'.$i.'" class="waves-effect">'.$i.'</a></li>';
                            } ?>
                            <?php if ($params < $numero_posts) { ?>
                                <li>
                                    <?php $indice_mais = $params + 1; ?>
                                    <a href="<?php echo URL_BASE.'painel/index/'.$indice_mais; ?>" class="waves-effect">
                                        <i class="material-icons">chevron_right</i>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
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

        <div class="col-lg-3">
            <div class="card">
                <div class="header">
                    <h2>
                        <?php echo 'RANKING'; ?>
                    </h2>
                </div>
                <div class="body">
                    <div class="form-line">
                        <?php
                            $i = 1;
                            foreach ($rank as $key => $value) {
                            echo "<p><b>{$i}° <img src=\"{$value->foto_link}\" width=\"40\"> <a href=\"".URL_BASE."usuario/profile/{$value->id}\">{$value->dono}</a> Lv<span class=\"font-bold col-red\">{$value->nivel}</span></b></p>";
                            $i++;
                        }?>
                        <a href="<?php echo URL_BASE . 'painel/ranking/geral'; ?>">Ver mais...</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="header">
                    <h2>
                        <?php echo 'MESAS'; ?>
                    </h2>
                </div>
                <div class="body">
                    <div class="form-line">
                        <?php
                            $i = 1;
                            foreach ($mesas as $key => $value) {
                            $data = $data = date('d/m/Y',strtotime($value->data_final));
                            echo "<p><b>{$i}° <a href=\"".URL_BASE."mesas/visualizar/{$value->id}\">{$value->nome}</a> <br> Sistema {$value->sistema} <br> Expira em {$data}</b></p>";
                            $i++;
                        }?>
                        <a href="<?php echo URL_BASE . 'mesas'; ?>">Ver mais...</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>