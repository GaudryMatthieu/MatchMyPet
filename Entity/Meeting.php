<?php

class Meeting
{
    protected $id;
    protected string $name;
    protected $date;
    protected string $biography;
    

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

  
    public function getDate()
    {
        return $this->date;
    }

  
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

 
    public function getBiography()
    {
        return $this->biography;
    }
 
    public function setBiography($biography)
    {
        $this->biography = $biography;

        return $this;
    }
}
