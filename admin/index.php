<?php
require_once('../config.php');
?>

<a href="addpartform.php">Dobavitj novij razdel</a>
<p>Spisok stranic</p>
<ul>
	<?php
	//vivodim spisok razdelov
	$query = "SELECT * FROM artpage";
	if($pgs = mysql_query($query))
	{
		if(mysql_num_rows($pgs)>0)
		{
			while (list($id_page, $part) = mysql_fetch_array($pgs))
			{
				echo "<li><a href='index.php?id_page=".$id_page."'>".$part."</a></li>";
			}
		}
		else
		{
			echo "<p>Statej v DB ne obnaruzheno</p>";
		}
		
	}
	else
	{
		puterror("O6ibka pri obra6enii k bloku statej!");
	}
	?>
</ul>


<a href="addartform.php?id_page=<?php echo $_GET['id_page']; ?>">Dobavitj novuju statju na novuju stranicu</a>
<?php
//esli parametr id_page ne peredan delaem ego zna4enie ravnim 1

if(!isset($_GET['id_page']))
{
	$_GET['id_page'] = 1;
}

//teperj formiruem zapros naviborku statej
$query = "SELECT * FROM articles WHERE id_page = ".$_GET['id_page']." ORDER BY name";

//vipolnjaen SQL zapros
$art = mysql_query($query);

if(!$art)
{
	puterror("O6ibka pri obra6enii k bloku statej!");
}

//esli razdel soderzhit statji vivodim ih v tablice
if(mysql_num_rows($art) > 0)
{
	?>
    <br />
    <table>
    <tr>
    	<td>Nazvanie(stranica)</td>
        <td>Opisanie(stranica)</td>
        <td>Nazvanie(title)</td>
        <td>Opisanie(description)</td>
        <td>Klju4evie slova(keywords)</td>
        <td class="3">Dejstvie</td>
    </tr>
    <?php
	while ($articles = mysql_fetch_array($art))
	{
		//ssilki na skritie ili otobrazhenie statej dlja poljzovatelej
		if($articles['hide'] == 'hide')
		{
			$strhide = "<a href='showart.php?id_article=".$articles['id_article']."&id_page=".$_GET['id_page']."'>Otobrazitj</a>";
		}
		else
		{
			$strhide = "<a href='hideart.php?id_article=".$articles['id_article']."&id_page=".$_GET['id_page']."'>Skritj</a>";
		}
		
		
		echo "<tr>
				<td>
					<a href='art.php?id_article=".$articles['id_article']."&id_page=".$_GET['id_page']."'>
					".$articles['name']."</a>
				</td>
				<td>".$articles['description']."</td>
				<td>".$articles['html_title']."</td>
				<td>".$articles['html_description']."</td>
				<td>".$articles['html_keywords']."</td>
				<td>".$strhide."</td>
				<td><a href='editartform.php?id_article=".$articles['id_article']."&id_page=".$_GET['id_page']."'>Redaktirovatj</a></td>
				<td><a href='delart.php?id_article=".$articles['id_article']."&id_page=".$_GET['id_page']."'>Udalitj</a></td>
				</tr>";
	}
	
	echo "</table>";
}

?>


