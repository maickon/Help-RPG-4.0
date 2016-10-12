<div class="signup-box">
    <div class="logo">
        <a href="<?php echo $inscreverse->home_path; ?>"><?php echo $inscreverse->help; ?><b><?php echo $inscreverse->rpg; ?></b></a>
        <small><?php echo $inscreverse->main_msg; ?></small>
    </div>
    <div class="card">
        <div class="body">
            <form id="sign_up" method="POST">
                <div class="msg"><?php echo $inscreverse->novo_membro; ?></div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">person</i>
                    </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="namesurname" placeholder="<?php echo $inscreverse->usuario; ?>" required autofocus>
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">email</i>
                    </span>
                    <div class="form-line">
                        <input type="email" class="form-control" name="email" placeholder="<?php echo $inscreverse->email; ?>" required>
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">lock</i>
                    </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" minlength="6" placeholder="<?php echo $inscreverse->senha; ?>" required>
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">lock</i>
                    </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="confirm" minlength="6" placeholder="<?php echo $inscreverse->confirmar_senha; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-blue">
                    <label for="terms"><?php echo $inscreverse->termo_1; ?> <a href="javascript:void(0);"><?php echo $inscreverse->termo_2; ?></a>.</label>
                </div>

                <button class="btn btn-block btn-lg bg-blue waves-effect" type="submit"><?php echo $inscreverse->btn_criar_conta; ?></button>

                <div class="m-t-25 m-b--5 align-center">
                    <a href="<?php echo $inscreverse->login_path; ?>"><?php echo $inscreverse->usuario_cadastrado; ?></a>
                </div>
            </form>
        </div>
    </div>
</div>