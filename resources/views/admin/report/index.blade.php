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
