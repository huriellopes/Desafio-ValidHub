@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Menu</div>
                <div class="card-body">

                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form action="{{ route('cartorio.create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col form-group">
                                <label for="AXML">XML</label>
                                <input type="file" id="AXML" name="AXMLC" class="form-control">
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
