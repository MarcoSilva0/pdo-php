<?php require_once('header.php'); ?>
<div class="container">
<div class="col-12">
<form action="transfer.php" method="post" id='form-tranferir'>
    <table width="100%" class="table table-dark table-striped">
        <tr>
            <td>ID Remetente: </td>
            <td><input class="form-control" value="<?php echo $_GET['id']; ?>" type="number" name="txtIDR" id=""></td>
        </tr>
        <tr>
            <td>ID Destinatario: </td>
            <td><input class="form-control" type="number" name="txtIDD" id=""></td>
        </tr>
        <tr>
            <td>Valor</td>
            <td>
                <div class="input-group mb-3">
                    <span class="input-group-text">R$</span>
                    <input type="number" name="txtV" id="" class="form-control" aria-label="Amount (to the nearest reais)">
                </div>
            </td>
        </tr>
        <tr width="100%">
            <td></td>
            <td class="d-flex justify-content-end pr-2"><input class="btn btn-success" type="button" value="Transferir" name="" id="btn-submit"></td>
        </tr>

</form>
<script>
    $(document).ready(function(){
        $('#btn-submit').click(function(){
            dataForm = $('#form-tranferir').serialize();
            $.ajax({
                url: 'transfer.php',
                method: 'POST',
                data: dataForm,
                success: function(data){
                   alert(data);
                }
            })
        })
    });
</script>
</div>
</div>
<?php require_once('footer.php'); ?>