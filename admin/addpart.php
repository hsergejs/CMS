<?php
require_once('../config.php');

//proverjaem zapolneno li pole
if(empty($_POST['name']))
{
	links("Vvedite nazvanie razdela!"); //funkcija samopaljnaja rasmotrena v konce
}


//zamenjaem odinarnie kovi4ki na obratnie
$name = str_replace("'","`",$_POST['name']);

//formiruem zapros na sozdanie novogo razdela
$query = "INSERT INTO artpage VALUES ('','$name','0')"; //zamenjaet dlja togo 4tobi ne konfliktovatj pri formirovanii SQL zaprosa, tak kak vse tekstovie polja v nem dolzhni obramljatjsa v odinarnie kovi4ki

if(mysql_query($query))
{
	//v slu4ae uda4i perehodim na glavnuju stranicu sistemi administrirovanija
	echo "<html><head><meta http-equiv='Refresh' content='0; url=index.php'></head></html>";
}
else
{
	puterror("O6ibka v zaprose dobavlenija statji");
}



//funckija links()
function links($msg)
{
	echo "<p>".$msg."</p>";
	echo "<p><a href='javascript: history.back()'>Vernutsa k pravke razdela (forma sozdanija razdela)</a></p>";
	echo "<p><a href='index.php'>Na glavnjuju stranicu administratora(redaktirovanie statej)</a></p>";
	exit();
}

?>
