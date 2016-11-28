<?php

class Disqus_Helper {

	function __construct(){
		$this->tag = new Tags_Lib;
		$this->form = new Form_Lib;
		$this->language = new Locale_Lib();
	}

	function disqus_comment(){
		$this->tag->div('id="disqus_thread"');
		$this->tag->div;	
			$this->tag->script();
				/**
				* RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
				* LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
				*/
				/**/
				$this->tag->imprime('
					var disqus_config = function () {
					this.page.url = "'.URL_BASE.$_SERVER['REQUEST_URI'].'"; // Replace PAGE_URL with your page\'s canonical URL variable
					this.page.identifier = "'.$_SERVER['REQUEST_URI'].'#disqus_thread"; // Replace PAGE_IDENTIFIER with your page\'s unique identifier variable
					};
					
					
					(function() { // DON\'T EDIT BELOW THIS LINE
					var d = document, s = d.createElement(\'script\');
					s.src = \'//helprpgbr.disqus.com/embed.js\';
					s.setAttribute(\'data-timestamp\', +new Date());
					(d.head || d.body).appendChild(s);
					})();'
				);
			$this->tag->script;
			$this->tag->noscript();
				$this->tag->imprime('Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a>');
			$this->tag->noscript;
	}
}