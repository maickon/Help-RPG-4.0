<?php

class Usuario_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
		$tag = new Tags_Lib;
		$form = new Form_Lib;
		$usuario = new Usuario_Model();
		$usuarios = $usuario->select('usuarios');
		require (new Render_Lib())->get_required_path();
	}

	function profile(){
		session_start();
		if (!isset($_SESSION['id']) and !isset($_SESSION['nome']) and !isset($_SESSION['login']))
		    header("Location: " . URL_BASE);
		
		$tag = new Tags_Lib;
		$form = new Form_Lib;
		$usuario_modelo = new Usuario_Model();
		$usuario = (object)$usuario_modelo->select('usuarios', '*', ['id','=',$_SESSION['id']])[0];
		$painel = new Painel_Model;
		require (new Render_Lib('profile'))->get_required_path();
	}

	function feitos(){
		$tag = new Tags_Lib;
		$form = new Form_Lib;
		$painel = new Painel_Model;
		$armadura = new Armaduras_Model;
		$arma = new Armas_Model;
		$artefato = new Artefatos_Model;
		$aventura = new Aventuras_Model;
		$bestiario = new Bestiario_Model;
		$cenario = new Cenarios_Model;
		$contos = new Contos_Model;
		$cronica = new Cronicas_Model;
		$historia = new Historias_Model;
		$magia = new Magias_Model;
		$pericia = new Pericias_Model;
		$personagem = new Personagens_Model;
		$talento = new Talentos_Model;
		session_start();
		$armaduras_count 		= $armadura->qtd_max('armaduras', 'dono = "'.$_SESSION['nome'].'"')['count'];
		$armas_count 			= $arma->qtd_max('armas', 'dono = "'.$_SESSION['nome'].'"')['count'];
		$artefatos_count 		= $artefato->qtd_max('artefatos', 'dono = "'.$_SESSION['nome'].'"')['count'];
		$aventuras_count 		= $aventura->qtd_max('aventuras', 'dono = "'.$_SESSION['nome'].'"')['count'];
		$bestiario_count 		= $bestiario->qtd_max('bestiario', 'dono = "'.$_SESSION['nome'].'"')['count'];
		$cenarios_count 		= $cenario->qtd_max('cenarios', 'dono = "'.$_SESSION['nome'].'"')['count'];
		$contos_count 			= $contos->qtd_max('contos', 'dono = "'.$_SESSION['nome'].'"')['count'];
		$cronicas_count 		= $cronica->qtd_max('cronicas', 'dono = "'.$_SESSION['nome'].'"')['count'];
		$historias_count 		= $historia->qtd_max('historias', 'dono = "'.$_SESSION['nome'].'"')['count'];
		$magias_count 			= $magia->qtd_max('magias', 'dono = "'.$_SESSION['nome'].'"')['count'];
		$pericias_count 		= $pericia->qtd_max('pericias', 'dono = "'.$_SESSION['nome'].'"')['count'];
		$personagens_count 		= $personagem->qtd_max('personagens', 'dono = "'.$_SESSION['nome'].'"')['count'];
		$talentos_count 		= $talento->qtd_max('talentos', 'dono = "'.$_SESSION['nome'].'"')['count'];
		
		$counts = [
					'ARMADURAS'=>$armaduras_count,
					'ARMAS'=>$armas_count,
					'ARTEFATOS'=>$artefatos_count,
					'AVENTURAS'=>$aventuras_count,
					'BESTIÁRIO'=>$bestiario_count,
					'CENÁRIOS'=>$cenarios_count,
					'CONTOS'=>$contos_count,
					'CRÔNICAS'=>$cronicas_count,
					'HISTÓRIAS'=>$historias_count,
					'MAGIAS'=>$magias_count,
					'PERÍCIAS'=>$pericias_count,
					'PERSONAGENS'=>$personagens_count,
					'TALENTOS'=>$talentos_count
				];
		require (new Render_Lib('feitos'))->get_required_path();
	}

	function editar(){
		session_start();
		if (!isset($_SESSION['id']) and !isset($_SESSION['nome']) and !isset($_SESSION['login']))
		    header("Location: " . URL_BASE);

		$tag = new Tags_Lib;
		$form = new Form_Lib;
		$painel = new Painel_Model;
		$usuario = (object)(new Usuario_Model())->select('usuarios','*',[ ['id','=',$_SESSION['id']] ])[0];
		require (new Render_Lib('editar'))->get_required_path();
	}

	function salvar(){
		$usuario = new Usuario_Model();
		$usuario_check = $usuario->select('usuarios', ['email'], ['email','=',$_REQUEST['email']]);
		if (array_key_exists(0, $usuario_check)) {
			header('Location: '.URL_BASE.'login?erro=2');
		} else {
			$hash_code = hash('sha256', microtime());
			if ($usuario->insert('usuarios', 
							['nome','email','senha','login','hash_code'],
							[$_REQUEST['login'],$_REQUEST['email'],md5($_REQUEST['senha']),$_REQUEST['login'], $hash_code])) {
			
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
					$mail->SetFrom(MAIL_MAIN_EMAIL, SITE_NAME); 
					$mail->AddReplyTo(MAIL_MAIN_EMAIL, SITE_NAME);
					$mail->Subject 	= USUARIO_MSG_SUCESSO;//Assunto do e-mail

					//Define os destinatário(s)
					$mail->AddAddress($_REQUEST['email'], $_REQUEST['login']);

					//Define o corpo do email
					$mail->MsgHTML('
					<h1>'.USUARIO_MSG_BOAS_VINDAS.'</h1>
					<p>'.USUARIO_MSG_DE_ORIENTACAO_2.'</p> 
					<p><b>'.USUARIO_MSG_SENHA.'</b>: '.$_REQUEST['senha'].'</p>
					<p><b>'.USUARIO_MSG_EMAIL.'</b>: '.$_REQUEST['email'].'</p>
					<br>
					<p><b>'.USUARIO_MSG_DE_ORIENTACAO_3.'</b></p>
					<p><b>'.USUARIO_MSG_LINK_DE_ATIVACAO.'</b>: <a href="'. URL_BASE.'login/verificar/'.$hash_code.'">'.USUARIO_MSG_ATIVACAO.'</a></p>
					<p>'.USUARIO_MSG_DE_ORIENTACAO_1.': <a href="'.URL_BASE.'painel/profile" target="blanck">Aqui</a></p>
					<p>'.USUARIO_MSG_ATT.'</p> 
					<p>'.USUARIO_MSG_CONTATO_CRIADOR.'</p>'); 

					//Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
					//$mail->MsgHTML(file_get_contents('arquivo.html'));

					$mail->Send();

					//caso apresente algum erro é apresentado abaixo com essa exceção.
				    } catch (phpmailerException $e) {
				    	header('Location: ' . URL_BASE . 'erro/msg/' . $e->errorMessage());
					}
					
					header('Location: ' . URL_BASE . 'login/entrar');
			} else {
				header('Location: ' . URL_BASE . 'erro/codigo/002');
			}
	
		}
	}

	function atualizar(){
		$usuario = new Usuario_Model();
		if ($usuario->update('usuarios', 
							['nome','sexo','pais','data_nascimento','cidade','estado','whats_app','skype','rpgs_preferido','classe_preferida','raca_preferida','e_mestre','frase_preferida','login','foto_link','capa_link','facebook_link','twitter_link','gplus_link','pagina_social','site_pessoal','email','descricao'], 
							[$_REQUEST['nome'],$_REQUEST['sexo'],$_REQUEST['pais'],$_REQUEST['data_nascimento'],$_REQUEST['cidade'],$_REQUEST['estado'],$_REQUEST['whats_app'],$_REQUEST['skype'],$_REQUEST['rpgs_preferido'],$_REQUEST['classe_preferida'],$_REQUEST['raca_preferida'],$_REQUEST['e_mestre'],$_REQUEST['frase_preferida'],$_REQUEST['login'],$_REQUEST['foto_link'],$_REQUEST['capa_link'],$_REQUEST['facebook_link'],$_REQUEST['twitter_link'],$_REQUEST['gplus_link'],$_REQUEST['pagina_social'],$_REQUEST['site_pessoal'],$_REQUEST['email'],$_REQUEST['descricao']], 
							'id', $_REQUEST['id'])) {
			header('Location: ' . URL_BASE . 'usuario/profile');
		} else {
			header('Location: ' . URL_BASE . 'erro/codigo/003');
		}
	}

	function listar(){
		session_start();
		if (!isset($_SESSION['id']) and !isset($_SESSION['nome']) and !isset($_SESSION['login'])) 
		    header("Location: " . URL_BASE);

		$tag = new Tags_Lib;
		$form = new Form_Lib;
		$painel = new Painel_Model;
		$usuario = new Usuario_Model();
		$usuarios = $usuario->select('usuarios');
		require (new Render_Lib('listar'))->get_required_path();
	}		
}