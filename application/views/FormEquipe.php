
<?php
$mensagem = ($this->session->flashdata('mensagem'));
if (isset($mensagem)) {
    echo $mensagem;
}
?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header"><h6 class='offset-md-5'>Cadastro de equipe</h6></div>
        <br>
        <form action="" method="POST" class="col-md-12">
            <div class="form-group col-md-8 offset-md-2">
                <input type="hidden" name="id" value="<?= (isset($equipe)) ? $equipe->id : ''; ?>"
                       <label for="nome">Nome</label>
                <input class="input-group flex-nowrap form-control" type="text" name="nome" id="nome" value="<?= (isset($equipe)) ? $equipe->nome : ''; ?>">
            </div>
            <hr>
            <button type="submit" class="btn btn-success mr-2 offset-md-5">Enviar</button>
            <button type="reset" class="btn btn-primary">Cancelar</button>
        </form><br>
    </div>
</div>