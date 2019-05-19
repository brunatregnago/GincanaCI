
<?php
$mensagem = ($this->session->flashdata('mensagem'));
if (isset($mensagem)) {
    echo $mensagem;
}
?>
<div class="container">
    <br>
    <div class=" table-responsive">
        <h5>Pontuação <a href="<?= $this->config->base_url() . 'Pontuacao/cadastro'; ?>">[+]</a></h5>
        <table class="table table-striped table-bordered" style="text-align: center;">
            <thead>
                <tr>
                    <th>Equipe</th>
                    <th>Prova</th>
                    <th>Pontos</th>
                    <th>Operações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($pontuacao as $pn) {
                    echo '<tr>';
                    echo '<td>' . $pn->id_equipe . '</td>';
                    echo '<td>' . $pn->id_prova . '</td>';
                    echo '<td>' . $pn->pontos . '</td>';
                    echo '<td>'
                    . '<a class="btn btn-warning text-white mr-2" href="' . $this->config->base_url() . 'index.php/Pontuacao/update/'
                    . $pn->id . '"><i class="fas fa-edit"></i></a>'
                    . '<a class="btn btn-danger" href="' . $this->config->base_url() . 'index.php/Pontuação/delete/'
                    . $pn->id . '"><i class="fas fa-trash"></i></a>'
                    . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>