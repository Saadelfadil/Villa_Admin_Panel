<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');
if (!$_SESSION['password'])
    header('Location: connexion.php');

?>

<!DOCTYPE html>
<html>
    <head>
    <title> Show Villa</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
            $myVilla = $bdd->query('SELECT * FROM villa');
            while ($villa = $myVilla->fetch())
            {
                ?>
                    <div>
                        <h3><?= $villa['villa_name']; ?></h3>
                        <h4><?= $villa['villa_city']; ?></h4>
                        <a href="delete_villa.php?id=<?= $villa['id']; ?>">
                            <button >Delete Villa</button>
                        </a>
                        <a href="edit_villa.php?id=<?= $villa['id']; ?>">
                            <button >Edit Villa</button>
                        </a>
                    </div>
                <?php
            }
        ?>
    </body>
</html>