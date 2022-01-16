<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');
if (isset($_GET['id']) AND !empty($_GET['id']))
{
    $getId = $_GET['id'];
    $myUser = $bdd->prepare('SELECT * FROM membres WHERE id= ?');
    $myUser->execute(array($getId));
    if ($myUser->rowCount() > 0)
    {
        $banishMember = $bdd->prepare('DELETE FROM membres WHERE id= ?');
        $banishMember->execute(array($getId));
        header('Location: members.php');
    }
    else
        echo "Member not found";
}
else
    echo "Identify not found";
?>