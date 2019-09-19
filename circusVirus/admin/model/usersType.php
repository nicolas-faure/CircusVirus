<?php
class usersTypes extends database {
  public $id = 0;
  public $type = '';


  public function __construct() {
        parent::__construct();
    }
    public function getShowUsersTypes() {
    $query = 'SELECT `id`, UPPER(`type`) AS `type`'
            . 'FROM `usersTypes`';
    $queryExecute = $this->db->query($query);
    return $queryExecute->fetchAll(PDO::FETCH_OBJ);
  }
}