<?php

class Recuperarsenha_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
		$language = new Locale_Lib;
		$tag = new Tags_Lib;
		$form = new Form_Lib;
		$recuperar_senha = new Recuperarsenha_Model;
		require (new Render_Lib())->get_required_path();
	}

	function checar(){
		$language = new Locale_Lib;
		$usuario = new Usuario_Model();
		$senha = new Senhas_Helper();

		$usuario_check = $usuario->select(
			'usuarios',
			['email','login','nome'],
			['email','=',$_REQUEST['email']]);

		if (!array_key_exists(0, $usuario_check)) {
			header('Location: ' . URL_BASE . 'erro/msg/'.$language->ERROR_MSG_USER_DONT_EXISTS);
		} else {
			$hash_code = hash('sha256', microtime());
			if ($usuario->update('usuarios',
							['senha','hash_code','ativo'],
							[md5($senha->senha), $hash_code, 0], 'email', $_REQUEST['email'])){

				require URL_BASE_INTERNAL . 'lib/PHPMailer-master/PHPMailerAutoload.php';
				// Inicia a classe PHPMailer
				$mail = new PHPMailer(true);
				// Define os dados do servidor e tipo de conexão
				$mail->IsSMTP(); // Define que a mensagem será SMTP
				$mail->SMTPSecure 		= MAIL_SMTP_SECURE;

				try {
					$mail->Host 		= MAIL_HOST;
					$mail->SMTPAuth 	= MAIL_SMTP_AUTH;
					$mail->Port 		= MAIL_PORT;
					$mail->Username 	= MAIL_USERNAME;
					$mail->Password 	= MAIL_PASSWORD;

					//Define o remetente  
					$mail->SetFrom(MAIL_MAIN_EMAIL, $language->MAIL_MSG_SITE_NAME); 
					$mail->AddReplyTo(MAIL_MAIN_EMAIL, $language->MAIL_MSG_SITE_NAME);
					$mail->Subject 	= $language->MAIL_MSG_SUCCESS;//Assunto do e-mail

					//Define os destinatário(s)
					$mail->AddAddress($_REQUEST['email'], $usuario_check[0]->login);

					//Define o corpo do email
					$mail->MsgHTML('
					<h1>'.$language->MAIL_MSG_PASSWORD_RECOVER_WELLCOME.'</h1>
					<p>'.$language->MAIL_MSG_PASSWORD_RECOVER_ORIENTATION_1.'</p> 
					<p><b>'.$language->MAIL_MSG_PASSWORD.'</b>: '.$senha->senha.'</p>
					<p><b>'.$language->MAIL_MSG_MAIL.'</b>: '.$usuario_check[0]->email.'</p>
					<br>
					<p><b>'.$language->MAIL_MSG_PASSWORD_RECOVER_ORIENTATION_2.'</b></p>
					<p><b>'.$language->MAIL_MSG_ACTIVE_LINK.'</b>: <a href="'. URL_BASE.'login/verificar/'.$hash_code.'">'.$language->MAIL_MSG_ACTIVE_MY_ACOUNT_LINK.'</a></p>
					<p>'.$language->MAIL_MSG_BY.'</p> 
					<p>'.$language->MAIL_MSG_CREATOR_CONTACT.'</p>'); 

					//Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
					//$mail->MsgHTML(file_get_contents('arquivo.html'));

					$mail->Send();

					// caso apresente algum erro é apresentado abaixo com essa exceção.
				    } catch (phpmailerException $e) {
				    	header('Location: ' . URL_BASE . 'erro/msg/' . $e->errorMessage());
					}

					header('Location: ' . URL_BASE . 'login/entrar');
			} else {
				header('Location: ' . URL_BASE . 'erro/codigo/002');
			}
		}
	}
}