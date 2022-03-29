<?php
class DB{
    
    public function getConnection(){
        return $conn = new PDO('mysql:host=localhost;dbname=curso_pdo', 'root', 'Marco-1022');
    }
    
    public function closeConnection(){
        return PDO::closeCursor();
    }
}
?>