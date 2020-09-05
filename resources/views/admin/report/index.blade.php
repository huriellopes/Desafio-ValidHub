@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Relatório</div>

                    <div class="card-body">
                        <form action="{{ route('admin.report') }}" method="POST" id="reportForm" autocomplete="off">
                            @csrf
                            <div class="form-row">
                                <div class="col form-group">
                                    <label for="uf">UF</label>
                                    <select name="uf" id="uf" class="form-control">
                                        <option value selected disabled>Selecione uma UF</option>
                                        <option value="AC">AC</option>
                                        <option value="AL">AL</option>
                                        <option value="AM">AM</option>
                                        <option value="AP">AP</option>
                                        <option value="BA">BA</option>
                                        <option value="CE">CE</option>
                                        <option value="DF">DF</option>
                                        <option value="ES">ES</option>
                                        <option value="GO">GO</option>
                                        <option value="MA">MA</option>
                                        <option value="MG">MG</option>
                                        <option value="MS">MS</option>
                                        <option value="MT">MT</option>
                                        <option value="PA">PA</option>
                                        <option value="PB">PB</option>
                                        <option value="PE">PE</option>
                                        <option value="PI">PI</option>
                                        <option value="PR">PR</option>
                                        <option value="RJ">RJ</option>
                                        <option value="RN">RN</option>
                                        <option value="RS">RS</option>
                                        <option value="RO">RO</option>
                                        <option value="RR">RR</option>
                                        <option value="SC">SC</option>
                                        <option value="SE">SE</option>
                                        <option value="SP">SP</option>
                                        <option value="TO">TO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col form-group">
                                    <label for="startDate">Data Inicio</label>
                                    <input type="text" name="date_start" id="startDate" class="form-control" autocomplete="off" required />
                                </div>

                                <div class="col form-group">
                                    <label for="endDate">Data Fim</label>
                                    <input type="text" name="date_end" id="endDate" class="form-control" autocomplete="off" required />
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col form-group text-right">
                                    <button type="submit" class="btn btn-outline-primary">Gerar</button>
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
    <script src="{{ asset('/js/reportCartorio.js') }}"></script>
@endsection
