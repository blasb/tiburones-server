<?php

$dir_subida = "./samplers/";
$absolute_path = $dir_subida . basename($_FILES['upfile']['name']);

	//echo '$_POST: ' . var_dump($_POST);
	//echo '$_FILES: ' . var_dump($_FILES);

if (is_uploaded_file($_FILES['upfile']['tmp_name'])) {
  if(move_uploaded_file ($_FILES['upfile'] ['tmp_name'], $absolute_path)){
	echo "File ". $_FILES['upfile']['name'] ." uploaded successfully.\n";
  }
} else {
  echo "Possible file upload attack: ";
  echo "filename '". $_FILES['upfile']['tmp_name'] . "'.";
  print_r($_FILES);
}
?>