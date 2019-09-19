<?php


class equipmentsLeasing extends database {

    public $id = 0;
    public $name = '';
    public $description = '';
    public $price = '';
    public $id_equipmentsTypes = 0;
    public $id_creator = 0;

    //création de la fonction pour ajouter les informations dans la table equipmentsLeasing
    public function addEquipments() {
        $query = 'INSERT INTO `equipmentsLeasing` (`name`, `description`, `price`, `id_equipmentsTypes`, `id_creator`) '
                . 'VALUES (:name, :description, :price, :id_equipmentsTypes, :id_creator)';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryExecute->bindValue(':description', $this->description, PDO::PARAM_STR);
        $queryExecute->bindValue(':price', $this->price, PDO::PARAM_STR);
        $queryExecute->bindValue(':id_equipmentsTypes', $this->id_equipmentsTypes, PDO::PARAM_INT);
        $queryExecute->bindValue(':id_creator', $this->id_creator, PDO::PARAM_INT);
        return $queryExecute->execute();
    }

    //création de la fonction pour modifier les informations dans la table equipmentLeasing
    public function updateEquipments() {
        $query = 'UPDATE `equipmentsLeasing` SET `name` = :name , `description` = :description , `price`= :price , `id_equipmentsTypes`= :id_equipmentsTypes , `id_creator`= :id_creator '
                . 'WHERE `id` = :id';

        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryExecute->bindValue(':description', $this->description, PDO::PARAM_STR);
        $queryExecute->bindValue(':price', $this->price, PDO::PARAM_STR);
        $queryExecute->bindValue(':id_equipmentsTypes', $this->id_equipmentsTypes, PDO::PARAM_INT);
        $queryExecute->bindValue(':id_creator', $this->id_creator, PDO::PARAM_INT);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_STR);
        return $queryExecute->execute();
    }

//création de la fonction pour supprimer les informations dans la table equipmentLeasing
    public function deleteEquipments() {
        $query = 'DELETE FROM `equipmentsLeasing` '
                . 'WHERE `id` = :id;'
                . 'DELETE FROM `equipment` '
                . 'WHERE `idEquipmentsLeasing` = :id';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryExecute->execute();
    }
    //création de la fonction pour afficher les informations dans la table equipmentleasing
    public function getShowEquipment() {
        $query = 'SELECT `id`, `name`, `description`, `price`, `id_equipmentsTypes`, `id_creator` '
                . 'FROM `equipmentsLeasing`';
        $queryExecute = $this->db->query($query);
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
    public function getInfoEquipements() {
        $query = 'SELECT `id`, `name` , `description` , `price` '
                .'FROM `equipmentsLeasing` '
                .'WHERE `id` = :id' ;
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
         $queryExecute->execute();
         $queryResult = $queryExecute->fetch(PDO::FETCH_OBJ);
         $this->id = $queryResult->id;
}
 public function leasingMarquee()    
    {  
     $query= 'SELECT  `description`, `price` ' 
             .'FROM `equipmentsLeasing` ' 
             .'WHERE `id_equipmentsTypes` = 1 ';
     $queryExecute = $this->db->query($query);
     return $queryExecute->fetchAll(PDO::FETCH_OBJ);
        
    }   
public function leasingEquipment()    
    {  
     $query= 'SELECT  `description`, `price` ' 
             .'FROM `equipmentsLeasing` ' 
             .'WHERE `id_equipmentsTypes` = 2 ';
     $queryExecute = $this->db->query($query);
     return $queryExecute->fetchAll(PDO::FETCH_OBJ);
        
    }   

public function __destruct() {
        $this->db = NULL;
    }

}

?>