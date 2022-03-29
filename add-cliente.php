<?php

if(isset($_POST['txtNome']) && isset($_POST['txtSaldo'])){
    
    require_once('DB.php');
    $conexao = DB::getConnection();
    //Tratamento para não ter SQL Injection e exclusao
    $sql = "INSERT INTO contas (nome, saldo, status_user) VALUES (:Nome, :Saldo, 1)";

    $pstmQuery = $conexao->prepare($sql);
    $pstmQuery->bindParam(":Nome", $_POST["txtNome"], PDO::PARAM_STR);
    $pstmQuery->bindParam(":Saldo", $_POST["txtSaldo"], PDO::PARAM_STR);
    $pstmQuery->execute();

    if($pstmQuery->rowCount() > 0){
        echo "Conta criada com sucesso!";
    }

}
