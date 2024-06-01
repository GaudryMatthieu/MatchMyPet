<?php require("./header.php");
$specie = $_GET["specie"]; //permet de préselectionner la case du formulaire correspondante 
                           //à l'espèce choisit avant sur addPet.php 


$currentAnimal = NULL;
if ($_GET['id']) {
    $currentAnimal = $animalController->get($_GET["id"]);//permet de préselectionner les formulaires plus bas dans 
}                                                        //les opérateurs ternaires

if ($_POST) {
    $newAnimal = new Animal($_POST);
    if ($_GET["id"]) {
        $newAnimal->setId($_GET["id"]);
        $animalController->update($newAnimal);
    } else {
        $animalController->add($newAnimal);
    }

    echo "<script>window.location.href='findMatch.php'</script>";
}

?>

<form class="form-group" method="POST">
    <label for="name">Nom de l'animal :</label><br>
    <input type="text" value="<?= $currentAnimal ? $currentAnimal->getName() : "" ?>" id="name" name="name"><br>

    <label for="age">Age :</label><br>
    <input type="number" value="<?= $currentAnimal ? $currentAnimal->getAge() : "" ?>" id="age" name="age" max="200" min="2"><br>

    <input type="radio" name="sexe" id="female" value="female" <?= $currentAnimal && $currentAnimal->getSexe() === "female" ? "checked" : "" ?>>
    <label for="female">Femelle</label>
    <input type="radio" name="sexe" id="male" value="male" <?= $currentAnimal && $currentAnimal->getSexe() === "male" ? "checked" : "" ?>>
    <label for="male">Male</label><br>

    <label for="color">Couleur :</label><br>
    <input type="radio" name="color" id="black" value="Noir" <?= $color === "Noir" || $currentAnimal && $currentAnimal->getColor() === "Noir"  ? "checked" : "" ?>>
    <label for="black">Noir</label>
    <input type="radio" name="color" id="brown" value="Marron" <?= $color === "Marron" || $currentAnimal && $currentAnimal->getColor() === "Marron" ? "checked" : "" ?>>
    <label for="brown">Marron</label>
    <input type="radio" name="color" id="white" value="Blanc" <?= $color === "Blanc" || $currentAnimal && $currentAnimal->getColor() === "Blanc" ? "checked" : "" ?>>
    <label for="white">Blanc</label>
    <input type="radio" name="color" id="orange" value="Orange" <?= $color === "Orange" || $currentAnimal && $currentAnimal->getColor() === "Orange" ? "checked" : "" ?>>
    <label for="orange">Orange</label>
    <input type="radio" name="color" id="grey" value="Gris" <?= $color === "Gris" || $currentAnimal && $currentAnimal->getColor() === "Gris" ? "checked" : "" ?>>
    <label for="grey">Gris</label><br>

    <label for="specie">Espèce :</label><br>
    <input type="radio" name="specie" id="cat" value="Chat" <?= $specie === "Chat" || $currentAnimal && $currentAnimal->getSpecie() === "Chat"  ? "checked" : "" ?>>
    <label for="cat">Chat</label>
    <input type="radio" name="specie" id="dog" value="  Chien" <?= $specie === "Chien" || $currentAnimal && $currentAnimal->getSpecie() === "Chien" ? "checked" : "" ?>>
    <label for="dog">Chien</label>
    <input type="radio" name="specie" id="moose" value="Elan" <?= $specie === "Elan" || $currentAnimal && $currentAnimal->getSpecie() === "Elan" ? "checked" : "" ?>>
    <label for="moose">Elan</label><br>

    <label for="favoriteFood">Nourriture préféré :</label><br>
    <input type="text" value="<?= $currentAnimal ? $currentAnimal->getFavoriteFood() : "" ?>" id="favoriteFood" name="favoriteFood"><br>

    <input type="submit" value="Ajouter" class="btn btn-outline-primary">
</form>

<?php require("./footer.php") ?>