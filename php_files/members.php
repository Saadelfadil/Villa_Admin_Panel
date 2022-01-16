<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');
if (!$_SESSION['password'])
{
    header('Location: connexion.php');
}
?>


<!DOCTYPE html>
<html>
    <head>
    <title> Show members</title>
    <meta charset="utf-8">
    </head>
    <body>
        <?php
            $myUser = $bdd->query('SELECT * FROM membres');
            while ($user = $myUser->fetch())
            {
                ?>
                    <p>
                        <?= $user['email']; ?>
                        <a href="banish.php?id=<?= $user['id']; ?>"> banish member</a>
                    </p>
                <?php
            }
        ?>
    </body>
</html>