@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Novo Cartório</div>

                    <div class="card-body">
                        <form action="{{ route('cartorio.create') }}" method="POST" id="cartorioForm">
                            @csrf
                            <div class="form-row">
                                <div class="col form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" name="nome" id="nome" class="form-control" />
                                </div>
                                <div class="col form-group">
                                    <label for="razao">Razão</label>
                                    <input type="text" name="razao" id="razao" class="form-control" />
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" title="Digite um email válido!" />
                                </div>
                                <div class="col form-group">
                                    <label for="telefone">Telefone</label>
                                    <input type="text" name="telefone" id="telefone" class="form-control" title="Telefone inválido!" />
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col form-group">
                                    <label for="tipo_documento">Tipo Documento</label>
                                    <select name="tipo_documento" id="tipo_documento" class="form-control">
                                        <option value selected disabled>Selecione o tipo de documento</option>
                                        @foreach ($documento as $value)
                                            <option value="{{ $value->id }}">{{ $value->documento }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col form-group">
                                    <label for="documento">Documento</label>
                                    <input type="text" name="documento" id="documento" class="form-control" />
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col form-group">
                                    <label for="cep">Cep</label>
                                    <input type="text" name="cep" id="cep" class="form-control" />
                                </div>
                                <div class="col form-group">
                                    <label for="uf">UF</label>
                                    <input type="text" id="uf" name="uf" class="form-control" pattern="[A-Za-z]{2}" title="Digite somente a sigla" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col form-group">
                                    <label for="endereco">Endereço</label>
                                    <input type="text" name="endereco"  id="endereco" class="form-control" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col form-group">
                                    <label for="cidade">Cidade</label>
                                    <input type="text" id="cidade" name="cidade" class="form-control" />
                                </div>
                                <div class="col form-group">
                                    <label for="bairro">Bairro</label>
                                    <input type="text" id="bairro" name="bairro" class="form-control" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col form-group">
                                    <label for="tabeliao">Tabelião</label>
                                    <input type="text" id="tabeliao" name="tabeliao" class="form-control" />
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col form-group text-right">
                                    <button type="submit" class="btn btn-outline-primary">Cadastrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/createCartorio.js') }}"></script>
@endsection
