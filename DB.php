<?php
class DB{
    
    public function getConnection(){
        return $conn = new PDO('mysql:host=localhost;dbname=curso_pdo', 'root', '');
    }
    
    public function closeConnection(){
        return PDO::closeCursor();
    }
}
?>
