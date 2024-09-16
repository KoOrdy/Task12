<?php

class Db{
    private $table;

    function __construct($table){
        $this->table = $table;
    }
    
    public function getAll(){
        $sql=mysqli_query($this->connection(), "SELECT * FROM $this->table");
        return mysqli_fetch_all($sql , MYSQLI_ASSOC);
    }

    public function getfirst($key,$value){
        $sql=mysqli_query($this->connection(), "SELECT * FROM $this->table WHERE $key='$value' limit 1");
        return mysqli_fetch_assoc($sql);
    }

    public function insert(array $data){
        $columns='';
        $values="'";
        $values.= implode("','",$data);
        $values.="'";

        foreach($data as $key=>$value){
            $columns.= $key . ($key==array_key_last($data) ? '' : ',');
        }
        return (bool)mysqli_query($this->connection(), "INSERT INTO $this->table ($columns) VALUES ($values)");
    }
    
    public function delete($id){
        return (bool)mysqli_query($this->connection(), "DELETE FROM $this->table WHERE id = $id");
    }
    public function update(array $data, $id){
        $setClause = '';
    
        foreach($data as $key => $value){
            $setClause .= "$key='$value'";
            if ($key !== array_key_last($data)) {
                $setClause .= ", ";
            }
        }
        
        return (bool)mysqli_query($this->connection(), "UPDATE $this->table SET $setClause WHERE id=$id");
    }
    
    private function connection(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "notes";
        

        $conn = new mysqli($servername, $username, $password, $dbname);
        if(!$conn){
            echo mysqli_connect_error();
        }
        return $conn;
    }

    public function __destruct(){
        mysqli_close($this->connection());
    }
}