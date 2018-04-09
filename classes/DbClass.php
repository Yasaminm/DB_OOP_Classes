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

    public function deletById(int $id) {
        $query = "DELETE FROM $this->tableName WHERE id=:id";
        try {
            $stm = $this->prepare($query);
            $stm->bindValue(':id', $id, self::PARAM_INT);
            $stm->execute();
        } catch (PDOException $exc) {
//            echo $exc->getMessage();
        }
    }

    public function setTableName($tablename) {
        $this->tableName = $tablename;
    }

    public function getTableName() {
        return $this->tableName;
    }

}
