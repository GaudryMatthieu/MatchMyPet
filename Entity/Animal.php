<?php

class Animal
{
    protected $id;
    protected string  $name;
    protected string $sexe;
    protected int $age;
    protected string $color;
    protected string $specie;
    protected string $favoriteFood;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data): void
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getSexe()
    {
        return $this->sexe;
    }

    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    public function getColor()
    {
        return $this->color;
    }


    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }


    public function getFavoriteFood()
    {
        return $this->favoriteFood;
    }


    public function setFavoriteFood($favoriteFood)
    {
        $this->favoriteFood = $favoriteFood;

        return $this;
    }

    public function getSpecie()
    {
        return $this->specie;
    }


    public function setSpecie($specie)
    {
        $this->specie = $specie;

        return $this;
    }
}
