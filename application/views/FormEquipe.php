
<?php
$mensagem = ($this->session->flashdata('mensagem'));
if (isset($mensagem)) {
    echo $mensagem;
}
?>

<div class="container">
    <br>
    <form action="" method="POST" class="col-md-8">
        <div class="form-group">
            <input type="hidden" name="id" value=""
                   <label for="nome">Nome</label>
            <input class="input-group flex-nowrap form-control" type="text" name="nome" id="nome" value="">
        </div>
        <hr>
        <button type="submit" class="btn btn-success">Enviar</button>
        <button type="reset" class="btn btn-primary">Cancelar</button>
    </form>
</div>


