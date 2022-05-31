<?php 

try {

	$db=new PDO("mysql:host=localhost;dbname=technoone_yahya;charset=utf8",'root','');
}

catch (PDOExpception $e) {

	echo $e->getMessage();
}


 ?>