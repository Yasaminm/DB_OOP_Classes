<?php

class DbClass extends PDO {

    private $tableName;

    public function getAllData() {
        $rows = [];
        $query = "SELECT * FROM $this->tableName";
        $stm = $this->query($query);
        $rows[] = $stm->fetchAll(PDO::FETCH_BOTH);
        return $rows;
        //SQL
        //$this->query()                                     $pdo->query()
        //$this->fetchall()
        //return
    }

    public function deletById(int $id, $colName = 'id') {
       $query = "DELETE FROM $this->tableName WHERE $colName=:id";
        try {
            $stm = $this->prepare($query);
            $stm->bindValue(':id', $id, self::PARAM_INT);
//            throw new Exception('Your selected Column as hint of deletion dose not exist');
            return $stm->execute();
        } catch (Exception $exc) {
            echo 'ERROR: deletById '. $exc->getMessage();
            exit();
        }
    }

    public function setTableName($tablename) {
        $this->tableName = $tablename;
    }

    public function getTableName() {
        return $this->tableName;
    }
    
    
     public function insert($data) {
         
         $cols = [];
         $vals = [];
         $i = 0;
         foreach ($data as $col => $value) {
          $cols[] = $col;
          $vals[] = '?';
          }
        $query = sprintf("INSERT INTO %s (%s) VALUES (%s)", $this->tableName, implode(',', $cols), implode(',', $vals));
//             echo 'show how it looks: '.$query;
       
        $stm = $this->prepare($query);
        
        foreach ($data as $value ) {
            $stm->bindValue(++$i, $value);
        }
        $result = $stm->execute();
        var_dump($result);
    }
    
    
   }
