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
		if (isset($_POST['EditVilla']))
		{
			$newVilla_name = htmlspecialchars($_POST['villa_name']);
			$newVilla_city = nl2br(htmlspecialchars($_POST['villa_city']));
			$updateVilla = $bdd->prepare('UPDATE villa SET villa_name = ?, villa_city = ? WHERE id= ?');
			$updateVilla->execute(array($newVilla_name, $newVilla_city, $getId));
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
    </head>
    <body>
        <div class="container">
		<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12 edit_information">
			<form action=""  method="POST">	
				<h3 class="text-center">Edit Villa</h3>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="profile_details_text">Villa Name:</label>
							<input type="text" name="villa_name" class="form-control" value="<?= $villa_name?>" required >
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="profile_details_text">Villa City: </label>
							<textarea type="text" name="villa_city" class="form-control" required><?= $villa_city?></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 submit">
						<div class="form-group">
							<input type="submit" class="btn btn-success" name="EditVilla" value="Submit">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
    </body>
</html>