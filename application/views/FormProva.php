
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
            <input type="hidden" name="id" value="<?= (isset($provas)) ? $provas->id : ''; ?>"
                   <label for="nome">Nome</label>
            <input class="input-group flex-nowrap form-control" type="text" name="nome" id="nome" value="<?= (isset($provas)) ? $provas->nome : ''; ?>">
        </div>
        <div class="form-group">
            <label for="tempo">Tempo</label>
            <input class="input-group flex-nowrap form-control " type="text" name="tempo" id="tempo" value="<?= (isset($provas)) ? $provas->tempo : ''; ?>">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input class="input-group flex-nowrap form-control" type="text" name="descricao" id="descricao" value="<?= (isset($provas)) ? $provas->descricao : ''; ?>">
        </div>
        <div class="form-group">
            <label for="NIntegrantes">Número de integrantes</label>
            <input class="input-group flex-nowrap form-control" type="text" name="NIntegrantes" id="NIntegrantes" value="<?= (isset($provas)) ? $provas->NIntegrantes : ''; ?>">
        </div>
        <hr>
        <button type="submit" class="btn btn-success">Enviar</button>
        <button type="reset" class="btn btn-primary">Cancelar</button>
    </form>
</div>
