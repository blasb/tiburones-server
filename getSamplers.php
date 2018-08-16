<?php

$directory_samplers = scandir("./samplers");


function obtenerJson($path){
	$contenido = file_get_contents($path);
    $json = json_decode($contenido, true);
    return $json;
 }

 function descomprimir($name_file_zip){
 	$path_file_zip = "./samplers/" . $name_file_zip;
 	$enzipado = new ZipArchive();
 	$enzipado->open($path_file_zip);
 	if(!$enzipado->extractTo("./samplers/tmp")){
 		echo 'No se pudo extraer el archivo';
 	}else {
 		return $enzipado->getNameIndex(0);
 	}

 }

function printJson($json){
	foreach ($json as $key => $value) {
            if (!is_array($value)) {
                echo $key . '=>' . $value . '<br/>';
            } else {
                foreach ($value as $key => $val) {
                    echo $key . '=>' . $val . '<br/>';
                }
            }
        }
}

function printSamplers($directory_samplers){

	foreach ($directory_samplers as $name_file_zip) {
		if($name_file_zip != '.' && $name_file_zip != '..' && $name_file_zip != 'tmp'){
			$name_file_unzip = descomprimir($name_file_zip);
			echo '<div class="col-sm-4 panel-body">';
		    echo '<h2 style="text-align: center">' . $name_file_unzip . '</h2>';
		    $path_file_unzip = "./samplers/tmp/" . $name_file_unzip;
		    $json = obtenerJson($path_file_unzip);
		    echo '<div style="text-align: center">';
		    echo $path_file_unzip;
		    printJson($json);
		    echo '</div>';
		    echo '</div>';
		}
	}
}
include './viewSamplers.html'

?>