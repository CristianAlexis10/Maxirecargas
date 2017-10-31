<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="views/assets/css/main.css">
    </head>
    <body>
        <section class="container">
            <header class="main--nav">
            <?php
                require_once("views/include/scope.profile.php");
                require_once("views/include/scope.navigator.php");
            ?>
            </header>
            <div class="wrap--content">
                <?php require_once("views/include/scope.menutop.php"); ?>
                <article>
