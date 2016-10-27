<div role="tabpanel" class="tab-pane fade" id="mapas">
    <br>
    <div class="row">
    	<?php foreach ($masmorras as $key => $value) { ?>
	    	<div class="col-sm-2 col-md-2">
	            <div class="thumbnail">
	                <img src="<?php echo $value['IMG']; ?>" class="utilitarios-thumbnail">
	                <div class="caption">
	                    <h3 class="center"><?php echo $value['TITLE']; ?></h3>
	                    <p class="center">
							<button type="button" class="btn btn-default waves-effect m-r-20" data-toggle="modal" data-target="#masmorras_<?php echo $key; ?>">
								Saiba Mais
							</button>
	                    </p>
	                </div>
	            </div>
	        </div>
    	<?php }?>
    </div>
</div>

<!-- Large Size -->
<?php foreach ($masmorras as $key => $value) { ?>
	<div class="modal fade" id="masmorras_<?php echo $key; ?>" tabindex="-1" role="dialog">
	    <div class="modal-dialog modal-lg" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h4 class="modal-title" id="largeModalLabel"><?php echo $value['TITLE']; ?></h4>
	            </div>
	            <div class="modal-body">
	                <?php echo $value['DESCRIPTION']; ?>
	            	<hr>
	            	<p><b>Idioma:</b><?php echo $value['LENGUAGE']; ?></p>
	            	<p><b>Nome do site:</b><?php echo $value['SITE_NAME']; ?></p>
	            	<p><b>Fonte:</b><a href="<?php echo $value['FONT']; ?>"><?php echo $value['FONT']; ?></a></p>
	            </div>
	            <div class="modal-footer">
	                <a href="<?php echo $value['FONT'].$value['APP_LINK']; ?>" class="btn btn-link waves-effect">VISITAR FERRAMENTA</a>
	                <a href="#" class="btn btn-link waves-effect" data-dismiss="modal">FECHAR</a>
	            </div>
	        </div>
	    </div>
	</div>
<?php }?>