<div class="fp-box">
    <div class="logo">
        <a href="<?php echo $recuperar_senha->home_path; ?>"><?php echo $recuperar_senha->help; ?><b><?php echo $recuperar_senha->rpg; ?></b></a>
        <small><?php echo $recuperar_senha->titulo; ?></small>
    </div>
    <div class="card">
        <div class="body">
            <form id="forgot_password" method="POST">
                <div class="msg">
                   <?php echo $recuperar_senha->msg; ?>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">email</i>
                    </span>
                    <div class="form-line">
                        <input type="email" class="form-control" name="email" placeholder="<?php echo $recuperar_senha->email; ?>" required autofocus>
                    </div>
                </div>

                <button class="btn btn-block btn-lg bg-blue waves-effect" type="submit"><?php echo $recuperar_senha->btn; ?></button>

                <div class="row m-t-20 m-b--5 align-center">
                    <a href="<?php echo $recuperar_senha->inscreverse_path; ?>"><?php echo $recuperar_senha->link; ?></a>
                </div>
            </form>
        </div>
    </div>
</div>