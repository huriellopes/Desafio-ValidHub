<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatório de Cartórios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
    <style>
        header {
            /*position: fixed;*/
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            margin-bottom: 2rem;
        }

        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: 20px;
            left: 0;
            right: 0;
            height: 5px;

            text-align: right;
            line-height: 1.5cm;
        }
    </style>
</head>
<body>
    <header>
        <h4 class="text-uppercase">Relatório de Cartórios</h4>
    </header>

    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>Razão</th>
                <th>Tipo Documento</th>
                <th>Documento</th>
                <th>Cidade</th>
                <th>UF</th>
                <th>Tabelião</th>
                <th>Status</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dados as $dado)
                <tr>
                    <td>{{ $dado->razao }}</td>
                    <td>{{ $dado->tipodocumento->tipo }}</td>
                    <td>{{ $dado->documento }}</td>
                    <td>{{ $dado->cidade }}</td>
                    <td>{{ $dado->uf }}</td>
                    <td>{{ $dado->tabeliao }}</td>
                    <td>{{ $dado->ativo === "1" ? 'Ativo' : 'Inativo' }}</td>
                    <td>{{ date('d/m/Y', strtotime($dado->created_at)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <footer>
        Copyright &copy; Anoreg - Sistema de Cartório
    </footer>
</body>
</html>
