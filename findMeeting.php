<?php require("./header.php") ?>
<h1>regarde les rdv près de chez toi</h1>
<?php

if ($_GET['id']) {//si l'id est passé dan l'url on le supprime
    $meetingController->remove($_GET['id']);
}



?>

<div class="d-flex">
    <?php
    $meetings = $meetingController->getAll();

    /* carte pour afficher le rdv */
    foreach ($meetings as $meeting) { ?>
    
        <div class="card m-3" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?= substr($meeting->getDate(), 0, 150) ?></h5>
                <p class="card-text"><?= substr($meeting->getName(), 0, 150) ?></p>
                <p class="card-text"><?= substr($meeting->getBiography(), 0, 150) ?></p>
                <a href="./createMeeting.php?id=<?= $meeting->getId() ?>" class="btn btn-outline-primary">Modifier</a>
                <a href="./findMeeting.php?id=<?= $meeting->getId() ?>" class="btn btn-outline-primary">Supprimer</a>
            </div>
        </div>
    <?php

    }  ?>
</div>
<?php require("./footer.php") ?>