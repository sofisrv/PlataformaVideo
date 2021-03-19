<?php
	
	$file = $_POST['id_curso'];
	
	if(is_file($file)){
		chmod($file,0777);
		if(!unlink($file)){
		echo false;
		}
	}
	
?>