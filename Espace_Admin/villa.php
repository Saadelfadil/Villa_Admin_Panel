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
    <link rel="stylesheet" href="css/villa.css">
    </head>
    <body>
        <!-- <?php
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
        ?> -->

        <?php
            $myVilla = $bdd->query('SELECT * FROM villa');
            while ($villa = $myVilla->fetch())
            {
                ?>
                <section class="villa-list">
                    <h1>All Villa</h1>
                    <div class="card">
                        <div class="villa_picture">
                            <img src="css/oussama.png"/>
                        </div>        
                        <div class="villa_name">
                            <?= $villa['villa_name']; ?>
                        </div>        
                        <div class="villa_city">
                            <?= $villa['villa_city']; ?>
                        </div>
                        <div>
                            <a href="delete_villa.php?id=<?= $villa['id']; ?>">
                                <button class="villa_delete">Delete Villa</button>
                            </a>
                            <a href="edit_villa.php?id=<?= $villa['id']; ?>">
                                <button class="villa_edit">Edit Villa</button>
                            </a>
                        </div> 
                    </div>
                </section>
                <?php
            }
        ?>

    </body>
</html>