@extends('layouts.app')


@section('title', 'Cartório')


@section('content')
    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Cadastrar Cartório') }}</div>

                    <div class="card-body">
                        <form action="{{url('cartorio')}}" method="POST" enctype="multipart/form-data">
                            @csrf()

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Nome</label>
                                    <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" placeholder="Nome" name="nome" value="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Razão</label>
                                    <input type="text" class="form-control @error('razao') is-invalid @enderror" id="razao" placeholder="Razão" name="razao">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Documento</label>
                                <input type="text" class="form-control @error('documento') is-invalid @enderror" id="documento" placeholder="Documento" name="documento">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Tabelião</label>
                                <input type="text" class="form-control @error('tabeliao') is-invalid @enderror" id="tabeliao" placeholder="Tabelião" name="tabeliao" >
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="inputZip">CEP</label>
                                    <input type="text" class="form-control @error('cep') is-invalid @enderror" id="cep" name="cep">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Cidade</label>
                                    <input type="text" class="form-control @error('cidade') is-invalid @enderror" id="cidade" name="cidade">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="uf">Estado</label>
                                    <select class="form-control @error('uf') is-invalid @enderror" id="uf" name="uf">
                                        <option value="">Selecione</option>
                                        @foreach($estados as $data)
                                        <option value="{{ $data->sigla }}">{{ $data->descricao }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-9">
                                    <label for="inputZip">Endereço</label>
                                    <input type="text" class="form-control @error('endereco') is-invalid @enderror" id="endereco" name="endereco">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputZip">Bairro</label>
                                    <input type="text" class="form-control @error('bairro') is-invalid @enderror" id="bairro" name="bairro">
                                </div>



                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">E-mail</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="E-mail" name="email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Telefone</label>
                                    <input type="text" class="form-control @error('telefone') is-invalid @enderror" id="telefone" placeholder="Telefone" name="telefone">
                                </div>
                            </div>

                            <div class="form-row mb-5">
                                {{--                                <label for="ativo">Ativo</label>--}}
                                <div class="form-check mr-4">
                                    <input class="form-check-input" type="radio" name="ativo" id="ativo" value="1" checked>
                                    <label class="form-check-label" for="1">
                                        Ativo
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ativo" id="ativo" value="0">
                                    <label class="form-check-label" for="0">
                                        Não Ativo
                                    </label>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-12 ">
                                    <button type="submit" class="btn btn-success mt-3 btn-lg mr-2 float-right">Cadastrar</button>
                                    <a href="{{url('cartorio')}}" class="btn btn-danger mt-3 btn-lg float-right mr-2">Voltar</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>

    <script src="{{url('js/script.js')}}"></script>
@endsection
