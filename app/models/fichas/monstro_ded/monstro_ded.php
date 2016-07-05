<?php
/**
 * HelpRPG, Um site criado com intuito de ajudar os mestre de RPG que jogam no sistema d20.
 *
 * @author    Maickon José Rangel <maickonmaickonmaickon@Gmaicl.com>
 * @copyright 2012-2013 Maickon José Rangel <maickonmaickonmaickon@Gmaicl.com>
 * @version   1.2
 * @link      https://github.com/maickon/HelpRPG
 */

class Monstros {
	public $pv;
	public $tipo;
	public $rd;
	public $RM;
	public $nd;
	public $iniciativa;
	public $riqueza;
	public $xp_oferecido;
	public $deslocamento_terrestre;
	public $deslocamento_voando;
	public $armadura_natural;
	public $CA;
	public $BBA;
	public $bonus_base_ataque;
	public $ataque_distancia_1;
	public $ataque_distancia_2;
	public $ataque_distancia_3;
	public $ataque_distancia_4;
	public $agarrar;
	public $mod_agarrar;
	public $ataque;
	public $ataque_distancia;
	public $ataque_total;
	public $penalidade_bonus_esconder;
	public $ataque_ca;
	public $espaco;
	public $alcance;
	public $fortitude;
	public $vontade;
	public $reflexos;
	public $pericias;
	public $talentos;
	public $ambiente;
	public $tesouro;
	public $tamanho;
	public $for_;
	public $des_;
	public $con_;
	public $int_;
	public $sab_;
	public $car_;
	public $img = 'monster.jpg';
	public $pancada_tentaculo;
	public $mordida;
	public $garra_ferrao;
	public $chifre_cauda;
	public $subtipo;

	function __construct(){
		$this->gerar_tipo();
		$this->gerar_tamanho();
		$this->gerar_nd();
		$this->gerar_habilidades();
		$this->gerar_subtipo();
		$this->gerar_dano();
		$this->gerar_deslocamento();
		$this->gerar_dimencoes();
		$this->gerar_riqueza();
		$this->gerar_armadura_natural();
		$this->gerar_ataque();
		$this->gerar_CA();
		$this->gerar_ataque_distancia();
		$this->sugerir_qualidades_especiais();
		$this->sugerir_ataques_especias();
		$this->gerar_RD();
		$this->gerar_PV();
		$this->exibir_BBA();
		$this->gerar_testes_de_resistencia();
		$this->xp_oferecido();
		$this->gerar_talentos();
		$this->gerar_agarrar();		
		$this->pvs_adicionais();
		$this->gerar_RM();
		$this->criaturas_irracionais();
		$this->morto_vivo();
		$this->gerar_pts_de_pericia();
	}
	
	function construtor_montado($nivel='', $subtipo='', $tipo='', $tamanho=''){
		if(!empty($tipo)):
			$this->tipo = utf8_encode($tipo);
			$this->escolher_img();
		else:
			$this->gerar_tipo();	
		endif;
		if(!empty($tamanho)):
			$this->tamanho = utf8_encode($tamanho);
		else:
			$this->gerar_tamanho();	
		endif;
		if(!empty($nivel)):
			$this->nd = $nivel;
		else:
			$this->gerar_nd();
		endif;
		$this->gerar_habilidades();
		if(!empty($subtipo)):
			$this->subtipo = utf8_encode($subtipo);
		else:
			$this->gerar_subtipo();
		endif;
		$this->gerar_dano();
		$this->gerar_deslocamento();
		$this->gerar_dimencoes();
		$this->gerar_riqueza();
		$this->gerar_armadura_natural();
		$this->gerar_ataque();
		$this->gerar_CA();
		$this->gerar_ataque_distancia();
		$this->sugerir_qualidades_especiais();
		$this->sugerir_ataques_especias();
		$this->gerar_RD();
		$this->gerar_PV();
		$this->exibir_BBA();
		$this->gerar_testes_de_resistencia();
		$this->xp_oferecido();
		$this->gerar_talentos();
		$this->gerar_agarrar();		
		$this->pvs_adicionais();
		$this->gerar_RM();
		$this->criaturas_irracionais();
		$this->morto_vivo();
		$this->gerar_pts_de_pericia();		
	}
	
	function gerar_imagem($pos){
		$tipos = array('aberracao','animal','besta_magica','constructo','dragao','elemental','fada','gigante',
					   'humanoide_monstruoso','humanoide','inseto','limo','morto-vivo','planta');
		$this->img =  $tipos[$pos].'.jpg';
	}
	
	function escolher_img(){
		switch($this->tipo):
			case 'aberração': $this->img = 'aberracao.jpg';
			break;
			
			case 'animal': $this->img = 'animal.jpg';
			break;
			
			case 'besta mágica': $this->img = 'besta_magica.jpg';
			break;
			
			case 'constructo': $this->img = 'constructo.jpg';
			break;
			
			case 'dragão': $this->img = 'dragao.jpg';
			break;
			
			case 'elemental': $this->img = 'elemental.jpg';
			break;
			
			case 'fada': $this->img = 'fada.jpg';
			break;
			
			case 'gigante': $this->img = 'gigante.jpg';
			break;
			
			case 'humanóide monstruoso': $this->img = 'humanoide_monstruoso.jpg';
			break;
			
			case 'humanóide': $this->img = 'humanoide.jpg';
			break;
			
			case 'inseto': $this->img = 'inseto.jpg';
			break;
			
			case 'limo': $this->img = 'limo.jpg';
			break;
			
			case 'morto-vivo': $this->img = 'morto-vivo.jpg';
			break;
			
			case 'planta': $this->img = 'planta.jpg';
			break;
		endswitch;
	}
	
	function gerar_tipo(){
		$tipos = array('aberração','animal','besta mágica','constructo','dragão','elemental','fada','gigante',
					   'humanóide monstruoso','humanóide','inseto','limo','morto-vivo','planta');
		$escolido = rand(0,count($tipos)-1);
		$this->gerar_imagem($escolido);
		$this->tipo =  $tipos[$escolido];			   
	}
	
	function gerar_talentos(){
		$this->talentos = 1+intval($this->nd/3);
	}
	
	function print_talentos(){
		return 'Você tem '.$this->talentos.' talento(s) a sua escolha para completar a criatura.';
	}
	
	function gerar_tamanho(){
		$tamanhos = array('pequeno','médio','grande','enorme','imenso','colossal');
		$escolido = rand(0,count($tamanhos)-1);
		$this->tamanho = $tamanhos[$escolido];
	}
	
	function gerar_subtipo(){
		$subtipos = array('água','anjo','aquático','ar','arconte','avançado','baatezu','bom','caos','eladrin','enxame','fogo','frio','gurdinal','incopóreo',
						  'leal','mau','metamorfo','planar','réptil','tana\'ri','terra');
		$escolido = rand(0,count($subtipos)-1);
		$this->subtipo = $subtipos[$escolido];
	}
	
	function print_CA(){
		$CA = '10'.$this->gerar_modificador_destreza().'(des)+'.$this->armadura_natural.'(arm nat)+'.$this->ataque_ca.'(tam)';
		return $CA;
	}
	
	function gerar_CA(){
		$this->CA = $this->gerar_modificador_destreza()+$this->armadura_natural+$this->ataque_ca+10; 
	}
	
	function gerar_RM(){
		$this->RM = $this->nd+11; 
	}
	
	function gerar_nd(){
		switch($this->tamanho):
			case 'pequeno':
				$this->nd = rand(1,20);
			break;
			
			case 'médio':
				$this->nd = rand(1,20);
			break;
			
			case 'grande':
				$this->nd = rand(3,25);
			break;
			
			case 'enorme':
				$this->nd = rand(8,35);
			break;
			
			case 'imenso':
				$this->nd = rand(12,45);
			break;
			
			case 'colossal':
				$this->nd = rand(24,50);
			break;
			
		endswitch;
	}
	
	function gerar_dimencoes(){
		switch($this->tamanho):
			case 'pequeno':
				$this->espaco 	= '1,5m';
				$this->alcance	= '1,5m';
				$this->dimencao	= rand(30,60).'Cm';
				$this->peso		= rand(4,30).'Kg';
				$this->mod_agarrar 	= -4;
				$this->penalidade_bonus_esconder = 4;
				$this->ataque_ca= 1;
			break;
			
			case 'médio':
				$this->espaco 	= '1,5m';
				$this->alcance	= '1,5m';
				$this->dimencao	= rand(1.2,2.4).'m';
				$this->peso		= rand(30,250).'Kg';
				$this->mod_agarrar 	= 0;
				$this->penalidade_bonus_esconder = 0;
				$this->ataque_ca= 0;
			break;
			
			case 'grande':
				$this->espaco 	= '3m';
				$this->alcance	= '3m';
				$this->dimencao	= rand(2.40,4.80).'m';
				$this->peso		= rand(250,2000).'Kg';
				$this->mod_agarrar 	= +4;
				$this->penalidade_bonus_esconder = -4;
				$this->ataque_ca= -1;
			break;
			
			case 'enorme':
				$this->espaco 	= '4,5m';
				$this->alcance	= '4,5m';
				$this->dimencao	= rand(4.8,9.6).'m';
				$this->peso		= rand(2,16).'Tons';
				$this->mod_agarrar 	= +8;
				$this->penalidade_bonus_esconder = -8;
				$this->ataque_ca= -2;
			break;
			
			case 'imenso':
				$this->espaco 	= '6m';
				$this->alcance	= '6m';
				$this->dimencao	= rand(9.6,19.2).'m';
				$this->peso		= rand(16,125).'Tons';
				$this->mod_agarrar 	= +12;
				$this->penalidade_bonus_esconder = -12;
				$this->ataque_ca= -4;
			break;
			
			case 'colossal':
				$this->espaco 	= '9m';
				$this->alcance	= '9m';
				$this->dimencao	= rand(19,30).'m';
				$this->peso		= rand(125,200).'Tons';
				$this->mod_agarrar 	= +16;
				$this->penalidade_bonus_esconder = -16;
				$this->ataque_ca= -8;
			break;
			
		endswitch;
	}

	
	function gerar_habilidades(){
		
		switch($this->tamanho):
			case 'pequeno':
				$this->for_ 		= rand(10,11);
				$this->des_ 		= rand(10,21);
				$this->con_ 		= rand(10,17);
				$this->int_			= rand(10,18);
				$this->sab_ 		= rand(10,18);
				$this->car_ 		= rand(10,18);
			break;
			
			case 'médio':
				$this->for_ 		= rand(10,19);
				$this->des_			= rand(10,19);
				$this->con_ 		= rand(10,19);
				$this->int_ 		= rand(10,18);
				$this->sab_ 		= rand(10,18);
				$this->car_ 		= rand(10,18);
			break;
			
			case 'grande':
				$this->for_ 		= rand(18,27);
				$this->des_ 		= rand(10,17);
				$this->con_ 		= rand(10,23);
				$this->int_ 		= rand(10,18);
				$this->sab_ 		= rand(10,18);
				$this->car_ 		= rand(10,18);
			break;
			
			case 'enorme':
				$this->for_ 		= rand(24,33);
				$this->des_ 		= rand(10,15);
				$this->con_ 		= rand(12,27);
				$this->int_			= rand(10,18);
				$this->sab_ 		= rand(10,18);
				$this->car_ 		= rand(10,18);
			break;
			
			case 'imenso':
				$this->for_ 		= rand(30,41);
				$this->des_ 		= rand(10,13);
				$this->con_ 		= rand(14,31);
				$this->int_ 		= rand(10,18);
				$this->sab_ 		= rand(10,18);
				$this->car_ 		= rand(10,18);
			break;
			
			case 'colossal':
				$this->for_ 		= rand(36,40);
				$this->des_ 		= rand(10,11);
				$this->con_ 		= rand(18,40);
				$this->int_ 		= rand(10,18);
				$this->sab_ 		= rand(10,18);
				$this->car_ 		= rand(10,18);
			break;
		endswitch;
	}
	
	function gerar_dano(){
		switch($this->tamanho):
			case 'pequeno':
				$this->pancada_tentaculo 	= '1d3';
				$this->mordida 				= '1d4';
				$this->garra_ferrao 		= '1d3';
				$this->chifre_cauda 		= '1d4';
			break;
			
			case 'médio':
				$this->pancada_tentaculo 	= '1d4';
				$this->mordida 				= '1d6';
				$this->garra_ferrao 		= '1d4';
				$this->chifre_cauda 		= '1d6';
			break;
			
			case 'grande':
				$this->pancada_tentaculo 	= '1d6';
				$this->mordida 				= '1d8';
				$this->garra_ferrao 		= '1d6';
				$this->chifre_cauda 		= '1d8';
			break;
			
			case 'enorme':
				$this->pancada_tentaculo 	= '1d8';
				$this->mordida 				= '2d6';
				$this->garra_ferrao 		= '1d8';
				$this->chifre_cauda 		= '2d6';
			break;
			
			case 'imenso':
				$this->pancada_tentaculo 	= '2d6';
				$this->mordida 				= '2d8';
				$this->garra_ferrao 		= '2d6';
				$this->chifre_cauda 		= '2d8';
			break;
			
			case 'colossal':
				$this->pancada_tentaculo 	= '2d8';
				$this->mordida 				= '4d6';
				$this->garra_ferrao 		= '2d8';
				$this->chifre_cauda 		= '4d6';
			break;
			
		endswitch;
	}
	
	function gerar_deslocamento(){
		
		switch($this->tamanho):	
			case 'pequeno':
				$this->deslocamento_terrestre 	= '6m';
				$this->deslocamento_voando 		= '15m';
			break;
			
			case 'médio':
				$this->deslocamento_terrestre 	= '9m';
				$this->deslocamento_voando 		= '12m';
			break;
			
			case 'grande':
				$this->deslocamento_terrestre 	= '12m';
				$this->deslocamento_voando 		= '15m';
			break;
			
			case 'enorme':
				$this->deslocamento_terrestre 	= '15m';
				$this->deslocamento_voando 		= '18m';
			break;
			
			case 'imenso':
				$this->deslocamento_terrestre 	= '18m';
				$this->deslocamento_voando 		= '21m';
			break;
			
			case 'colossal':
				$this->deslocamento_terrestre 	= '21m';
				$this->deslocamento_voando 		= '24m';
			break;
			
		endswitch;
	
	}
	
	function gerar_riqueza(){
		$this->riqueza = ($this->nd*rand(100,1000));
	}
	
	function gerar_armadura_natural(){
		
		switch($this->tamanho):
			case 'pequeno':
				$this->armadura_natural = intval(($this->nd/2));
			break;
			
			case 'médio':
				$this->armadura_natural = intval(($this->nd/2));
			break;
			
			case 'grande':
				$this->armadura_natural = intval(($this->nd/2))+3;
			break;
			
			case 'enorme':
				$this->armadura_natural = intval(($this->nd/2))+5;
			break;
			
			case 'imenso':
				$this->armadura_natural = intval(($this->nd/2))+7;
			break;
			
			case 'colossal':
				$this->armadura_natural = intval(($this->nd/2))+9;
			break;

		endswitch;
	}
	
	function gerar_ataque(){
		$this->ataque = $this->gerar_modificador_forca() + $this->nd;
	}
	
	function gerar_ataque_distancia(){
		$this->ataque_distancia = $this->gerar_modificador_destreza() + $this->nd;
	}
	
	function gerar_agarrar(){
		$this->agarrar = $this->gerar_modificador_forca() + $this->nd + $this->mod_agarrar;
	}
	
	function pvs_adicionais(){
		switch($this->tamanho):
			case 'pequeno':
				$this->pv = $this->pv+10;
			break;
			
			case 'médio':
				$this->pv = $this->pv+20;
			break;
			
			case 'grande':
				$this->pv = $this->pv+30;
			break;
			
			case 'enorme':
				$this->pv = $this->pv+40;
			break;
			
			case 'imenso':
				$this->pv = $this->pv+60;
			break;
			
			case 'colossal':
				$this->pv = $this->pv+80;
			break;

		endswitch;
	}
	
	function sugerir_qualidades_especiais(){
		$qualidades = array('Característica de subtipo','Característica de tipo','Cura acelerada','Faro','Imunidade a magia','Imunidade a um certo tipo de energia ou ataque',
							'Percepção ás cegas','Presença aterradora','Redução de dano','Regeneração','Resistência a energia','Resistência a magia','Resistência a expulsão',
							'Sentido cego','Sentido sísmico, aquático ou aéreo');
		return $qualidades;
	}
	
	function sugerir_ataques_especias(){
		$ataques_especiais = array('Agarrar aprimorado','Alterar forma','Ataque sônico','Ataque visual','Atropelar','Bote','Constrição','Dano de habilidade(permanente)',
								   'Dano de habilidade(temporário)','Dilacerar','Doença','Drenar energia(níveis negativos)','Engolir','Ferimento amaldiçoado','Habilidades 	
								    similares a magia','Investida poderosa','Invocação','Magias','Medo','Paralisia','Pisiquismo','Raio','Rugido','Sangramento','Sopro','Veneno')
									;
		return $ataques_especiais;							
	}

	function gerar_RD(){
		if($this->nd >= 3 && $this->nd <=5):
			$this->rd = 5;
		elseif($this->nd >= 6 && $this->nd <=13):
			$this->rd = 10;
		elseif($this->nd >= 14 && $this->nd <=20):
			$this->rd = 15;
		elseif($this->nd >= 21 && $this->nd <=27):
			$this->rd = 20;
		elseif($this->nd >= 28 && $this->nd <=34):
			$this->rd = 25;
		elseif($this->nd >= 35 && $this->nd <=60):
			$this->rd = 30;
		endif;
	}

	function gerar_modificador_forca(){
		
			if(($this->for_ -10)/2 == -0.5){
				$ajuste = -1;
			}elseif(($this->for_ -10)/2 == -1.5){
				$ajuste = -2;
			}elseif(($this->for_ -10)/2 == -2.5){
				$ajuste = -3;
			}elseif(($this->for_ -10)/2 == -3.5){
				$ajuste = -4;
			}elseif(($this->for_ -10)/2 == -4.5){
				$ajuste = -5;
			}else{
				$ajuste = ($this->for_ -10)/2;
			}
	
			$modificador = intval($ajuste);
			if($modificador >= 0){
				$modificador = "+".$modificador;
			}
			return $modificador;
		}
		
	function gerar_modificador_destreza(){
		
		if(($this->des_ -10)/2 == -0.5){
			$ajuste = -1;
		}elseif(($this->des_ -10)/2 == -1.5){
			$ajuste = -2;
		}elseif(($this->des_ -10)/2 == -2.5){
			$ajuste = -3;
		}elseif(($this->des_ -10)/2 == -3.5){
			$ajuste = -4;
		}elseif(($this->des_ -10)/2 == -4.5){
			$ajuste = -5;
		}else{
			$ajuste = ($this->des_ -10)/2;
		}

		$modificador = intval($ajuste);
		if($modificador >= 0){
			$modificador = "+".$modificador;
		}
		return $modificador;
	}
	
	function gerar_modificador_constituicao(){
		
		if(($this->con_ -10)/2 == -0.5){
			$ajuste = -1;
		}elseif(($this->con_ -10)/2 == -1.5){
			$ajuste = -2;
		}elseif(($this->con_ -10)/2 == -2.5){
			$ajuste = -3;
		}elseif(($this->con_ -10)/2 == -3.5){
			$ajuste = -4;
		}elseif(($this->con_ -10)/2 == -4.5){
			$ajuste = -5;
		}else{
			$ajuste = ($this->con_ -10)/2;
		}

		$modificador = intval($ajuste);
		if($modificador >= 0){
			$modificador = "+".$modificador;
		}
		return $modificador;
	}
	
	function gerar_modificador_inteligencia(){
		
		if(($this->int_ -10)/2 == -0.5){
			$ajuste = -1;
		}elseif(($this->int_ -10)/2 == -1.5){
			$ajuste = -2;
		}elseif(($this->int_ -10)/2 == -2.5){
			$ajuste = -3;
		}elseif(($this->int_ -10)/2 == -3.5){
			$ajuste = -4;
		}elseif(($this->int_ -10)/2 == -4.5){
			$ajuste = -5;
		}else{
			$ajuste = ($this->int_ -10)/2;
		}

		$modificador = intval($ajuste);
		if($modificador >= 0){
			$modificador = "+".$modificador;
		}
		return $modificador;
	}
	
	function gerar_modificador_sabedoria(){
		
		if(($this->sab_ -10)/2 == -0.5){
			$ajuste = -1;
		}elseif(($this->sab_ -10)/2 == -1.5){
			$ajuste = -2;
		}elseif(($this->sab_ -10)/2 == -2.5){
			$ajuste = -3;
		}elseif(($this->sab_ -10)/2 == -3.5){
			$ajuste = -4;
		}elseif(($this->sab_ -10)/2 == -4.5){
			$ajuste = -5;
		}else{
			$ajuste = ($this->sab_ -10)/2;
		}
		
		$modificador = intval($ajuste);
		if($modificador >= 0){
			$modificador = "+".$modificador;
		}
		return $modificador;
	}
	
	function gerar_modificador_carisma(){
		
		if(($this->car_ -10)/2 == -0.5){
			$ajuste = -1;
		}elseif(($this->car_ -10)/2 == -1.5){
			$ajuste = -2;
		}elseif(($this->car_ -10)/2 == -2.5){
			$ajuste = -3;
		}elseif(($this->car_ -10)/2 == -3.5){
			$ajuste = -4;
		}elseif(($this->car_ -10)/2 == -4.5){
			$ajuste = -5;
		}else{
			$ajuste = ($this->car_ -10)/2;
		}

		$modificador = intval($ajuste);
		if($modificador >= 0){
			$modificador = "+".$modificador;
		}
		return $modificador;
	}
	
	function xp_oferecido(){
		$this->xp_oferecido = intval(($this->nd/2)*rand(600,1200));
	}
	
	function gerar_PV(){
		
		$nivel = $this->nd; 
		$nivelNegativo = $nivel -1;
		$qtdPontosDeVida = 0;
		$qtdPontosDeVidaInicial = 0;

		$d4  = rand(1,4);
		$d6  = rand(1,6);
		$d8  = rand(1,8);
		$d10 = rand(1,10);
		$d12 = rand(1,12);
		
		$modificador = $this->gerar_modificador_constituicao();
		
		$rolagem = 0;
		
		for($i = 1; $i <= $nivel; $i++){
			
			if($i == 1){
				switch($this->tipo){
					case "aberração": $qtdPontosDeVidaInicial = $qtdPontosDeVidaInicial + ((8 + $modificador));
					break;
					
					case "animal": $qtdPontosDeVidaInicial = $qtdPontosDeVidaInicial + ((8 + $modificador));
					break;
					
					case "besta mágica": $qtdPontosDeVidaInicial = $qtdPontosDeVidaInicial + ((10 + $modificador));
					break;
					
					case "constructo": $qtdPontosDeVidaInicial = $qtdPontosDeVidaInicial + ((10 + $modificador));
					break;
					
					case "dragão": $qtdPontosDeVidaInicial = $qtdPontosDeVidaInicial + ((12 + $modificador));
					break;
					
					case "elemental": $qtdPontosDeVidaInicial = $qtdPontosDeVidaInicial + ((8 + $modificador));
					break;
					
					case "extra-planar": $qtdPontosDeVidaInicial = $qtdPontosDeVidaInicial + ((8 + $modificador));
					break;
					
					case "fada": $qtdPontosDeVidaInicial = $qtdPontosDeVidaInicial + ((6 + $modificador));
					break;
					
					case "humanóide": $qtdPontosDeVidaInicial = $qtdPontosDeVidaInicial + ((8 + $modificador));
					break;
					
					case "gigante": $qtdPontosDeVidaInicial = $qtdPontosDeVidaInicial + ((8 + $modificador));
					break;
					
					case "humanóide monstruoso": $qtdPontosDeVidaInicial = $qtdPontosDeVidaInicial + ((8 + $modificador));
					break;
					
					case "inseto": $qtdPontosDeVidaInicial = $qtdPontosDeVidaInicial + ((8 + $modificador));
					break;
					
					case "limo": $qtdPontosDeVidaInicial = $qtdPontosDeVidaInicial + ((10 + $modificador));
					break;
					
					case "morto-vivo": $qtdPontosDeVidaInicial = $qtdPontosDeVidaInicial + ((12 + $modificador));
					break;
					
					case "planta": $qtdPontosDeVidaInicial = $qtdPontosDeVidaInicial + ((8 + $modificador));
					break;
					
				}
			}else{
				
				switch($this->tipo){
					case "aberração": $qtdPontosDeVida = ($qtdPontosDeVida + $d8 + $modificador);			
					break;
					
					case "animal": $qtdPontosDeVida = ($qtdPontosDeVida + $d8 + $modificador);
					break;
					
					case "besta mágica": $qtdPontosDeVida = ($qtdPontosDeVida + $d10 + $modificador);
					break;
					
					case "constructo": $qtdPontosDeVida = ($qtdPontosDeVida + $d10 + $modificador);
					break;
					
					case "dragão": $qtdPontosDeVida = ($qtdPontosDeVida + $d12 + $modificador);
					break;
					
					case "elemental": $qtdPontosDeVida = ($qtdPontosDeVida + $d8 + $modificador);
					break;
				
					case "extra-planar": $qtdPontosDeVida = ($qtdPontosDeVida + $d8 + $modificador);
					break;
					
					case "fada": $qtdPontosDeVida = ($qtdPontosDeVida + $d6 + $modificador);
					break;
					
					case "humanóide": $qtdPontosDeVida = ($qtdPontosDeVida + $d8 + $modificador);		  
					break;
					
					case "gigante": $qtdPontosDeVida = ($qtdPontosDeVida + $d8 + $modificador);
					break;
					
					case "humanóide monstruoso": $qtdPontosDeVida = ($qtdPontosDeVida + $d8 + $modificador);
	  				break;
					
					case "inseto": $qtdPontosDeVida = ($qtdPontosDeVida + $d8 + $modificador);			
					break;
					
					case "limo": $qtdPontosDeVida = ($qtdPontosDeVida + $d10 + $modificador);
					break;
					
					case "morto-vivo": $qtdPontosDeVida = ($qtdPontosDeVida + $d12 + $modificador);
					break;
					
					case "planta": $qtdPontosDeVida = ($qtdPontosDeVida + $d8 + $modificador);
					break;
					
				}
		
			}
		}
		
		$this->pv = ($qtdPontosDeVida + $qtdPontosDeVidaInicial);
		return $this->pv;
	
	}


	function formatar_BBA(){
	
		$nivel = $this->nd;
		$nivelAdd = 0;
		if($nivel > 20){
			$atualizarNivel = 20;
			
			switch($nivel){
			
				case 21: $nivelAdd = 1;
				break;
				
				case 22: $nivelAdd = 1;
				break;
				
				case 23: $nivelAdd = 2;
				break;
				
				case 24: $nivelAdd = 2;
				break;
				
				case 25: $nivelAdd = 3;
				break;
				
				case 26: $nivelAdd = 3;
				break;
				
				case 27: $nivelAdd = 4;
				break;
				
				case 28: $nivelAdd = 4;
				break;
				
				case 29: $nivelAdd = 5;
				break;
				
				case 30: $nivelAdd = 5;
				break;
				
				case 31: $nivelAdd = 6;
				break;
				
				case 32: $nivelAdd = 6;
				break;
				
				case 33: $nivelAdd = 7;
				break;
				
				case 34: $nivelAdd = 7;
				break;
				
				case 35: $nivelAdd = 8;
				break;
				
				case 36: $nivelAdd = 8;
				break;
				
				case 37: $nivelAdd = 9;
				break;

				case 38: $nivelAdd = 9;
				break;
				
				case 39: $nivelAdd = 10;
				break;

				case 40: $nivelAdd = 10;
				break;
				
				case 41: $nivelAdd = 11;
				break;
				
				case 42: $nivelAdd = 11;
				break;
				
				case 43: $nivelAdd = 12;
				break;
				
				case 44: $nivelAdd = 12;
				break;
				
				case 45: $nivelAdd = 13;
				break;
				
				case 46: $nivelAdd = 13;
				break;
				
				case 47: $nivelAdd = 14;
				break;
				
				case 48: $nivelAdd = 14;
				break;
				
				case 49: $nivelAdd = 15;
				break;
				
				case 50: $nivelAdd = 15;
				break;
			}
	
			$nivel = $atualizarNivel + $nivelAdd;
			
		}
		
		$estagio_1 = $nivel;
		$estagio_2 = $nivel;
		$estagio_3 = $nivel;
		$estagio_4 = $nivel;
		
		
		$Atq1 = 0;
		$Atq2 = 0;
		$Atq3 = 0;
		$Atq4 = 0;
		
			for($i = $estagio_1; $i > 0; $i--){
				
				if($i == 16){
					for($j = $estagio_2-15; $j > 0; $j--){
						$Atq4++;
					}
				}else{
					if($i == 11){
						for($k = $estagio_3-10; $k > 0; $k--){
							$Atq3++;
						}
					}else{
						if($i == 6){
							for($l = $estagio_4-5; $l > 0; $l--){
								$Atq2++;
							}
						}
					}
				}
				
				$Atq1++;
			}	
		
			
		if($Atq2 == 0 && $Atq3 == 0 && $Atq4 == 0){
			$this->bonus_base_ataque[0] = ($Atq1);
			$this->bonus_base_ataque[1] = '';
			$this->bonus_base_ataque[2] = '';
			$this->bonus_base_ataque[3] = '';
		}else{
			if($Atq3 == 0 && $Atq4 == 0){
				$this->bonus_base_ataque[0] = ($Atq1);
				$this->bonus_base_ataque[1] = ($Atq2);
				$this->bonus_base_ataque[2] = '';
				$this->bonus_base_ataque[3] = '';
			}else{
				if($Atq4 == 0){
					$this->bonus_base_ataque[0] = ($Atq1);
					$this->bonus_base_ataque[1] = ($Atq2);
					$this->bonus_base_ataque[2] = ($Atq3);
					$this->bonus_base_ataque[3] = '';
				}else{
					$this->bonus_base_ataque[0] = ($Atq1);
					$this->bonus_base_ataque[1] = ($Atq2);
					$this->bonus_base_ataque[2] = ($Atq3);
					$this->bonus_base_ataque[3] = ($Atq4);
				}
			}
		}
	}
	
	function formatar_BBA_medio(){
		$bba = $this->BBA;
		$bbaMedio = 0;
		switch($bba){
			case 1: $bbaMedio = -1;
			break;
			
			case 2: $bbaMedio = -1;
			break;
			
			case 3: $bbaMedio = -1;
			break;
			
			case 4: $bbaMedio = -1;
			break;
			
			case 5: $bbaMedio = -2;
			break;
			
			case 6: $bbaMedio = -2;
			break;
			
			case 7: $bbaMedio = -2;
			break;
			
			case 8: $bbaMedio = -2;
			break;
			
			case 9: $bbaMedio = -3;
			break;
			
			case 10: $bbaMedio = -3;
			break;
			
			case 11: $bbaMedio = -3;
			break;
			
			case 12: $bbaMedio = -3;
			break;
			
			case 13: $bbaMedio = -4;
			break;
			
			case 14: $bbaMedio = -4;
			break;
			
			case 15: $bbaMedio = -4;
			break;
			
			case 16: $bbaMedio = -4;
			break;
			
			case 17: $bbaMedio = -5;
			break;
			
			case 18: $bbaMedio = -5;
			break;
			
			case 19: $bbaMedio = -5;
			break;
			
			case 20: $bbaMedio = -5;
			break;
			
			case 21: $bbaMedio = -4;
			break;
			
			case 22: $bbaMedio = -4;
			break;
			
			case 23: $bbaMedio = -3;
			break;
			
			case 24: $bbaMedio = -3;
			break;
			
			case 25: $bbaMedio = -2;
			break;
			
			case 26: $bbaMedio = -2;
			break;
			
			case 27: $bbaMedio = -1;
			break;
			
			case 28: $bbaMedio = -1;
			break;
			
			case 29: $bbaMedio = 0;
			break;
			
			case 30: $bbaMedio = 0;
			break;
			
			case 31: $bbaMedio = 1;
			break;
			
			case 32: $bbaMedio = 1;
			break;
			
			case 33: $bbaMedio = 2;
			break;
			
			case 34: $bbaMedio = 2;
			break;
			
			case 35: $bbaMedio = 3;
			break;
			
			case 36: $bbaMedio = 3;
			break;
			
			case 37: $bbaMedio = 4;
			break;
			
			case 38: $bbaMedio = 4;
			break;
			
			case 39: $bbaMedio = 5;
			break;
			
			case 40: $bbaMedio = 5;
			break;
			
			case 41: $bbaMedio = 6;
			break;
			
			case 42: $bbaMedio = 6;
			break;
			
			case 43: $bbaMedio = 7;
			break;
			
			case 44: $bbaMedio = 7;
			break;
			
			case 45: $bbaMedio = 8;
			break;
			
			case 46: $bbaMedio = 8;
			break;
			
			case 47: $bbaMedio = 9;
			break;
			
			case 48: $bbaMedio = 9;
			break;
			
			case 49: $bbaMedio = 10;
			break;
			
			case 50: $bbaMedio = 10;
			break;
			
			case 51: $bbaMedio = 11;
			break;
		}
		$bba = $bba + $bbaMedio;
		if($bba < 0){
			$bba = 0;
		}
		$this->BBA = $bba;
		return $this->BBA;
	}
	
	function  formatar_BBA_ruin(){
		
		$bbaRuin = 0;
		$bba = $this->BBA;
		
		switch($bba){
			case 1: $bbaRuin = -1;
			break;
			
			case 2: $bbaRuin = -1;
			break;
			
			case 3: $bbaRuin = -2;
			break;
			
			case 4: $bbaRuin = -2;
			break;
			
			case 5: $bbaRuin = -3;
			break;
			
			case 6: $bbaRuin = -3;
			break;
			
			case 7: $bbaRuin = -4;
			break;
			
			case 8: $bbaRuin = -4;
			break;
			
			case 9: $bbaRuin = -5;
			break;
			
			case 10: $bbaRuin = -5;
			break;
			
			case 11: $bbaRuin = -6;
			break;
			
			case 12: $bbaRuin = -6;
			break;
			
			case 13: $bbaRuin = -7;
			break;
			
			case 14: $bbaRuin = -7;
			break;
			
			case 15: $bbaRuin = -8;
			break;
			
			case 16: $bbaRuin = -8;
			break;
			
			case 17: $bbaRuin = -9;
			break;
			
			case 18: $bbaRuin = -9;
			break;
			
			case 19: $bbaRuin = -10;
			break;
			
			case 20: $bbaRuin = -10;
			break;
			
			case 21: $bbaRuin = -9;
			break;
			
			case 22: $bbaRuin = -9;
			break;
			
			case 23: $bbaRuin = -8;
			break;
			
			case 24: $bbaRuin = -8;
			break;
			
			case 25: $bbaRuin = -7;
			break;
			
			case 26: $bbaRuin = -7;
			break;
			
			case 27: $bbaRuin = -6;
			break;
			
			case 28: $bbaRuin = -6;
			break;
			
			case 29: $bbaRuin = -5;
			break;
			
			case 30: $bbaRuin = -5;
			break;
			
			case 31: $bbaRuin = -4;
			break;
			
			case 32: $bbaRuin = -4;
			break;
			
			case 33: $bbaRuin = -3;
			break;
			
			case 34: $bbaRuin = -3;
			break;
			
			case 35: $bbaRuin = -2;
			break;
			
			case 36: $bbaRuin = -2;
			break;
			
			case 37: $bbaRuin = -1;
			break;
			
			case 38: $bbaRuin = -1;
			break;
			
			case 39: $bbaRuin = 0;
			break;
			
			case 40: $bbaRuin = 0;
			break;
			
			case 41: $bbaRuin = +1;
			break;
			
			case 42: $bbaRuin = +1;
			break;
			
			case 43: $bbaRuin = +2;
			break;
			
			case 44: $bbaRuin = +2;
			break;
			
			case 45: $bbaRuin = +3;
			break;
			
			case 46: $bbaRuin = +3;
			break;
			
			case 47: $bbaRuin = +4;
			break;
			
			case 48: $bbaRuin = +4;
			break;
			
			case 49: $bbaRuin = +5;
			break;
			
			case 50: $bbaRuin = +5;
			break;
			
			case 51: $bbaRuin = +6;
			break;
		}
		
		$bba = $bba + $bbaRuin;
		if($bba < 0){
			$bba = 0;
		}
		$this->BBA = $bba;
		return $this->BBA;	
	
	}

	function exibir_BBA(){
		
			$categoria='';
			if($this->nd <= 0){
				//header('Location:error.php?tipo=errona funcao BBA');
			}
		
			switch($this->tipo){
			
				case "aberração": $categoria = "combatenteDiferente";
				break;
				
				case "animal": $categoria = "combatenteDiferente";
				break;
				
				case "besta mágica": $categoria = "combatente";
				break;
				
				case "constructo": $categoria = "combatenteDiferente";
				break;
				
				case "dragão": $categoria = "combatente";
				break;
				
				case "elemental": $categoria = "combatenteDiferente";
				break;
				
				case "extra-planar": $categoria = "combatente";
				break;
				
				case "fada": $categoria = "conjurador";
				break;
				
				case "gigante": $categoria = "combatenteDiferente"; 	 
				break;
				
				case "humanóide": $categoria = "combatenteDiferente";
				break;
				
				case "humanóide monstruoso": $categoria = "combatente"; 	 
				break;
				
				case "inseto": $categoria = "combatenteDiferente";
				break;
				
				case "limo": $categoria = "combatenteDiferente";
				break;
				
				case "morto-vivo": $categoria = "conjurador";
				break;
				
				case "planta": $categoria = "combatenteDiferente";
				break;
				
			}
		
		if($categoria == "combatente"){
			$this->formatar_BBA();
		}else{
			if($categoria == "combatenteDiferente"){
				$this->formatar_BBA_medio();
				$this->formatar_BBA();
		}else{
			if($categoria == "conjurador"){
				$this->formatar_BBA_ruin();
				$this->formatar_BBA();	
			}else{
				//header('Location:error.php?tipo=erro no casekk'.$this->tipo.'');
				}
			}
		}
	}
	
	function ataque_1(){
		$for_ = $this->gerar_modificador_forca();
		$bba_1 = $this->bonus_base_ataque[0];
		//print $for_;
		if($bba_1 <= 0){
			$bba_1 = 0;
			$for_  = 0;
		}
		return $bba_1 + $for_;
	}
	function ataque_2(){
		$for_ = $this->gerar_modificador_forca();
		$bba_2 = $this->bonus_base_ataque[1];
		if($bba_2 <= 0){
			$bba_2 = 0;
			$for_  = 0;
		}
		return $bba_2 + $for_;
	}

	function ataque_3(){
		$for_ = $this->gerar_modificador_forca();
		$bba_3 = $this->bonus_base_ataque[2];
		if($bba_3 <= 0){
			$bba_3 = 0;
			$for_  = 0;
		}
		return $bba_3 + $for_;
	}
	function ataque_4(){
		$for_ = $this->gerar_modificador_forca();
		$bba_4 = $this->bonus_base_ataque[3];
		if($bba_4 <= 0){
			$bba_4 = 0;
			$for_  = 0;
		}
		return $bba_4 + $for_;
	}


	function gerar_teste_de_resistencia_bom(){
		$nivel = $this->nd;
		$resistenciaBom = 0;
		
		if($nivel == 1){
			$resistenciaBom = 2;
		}else{
			$resistenciaBom = intval(($nivel/2) + 2);
		}
		
		return $resistenciaBom;
	}
	
	function gerar_teste_de_resistencia_ruin(){
		$nivel = $this->nd;
		$resistenciaRuin = 0;
		
			if($nivel == 1 && $nivel == 2):
				$resistenciaRuin = 0;
			else:
			if($nivel >= 3 && $nivel <= 5):
				$resistenciaRuin = 1;
			else:
			if($nivel >= 6 && $nivel <= 8):
				$resistenciaRuin = 2;
			else:
			if($nivel >= 9 && $nivel <= 11):
				$resistenciaRuin = 3;
			else:
			if($nivel >= 12 && $nivel <= 14):
				$resistenciaRuin = 4;
			else:
			if($nivel >= 15 && $nivel <= 17):
				$resistenciaRuin = 5;
			else:
			if($nivel >= 18 && $nivel <= 20):
				$resistenciaRuin = 6;
			else:
			if($nivel >= 21 && $nivel <= 23):
				$resistenciaRuin = 7;
			else:
			if($nivel >= 24 && $nivel <= 27):
				$resistenciaRuin = 8;
			else:
			if($nivel >= 28 && $nivel <= 30):
				$resistenciaRuin = 9;
			else:
			if($nivel >= 31 && $nivel <= 33):
				$resistenciaRuin = 10;
			endif;
			if($nivel >= 34 && $nivel <= 36):
				$resistenciaRuin = 11;
			endif;
			if($nivel >= 37 && $nivel <= 39):
				$resistenciaRuin = 12;
			endif;
			if($nivel >= 40 && $nivel <= 42):
				$resistenciaRuin = 13;
			endif;
			if($nivel >= 43 && $nivel <= 45):
				$resistenciaRuin = 14;
			endif;
			if($nivel >= 46 && $nivel <= 48):
				$resistenciaRuin = 15;
			endif;
			if($nivel >= 49 && $nivel <= 51):
				$resistenciaRuin = 16;
			endif;
			if($nivel >= 52 && $nivel <= 54):
				$resistenciaRuin = 17;
			endif;
			if($nivel >= 55 && $nivel <= 57):
				$resistenciaRuin = 18;
			endif;
			if($nivel >= 58 && $nivel <= 60):
				$resistenciaRuin = 19;
			endif;
			endif;
			endif;
			endif;
			endif;
			endif;
			endif;
			endif;
			endif;
			endif;
			endif;
	return $resistenciaRuin;
	}
	
	function gerar_testes_de_resistencia(){
		
		$nivel = $this->nd;
		$tipo = $this->tipo;
		
		switch($tipo){
		
		case "aberração": 	$this->fortitude = $this->gerar_teste_de_resistencia_ruin();
							$this->reflexos  = $this->gerar_teste_de_resistencia_ruin();
							$this->vontade   = $this->gerar_teste_de_resistencia_bom();
		break;
						
		case "animal": 		$this->fortitude = $this->gerar_teste_de_resistencia_bom();
					  		$this->reflexos  = $this->gerar_teste_de_resistencia_bom();
					  		$this->vontade   = $this->gerar_teste_de_resistencia_bom();
		break;
					  		
		case "besta mágica": $this->fortitude = $this->gerar_teste_de_resistencia_bom();
		  					$this->reflexos  = $this->gerar_teste_de_resistencia_bom();
		  					$this->vontade   = $this->gerar_teste_de_resistencia_ruin();

		break;

		case "constructo": 	$this->fortitude = '-';
		  					$this->reflexos  = '-';
		  					$this->vontade   = '-';
		break;
		  					
		case "dragão": 		$this->fortitude = $this->gerar_teste_de_resistencia_bom();
		  					$this->reflexos  = $this->gerar_teste_de_resistencia_bom();
		  					$this->vontade   = $this->gerar_teste_de_resistencia_bom();
		break;
		  					
		case "elemental": 	$this->fortitude = $this->gerar_teste_de_resistencia_bom();
							$this->reflexos  = $this->gerar_teste_de_resistencia_bom();
							$this->vontade   = $this->gerar_teste_de_resistencia_ruin();
		break;
							
		case "extra-planar": $this->fortitude = $this->gerar_teste_de_resistencia_bom();
		  					$this->reflexos  = $this->gerar_teste_de_resistencia_bom();
		  					$this->vontade   = $this->gerar_teste_de_resistencia_bom();	
		break;
		  					
		case "fada": 		$this->fortitude = $this->gerar_teste_de_resistencia_ruin();
		  					$this->reflexos  = $this->gerar_teste_de_resistencia_bom();
		  					$this->vontade   = $this->gerar_teste_de_resistencia_bom();				
		break;
		  					
		case "gigante": 	$this->fortitude = $this->gerar_teste_de_resistencia_bom();
							$this->reflexos  = $this->gerar_teste_de_resistencia_ruin();
							$this->vontade   = $this->gerar_teste_de_resistencia_ruin();
		break;
		
		case "humanóide": 	$this->fortitude = $this->gerar_teste_de_resistencia_bom();
							$this->reflexos  = $this->gerar_teste_de_resistencia_ruin();
							$this->vontade   = $this->gerar_teste_de_resistencia_ruin();
		break;
		
		case "humanóide monstruoso": $this->fortitude = $this->gerar_teste_de_resistencia_ruin();
									 $this->reflexos  = $this->gerar_teste_de_resistencia_bom();
									 $this->vontade   = $this->gerar_teste_de_resistencia_bom();
		break;
		
		case "inseto": 		$this->fortitude = $this->gerar_teste_de_resistencia_bom();
							$this->reflexos  = $this->gerar_teste_de_resistencia_ruin();
							$this->vontade   = $this->gerar_teste_de_resistencia_ruin();
		break;
						
		case "limo": 		$this->fortitude = '-';
					  		$this->reflexos  = '-';
					  		$this->vontade   = '-';
		break;
					  		
		case "morto-vivo": 	$this->fortitude = $this->gerar_teste_de_resistencia_ruin();
		  					$this->reflexos  = $this->gerar_teste_de_resistencia_ruin();
		  					$this->vontade   = $this->gerar_teste_de_resistencia_bom();
		break;

		case "planta": 		$this->fortitude = $this->gerar_teste_de_resistencia_bom();
		  					$this->reflexos  = $this->gerar_teste_de_resistencia_ruin();
		  					$this->vontade   = $this->gerar_teste_de_resistencia_ruin();
		break;
		
		}
		
	}
	
	function gerar_fortitude_total(){
		if($this->tipo == 'constructo' || $this->tipo == 'limo'):
			return '-';
		else:
			return ($this->fortitude + $this->gerar_modificador_constituicao());
		endif;
	}
	
	function gerar_reflexo_total(){
		if($this->tipo == 'constructo' || $this->tipo == 'limo'):
			return '-';
		else:
			return ($this->reflexos + $this->gerar_modificador_destreza());
		endif;
	}

	function gerar_vontade_total(){
		if($this->tipo == 'constructo' || $this->tipo == 'limo'):
			return '-';
		else:
			return ($this->vontade + $this->gerar_modificador_sabedoria());
		endif;
	}

	function print_fortitude_total(){
		if($this->tipo == 'constructo' || $this->tipo == 'limo'):
			return ' ';
		else:
			return ' = '.$this->fortitude.$this->gerar_modificador_constituicao();
		endif;
	}
	
	function print_reflexo_total(){
		if($this->tipo == 'constructo' || $this->tipo == 'limo'):
			return ' ';
		else:
			return ' = '.$this->reflexos.$this->gerar_modificador_destreza();
		endif;
	}

	function print_vontade_total(){
		if($this->tipo == 'constructo' || $this->tipo == 'limo'):
			return ' ';
		else:
			return ' = '.$this->vontade.$this->gerar_modificador_sabedoria();
		endif;
	}

		 
	function exibir_ataque_corpo_a_corpo(){
		$bonus_base_ataque = 0;
		$bba1 = $this->ataque_1();
		if($bba1 == 0)
			$bba1 = '';
		$bba2 = $this->ataque_2();
		if($bba1 == 0)
			$bba2 = '';
		$bba3 = $this->ataque_3();
		if($bba1 == 0)
			$bba3 = '';
		$bba4 = $this->ataque_4();
		if($bba1 == 0)
			$bba4 = '';
		
		if(!empty($bba1) && !empty($bba2) && !empty($bba3) && !empty($bba4)){
			$bonus_base_ataque =  $bba1." / ".$bba2." / ".$bba3." / ".$bba4;
		}
		elseif(!empty($bba1) && !empty($bba2) && !empty($bba3)){
			$bonus_base_ataque =  $bba1." / ".$bba2." / ".$bba3;
		}
		elseif(!empty($bba1) && !empty($bba2)){
			$bonus_base_ataque =  $bba1." / ".$bba2;
		}
		elseif(!empty($bba1)){
			$bonus_base_ataque =  $bba1;
		}
		return $bonus_base_ataque;
	}
	
	function exibir_bonus_base_ataque(){
		$bonus_base_ataque=0;
		if(!empty($this->bonus_base_ataque[0]) && !empty($this->bonus_base_ataque[1]) && !empty($this->bonus_base_ataque[2]) && !empty($this->bonus_base_ataque[3])){
			$bonus_base_ataque =  $this->bonus_base_ataque[0]." / ".$this->bonus_base_ataque[1]." / ".$this->bonus_base_ataque[2]." / ".$this->bonus_base_ataque[3];
		}
		elseif(!empty($this->bonus_base_ataque[0]) && !empty($this->bonus_base_ataque[1]) && !empty($this->bonus_base_ataque[2])){
			$bonus_base_ataque =  $this->bonus_base_ataque[0]." / ".$this->bonus_base_ataque[1]." / ".$this->bonus_base_ataque[2];
		}
		elseif(!empty($this->bonus_base_ataque[0]) && !empty($this->bonus_base_ataque[1])){
			$bonus_base_ataque =  $this->bonus_base_ataque[0]." / ".$this->bonus_base_ataque[1];
		}
		elseif(!empty($this->bonus_base_ataque[0])){
			$bonus_base_ataque =  $this->bonus_base_ataque[0];
		}
		return $bonus_base_ataque;
	}
	
	function ataque_distancia_1(){
		$des_ = $this->gerar_modificador_destreza();
		$bba_1 = $this->bonus_base_ataque[0];
		//print $for_;
		if($bba_1 <= 0){
			$bba_1 = 0;
			$des_  = 0;
		}
		return $bba_1 + $des_;
	}
	function ataque_distancia_2(){
		$des_ = $this->gerar_modificador_destreza();
		$bba_2 = $this->bonus_base_ataque[1];
		if($bba_2 <= 0){
			$bba_2 = 0;
			$des_  = 0;
		}
		return $bba_2 + $des_;
	}

	function ataque_distancia_3(){
		$des_ = $this->gerar_modificador_destreza();
		$bba_3 = $this->bonus_base_ataque[2];
		if($bba_3 <= 0){
			$bba_3 = 0;
			$des_  = 0;
		}
		return $bba_3 + $des_;
	}
	function ataque_distancia_4(){
		$des_ = $this->gerar_modificador_destreza();
		$bba_4 = $this->bonus_base_ataque[3];
		if($bba_4 <= 0){
			$bba_4 = 0;
			$des_  = 0;
		}
		return $bba_4 + $des_;
	}
		
	function exibir_ataque_a_distancia(){
		
		$bonus_base_ataque = 0;
		$bba1 = $this->ataque_distancia_1();
		if($bba1 == 0)
			$bba1 = '';
		$bba2 = $this->ataque_distancia_2();
		if($bba1 == 0)
			$bba2 = '';
		$bba3 = $this->ataque_distancia_3();
		if($bba1 == 0)
			$bba3 = '';
		$bba4 = $this->ataque_distancia_4();
		if($bba1 == 0)
			$bba4 = '';
		
		if(!empty($bba1) && !empty($bba2) && !empty($bba3) && !empty($bba4)){
			$bonus_base_ataque =  $bba1." / ".$bba2." / ".$bba3." / ".$bba4;
		}
		elseif(!empty($bba1) && !empty($bba2) && !empty($bba3)){
			$bonus_base_ataque =  $bba1." / ".$bba2." / ".$bba3;
		}
		elseif(!empty($bba1) && !empty($bba2)){
			$bonus_base_ataque =  $bba1." / ".$bba2;
		}
		elseif(!empty($bba1)){
			$bonus_base_ataque =  $bba1;
		}
		return $bonus_base_ataque;
	}

	function criaturas_irracionais(){
		if($this->tipo == 'constructo' || $this->tipo == 'inseto' || $this->tipo == 'limo' || $this->tipo == 'morto-vivo' || $this->tipo == 'planta'):
			$this->pericias = 'Esta criatura não tem pericias';
			$this->talentos = 'Esta criatura não tem talentos';
			$this->int_ = '-';
		endif;
	}
	
	function morto_vivo(){
		if($this->tipo == 'morto-vivo'):
			$this->con_ = '-';
			$this->pv = 0;
			for($i=0; $i<= $this->nd-1; $i++):
				$this->pv = $this->pv+rand(1,12);
			endfor;
			$this->pv = $this->pv+12;
		endif;
	}

	function gerar_pts_de_pericia(){
		
		$nivel  = $this->nd;
		$qtdPontosDePericia = 0;
		$qtdPontosDePericiaInicial = 0;
		
		for($i = 1 ; $i <= $nivel; $i++){
		
			if($i == 1){
		
				switch($this->tipo){
					case "aberração": $qtdPontosDePericiaInicial = $qtdPontosDePericiaInicial + ((2 + ($this->gerar_modificador_inteligencia())) * ($this->nd+3));
					break;
					
					case "animal": $qtdPontosDePericiaInicial = $qtdPontosDePericiaInicial + ((2 + ($this->gerar_modificador_inteligencia())) * ($this->nd+3));
					break;
					
					case "besta mágica": $qtdPontosDePericiaInicial = $qtdPontosDePericiaInicial + ((2 + ($this->gerar_modificador_inteligencia())) * ($this->nd+3));
					break;
					
					case "constructo": $qtdPontosDePericiaInicial = $qtdPontosDePericiaInicial + ((2 + ($this->gerar_modificador_inteligencia())) * ($this->nd+3));
					break;
					
					case "dragão": $qtdPontosDePericiaInicial = $qtdPontosDePericiaInicial + ((6 + ($this->gerar_modificador_inteligencia())) * ($this->nd+3));
					break;
					
					case "elemental": $qtdPontosDePericiaInicial = $qtdPontosDePericiaInicial + ((2 + ($this->gerar_modificador_inteligencia())) * ($this->nd+3));
					break;
					
					case "fada": $qtdPontosDePericiaInicial = $qtdPontosDePericiaInicial + ((6 + ($this->gerar_modificador_inteligencia())) * ($this->nd+3));
					break;
					
					case "gigante": $qtdPontosDePericiaInicial = $qtdPontosDePericiaInicial + ((2 + ($this->gerar_modificador_inteligencia())) * ($this->nd+3));
					break;
					
					case "humanóide monstruoso": $qtdPontosDePericiaInicial = $qtdPontosDePericiaInicial + ((2 + ($this->gerar_modificador_inteligencia())) * ($this->nd+3));
					break;
					
					case "humanóide": $qtdPontosDePericiaInicial = $qtdPontosDePericiaInicial + ((2 + ($this->gerar_modificador_inteligencia())) * ($this->nd+3));
					break;
					
					case "inseto": $qtdPontosDePericiaInicial = $qtdPontosDePericiaInicial + ((2 + ($this->gerar_modificador_inteligencia())) * ($this->nd+3));
					break;
					
					case "limo": $qtdPontosDePericiaInicial = $qtdPontosDePericiaInicial + ((2 + ($this->gerar_modificador_inteligencia())) * ($this->nd+3));
					break;
					
					case "morto-vivo": $qtdPontosDePericiaInicial = $qtdPontosDePericiaInicial + ((4 + ($this->gerar_modificador_inteligencia())) * ($this->nd+3));
					break;
					
					case "planar": $qtdPontosDePericiaInicial = $qtdPontosDePericiaInicial + ((8 + ($this->gerar_modificador_inteligencia())) * ($this->nd+3));
					break;
					
					case "planta": $qtdPontosDePericiaInicial = $qtdPontosDePericiaInicial + ((2 + ($this->gerar_modificador_inteligencia())) * ($this->nd+3));
					break;					
				}
			}else{
				
				switch($this->tipo){
					case "aberração": $qtdPontosDePericia = $qtdPontosDePericia + ((2 + $this->gerar_modificador_inteligencia()));
					break;
					
					case "animal": $qtdPontosDePericia = $qtdPontosDePericia + ((2 + $this->gerar_modificador_inteligencia()));
					break;
					
					case "besta mágica": $qtdPontosDePericia = $qtdPontosDePericia + ((2 + $this->gerar_modificador_inteligencia()));
					break;
					
					case "constructo": $qtdPontosDePericia = $qtdPontosDePericia + ((2 + $this->gerar_modificador_inteligencia()));
					break;
					
					case "dragão": $qtdPontosDePericia = $qtdPontosDePericia + ((6 + $this->gerar_modificador_inteligencia()));
					break;
					
					case "elemental": $qtdPontosDePericia = $qtdPontosDePericia + ((2 + $this->gerar_modificador_inteligencia()));
					break;
					
					case "fada": $qtdPontosDePericia = $qtdPontosDePericia + ((6 + $this->gerar_modificador_inteligencia()));
					break;
					
					case "gigante": $qtdPontosDePericia = $qtdPontosDePericia + ((2 + $this->gerar_modificador_inteligencia()));
					break;
					
					case "humanóide monstruoso": $qtdPontosDePericia = $qtdPontosDePericia + ((2 + $this->gerar_modificador_inteligencia()));
					break;
					
					case "humanóide": $qtdPontosDePericia = $qtdPontosDePericia + ((2 + $this->gerar_modificador_inteligencia()));
					break;
					
					case "inseto": $qtdPontosDePericia = $qtdPontosDePericia + ((2 + $this->gerar_modificador_inteligencia()));
					break;
					
					case "limo": $qtdPontosDePericia = $qtdPontosDePericia + ((2 + $this->gerar_modificador_inteligencia()));
					break;
					
					case "morto-vivo": $qtdPontosDePericia = $qtdPontosDePericia + ((4 + $this->gerar_modificador_inteligencia()));
					break;
					
					case "planar": $qtdPontosDePericia = $qtdPontosDePericia + ((8 + $this->gerar_modificador_inteligencia()));
					break;
					
					case "planta": $qtdPontosDePericia = $qtdPontosDePericia + ((2 + $this->gerar_modificador_inteligencia()));
					break;
					
				}
				
			}
		}
		$this->pericias = ($qtdPontosDePericia + $qtdPontosDePericiaInicial);	
		return ($qtdPontosDePericia + $qtdPontosDePericiaInicial);
	}
	
	function quantidade_de_pericias(){
		$qt = intval($this->pericias/($this->nd+3));
		$resto = $this->pericias%($this->nd+3);
		if($resto):
			return '<b>'.$qt.'</b> pericias distintas (com no max: <b>'.($this->nd+3).' Graduações)</b> mais uma com <b>'.$resto.' Graduações.</b>';
		else:
			return '<b>'.$qt.'</b> pericias distintas (com no max: <b>'.($this->nd+3).' Graduações)</b>';
		endif;
	}
}
?>