<div role="tabpanel" class="tab-pane fade" id="nomes">
	<br>
    <div class="row">
    	<?php foreach ($utilitarios->nomes as $key => $value) { ?>
	    	<div class="col-sm-2 col-md-2">
	            <div class="thumbnail">
	                <img src="<?php echo URL_BASE . $value['IMG']; ?>" class="utilitarios-thumbnail" title="<?php echo $value['TITLE']; ?>">
	                <div class="caption">
	                	<h6 class="center"><?php echo $value['TITLE']; ?></h6>
	                    <div class="center demo-google-material-icon"> 
	                    	<a href="<?php echo $value['FONT'].$value['APP_LINK']; ?>" target="blank">
		                    	<i class="material-icons">launch</i>
		                    </a>
		                    <a href="#" data-toggle="modal" data-target="#nomes_<?php echo $key; ?>">
		                    	<i class="material-icons" data-toggle="modal">info_outline</i>
		                    </a> 
	                    </div>
	                </div>
	            </div>
	        </div>
    	<?php }?>
    </div>
</div>

<!-- Large Size -->
<?php foreach ($utilitarios->nomes as $key => $value) { ?>
	<div class="modal fade" id="nomes_<?php echo $key; ?>" tabindex="-1" role="dialog">
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
	                <a href="<?php echo $value['FONT'].$value['APP_LINK']; ?>" target="blank" class="btn btn-link waves-effect">
	                	<?php echo $language->UTILITIES_LABEL_BTN_ACCESS; ?>
	                </a>
	                <a href="#" class="btn btn-link waves-effect" data-dismiss="modal">
	                	<?php echo $language->UTILITIES_LABEL_BTN_CLOSE; ?>
	                </a>
	            </div>
	        </div>
	    </div>
	</div>
<?php }?>