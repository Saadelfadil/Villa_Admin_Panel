<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');
if (!$_SESSION['password'])
    header('Location: connexion.php');
if (isset($_POST['addVilla']))
{
    if (!empty($_POST['villa_name']) AND !empty($_POST['villa_city']) AND !empty($_POST['villa_price']) AND !empty($_POST['villa_days']))
    {
        $villa_name = htmlspecialchars($_POST['villa_name']);
        $villa_city = nl2br(htmlspecialchars($_POST['villa_city']));
        $villa_price = htmlspecialchars($_POST['villa_price']);
        $villa_days = htmlspecialchars($_POST['villa_days']);

        $addVilla = $bdd->prepare('INSERT INTO villa(villa_name, villa_city, villa_price, villa_days) values(?, ?, ?, ?)');
        $addVilla->execute(array($villa_name, $villa_city, $villa_price, $villa_days));
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
      <form method="POST" action="">
        <div class="login-box">
            <h1>Add Villa</h1>
            <div class="textbox">
                <input type="text" placeholder="Villa Name" name="villa_name" value="">
            </div>

            <div class="textbox">
                <input type="text" placeholder="Villa City" name="villa_city" value="">
            </div>

            <div class="textbox">
                <input type="text" placeholder="Estimated price of item" name="villa_price" value="">
            </div>

            <div class="textbox">
                <input type="text" placeholder="Number of days" name="villa_days" value="">
            </div>

            <input type="submit" class="btn" name="addVilla" value="Add">
        </div>
      </form>
    </body>
</html>