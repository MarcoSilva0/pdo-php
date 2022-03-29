<?php

    require_once('DB.php');
    $conexao = DB::getConnection();

    //Tratamento para não ter SQL Injection e exclusao
    $sql = "UPDATE contas SET nome = :Nome, saldo = :Saldo WHERE id = :ID";

    $conexao->beginTransaction();
    
    $pstmQuery = $conexao->prepare($sql);
    $pstmQuery->bindParam(":Nome", $_POST["txtNome"], PDO::PARAM_STR);
    $pstmQuery->bindParam(":Saldo", $_POST["txtSaldo"], PDO::PARAM_STR);
    $pstmQuery->bindParam(":ID", $_POST["txtID"], PDO::PARAM_INT);
    $pstmQuery->execute();