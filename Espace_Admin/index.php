<?php
session_start();
if (!$_SESSION['password'])
{
    header('Location: connexion.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
    <title> Show memebers</title>
        <meta charset="utf-8">
    </head>
    <body>
      <a href="members.php" > Show All members </a>
        </br>
      <a href="add_villa.php" > Add Villa </a>
      </br>
      <a href="villa.php" > Show Villa </a>
    </body>
</html>