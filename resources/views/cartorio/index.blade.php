@extends('layouts.app')


@section('title', 'XML to EXCEL')

@section('style')
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
@endsection

@section('content')

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {!! session('success') !!}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {!! session('error') !!}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-12 m-3">
                <div class="row">
                    <div class="col-6">
                        <h4>Catórios</h4>
                    </div>
                    <div class="col-6 ">
                        <a href="{{ route('cartorio.create') }}" class="btn btn-success float-right">+ Cadastrar</a>
                    </div>
                </div>


            </div>
            <div class="col-12">
            </div>
            <div class="col-md-12">
                <div class="card">
                <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NOME</th>
                    <th scope="col">RAZÃO</th>
                    <th scope="col">DOCUMENTO</th>
                    <th scope="col">TABELIÃO</th>
                    <th scope="col">ATIVO</th>
                    <th scope="col">AÇÕES</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($cartorio as $data)
                <tr>
                        <th scope="row"> {{ $data->id }}</th>
                        <td>{{ $data->nome }}</td>
                        <td>{{ $data->razao }}</td>
                        <td>{{ $data->documento }}</td>
                        <td>{{ $data->tabeliao }}</td>
                        <td>{{ $data->ativo == 0? 'Não Ativo': 'Ativo'}}</td>
                        <td>
                            <div class="row">
                                <a href="{{ url('cartorio/'.$data->id) }}" class="btn btn-primary"><i class="far fa-eye"></i></a>
                                <a href="{{ url('cartorio/'.$data->id.'/edit') }}" class="btn btn-success ml-2"><i class="fas fa-edit"></i></a>

                                <form action="{{ route('cartorio.destroy', $data->id)}}" method="post" class="form-inline ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </td>
                </tr>
                @endforeach

                </tbody>
            </table>
                    <div class="d-flex justify-content-center">
                        {!! $cartorio->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

