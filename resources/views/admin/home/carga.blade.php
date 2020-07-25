@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Carga XML</div>

                    <div class="card-body">
                        <form action="{{ route('cartorio.carga') }}" method="POST" enctype="multipart/form-data" id="cargaForm">
                            @csrf
                            <div class="form-row">
                                <div class="col form-group">
                                    <label for="AXML">XML</label>
                                    <input type="file" id="AXML" name="AXMLC" class="form-control" accept="application/xml, text/plain text/xml" required />
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col form-group text-right">
                                    <button type="submit" class="btn btn-outline-primary">Enviar</button>
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
    <script src="{{ asset('js/cargaCartorio.js') }}"></script>
@endsection
