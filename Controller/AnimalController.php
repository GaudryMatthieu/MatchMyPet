<?php

class AnimalController
{
    private PDO $db;

    public function __construct()
    {
        $dbName = "animal";
        $port = 3306;
        $userName = "root";
        $password = "root";
        try {
            $this->setDb(new PDO("mysql:host=localhost;dbname=$dbName;port=$port;", $userName, $password));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function setDb($db)
    {
        $this->db = $db;
        return $this;
    }

    public function add(Animal $newAnimal)
    {
        $req = $this->db->prepare("INSERT INTO `animal` (name, sexe, age, specie, color, favoriteFood) VALUES (:name, :sexe, :age, :specie, :color, :favoriteFood)");

        $req->bindValue(":name", htmlspecialchars($newAnimal->getName()), PDO::PARAM_STR);
        $req->bindValue(":sexe", htmlspecialchars($newAnimal->getSexe()), PDO::PARAM_STR);
        $req->bindValue(":age", htmlspecialchars($newAnimal->getAge()), PDO::PARAM_INT);
        $req->bindValue(":specie", htmlspecialchars($newAnimal->getSpecie()), PDO::PARAM_STR);
        $req->bindValue(":color", htmlspecialchars($newAnimal->getColor()), PDO::PARAM_STR);
        $req->bindValue(":favoriteFood", htmlspecialchars($newAnimal->getFavoriteFood()), PDO::PARAM_STR);

        $req->execute();
    }

    public function get(int $id)
    {
        $req = $this->db->prepare("SELECT * FROM `animal` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $animal = new Animal($data);
        return $animal;
    }

    public function getAll()
    {
        $animals = [];
        $req = $this->db->query("SELECT * FROM `animal` ORDER BY `name`");
        $datas = $req->fetchAll();
        foreach ($datas as $data) {
            $animal = new Animal($data);
            $animals[] = $animal;
        }
        return $animals;
    }

    public function update(Animal $updatedAnimal)
    {
        $req = $this->db->prepare("UPDATE `animal` SET name = :name, sexe = :sexe, age = :age, color = :color, specie = :specie, favoriteFood = :favoriteFood WHERE id = :id");

        $req->bindValue(":name", $updatedAnimal->getname(), PDO::PARAM_STR);
        $req->bindValue(":id", $updatedAnimal->getId(), PDO::PARAM_STR);
        $req->bindValue(":sexe", $updatedAnimal->getSexe(), PDO::PARAM_STR);
        $req->bindValue(":age", $updatedAnimal->getAge(), PDO::PARAM_INT);
        $req->bindValue(":color", $updatedAnimal->getColor(), PDO::PARAM_STR);
        $req->bindValue(":specie", $updatedAnimal->getSpecie(), PDO::PARAM_STR);
        $req->bindValue(":favoriteFood", $updatedAnimal->getFavoriteFood(), PDO::PARAM_STR);

        $req->execute();
    }

    public function remove(int $id)
    {
        $req = $this->db->prepare("DELETE FROM `animal` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }

    public function getByName(string $name)
    {
        $animals = [];
        $req = $this->db->prepare("SELECT * FROM `animal` WHERE name = :name");
        $req->bindValue(":name", $name, PDO::PARAM_STR);
        $req->execute();
        $datas = $req->fetchAll();
        foreach ($datas as $data) {
            $animal = new Animal($data);
            $animals[] = $animal;
        }
        return $animals;
    }
}
