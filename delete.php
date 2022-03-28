<?php
    require_once("db.php");
    $pdo_statement=$conn->prepare("delete from posts where id=" . $_GET['id']);
    $pdo_statement->execute();
    header('location:index.php');
?>