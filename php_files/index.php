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
    <link rel="stylesheet" href="../assets/css/index.css">
    </head>
    <body>
    <main>
      <a href="add_villa.php" >  <button> Add Villa</button></a>
      <a href="villa.php" >  <button> Show Villa</button></a>
    </main>
    </body>
</html>