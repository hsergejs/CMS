<?php
require_once('../config.php');

//ustanavlivaem zna4enija peremennih po umol4aniju
if(!isset($action))
{
	$action = 'addart.php';
}

if(!isset($button))
{
	$button = 'Dobavitj';
}

if(!isset($title))
{
	$title = 'Dobavlenie novoj statji';
}

//esli zan4enie $tmp ne ustanovleno, pome4aem vnovj dobavlennuju statju, kak dostupnuju dlja prosmotra (neskrituju)
if(!isset($tmp))
{
	$tmp = 'on';
}

if(!isset($_GET['id_page']))
{
	echo "Stranica ne vibrana";
	exit();
}

?>


<title><?php echo $title; ?></title>
<a href="javascript: history.back()">Nazad</a>
<form action="<?php echo $action; ?>" method="post">
<table align="center" width="500px">
<tr>
<td>Nazvanie: </td>
<td><input type="text" name="name" value="<?php echo $name; ?>"</td>
</tr>
<tr>
<td>Opisanie: </td>
<td><textarea name="description" rows="2" cols="60"><?php echo $description; ?></textarea></td>
</tr>
<tr>
<td>Nazvanie(title): </td>
<td><textarea name="html_title" rows="2" cols="60"><?php echo $html_title; ?></textarea></td>
</tr>
<tr>
<td>Opisanie: </td>
<td><textarea name="html_description" cols="60" rows="2"><?php echo $html_description; ?></textarea></td>
</tr>
<tr>
<td>Klju4evie slova(keywords): </td>
<td><textarea name="html_keywords" cols="60" rows="2"><?php echo $html_keywords; ?></textarea></td>
</tr>
<tr>
<td colspan="2">Otobrazhatj: <input type="checkbox" name="hide" <?php echo $tmp; ?> /></td>
</tr>
<tr>
<td colspan="2"><input type="submit" value="<?php echo $button; ?>" /></td>
</tr>
<tr>
<td><input type="hidden" name="id_page" value="<?php echo $_GET['id_page']; ?>" /></td>
<td><input type="hidden" name="id_article" value="<?php echo $id_article; ?>" /></td>
</tr>
</table>
</form>

