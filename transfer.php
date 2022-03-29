<?php
if( is_numeric($_POST["txtIDR"]) && 
    is_numeric($_POST["txtIDD"]) && 
    is_numeric($_POST["txtV"]) && 
    ($_POST["txtIDD"] != $_POST["txtIDR"]))
{
    if(isset($_POST["txtIDR"])){
        try{
            require_once('DB.php');
            $conexao = DB::getConnection();
            
            //Inicio a transacao de forma segura
            $conexao->beginTransaction();

            //Tratamento para não ter SQL Injection
            $sql = "SELECT COUNT(*) FROM contas WHERE id = :Destinatario";
            $prepareQuery = $conexao->prepare($sql);
            $prepareQuery->bindParam(":Destinatario", $_POST["txtIDD"], PDO::PARAM_INT);
            $prepareQuery->execute();

            if($prepareQuery->fetchColumn() > 0){

                $prepareQuery->closeCursor();
                //Tratamento para não ter SQL Injection
                $sql = "SELECT COUNT(*) FROM contas WHERE id = :Remetente";    
                $prepareQuery = $conexao->prepare($sql);
                $prepareQuery->bindParam(":Remetente", $_POST["txtIDR"], PDO::PARAM_INT);
                $prepareQuery->execute();

                if($prepareQuery->fetchColumn() > 0){

                    $prepareQuery->closeCursor();
                    //Tratamento para não ter SQL Injection
                    $sql = "SELECT saldo FROM contas WHERE id = :Remetente";
                    $prepareQuery = $conexao->prepare($sql);
                    $prepareQuery->bindParam(":Remetente", $_POST["txtIDR"], PDO::PARAM_INT);
                    $prepareQuery->execute();  

                    if($row = $prepareQuery->fetch(PDO::FETCH_ASSOC)){
                        if($row["saldo"] >= $_POST["txtV"]){

                            $prepareQuery->closeCursor();
                            //Retirar do remetente
                            $updateRemetenteSQL = "UPDATE contas SET saldo = saldo - :txtValor WHERE id = :Remetente";
                            $UpdateRemetentePrepareQuery = $conexao->prepare($updateRemetenteSQL);
                            $UpdateRemetentePrepareQuery->bindParam(":txtValor", $_POST["txtV"], PDO::PARAM_STR);
                            $UpdateRemetentePrepareQuery->bindParam(":Remetente", $_POST["txtIDR"], PDO::PARAM_INT);
                            $UpdateRemetentePrepareQuery->execute();  

                            if($UpdateRemetentePrepareQuery->rowCount() > 0){

                                $prepareQuery->closeCursor();
                                //Adicionar ao destinátario
                                $updateDestinatarioSQL = "UPDATE contas SET saldo = saldo + :txtValor WHERE id = :Destinatario";
                                $UpdateDestinatarioPrepareQuery = $conexao->prepare($updateDestinatarioSQL);
                                $UpdateDestinatarioPrepareQuery->bindParam(":txtValor", $_POST["txtV"], PDO::PARAM_STR);
                                $UpdateDestinatarioPrepareQuery->bindParam(":Destinatario", $_POST["txtIDD"], PDO::PARAM_INT);
                                $UpdateDestinatarioPrepareQuery->execute();

                                if($UpdateDestinatarioPrepareQuery->rowCount() > 0){
                                    if($conexao->commit()){
                                        echo "Transferência efetuada com sucesso";
                                    }else{
                                        echo "Aconteceu um erro ao transferir!";
                                    }
                                }else{
                                    
                                }
                            }else{
                                
                                echo "Aconteceu um erro ao transferir!";
                            }
                        
                        }else{
                            echo "Ocorreu um erro ao transferir!\nErro: Saldo Insuficiente, seu saldo é de R$" . $row["saldo"];
                        }
                    }
                }
            }
        } catch(PDOException $e){
            $conexao->rollBack();
        }
    }
}else{
    echo 'O ID e o valor é composto apenas por números';
}