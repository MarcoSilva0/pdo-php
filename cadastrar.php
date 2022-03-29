<?php require_once('header.php'); ?>
<div class="container">
<div class="col-12">
<form action="transfer.php" method="post" id='form-incluir'>
    <table width="100%" class="table table-dark table-striped">
        <tr>
            <td>Nome: </td>
            <td><input class="form-control" type="text" name="txtNome" id="txtNome"></td>
        </tr>
        <tr>
            <td>Saldo</td>
            <td>
                <div class="input-group mb-3">
                    <span class="input-group-text">R$</span>
                    <input type="number" name="txtSaldo" id="" class="form-control" aria-label="Amount (to the nearest reais)">
                </div>
            </td>
        </tr>
        <tr width="100%">
            <td></td>
            <td class="d-flex justify-content-end pr-2"><input class="btn btn-success" type="button" value="Cadastrar" name="" id="btn-submit"></td>
        </tr>

</form>
<script>
    $(document).ready(function(){
        $('#btn-submit').click(function(){
            dataForm = $('#form-incluir').serialize();
            $.ajax({
                url: 'add-cliente.php',
                method: 'POST',
                data: dataForm,
                success: function(data){
                   alert(data);
                   location.href = 'index.php'
                }
            })
        })
    });
</script>
</div>
</div>
<?php require_once('footer.php'); ?>