<?php require_once('header.php'); ?>
<div class="container">
<div class="col-12">
    <table width="100%" class="table table-dark table-striped">
        <tr>
            <td>ID</td>
            <td>Cliente</td>
            <td>Saldo</td>
            <td>Tranferir</td>
            <td>Status</td>
            <td>Apagar**</td>
            <td>Editar</td>
        </tr>
    <?php
    /*    Conexão    */ 

    try{
        
        $sql = "SELECT * FROM contas ORDER BY id ASC";
        
        foreach($conexao->query($sql) as $row){
            echo '<tr>';
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td>R$ " . $row['saldo'] . "</td>";
            echo "<td> <a href='transferir.php?id=".$row['id']."'>Transferir Valor</td>";
            echo "<td><input type='checkbox' name='chk".$row['id']."' value='".$row['status_user']."'></td>";
            echo "<td class='trash-icon'><button class='btn-trash' value='". $row['id'] ."'><i class='fa-solid fa-trash-can'></i></button></td>";
            echo "<td class='edit-icon'><a href='editar.php?id=" . $row['id'] ."' class='btn-edit'><i class='fa-solid fa-pen-to-square'></i></button></td>";
            echo '</tr>';
        }
    } catch(PDOException $ex){
        
        echo "Ocorreu um erro: " . $ex->getMessage() . " || Código do erro: " . $ex->getCode();
    }
    ?>
    </table>
    </div>
    </div>
    <div>
        <p>**Para fins de estudo criei a função de apagar, contudo em um sistema não apagamos registros apenas desativamos</p>
    </div>
    <script>
        $(document).ready(function(){
            $('.btn-trash').click(function(){
                confirma = confirm('Você tem certeza que seja excluir?');

                if(confirma == 1){
                    $.ajax({ 
                        url: 'excluir.php',
                        method: 'POST',
                        data: 'id=' + $(this).val(),
                        success: function(data){
                           alert(data);
                           location.reload(true);
                        }
                    })
                }
            });
        });
    </script>
<?php require_once('footer.php'); ?>