<?php

class Utilitarios_Helper{
	
	function __construct(){
		$this->tag = new Tags_Lib;
		$this->language = new Locale_Lib;
	}

	function tabpanel($utilitario, $id_name = 'helprpg_'){
		$this->tag->div('role="tabpanel" class="tab-pane fade active in" id="helprpg"');
			$this->tag->br();
		    $this->tag->div('class="row"');
		    	foreach ($utilitario as $key => $value) {
			    	$this->tag->div('class="col-sm-2 col-md-2"');
			            $this->tag->div('class="thumbnail"');
			                $this->tag->img('src="'.$value['IMG'].'" class="utilitarios-thumbnail" title="'.$value['TITLE'].'"');
			                $this->tag->div('class="caption"');
			                	$this->tag->h6('class="center"');
			                		$this->tag->printer($value['TITLE']); 
			                	$this->tag->h6;
			                    $this->tag->div('class="center demo-google-material-icon"'); 
			                    	$this->tag->a('href="'. $value['FONT'].'/'.$value['APP_LINK'] .'" target="blank"');
				                    	$this->tag->i('class="material-icons"');
				                    		$this->tag->printer('launch');
				                    	$this->tag->i;
				                    $this->tag->a;
				                    $this->tag->a('href="#" data-toggle="modal" data-target="#'.$id_name.$key.'"');
				                    	$this->tag->i('class="material-icons" data-toggle="modal"');
				                    		$this->tag->printer('info_outline');
				                    	$this->tag->i;
				                    $this->tag->a; 
			                    $this->tag->div;
			                $this->tag->div;
			            $this->tag->div;
			        $this->tag->div;
		    	}
		    $this->tag->div;
		$this->tag->div;
	}

	function modal($utilitario, $id_name = 'helprpg_'){
		foreach ($utilitario as $key => $value) {
			$this->tag->div('class="modal fade" id="'.$id_name.$key.'" tabindex="-1" role="dialog"');
			    $this->tag->div('class="modal-dialog modal-lg" role="document"');
			        $this->tag->div('class="modal-content"');
			            $this->tag->div('class="modal-header"');
			                $this->tag->h4('class="modal-title" id="largeModalLabel"');
			                	$this->tag->printer($value['TITLE']);
			                $this->tag->h4;
			            $this->tag->div;
			            $this->tag->div('class="modal-body"');
			                $this->tag->printer($value['DESCRIPTION']);
			            	$this->tag->hr;
			            	$this->tag->p();
			            		$this->tag->b();
			            			$this->tag->printer($this->language->UTILITIES_LABEL_LANGUAGES);
			            		$this->tag->b;
			            		$this->tag->printer($value['LENGUAGE']);
			            	$this->tag->p;
			            	$this->tag->p();
			            		$this->tag->b();
			            			$this->tag->printer($this->language->UTILITIES_LABEL_SITE_NAME);
			            		$this->tag->b;
			            	$this->tag->printer($value['SITE_NAME']);
			            	$this->tag->p;
			            	$this->tag->p();
			            		$this->tag->b();
			            			$this->tag->printer($this->language->UTILITIES_LABEL_FONT);
			            		$this->tag->b;
			            		$this->tag->a('href="'.$value['FONT'].'"');
			            			$this->tag->printer($value['FONT']);
			            		$this->tag->a;
			            	$this->tag->p;
			            $this->tag->div;
			            $this->tag->div('class="modal-footer"');
			                $this->tag->a('href="'.$value['FONT'].$value['APP_LINK'].'" target="blank" class="btn btn-link waves-effect"');
			                	$this->tag->printer($this->language->UTILITIES_LABEL_BTN_ACCESS);
			                $this->tag->a;
			                $this->tag->a('href="#" class="btn btn-link waves-effect" data-dismiss="modal"');
			                	$this->tag->printer($this->language->UTILITIES_LABEL_BTN_CLOSE);
			                $this->tag->a;
			            $this->tag->div;
			        $this->tag->div;
			    $this->tag->div;
			$this->tag->div;
		}
	}
}