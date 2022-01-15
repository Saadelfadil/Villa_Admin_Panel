<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');
if (!$_SESSION['password'])
    header('Location: connexion.php');
if (isset($_POST['addVilla']))
{
    if (!empty($_POST['villa_name']) AND !empty($_POST['villa_city']))
    {
        $villa_name = htmlspecialchars($_POST['villa_name']);
        $villa_city = nl2br(htmlspecialchars($_POST['villa_city']));

        $addVilla = $bdd->prepare('INSERT INTO villa(villa_name, villa_city) values(?, ?)');
        $addVilla->execute(array($villa_name, $villa_city));
        echo "Your Villa added succefully";
    }
    else
        echo "You should fill all inputs";
}
?>

<!DOCTYPE html>
<html>
    <head>
    <title> Add Villa</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">

</head>
    <body>
			<!-- <div class="container">
				<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12 edit_information">
					<form action=""  method="POST">	
						<h3 class="text-center">Add Villa</h3>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label class="profile_details_text">Villa Name:</label>
									<input type="text" name="villa_name" class="form-control" value="" required >
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label class="profile_details_text">Villa City: </label>
									<textarea type="text" name="villa_city" class="form-control" required></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 submit">
								<div class="form-group">
									<input type="submit" class="btn btn-success" name="addVilla" value="Submit">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div> -->
			


			<!-- <div class="form">
				<div class="title">Add Villa</div>
				<div class="subtitle"></div>
				<div class="input-container ic1">
					<input id="villa_name" name="villa_name" class="input" type="text" placeholder=" " />
					<div class="cut"></div>
					<label for="villa_name" class="placeholder">Villa Name</label>
				</div>
				<div class="input-container ic2">
					<input id="villa_city" name="villa_city" class="input" type="text" placeholder=" " />
					<div class="cut"></div>
					<label for="villa_city" class="placeholder">Villa City</label>
				</div>
				<button type="text" name="addVilla" class="submit">Edit</button>
			</div> -->

      <form method="POST" action="">
        <div class="login-box">
            <h1>Add Villa</h1>
            <div class="textbox">
                <input type="text" placeholder="Villa Name" name="villa_name" value="">
            </div>

            <div class="textbox">
                <input type="text" placeholder="Villa City" name="villa_city" value="">
            </div>

            <input type="submit" class="btn" name="addVilla" value="Add">
        </div>
      </form>

    </body>
</html>