
<?php
$mensagem = ($this->session->flashdata('mensagem'));
if (isset($mensagem)) {
    echo $mensagem;
}
?>

<div class="container">
    <div class="card mt-5">
        
        <div class="card-header"><h6 class='offset-md-5'>Cadastro de prova</h6></div>
        
        <form action="" method="POST" class="col-md-12 mt-2">
            <div class="form-group col-md-8 offset-md-2">
                <input type="hidden" name="id" value="<?= (isset($provas)) ? $provas->id : ''; ?>">
                <label for="nome">Nome</label>
                <input class="input-group flex-nowrap form-control" type="text" name="nome" id="nome" value="<?= (isset($provas)) ? $provas->nome : ''; ?>">
            </div>
            <div class="form-group col-md-8 offset-md-2">
                <label for="tempo">Tempo</label>
                <input class="input-group flex-nowrap form-control " type="text" name="tempo" id="tempo" value="<?= (isset($provas)) ? $provas->tempo : ''; ?>">
            </div>
            <div class="form-group col-md-8 offset-md-2">
                <label for="descricao">Descrição</label>
                <input class="input-group flex-nowrap form-control" type="text" name="descricao" id="descricao" value="<?= (isset($provas)) ? $provas->descricao : ''; ?>">
            </div>
            <div class="form-group col-md-8 offset-md-2">
                <label for="NIntegrantes">Número de integrantes</label>
                <input class="input-group flex-nowrap form-control" type="text" name="NIntegrantes" id="NIntegrantes" value="<?= (isset($provas)) ? $provas->NIntegrantes : ''; ?>">
            </div>
            <hr>
            <button type="submit" class="btn btn-success mr-2 offset-md-5">Enviar</button>
            <button type="reset" class="btn btn-primary">Cancelar</button>
        </form><br>
    </div>
</div>
