
<?php
$mensagem = ($this->session->flashdata('mensagem'));
if (isset($mensagem)) {
    echo $mensagem;
}
?>
<div class="container">
    <br>
    <div class=" table-responsive">
        <h5>Provas <a href="<?= $this->config->base_url() . 'Prova/cadastro'; ?>">[+]</a></h5>
        <table class="table table-striped table-bordered" style="text-align: center;">
            <thead>
                <tr>
                    <th> Nome </th>
                    <th> Tempo </th>
                    <th> Descrição </th>
                    <th> Número de integrantes </th>
                    <th> Operações </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($provas as $p) {
                    echo '<tr>';
                    echo '<td>' . $p->nome . '</td>';
                    echo '<td>' . $p->tempo . ' min' . '</td>';
                    echo '<td>' . $p->descricao . '</td>';
                    echo '<td>' . $p->NIntegrantes . '</td>';
                    echo '<td>'
                    . '<a class="btn btn-warning text-white mr-2" href="' . $this->config->base_url() . 'index.php/Prova/alterar/'
                    . $p->id . '"><i class="fas fa-edit"></i></a>'
                    . '<a class="btn btn-danger" href="' . $this->config->base_url() . 'index.php/Prova/deletar/'
                    . $p->id . '"><i class="fas fa-trash"></i></a>'
                    . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>