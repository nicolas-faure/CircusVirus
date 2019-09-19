<?php
class users extends database {
  public $id = 0;
  public $username = '';
  public $password  = '';
  public $id_usersTypes = 0;
  public $id_volunteers = 0;
  
  public function __construct() {
        parent::__construct();
    }
  
    public function addUsers(){
        $query = 'INSERT INTO `users`(`username`, `password`, `id_usersTypes`, `id_volunteers`) '
                . 'VALUES (:username, :password, :id_usersTypes, :id_volunteers)';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id_volunteers', $this->id_volunteers, PDO::PARAM_INT);
        $queryExecute->bindValue(':username', $this->username, PDO::PARAM_STR);
        $queryExecute->bindValue(':password', $this->password, PDO::PARAM_STR);
        $queryExecute->bindValue(':id_usersTypes', $this->id_usersTypes, PDO::PARAM_INT);
        return $queryExecute->execute();
    }
    public function deleteUsers(){
    $query = 'DELETE FROM `users` '
            . 'WHERE `id` = :id;'
            . 'DELETE FROM `appointments` '
            . 'WHERE `idUsers` = :id';
    $queryExecute = $this->db->prepare($query);
    $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
    return $queryExecute->execute();
  }
    
    public function checkUser(){
        $query = 'SELECT COUNT(`id`) as `number` '
                . 'FROM `users` '
                . 'WHERE `username` = :username';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':username', $this->username, PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }
    public function getHashByUsername(){
        $query = 'SELECT `password`, `id_usersTypes` '
                . 'FROM `users` '
                . 'WHERE `username` = :username';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':username', $this->username, PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }
    public function getShowUsers(){
        $query = 'SELECT `id`, UPPER(`username`) AS `username`'
                .'FROM `users`';
       $queryExecute = $this->db->query($query);
    return $queryExecute->fetchAll(PDO::FETCH_OBJ);
  }
}
  ?>