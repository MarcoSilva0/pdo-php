<?php

if(isset($_POST['id']) && is_numeric($_POST['id'])){
    require_once('DB.php');
    $conexao = DB::getConnection();
        
    //Tratamento para não ter SQL Injection e exclusao
    $sql = "DELETE FROM contas WHERE id = :id";
    $prepareQuery = $conexao->prepare($sql);
    $prepareQuery->bindParam(":id", $_POST["id"], PDO::PARAM_INT);
    $prepareQuery->execute();

    if($prepareQuery->rowCount() > 0){
        echo "Conta Apagada com sucesso";
    }

}
