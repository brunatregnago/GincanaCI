
<?php
$mensagem = ($this->session->flashdata('mensagem'));
if (isset($mensagem)) {
    echo $mensagem;
}
?>

<div class="container">
    <div class="card mt-5">

        <div class="card-header"><h6 class='offset-md-5'>Cadastro de pontuação</h6></div>
        <form action="" method="POST" class="col-md-12">
            <div class="form-group col-md-8 mt-2 offset-md-2">
                <input type="hidden" name="id" value="<?= (isset($pontuacao)) ? $pontuacao->id : ''; ?>">

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
                <label for="prova">Prova</label>
                <select id="id_prova" class="form-control" name="id_prova">
                    <option selected>Selecione</option>
                    <?php
                    foreach ($provas as $p) {
                        echo '<option value="' . $p->id . '">' . $p->nome . '</option>';
                    }
                    ?>

                </select>
            </div>
            <div class="form-group offset-md-2 col-md-8">
                <label for="pontos">Pontos</label>
                <input class="input-group flex-nowrap form-control" type="text" name="pontos" id="pontos" value="">
            </div>
            <hr>
            <button type="submit" class="btn btn-success offset-md-5">Enviar</button>
            <button type="reset" class="btn btn-primary">Cancelar</button>
        </form><br>
    </div>
</div>
