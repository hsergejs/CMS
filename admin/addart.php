<?php
require_once('../config.php');

//proverka na zapolnenoe pole name
if(empty($_POST['name']))
{
	links($_POST['id_page', "Vvedite nazvanie statji");
}

//opredeljaem skrita statja ili net
if($_POST['hide'] == "on")
{
	$showhide = "show";
}
else
{
	$showhide = "hide";
}


//zamenjaem odinarnie kavi4ki obratnimi, zamenjaet dlja togo 4tobi ne konfliktovatj pri formirovanii SQL zaprosa, tak kak vse tekstovie polja v nem dolzhni obramljatjsa v odinarnie kovi4ki
$name = str_replace("'","`",$_POST['name']);
$description = str_replace("'","`",$_POST['description']);
$html_title = str_replace("'","`",$_POST['html_title']);
$html_description = str_replace("'","`",$_POST['html_description']);
$html_keywords = str_replace("'","`",$_POST['html_keywords']);

//formiruem i osu6 zapros na dobavlenie novoj statji
$query = "INSERT INTO articles VALUES ('','$name','$description','$html_title','$html_description','$html_keywords','0','$showhide','".$_POST['id_page']."')";

if(mysql_query($query))
{
	//vijasnjaem pervi4nij klju4  id_article, sgenerirovannij AUTO_INCREMENT, 4tobi dobavitj zagolovk v tablicu paragraphes
	$id_article = mysql_insert_id();
	
	//avtomati4eski dobavljaem v statju zagolovok, sovpadaju6ij s nazavaniem statji
	$query = "INSERT INTO paragraphes VALUES ('','title','$name','','','','1','0','show','$id_article')";

	if(mysql_query($query))
	{
		echo "<html><head><meta http-equiv='refresh' content='0; url=index.php?id_page=".$_POST['id_page']."'></head></html>";
	}
	else
	{
	puterror("O6ibka pri zaprose na dobavlenie v paragraphes");
	}
}
else
{
	puterror("O6ibka pri zaprose na dobavlenie v articles");
}


//funkcija links()
function links($id_page,$msg)
{
	echo "<p>".$msg."</p>";
	echo "<p><a href='javascript: history.back()'>Vernutsa nazad k pravke paragrafa</a></p>";
	echo "<p><a href='index.php?id_page=".$id_page."'>Vernutsa nazad k administrirovaniju stej(glavnaja)</a></p>";
	exit();
}

?>