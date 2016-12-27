<?php require 'partials/home_page.php'; ?>

<section class="content">
    <div class="row clearfix">
        <div class="col-md-9">
            <div class="card">
                <div class="header">
		            <h2><?php $tag->printer('RANKING'); ?></h2>
		            <ul class="header-dropdown m-r--5">
		                <li class="dropdown">
		                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		                        <i class="material-icons">more_vert</i>
		                    </a>
			                <ul class="dropdown-menu pull-right">
		                    	<?php foreach ($modulos as $key => $value) { ?>
		                    		<?php $label = strtoupper($value); ?>
			                        <li><a href="<?php $tag->printer(URL_BASE.'painel/ranking/'.$value); ?>" class=" waves-effect waves-block"><?php $tag->printer("RANKING DE {$label}"); ?></a></li>
		                    	<?php } ?>
			                </ul>
		                </li>
		            </ul>
		        </div>
	            <div class="body">
	        		<h5>RANKING GERAL</h5>
	            	<?php foreach ($ranking as $key => $value) { ?>
	            		<?php $pos = $key+1; ?>
		            	<div class="media">
	                        <div class="media-left">
	                        	<?php $tag->printer("<b>{$pos}°</b>"); ?>
	                        </div>
	                        <div class="media-left">
	                            <a href="<?php $tag->printer(URL_BASE."usuario/profile/{$value->id}"); ?>">
	                                <img class="media-object" src="<?php $tag->printer($value->foto_link); ?>" width="64" height="64">
	                            </a>
	                        </div>
	                        <div class="media-body">
	                            <h4 class="media-heading"><?php $tag->printer($value->dono); ?></h4>
	                            <h4 class="media-heading"><?php $tag->printer("Nível {$value->nivel}"); ?></h4>
	                            <h4 class="media-heading"><?php $tag->printer("Xp{$value->xp}"); ?></h4>
	                        </div>
	                    </div>
	            	<?php } ?>
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

<?php require 'partials/footer_page.php'; ?>
