
<?php
$mensagem = ($this->session->flashdata('mensagem'));
if (isset($mensagem)) {
    echo $mensagem;
}
?>

<div class="container">
    <br>
    <div class=" table-responsive">
        <h5>Integrantes <a href="<?= $this->config->base_url() . 'Integrante/cadastro'; ?>">[+]</a></h5>
        <table class="table table-striped table-bordered" style="text-align: center;">
            <thead>
                <tr>
                    <th> Equipe </th>
                    <th> Nome </th>
                    <th> Nascimento </th>
                    <th> RG </th>
                    <th> CPF </th>
                    <th> Operações </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($integrante as $ig) {
                    echo '<tr>';
                    echo '<td>' . $ig->id_equipe . '</td>';
                    echo '<td>' . $ig->nome . '</td>';
                    echo '<td>' . $ig->data_nascimento . '</td>';
                    echo '<td>' . $ig->rg . '</td>';
                    echo '<td>' . $ig->cpf . '</td>';
                    echo '<td>'
                    . '<a class="btn btn-warning text-white mr-2" href="' . $this->config->base_url() . 'index.php/Integrante/update/'
                    . $ig->id . '"><i class="fas fa-edit"></i></a>'
                    . '<a class="btn btn-danger" href="' . $this->config->base_url() . 'index.php/integrante/delete/'
                    . $ig->id . '"><i class="fas fa-trash"></i></a>'
                    . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>