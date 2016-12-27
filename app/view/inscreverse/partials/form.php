<div class="signup-box">
    <div class="logo">
        <a href="<?php echo URL_BASE; ?>"><?php echo $language->SITE_NAME_HELP; ?><b><?php echo $language->SITE_NAME_RPG; ?></b></a>
        <small><?php echo $language->SUBSCRIBE_MAIN_MSG; ?></small>
    </div>
    <div class="card">
        <div class="body">
            <form id="sign_up" method="POST" action="<?php echo URL_BASE.'usuario/salvar' ?>">
                <div class="msg"><?php echo $language->SUBSCRIBE_NEW_MEMBER; ?></div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">person</i>
                    </span>
                    <div class="form-line">
                        <input type="text" onchange="login_check(this.value)" onfocus="login_check(this.value)" class="form-control" name="login" placeholder="<?php echo $language->SUBSCRIBE_USER; ?>" required autofocus>
                    </div>
                    <div id="login-exists"></div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">email</i>
                    </span>
                    <div class="form-line">
                        <input type="email" onchange="email_check(this.value)" onfocus="email_check(this.value)" class="form-control" name="email" placeholder="<?php echo $language->SUBSCRIBE_EMAIL; ?>" required>
                    </div>
                    <div id="email-exists"></div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">lock</i>
                    </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="senha" minlength="6" placeholder="<?php echo $language->SUBSCRIBE_PASSWORD; ?>" required>
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">lock</i>
                    </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="confirm" minlength="6" placeholder="<?php echo $language->SUBSCRIBE_PASSWORD_CONFIRM; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-blue">
                    <label for="terms"><?php echo $language->SUBSCRIBE_TERM_1; ?> <a href="javascript:void(0);"><?php echo $language->SUBSCRIBE_TERM_2; ?></a>.</label>
                </div>

                <button class="btn btn-block btn-lg bg-blue waves-effect" type="submit"><?php echo $language->SUBSCRIBE_BTN_CREATE_ACOUNT; ?></button>

                <div class="m-t-25 m-b--5 align-center">
                    <a href="<?php echo URL_BASE.'recuperarsenha'; ?>"><?php echo $language->SUBSCRIBE_USER_REGISTERED; ?></a>
                </div>
            </form>
        </div>
    </div>
</div>