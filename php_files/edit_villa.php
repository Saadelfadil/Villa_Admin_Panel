<?php
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');
if (isset($_GET['id']) AND !empty($_GET['id']))
{
	$getId = $_GET['id'];
	$myVilla = $bdd->prepare('SELECT * FROM villa WHERE id= ?');
	$myVilla->execute(array($getId));
	if ($myVilla->rowCount() > 0)
	{
		$villaInfo = $myVilla->fetch();
		$villa_name = $villaInfo['villa_name'];
		$villa_city = str_replace('<br />', '', $villaInfo['villa_city']);
		$villa_price = $villaInfo['villa_price'];
        $villa_days = $villaInfo['villa_days'];
		
		if (isset($_POST['EditVilla']))
		{
			$newVilla_name = htmlspecialchars($_POST['villa_name']);
			$newVilla_city = nl2br(htmlspecialchars($_POST['villa_city']));
			$newVilla_price = htmlspecialchars($_POST['villa_price']);
        	$newVilla_days = htmlspecialchars($_POST['villa_days']);
			$updateVilla = $bdd->prepare('UPDATE villa SET villa_name = ?, villa_city = ?, villa_price = ?, villa_days = ? WHERE id= ?');
			$updateVilla->execute(array($newVilla_name, $newVilla_city, $newVilla_price, $newVilla_days, $getId));
			header('Location: villa.php');
		}
	}
	else
		echo "There are no Villa";
}
else
	echo "Villa not found";
?>

<!DOCTYPE html>
<html>
    <head>
    <title> Edit Villa</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../assets/css/style_1.css">
    </head>
    <body>

	<form method="POST" action="">
        <div class="login-box">
            <h1>Edit Villa</h1>
            <div class="textbox">
                <input type="text" placeholder="Villa Name" name="villa_name" value="">
            </div>

            <div class="textbox">
                <input type="text" placeholder="Villa City" name="villa_city" value="">
            </div>

            <input type="submit" class="btn" name="EditVilla" value="Edit">
        </div>
      </form>
    </body>
</html>