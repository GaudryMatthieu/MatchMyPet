<?php
require("./header.php");// permet d'avoir le bandeau toujours présent



$cat = array("Chat", "./image/chat.jpg");
$dog = array("Chien", "./image/chien.png");
$moose = array("Elan", "./image/elan.jpg");
$animals = array($cat, $dog, $moose);/* tableau des différentes catégories d'animaux*/
?>
<div class="d-flex flex-wrap"><!-- affichage de la carte de l'animal -->
    <?php
    foreach ($animals as $animal) { ?>
        <div class="card m-3" style="width: 18rem;">
            <img src="<?= $animal[1] ?>" class="card-img-top" alt="..."><!-- carte pour choisir son animal -->
            <div class="card-body">
                <h5 class="card-title"><?= $animal[0] ?></h5>
                <a href="./formAnimal.php?specie=<?= $animal[0] ?>" class="btn btn-outline-primary">Select</a>
            </div>
        </div>
    <?php } ?>
</div>
<?php
require("./footer.php") ?><!-- le footer -->