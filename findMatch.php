<?php require("./header.php") ?>
<?php

if ($_GET['id'] === 14) { ?>
    <script>
        showAlert()
    </script>
<?php }

if ($_GET['id']) { //si il y a quelquechose dans 

    $animalController->remove($_GET['id']);
}
?>



<h1>Trouve ta moitié</h1>



<form method="POST" class="d-flex" role="search"><!-- barre de recherche -->
    <input class="form-control me-2" name="search" type="search" placeholder="Rechercher" aria-label="Rechercher" role="search">
    <button class="btn btn-outline-success" type="submit">Rechercher</button>
</form>

<?php

if ($_POST && $_POST["search"]) {

    $animal = $animalController->getByName($_POST["search"]);

    if ($_POST["search"] === $animal[0]->getName()) {

?>
        <div class="d-flex flex-wrap">
            <div class="card m-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= substr($animal[0]->getName(), 0, 150) ?></h5>
                    <p class="card-text">Sexe : <?= substr($animal[0]->getSexe(), 0, 150) ?></p>
                    <p class="card-text">Age : <?= substr($animal[0]->getAge(), 0, 150) ?> ans</p>
                    <p class="card-text">Couleur : <?= substr($animal[0]->getColor(), 0, 150) ?></p>
                    <p class="card-text">Race : <?= substr($animal[0]->getSpecie(), 0, 150) ?></p>
                    <p class="card-text">Nourriture favorite : <?= substr($animal[0]->getFavoriteFood(), 0, 150) ?></p>
                    <a href="./formAnimal.php?id=<?= $animal[0]->getId() ?>" class="btn btn-outline-primary">Modifier</a>
                    <a href="./findMatch.php?id=<?= $animal[0]->getId() ?>" class="btn btn-outline-primary">Supprimer</a>
                    <a href="./matchfind.php?id=<?= $animal[0]->getId() ?>" class="btn btn-outline-primary">Trouver un match</a>
                </div>
            </div>
        </div>
    <?php }
} else { ?>

    <div class="d-flex flex-wrap">
        <?php
        $animals = $animalController->getAll();
        foreach ($animals as $animal) { ?>
            <div class="card m-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= substr($animal->getName(), 0, 150) ?></h5>
                    <p class="card-text">Sexe : <?= substr($animal->getSexe(), 0, 150) ?></p>
                    <p class="card-text">Age : <?= substr($animal->getAge(), 0, 150) ?> ans</p>
                    <p class="card-text">Couleur : <?= substr($animal->getColor(), 0, 150) ?></p>
                    <p class="card-text">Race : <?= substr($animal->getSpecie(), 0, 150) ?></p>
                    <p class="card-text">Nourriture favorite : <?= substr($animal->getFavoriteFood(), 0, 150) ?></p>
                    <a href="./formAnimal.php?id=<?= $animal->getId() ?>" class="btn btn-outline-primary">Modifier</a>
                    <a href="javascript:;" onclick="confirmRemove(<?= $animal->getId() ?>)" class="btn btn-outline-primary">Supprimer</a>
                    <a href="./matchfind.php?id=<?= $animal->getId() ?>" class="btn btn-outline-primary">Trouver un match</a>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } ?>

<?php require("./footer.php") ?>