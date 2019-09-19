<?php

class volunteers extends database {
  public $id = 0;
  public $lastname = '';
  public $firstname = '';
  public $phone = '';
  public $mail = '';
  public $profilId = 0;
  
//création de la fonction pour ajouter les informations dans la table volunteers
    public function addVolunteer() {
    $query = 'INSERT INTO `volunteers` (`firstname`, `lastname`, `phone`, `mail`) '
            .'VALUES (:firstname, :lastname, :phone, :mail)';
    $queryExecute = $this->db->prepare($query);
    $queryExecute->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
    $queryExecute->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
    $queryExecute->bindValue(':phone', $this->phone, PDO::PARAM_STR);
    $queryExecute->bindValue(':mail', $this->mail, PDO::PARAM_STR);
    return $queryExecute->execute();
  }
 //création de la fonction pour modifier les informations dans la table volunteers 
  public function updateVolunteer() {
    $query = 'UPDATE `volunteers` SET `firstname` = :firstname, `lastname`= :lastname, `phone` = :phone, `mail` = :mail '
            . 'WHERE `id` = :id';
    $queryExecute = $this->db->prepare($query);
    $queryExecute->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
    $queryExecute->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
    $queryExecute->bindValue(':phone', $this->phone, PDO::PARAM_STR);
    $queryExecute->bindValue(':mail', $this->mail, PDO::PARAM_STR);
    $queryExecute->bindValue(':id', $this->id, PDO::PARAM_STR);
    return $queryExecute->execute();
  }
//création de la fonction pour supprimer les informations dans la table volunteers
  public function deleteVolunteer(){
    $query = 'DELETE FROM `volunteers` '
            . 'WHERE `id` = :id;'
            . 'DELETE FROM `appointments` '
            . 'WHERE `idVolunteers` = :id';
    $queryExecute = $this->db->prepare($query);
    $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
    return $queryExecute->execute();
  }
  //création de la fonction pour afficher les informations dans la table volunteers
  public function getShowVolunteer() {
    $query = 'SELECT `id`, UPPER(`firstname`) AS `firstname`, `lastname`, `phone`, `mail` '
            . 'FROM `volunteers`';
    $queryExecute = $this->db->query($query);
    return $queryExecute->fetchAll(PDO::FETCH_OBJ);
  }
  public function getInfoVolunteers() {
        $query = 'SELECT `id`, `firstname` , `lastname` , `phone` , `mail` '
                .'FROM `volunteers` '
                .'WHERE `id` = :id' ;
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
         $queryExecute->execute();
         $queryResult = $queryExecute->fetch(PDO::FETCH_OBJ);
         $this->id = $queryResult->id;
}
  public function __destruct() {
    $this->db = NULL;
  }

}