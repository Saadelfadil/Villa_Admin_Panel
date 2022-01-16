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
    <link rel="stylesheet" href="../assets/css/villa.css">
    </head>
    <body>
        <section class="villa_list">
            <div><h1>All Villa</h1></div>
            <div class="villa_container">
                <!-- <?php
                    $myVilla = $bdd->query('SELECT * FROM villa');
                    while ($villa = $myVilla->fetch())
                    {
                        ?> -->
                            <div class="card">

                                <div class="villa_picture">
                                    <img src="./<?= $villa['villa_name']; ?>"/>
                                </div>

                                <div class="villa_name">
                                    <?= $villa['villa_name']; ?>
                                </div>

                                <div class="villa_price">
                                    <?= $villa['villa_city']; ?>
                                </div>

                                <div class="villa_price">
                                    <?= $villa['villa_price']; ?>
                                </div>

                                <div class="villa_days">
                                    <?= $villa['villa_days']; ?>
                                </div>

                                <div>
                                    <a href="delete_villa.php?id=<?= $villa['id'];?>">
                                        <button class="villa_delete">Delete Villa</button>
                                    </a>
                                    <a href="edit_villa.php?id=<?= $villa['id'];?>">
                                        <button class="villa_edit">Edit Villa</button>
                                    </a>
                                </div>
                            </div>

                            <!-- <?php
                    }
                    ?> -->
            </div>
        </section>
    </body>
</html>