
<?php
$mensagem = ($this->session->flashdata('mensagem'));
if (isset($mensagem)) {
    echo $mensagem;
}
?>
<div class="container">
    <br>
    <div class=" table-responsive">
        <h5>Equipes <a href="<?= $this->config->base_url() . 'Equipe/cadastro'; ?>">[+]</a></h5>
        <table class="table table-striped table-bordered" style="text-align: center;">
            <thead>
                <tr>
                    <th> Nome </th>
                    <th> Operações </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($equipe as $e) {
                    echo '<tr>';
                    echo '<td>' . $e->nome . '</td>';
                    echo '<td>'
                    . '<a class="btn btn-warning text-white mr-2" href="' . $this->config->base_url() . 'index.php/Equipe/update/'
                    . $e->id . '"><i class="fas fa-edit"></i></a>'
                    . '<a class="btn btn-danger" href="' . $this->config->base_url() . 'index.php/Equipe/delete/'
                    . $e->id . '"><i class="fas fa-trash"></i></a>'
                    . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>