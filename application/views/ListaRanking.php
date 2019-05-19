
<div class="container">
    <br>
    <div class=" table-responsive">
        <table class="table table-striped" style="text-align: center;">
            <thead>
                <tr>
                    <th> Colocação </th>
                    <th> Equipe </th>
                    <th> Pontos </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $x = 0;
                foreach ($ranking as $r) {
                    $x++;
                    echo '<tr>';
                    echo '<td>' . $x.'</td>';
                    echo '<td>' . $r->id_equipe. '</td>';
                    echo '<td>' . $r->pontos. '</td>';
                    echo '<tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>