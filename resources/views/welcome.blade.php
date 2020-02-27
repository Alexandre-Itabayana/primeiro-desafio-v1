<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Oficina 2.0</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">


    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div>
                        <h2 style="text-align:center">Oficina 2.0</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="links">
                        <a class="btn btn-success" href="/orcamentos">Orçamentos</a>
                    </div>
                </div>
                <div class="col-lg-6 margin-tb">
                    <div class="links pull-right">
                        <a class="btn btn-success" href="/orcamentos/show">Procurar Orçamento</a>
                    </div>
                </div>

            </div>
        </div>
    </body>
</html>
