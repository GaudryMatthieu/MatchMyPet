<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Je mérite clairement 20/20 non ;)">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/style.css">
    <title>MatchMyPet</title>
</head>

<body>
    <?php

    function loadClass(string $class): void
    {
        if (strpos($class, "Controller")) {
            require "./Controller/$class.php";
        } else {
            require "./Entity/$class.php";
        }
    }

    spl_autoload_register("loadClass");

    $animalController = new AnimalController();
    $meetingController = new MeetingController();

    ?>
    <nav class="navbar navbar-expand-lg bg-body-tertiary"><!-- barre de navigation de bootstrap -->
        <div class="container-fluid">
            <a class="navbar-brand" href="./indexLog.php">MatchMyPet</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="./addPet.php">Ajouter un animal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./findMatch.php">Trouver un animal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./createMeeting.php">Organiser un RDV</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./findMeeting.php">Trouver un RDV</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <body>

<div class="container">