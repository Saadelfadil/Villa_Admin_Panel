<?php
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');

if (isset($_GET['id']) AND !empty($_GET['id']))
{
	$getId = $_GET['id'];
	$myVilla = $bdd->prepare('SELECT * FROM villa WHERE id= ?');
	$myVilla->execute(array($getId));
	if ($myVilla->rowCount() > 0)
	{
		$deleteVilla = $bdd->prepare('DELETE FROM villa WHERE id= ?');
		$deleteVilla->execute(array($getId));
		header('Location: villa.php');
	}
	else
		echo "There are no Villa";
}
else
	echo "Villa Not found";
?>
