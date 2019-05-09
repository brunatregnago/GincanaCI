
<?php
$mensagem = ($this->session->flashdata('mensagem'));
if (isset($mensagem)) {
    echo $mensagem;
}
?>
<div class="container">
    <br>
    <div class=" table-responsive">
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
                    echo '<td>' . $p->tempo . '</td>';
                    echo '<td>' . $p->descricao . '</td>';
                    echo '<td>' . $p->NIntegrantes . '</td>';
                    echo '<td>'
                    . '<a class="btn btn-warning" href="' . $this->config->base_url() . 'index.php/Prova/alterar/'
                    . $p->id . '">Alterar</a>'
                    . '<a class="btn btn-danger" href="' . $this->config->base_url() . 'index.php/Prova/deletar/'
                    . $p->id . '">Deletar</a>'
                    . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>