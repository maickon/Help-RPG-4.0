<?php 

class Locale_Lib{

  function __construct($dir = 'pt_BR', $separetor = '::'){
    $path = URL_BASE_INTERNAL . 'config/labels/';
    $this->set_language("{$path}{$dir}/", $separetor);
  }

  function set_language($dir, $separetor){
    $handle = scandir($dir);
    unset($handle[0]);
    unset($handle[1]);

    foreach ($handle as $key => $value) {
      if (is_dir("{$dir}{$value}/")) {
        $files = scandir("{$dir}{$value}/");
        unset($files[0]);
        unset($files[1]);
        foreach ($files as $f_key => $f_value) {
          if (is_file("{$dir}{$value}/{$f_value}")) {
            $h = fopen("{$dir}{$value}/{$f_value}",'r');
            while ($line = fgets($h)) {
              $label = explode($separetor, $line);
              $attr = ltrim($label[0]);
              $this->$attr = $label[1]; 
            }
          } else if (is_dir("{$dir}{$value}/{$f_value}/")){
              $files = scandir("{$dir}{$value}/{$f_value}/");
              unset($files[0]);
              unset($files[1]);
              foreach ($files as $ff_key => $ff_value) {         
                $h = fopen("{$dir}{$value}/{$f_value}/{$ff_value}",'r');
                while($line = fgets($h)){
                  $label = explode($separetor, $line);
                  // echo "{$label[0]}:{$label[1]}<br>";
                  $attr = ltrim($label[0]);
                  $this->$attr = $label[1]; 
              }
            }
          }
        }
      }
    }
  }

  function copiaDir($dirFont, $dirDest){
    
    if(!file_exists($dirDest)){
        mkdir($dirDest);
    }
    if ($dd = opendir($dirFont)) {
        while (false !== ($arq = readdir($dd))) {
            if($arq != "." && $arq != ".."){
                $pathIn = "$dirFont/$arq";
                $pathOut = "$dirDest/$arq";
                if(is_dir($pathIn)){
                    self::copiaDir($pathIn, $pathOut);
                }elseif(is_file($pathIn)){
                    copy($pathIn, $pathOut);
                }
            }
        }
        closedir($dd);
    }
  }
  
  function translate_files(array $language){
    foreach ($language as $key => $value) {
      // mkdir($value);
      $this->copiaDir('pt_BR/', $value);
    }
  }
}