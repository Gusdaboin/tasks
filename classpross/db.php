<?php
namespace ClassPross;
use PDO;

/**
 * Data Base
 */
class DB
{

    var $server = 'localhost';
    var $user_database = 'root';
    var $pass='';
    var $name_database = 'tasks';
    var $con;
    var $isConnected = false;
    var $table;

    function __construct()
    {
      $this->connect();
    }

    private function connect()
    {
      try {

        $this->con = new PDO("mysql:host=$this->server;dbname=$this->name_database;",$this->user_database,$this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
        $this->isConnected = true;
      } catch (PDOException $e) {
        die('Connection Failed'.$e->getMessage());
      }
    }

    public function getby_id($id_table, $id, $table_=null)
    {
      if($this->isConnected == true){
        if(!$table_){
          $table_=$this->table;
        }
        $sql="SELECT * FROM $table_ WHERE ".$id_table."=:id";
        $exe=$this->con->prepare($sql);
        $exe->bindParam(':id', $id);
        $exe->execute();
        $da=$exe->fetch(PDO::FETCH_OBJ);
        if(is_object($da)){
          return $da;
        }else {
          return [
            'error' => 'Eror de consulta'
          ];
        }
      }
    }

    public function getby_id_all($id_table, $id, $table_=null)
    {
      if($this->isConnected == true){
        if(!$table_){
          $table_=$this->table;
        }
        $sql="SELECT * FROM $table_ WHERE ".$id_table."=:id";
        $exe=$this->con->prepare($sql);
        $exe->bindParam(':id', $id);
        $exe->execute();
        $da=$exe->fetchAll(PDO::FETCH_OBJ);
        if(is_array($da)){
          return $da;
        }else {
          return [
            'error' => 'Eror de consulta'
          ];
        }
      }
    }

    public function getby_table($table_=null)
    {
      if(!$table_){
        $table_=$this->table;
      }
      if($this->isConnected == true){
        $sql="SELECT * FROM $table_";
        $exe=$this->con->prepare($sql);
        $exe->execute();
        $da=$exe->fetchAll(PDO::FETCH_ASSOC);
        if(count($da)>0){
          return $da;
        }else {
          return [
            'error' => 'Eror de consulta'
          ];
        }
      }
    }

    public function create(array $dates, string $table_=null)
    {
      return $this->insert($dates,$table_);
    }

    public function insert(array $dates, string $table_=null)
    {
      if(!$table_){
        $table_=$this->table;
      }
      $column="";
      if(is_array($dates)){
        foreach ($dates as $key => $value) {
          if($column!=""){
            $column=$column.", $key";
            $values=$values.", '$value'";
          }else{
            $column=$key;
            $values="'$value'";
          }
        }
        $arg="(".$column.") VALUES (".$values.")";
      }

      if($this->isConnected == true){
        $sql="INSERT INTO $table_ $arg";
        $exe=$this->con->prepare($sql);
        if ($exe->execute()){
          return 'Insert exitoso';
        }else{
          $message='Insert fallido';
        }
      }

    }

    public function update($dates, $id, $table_=null)
    {
      if(!$table_){
        $table_=$this->table;
      }
      $arg="";
      if(is_array($dates)){
        foreach ($dates as $key => $value) {
          $arg=$arg.', '.$key.'='."'".$value."'";
        }
      }

      if($this->isConnected == true){
        $sql="UPDATE $table_ SET $arg WHERE ".$id['id']."="."'".$id['value']."'";
        $sql=str_replace('SET ,', 'SET ',$sql);
        $exe=$this->con->prepare($sql);
        if ($exe->execute()){
          return 'Update exitoso';
        }else{
          $message='Update fallido';
        }
      }
    }

    public function delete($id_table, $id, $table_=null)
    {
      if(!$table_){
        $table_=$this->table;
      }

      if($this->isConnected == true){
        $sql="DELETE FROM $table_ WHERE ".$id_table."="."'".$id."'";
        $exe=$this->con->prepare($sql);
        if ($exe->execute()){
          return 'Delete exitoso';
        }else{
          $message='Delete fallido';
        }
      }
    }

    public function query($query)
    {
      if($this->isConnected == true){
        $sql=$query;
        $exe=$this->con->prepare($sql);
        if ($exe->execute()){
          preg_match('/SELECT/',$sql,$aa);
          if ($aa[1]="SELECT") {
            return $exe->fetchAll(PDO::FETCH_ASSOC);
          }else{
            return 'Query exitoso';
          }
        }else{
          $message='Query fallido';
        }
      }
    }


}
