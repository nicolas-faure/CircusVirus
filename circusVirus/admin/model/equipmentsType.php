<?php
class equipmentTypes extends database{
    public $id =0;
    public $type = '';
    
    public function __construct() {
        parent::__construct();
    }
    public function getShowEquipmentsTypes() {
    $query = 'SELECT `id`, UPPER(`type`) AS `type`'
            .'FROM `equipmentsTypes`';
    $queryExecute = $this->db->query($query);
    return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
}