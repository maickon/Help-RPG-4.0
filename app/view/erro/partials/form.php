<div class="four-zero-four-container">
    <div class="error-code font-bold col-white"><?php echo $erro->codigo; ?></div>
    <div class="error-message font-bold col-white"><?php echo $erro->erro_msg; ?></div>
    <div class="button-place">
        <a href="<?php echo $erro->home_url; ?>" class="btn btn-default btn-lg waves-effect"><?php echo $erro->btn_msg; ?></a>
    </div>
</div>