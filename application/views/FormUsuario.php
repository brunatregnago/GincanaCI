<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="card col-md-8 mt-5">
        <div class="card-header">Cadastro de Usuários</div>
        <form action="" method="POST">
            <div class="form-group mt-2">
                <input type="hidden" name="id" value="<?= (isset($provas)) ? $provas->id : ''; ?>">
                <label for="email">Email</label>
                <input class="input-group flex-nowrap form-control" type="text" name="email" id="email" value="<?= (isset($usuario)) ? $usuario->email : ''; ?>">
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input class="input-group flex-nowrap form-control " type="password" name="senha" id="senha" value="<?= (isset($usuario)) ? $usuario->senha : ''; ?>">
            </div>
            <hr>
            <button type="submit" class="btn btn-success mr-2">Enviar</button>
            <button type="reset" class="btn btn-primary">Cancelar</button><br>
        </form><br>
            </div>
        </div>
    </div>
</body>
</html>