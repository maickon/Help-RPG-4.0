<div class="fp-box">
    <div class="logo">
        <a href="<?php echo URL_BASE; ?>"><?php echo $language->SITE_NAME_HELP; ?><b><?php echo $language->SITE_NAME_RPG; ?></b></a>
        <small><?php echo $language->RECOVER_PASSWORD_TITLE; ?></small>
    </div>
    <div class="card">
        <div class="body">
            <form id="forgot_password" method="POST">
                <div class="msg">
                   <?php echo $language->RECOVER_PASSWORD_MSG; ?>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">email</i>
                    </span>
                    <div class="form-line">
                        <input type="email" class="form-control" name="email" placeholder="<?php echo $language->RECOVER_PASSWORD_MAIL; ?>" required autofocus>
                    </div>
                </div>

                <button class="btn btn-block btn-lg bg-blue waves-effect" type="submit"><?php echo $language->RECOVER_PASSWORD_BTN; ?></button>

                <div class="row m-t-20 m-b--5 align-center">
                    <a href="<?php echo URL_BASE.'inscreverse'; ?>"><?php echo $language->RECOVER_PASSWORD_SUBSCRIBE_LINK; ?></a>
                </div>
            </form>
        </div>
    </div>
</div>