<?php
class database
{
   private $localhost = "localhost";
   private $root = "root";
   private $password = "";
   private $dbname = "final_project";
   private $connection_status = false;
   private $mysql = "";
   public $array = [];
   public function __construct()
   {
      if ($this->connection_status == false) {
         $this->mysql = new mysqli($this->localhost, $this->root, $this->password, $this->dbname);
         $this->connection_status = true;
         return true;
      } else {
         array_push($array, $this->mysql->connect_error);
         return false;
      }
   }
   // only selection 
   public function only_slct($table)
   {
      if ($this->tableExist($table)) {
         $sql = "SELECT * FROM $table";
         $result = $this->mysql->query($sql);
         if ($result) {
            array_push($this->array, $result->fetch_all(MYSQLI_ASSOC));
         } else {
            array_push($this->array, $this->mysql->error);
         }
      }
   }
   // special selection 
   public function special_slct($table, $array = [], $join, $where, $offset = null, $order_by = null)
   {
      if ($this->tableExist($table)) {
         $implode = implode(", ", $array);
         $sql = "SELECT $implode FROM $table JOIN $join WHERE $where";
         if ($offset != null) {
            $sql .= " OFFSET $offset";
         }
         if ($order_by != null) {
            $sql .= "ORDER BY $order_by";
         }
         $result = $this->mysql->query($sql);
         if ($result) {
            array_push($this->array, $result->fetch_all(MYSQLI_ASSOC));
         } else {
            array_push($this->array, $this->mysql->error);
         }
      }
   }
   // insert 
   public function insert($table, $col, $val)
   {
      if ($this->tableExist($table)) {
         $sql = "INSERT INTO $table ($col) VALUES($val)";
         if ($this->mysql->query($sql)) {
            return true;
         } else {
            array_push($this->array, "Query is failed on line# : " . __LINE__);
         }
      } else {
         array_push($this->array, "Table doesn't exist");
      }
   }
  
   // udpate 
   public function udpate($table, $array = [], $where = "")
   {
      if ($this->tableExist($table)) {
         $args = [];
         foreach ($array as $col => $val) {
            $args[] = "$col = '$val'";
         }
         $implode = implode(", ", $args);
         $sql = "UPDATE $table SET $implode WHERE $where";
         if ($this->mysql->query($sql)) {
            return true;
         } else {
            array_push($this->array, $this->mysql->error);
         }
      } else {
         return false;
      }
   }
   // delete
   function delete($table = "", $array = [], $where = null)
   {
      if ($this->tableExist($table)) {
         $implode = implode(", ", $array);
         $sql = "DELETE $implode FROM $table";
         if ($where != null) {
            $sql .= " WHERE $where";
         }
         echo $sql;
         die();
         if ($this->mysql->query($sql)) {
            return true;
         } else {
            array_push($this->array, $this->mysql->error);
            return false;
         }
      }
   }
   // table exist 
   protected function tableExist($table)
   {
      $sql = "SHOW TABLES FROM final_project LIKE '$table'";
      if ($this->mysql->query($sql)) {
         return true;
      } else {
         array_push($this->array, $this->mysql->error);
         return false;
      }
   }
   public function results()
   {
      $result = $this->array;
      return $result;
   }
   public function __destruct()
   {
      if ($this->connection_status == true) {
         $this->mysql->close();
         return true;
      }
   }
}
?>