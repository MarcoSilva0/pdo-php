<?php
//Não aconselho a usar, funciona mas pode sofrer sql injection
exit;
if( is_numeric($_POST["txtIDR"]) && 
    is_numeric($_POST["txtIDD"]) && 
    is_numeric($_POST["txtV"]) && 
    ($_POST["txtIDD"] != $_POST["txtIDR"]))
{
    if(isset($_POST["txtIDR"])){
        $user = 'root';
        $pass = 'Marco-1022';
        $conexao = new PDO('mysql:host=localhost;dbname=curso_pdo', $user, $pass);
        
        $sql = "SELECT COUNT(*) FROM contas WHERE id = " . $_POST["txtIDD"];
        $query = $conexao->query($sql);

        if($query->fetchColumn() > 0){
            
            $sql = "SELECT COUNT(*) FROM contas WHERE id = " . $_POST["txtIDR"];    
            $query = $conexao->query($sql);
            
            if($query->fetchColumn() > 0){
                $sql = "SELECT saldo FROM contas WHERE id = " . $_POST["txtIDR"];    

                foreach($conexao->query($sql) as $row){
                    if($row["saldo"] >= $_POST["txtV"]){
                        
                        //Retirar do remetente
                        $updateRemetenteSQL = "UPDATE contas SET saldo = saldo - " . $_POST['txtV'] ." WHERE id = " . $_POST['txtIDR'];
                        $updateRemetenteQuery = $conexao->query($updateRemetenteSQL);

                        if($updateRemetenteQuery->rowCount() > 0){

                            //Adicionar ao destinátario
                            $updateDestinatarioSQL = "UPDATE contas SET saldo = saldo + " . $_POST['txtV'] ." WHERE id = " . $_POST['txtIDD'];
                            $updateDestinatarioQuery = $conexao->query($updateDestinatarioSQL);

                            if($updateDestinatarioQuery->rowCount() > 0){
                                echo "Transferência efetuada com sucesso";
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
    }
}else{
    echo 'O ID e o valor é composto apenas por números';
}