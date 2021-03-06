<?php
$tag->input('type="hidden" name="id" value="'.$usuario->id.'" class="form-control"');

$tag->div('class="col-sm-6"');
    $tag->h2('class="card-inside-title"');
        $tag->printer('<span class="font-bold">Nome</span>');
    $tag->h2;
    $tag->div('class="form-group"');
        $tag->div('class="form-line"');
            $tag->input('type="text" name="nome" value="'.$usuario->nome.'" class="form-control" placeholder="Nome"');
        $tag->div;
    $tag->div;
$tag->div;

$tag->div('class="col-sm-6"');
    $tag->h2('class="card-inside-title"');
        $tag->printer('<span class="font-bold">Link Capa Pequena</span>');
    $tag->h2;
    $tag->div('class="form-group"');
        $tag->div('class="form-line"');
            $tag->input('type="text" name="capa_pequena_link" value="'.$usuario->capa_pequena_link.'" class="form-control" placeholder="Link para a capa pequena acima do menu."');
        $tag->div;
    $tag->div;
$tag->div;

$tag->div('class="col-sm-6"');
    $tag->h2('class="card-inside-title"');
        $tag->printer('<span class="font-bold">Sexo</span>');
    $tag->h2;
    $tag->div('class="form-group"');
        $tag->div('class="form-line"');
            $tag->select('class="form-control show-tick" name="sexo" data-live-search="true" id="lista"');
                $tag->option('value="'.$language->USER_LABEL_MALE.'"');
                    $tag->printer($language->USER_LABEL_MALE);
                $tag->option;
                 $tag->option('value="'.$language->USER_LABEL_FEME.'"');
                    $tag->printer($language->USER_LABEL_FEME);
                $tag->option;
            $tag->select;
        $tag->div;
    $tag->div;
$tag->div;

$tag->div('class="col-sm-6"');
    $tag->h2('class="card-inside-title"');
        $tag->printer('<span class="font-bold">Data de nascimento</span>');
    $tag->h2;
    $tag->div('class="form-group demo-masked-input"');
        $tag->div('class="form-line"');
            $tag->input('type="text" name="data_nascimento" value="'.$usuario->data_nascimento.'" class="form-control date" placeholder="Sua data de nascimento."');
        $tag->div;
    $tag->div;
$tag->div;

$tag->div('class="col-sm-6"');
    $tag->h2('class="card-inside-title"');
        $tag->printer('<span class="font-bold">Seu país</span>');
    $tag->h2;
    $tag->div('class="form-group"');
        $tag->div('class="form-line"');
            $tag->input('type="text" name="pais" value="'.$usuario->pais.'" class="form-control" placeholder="País de origem."');
        $tag->div;
    $tag->div;
$tag->div;

$tag->div('class="col-sm-6"');
    $tag->h2('class="card-inside-title"');
        $tag->printer('<span class="font-bold">Sua cidade natal</span>');
    $tag->h2;
    $tag->div('class="form-group"');
        $tag->div('class="form-line"');
            $tag->input('type="text" name="cidade" value="'.$usuario->cidade.'" class="form-control" placeholder="Informe a cidade onde mora."');
        $tag->div;
    $tag->div;
$tag->div;

$tag->div('class="col-sm-6"');
    $tag->h2('class="card-inside-title"');
        $tag->printer('<span class="font-bold">Estado</span>');
    $tag->h2;
    $tag->div('class="form-group"');
        $tag->div('class="form-line"');
            $tag->input('type="text" name="estado" value="'.$usuario->estado.'" class="form-control" placeholder="Informe o estado onde fica sua cidade por sigla. Ex: RJ"');
        $tag->div;
    $tag->div;
$tag->div;

$tag->div('class="col-sm-6"');
    $tag->h2('class="card-inside-title"');
        $tag->printer('<span class="font-bold">WhatsApp</span>');
    $tag->h2;
    $tag->div('class="form-group demo-masked-input"');
        $tag->div('class="form-line"');
            $tag->input('type="text" name="whats_app" value="'.$usuario->whats_app.'" class="form-control mobile-phone-number" placeholder="Contato do whatsApp."');
        $tag->div;
    $tag->div;
$tag->div;

$tag->div('class="col-sm-6"');
    $tag->h2('class="card-inside-title"');
        $tag->printer('<span class="font-bold">Skype</span>');
    $tag->h2;
    $tag->div('class="form-group"');
        $tag->div('class="form-line"');
            $tag->input('type="text" name="skype" value="'.$usuario->skype.'" class="form-control" placeholder="Seu skype."');
        $tag->div;
    $tag->div;
$tag->div;

$tag->div('class="col-sm-6"');
    $tag->h2('class="card-inside-title"');
        $tag->printer('<span class="font-bold">Rpgs que mais gosta?</span>');
    $tag->h2;
    $tag->div('class="form-group demo-tagsinput-area"');
        $tag->div('class="form-line"');
            $tag->input('type="text" name="rpgs_preferido" value="'.$usuario->rpgs_preferido.'" class="form-control" data-role="tagsinput" placeholder="Liste os rpgs que mais gosta por vírgula. Ex: D&D, 3D&T, GURPS"');
        $tag->div;
    $tag->div;
$tag->div;

$tag->div('class="col-sm-6"');
    $tag->h2('class="card-inside-title"');
        $tag->printer('<span class="font-bold">Qual sua classe preferida?</span>');
    $tag->h2;
    $tag->div('class="form-group"');
        $tag->div('class="form-line"');
            $tag->input('type="text" name="classe_preferida" value="'.$usuario->classe_preferida.'" class="form-control" placeholder="Ex: Paladino"');
        $tag->div;
    $tag->div;
$tag->div;

$tag->div('class="col-sm-6"');
    $tag->h2('class="card-inside-title"');
        $tag->printer('<span class="font-bold">Qual sua raça preferida?</span>');
    $tag->h2;
    $tag->div('class="form-group"');
        $tag->div('class="form-line"');
            $tag->input('type="text" name="raca_preferida" value="'.$usuario->raca_preferida.'" class="form-control" placeholder="Ex: Elfo"');
        $tag->div;
    $tag->div;
$tag->div;

$tag->div('class="col-sm-6"');
    $tag->h2('class="card-inside-title"');
        $tag->printer('<span class="font-bold">Você mestra partidas de RPG e tem experiência?</span>');
    $tag->h2;
    $tag->div('class="form-group"');
        $tag->div('class="form-line"');
            $tag->select('class="form-control show-tick" name="e_mestre" data-live-search="true" id="lista"');
            if ($usuario->e_mestre == 's') {
                $tag->option('value="s" selected');
                    $tag->printer($language->USER_LABEL_YES);
                $tag->option;
            } else{
                 $tag->option('value="n" selected');
                    $tag->printer($language->USER_LABEL_NO);
                $tag->option;
            }
            
            $tag->option('value="s"');
                    $tag->printer($language->USER_LABEL_YES);
            $tag->option;
            $tag->option('value="s"');
                $tag->printer($language->USER_LABEL_YES);
            $tag->option;
            $tag->select;
        $tag->div;
    $tag->div;
$tag->div;

$tag->div('class="col-sm-6"');
    $tag->h2('class="card-inside-title"');
        $tag->printer('<span class="font-bold">Sua frase preferida</span>');
    $tag->h2;
    $tag->div('class="form-group"');
        $tag->div('class="form-line"');
            $tag->input('type="text" name="frase_preferida" value="'.$usuario->frase_preferida.'" class="form-control" placeholder="Uma frase que goste."');
        $tag->div;
    $tag->div;
$tag->div;

$tag->div('class="col-sm-6"');
    $tag->h2('class="card-inside-title"');
        $tag->printer('<span class="font-bold">Url para foto de perfil</span>');
    $tag->h2;
    $tag->div('class="form-group"');
        $tag->div('class="form-line"');
            $tag->input('type="text" name="foto_link" value="'.$usuario->foto_link.'" class="form-control" placeholder="Selecione uma Url que exiba uma imagem para o seu perfil."');
        $tag->div;
    $tag->div;
$tag->div;

$tag->div('class="col-sm-6"');
    $tag->h2('class="card-inside-title"');
        $tag->printer('<span class="font-bold">Url para foto de capa</span>');
    $tag->h2;
    $tag->div('class="form-group"');
        $tag->div('class="form-line"');
            $tag->input('type="text" name="capa_link" value="'.$usuario->capa_link.'" class="form-control" placeholder="Selecione uma Url que exiba uma imagem para a sua imagem de capa."');
        $tag->div;
    $tag->div;
$tag->div;

$tag->div('class="col-sm-6"');
    $tag->h2('class="card-inside-title"');
        $tag->printer('<span class="font-bold">Seu Facebook</span>');
    $tag->h2;
    $tag->div('class="form-group"');
        $tag->div('class="form-line"');
            $tag->input('type="text" name="facebook_link" value="'.$usuario->facebook_link.'" class="form-control" placeholder="Informe a sua Url para o Facebook. Pode ser seu perfil ou uma fanpage."');
        $tag->div;
    $tag->div;
$tag->div;

$tag->div('class="col-sm-6"');
    $tag->h2('class="card-inside-title"');
        $tag->printer('<span class="font-bold">Seu Twitter</span>');
    $tag->h2;
    $tag->div('class="form-group"');
        $tag->div('class="form-line"');
            $tag->input('type="text" name="twitter_link" value="'.$usuario->twitter_link.'" class="form-control" placeholder="Informe a sua Url para o Twitter."');
        $tag->div;
    $tag->div;
$tag->div;

$tag->div('class="col-sm-6"');
    $tag->h2('class="card-inside-title"');
        $tag->printer('<span class="font-bold">Seu Google+</span>');
    $tag->h2;
    $tag->div('class="form-group"');
        $tag->div('class="form-line"');
            $tag->input('type="text" name="gplus_link" value="'.$usuario->gplus_link.'" class="form-control" placeholder="Informe a sua Url para o Google+."');
        $tag->div;
    $tag->div;
$tag->div;

$tag->div('class="col-sm-6"');
    $tag->h2('class="card-inside-title"');
        $tag->printer('<span class="font-bold">Um blog sobre RPG ou você</span>');
    $tag->h2;
    $tag->div('class="form-group"');
        $tag->div('class="form-line"');
            $tag->input('type="text" name="pagina_social" value="'.$usuario->pagina_social.'" class="form-control" placeholder="Informe uma URL para algum blog sobre RPG ou etc."');
        $tag->div;
    $tag->div;
$tag->div;

$tag->div('class="col-sm-6"');
    $tag->h2('class="card-inside-title"');
        $tag->printer('<span class="font-bold">Site Pessoal</span>');
    $tag->h2;
    $tag->div('class="form-group"');
        $tag->div('class="form-line"');
            $tag->input('type="text" name="site_pessoal" value="'.$usuario->site_pessoal.'" class="form-control" placeholder="Informe uma URL para algum site pessoal."');
        $tag->div;
    $tag->div;
$tag->div;

$tag->div('class="col-sm-6"');
    $tag->h2('class="card-inside-title"');
        $tag->printer('<span class="font-bold">Email</span>');
    $tag->h2;
    $tag->div('class="form-group"');
        $tag->div('class="form-line"');
            $tag->input('type="text" name="email" readonly="true" value="'.$usuario->email.'" class="form-control" placeholder="Insira um endereço de email."');
        $tag->div;
    $tag->div;
$tag->div;

$tag->div('class="col-sm-12"');
    $tag->p();
        $tag->b();
            $tag->printer('Descrição');
        $tag->b;
    $tag->p;
    $tag->div('class="form-group"');
        $tag->div('class="form-line"'); 
            $tag->textarea('id="ckeditor" name="descricao"');
            	$tag->printer($usuario->descricao);
            $tag->textarea;
        $tag->div;
    $tag->div;
$tag->div;

$tag->div('class="col-sm-12"');
    $tag->input('type="submit" class="btn btn-primary waves-effect" name="submit" value="ATUALIZAR"');
    $tag->input;
$tag->div;