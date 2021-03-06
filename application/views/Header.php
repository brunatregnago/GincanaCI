<!DOCTYPE html>

<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gincana</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    </head>
    <body>
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="<?= $this->config->base_url(); ?>">
                Gincana
            </a>

            <ul class="navbar-nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $this->config->base_url() . 'Usuario/sair'; ?>">
                        Sair <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        
        <nav class="navbar navbar-light bg-light navbar-expand-md">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto offset-md-3"> 
                        <li class="nav-item mr-3">
                            <a class="nav-link text-dark" href="<?= $this->config->base_url() . 'Ranking/lista'; ?>">Ranking</a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link text-dark" href="<?= $this->config->base_url() . 'Prova/lista'; ?>">Provas</a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link text-dark" href="<?= $this->config->base_url() . 'Equipe/listaEquipe'; ?>">Equipes</a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link text-dark" href="<?= $this->config->base_url() . 'Integrante/listaIntegrante'; ?>">Integrantes</a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link text-dark" href="<?= $this->config->base_url() . 'Pontuacao/listaPontuacao'; ?>">Pontuação</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>