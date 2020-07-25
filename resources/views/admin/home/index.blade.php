@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css" />
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Lista de Cartórios</div>

                <h3 class="text-center card-title font-weight-bold text-uppercase mt-3" id="loading">Carregando...</h3>

                <div class="card-body tabela" style="display: none">
                    <table class="table table-bordered table-striped" id="datables">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Razão</th>
                                <th>Tipo Documento</th>
                                <th>Documento</th>
                                <th>Cidade</th>
                                <th>UF</th>
                                <th>Tabelião</th>
                                <th>Status</th>
                                <th>Data</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/listCartorios.js') }}"></script>
@endsection
