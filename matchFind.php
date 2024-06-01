<?php require("./header.php");

?>

<h1>vous voici à un clic de trouver l'amour</h1>
<p>nous vous présentons</p>

<?php
    $animals = $animalController->getAll();
    $curentAnimal = $animals[rand(0, count($animals) - 1)];// choisit un animal au hasard pour trouver l'amour

    //choisit au moins un animal au hasard et recommence tant que selui ci est différent de l'animal initiale
    do { 
        $curentAnimal = $animals[rand(0, count($animals) - 1)];
    } while ($curentAnimal->getId() === $_GET["id"]);
    
    ?><!-- affiche la carte de l'animal -->
    <div class="d-flex flex-wrap">
        <div class="card m-3" style="width: 18rem">
            <div class="card-body">
                <h5 class="card-title"><?= substr($curentAnimal->getName(), 0, 150) ?></h5>
                <p class="card-text">Sexe : <?= substr($curentAnimal->getSexe(), 0, 150) ?></p>
                <p class="card-text">Age : <?= substr($curentAnimal->getAge(), 0, 150) ?> ans</p>
                <p class="card-text">Couleur : <?= substr($curentAnimal->getColor(), 0, 150) ?></p>
                <p class="card-text">Race : <?= substr($curentAnimal->getSpecie(), 0, 150) ?></p>
                <p class="card-text">Nourriture favorite : <?= substr($curentAnimal->getFavoriteFood(), 0, 150) ?></p>
            </div>
        </div>
        </div>

<?php require("./footer.php")?>