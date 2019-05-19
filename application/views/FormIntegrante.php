<?php
$mensagem = ($this->session->flashdata('mensagem'));
if (isset($mensagem)) {
    echo $mensagem;
}
?>
<br>
<div class="container">
    <div class="card mt-5">
        <div class="card-header"><h6 class='offset-md-5'>Cadastro de integrante</h6></div>
        <?php
        echo validation_errors();
        ?>
        <form action="" method="POST" class="col-md-12">
            <div class="form-group mt-2 offset-md-2 col-md-8">
                <input type="hidden" name="id" value="<?= (isset($integrante)) ? $integrante->id : ''; ?>">

                <label for="equipe">Equipe</label>
                <select id="id_equipe" class="form-control" name="id_equipe">
                    <option selected>Selecione</option>
                    <?php
                    foreach ($equipe as $e) {
                        echo '<option value="' . $e->id . '">' . $e->nome . '</option>';
                    }
                    ?>
                </select>

            </div>
            <div class="form-group offset-md-2 col-md-8">
                <label for="nome">Nome</label>
                <input class="input-group flex-nowrap form-control " type="text" name="nome" id="nome" value="<?= (isset($integrante)) ? $integrante->nome : ''; ?>">
            </div>
            <div class="form-group offset-md-2 col-md-8">
                <label for="data_nascimento">Nascimento</label>
                <input class="input-group flex-nowrap form-control " type="date" name="data_nascimento" id="data_nascimento" value="<?= (isset($integrante)) ? $integrante->data_nascimento : ''; ?>">
            </div>
            <div class="form-group offset-md-2 col-md-8">
                <label for="rg">RG</label>
                <input class="input-group flex-nowrap form-control " type="text" name="rg" id="rg" value="<?= (isset($integrante)) ? $integrante->rg : ''; ?>">
            </div>
            <div class="form-group offset-md-2 col-md-8">
                <label for="cpf">CPF</label>
                <input class="input-group flex-nowrap form-control " type="text" name="cpf" id="cpf" value="<?= (isset($integrante)) ? $integrante->cpf : ''; ?>">
            </div>
            <hr>
            <button type="submit" class="btn btn-success offset-md-5">Enviar</button>
            <button type="reset" class="btn btn-primary">Cancelar</button>
        </form><br>
    </div>
</div>