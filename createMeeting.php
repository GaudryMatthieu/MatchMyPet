<?php require("./header.php");

$currentMeeting = NULL;//initialise la variable currentMeeting à null car si il n'y a rien dans le get cela poseera problème

if ($_GET["id"]) {//permet de voir si il y a un id dans l'url si oui 
    $currentMeeting = $meetingController->get($_GET["id"]);//il fabrique l'objet courant
}

if ($_POST) {//permet de voir si il y un passage par la méthode post

    $newMeeting = new Meeting($_POST);//fabrique l'objet avec les infos du post
    if ($_GET["id"]) {//si il y a l'id qui est passé dans le get alors on le modifie
        $newMeeting->setId($_GET["id"]);
        $meetingController->update($newMeeting);//modification selon les arguments passé en post
    } else {
        $meetingController->add($newMeeting);//sinon il n'existe pas donc on le fabrique
    }

    echo "<script>window.location.href='findMeeting.php'</script>";//redirige la page vers findMeeting.php
}  

?>

<form class="form-group" method="POST" ><!-- le formulaire de création pour le rdv -->
    <label for="date">Date :</label><br>
    <input type="date" value="<?= $currentMeeting ? $currentMeeting->getDate() : "" ?>" id="date" name="date"><br>

    <label for="name">Nom :</label><br>
    <input type="text" value="<?= $currentMeeting ? $currentMeeting->getName() : "" ?>" id="name" name="name"><br>

    <label for="biography">Biographie / Lieux :</label><br>
    <textarea  name="biography" id="biography" value="<?= $currentMeeting ? $currentMeeting->getBiography() : "" ?>" id="biography" name="biography"></textarea> <br>

    <input type="submit" value="Ajouter" class="btn btn-outline-primary">
</form>

<?php require("./footer.php") ?>