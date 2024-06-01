<?php

class MeetingController
{
    private PDO $db;

    public function __construct()
    {
        $dbName = "meeting";
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

    public function add(Meeting $newMeeting)
    {
        $req = $this->db->prepare("INSERT INTO `meeting` (name, date, biography) VALUES (:name, :date, :biography)");

        $req->bindValue(":name", htmlspecialchars($newMeeting->getName()), PDO::PARAM_STR);
        $req->bindValue(":date", htmlspecialchars($newMeeting->getdate()), PDO::PARAM_STR);
        $req->bindValue(":biography", htmlspecialchars($newMeeting->getBiography()), PDO::PARAM_STR);

        $req->execute();
    }

    public function get(int $id)
    {
        $req = $this->db->prepare("SELECT * FROM `meeting` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $meeting = new Meeting($data);
        return $meeting;
    }

    public function getAll()
    {
        $meetings = [];
        $req = $this->db->query("SELECT * FROM `meeting` ORDER BY `name`");
        $datas = $req->fetchAll();
        foreach ($datas as $data) {
            $meeting = new Meeting($data);
            $meetings[] = $meeting;
        }
        return $meetings;
    }

    public function update(Meeting $updatedMeeting)
    {
        $req = $this->db->prepare("UPDATE `meeting` SET name = :name, date = :date, biography = :biography WHERE id = :id");

        $req->bindValue(":name", $updatedMeeting->getname(), PDO::PARAM_STR);
        $req->bindValue(":id", $updatedMeeting->getId(), PDO::PARAM_STR);
        $req->bindValue(":date", $updatedMeeting->getDate(), PDO::PARAM_STR);
        $req->bindValue(":biography", $updatedMeeting->getBiography(), PDO::PARAM_STR);

        $req->execute();
    }

    public function remove(int $id)
    {
        $req = $this->db->prepare("DELETE FROM `meeting` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }
}