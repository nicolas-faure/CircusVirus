<?php

class equipmentsPictures extends database {

    public $id = 0;
    public $picture = '';
    public $id_equipmentsLeasing = 0;

    public function addEquipmentsPictures() {
        $query = 'INSERT INTO `equipmentsPictures` (`picture` , `id_equipmentsLeasing`)'
                . 'VALUES (:picture, :id_equipmentsLeasing)';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue('picture', $this->picture, PDO::PARAM_STR);
        $queryExecute->bindValue('id_equipmentsLeasing', $this->id_equipmentsLeasing, PDO::PARAM_INT);
        return $queryExecute->execute();
    }

    public function deleteEquipmentsPictures() {
        $query = 'DELETE FROM `equipmentsPictures`'
                . 'WHERE `id` = :id;'
                . 'DELETE FROM `equipmentsPictures` '
                . 'WHERE `idEquipmentsPictures` = :id';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindvalue(':id', $this->id, PDO::PARAM_INT);
        return $queryExecute->execute();
    }

}

?>