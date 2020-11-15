@extends('layouts.app')


@section('title', 'XML to EXCEL')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Converter') }}</div>

                    <div class="card-body">
                        <form action="{{url('/store')}}" method="POST" enctype="multipart/form-data">
                            @csrf()

                            <div class="form-group">
                                <label for="xml">Arquivo XML</label>
                                <input type="file" class="form-control-file" name="file" id="xml">
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg btn-block">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
