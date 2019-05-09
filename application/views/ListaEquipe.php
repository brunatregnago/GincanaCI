
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
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($equipe as $e) {
                    echo '<tr>';
                    echo '<td>' . $e->nome . '</td>';
                    echo '<td>'
                    . '<a class="btn btn-warning" href="' . $this->config->base_url() . 'index.php/Equipe/alterar/'
                    . $e->id . '">Alterar</a>'
                    . '<a class="btn btn-danger" href="' . $this->config->base_url() . 'index.php/Equipe/deletar/'
                    . $e->id . '">Deletar</a>'
                    . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>