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
                    <div class="card-header">{{ __('Editar Cartório') }}</div>

                    <div class="card-body">
                        <form action="{{ route('cartorio.update', $cartorio->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Nome</label>
                                    <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" placeholder="Nome" name="nome" value="{{ $cartorio->nome }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Razão</label>
                                    <input type="text" class="form-control @error('razao') is-invalid @enderror" id="razao" placeholder="Razão" name="razao" value="{{ $cartorio->razao }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Documento</label>
                                <input type="text" class="form-control @error('documento') is-invalid @enderror" id="documento" placeholder="Documento" name="documento" value="{{ $cartorio->documento }}">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Tabelião</label>
                                <input type="text" class="form-control @error('tabeliao') is-invalid @enderror" id="tabeliao" placeholder="Tabelião" name="tabeliao" value="{{ $cartorio->tabeliao }}">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="inputZip">CEP</label>
                                    <input type="text" class="form-control @error('cep') is-invalid @enderror" id="cep" name="cep" value="{{ $endereco->cep }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Cidade</label>
                                    <input type="text" class="form-control @error('cidade') is-invalid @enderror" id="cidade" name="cidade" value="{{ $endereco->cidade }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="uf">Estado</label>
                                    <select class="form-control @error('uf') is-invalid @enderror" id="uf" name="uf">
                                        <option value="">Selecione</option>
                                        @foreach($estados as $data)
                                            @if($data->id == $endereco->estado_id)
                                                <option value="{{ $data->sigla }}" selected>{{ $data->descricao }}</option>
                                            @else
                                                <option value="{{ $data->sigla }}">{{ $data->descricao }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-9">
                                    <label for="inputZip">Endereço</label>
                                    <input type="text" class="form-control @error('endereco') is-invalid @enderror" id="endereco" name="endereco" value="{{ $endereco->endereco }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputZip">Bairro</label>
                                    <input type="text" class="form-control @error('bairro') is-invalid @enderror" id="bairro" name="bairro" value="{{ $endereco->bairro }}">
                                </div>



                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">E-mail</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="E-mail" name="email" value="{{ $telefone->email }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Telefone</label>
                                    <input type="text" class="form-control @error('telefone') is-invalid @enderror" id="telefone" placeholder="Telefone" name="telefone" value="{{ $telefone->telefone }}">
                                </div>
                            </div>

                            <div class="form-row mb-5">
                                {{--                                <label for="ativo">Ativo</label>--}}
                                <div class="form-check mr-4">
                                    <label class="form-check-label" for="1">
                                    <input class="form-check-input" type="radio" name="ativo" id="ativo" value="1"
                                           {{ $cartorio->ativo == 0?'':'checked' }} />

                                        Ativo
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label" for="0">
                                    <input class="form-check-input" type="radio" name="ativo" id="ativo" value="0"
                                        {{ $cartorio->ativo == 0?'checked':'' }} >

                                        Não Ativo
                                    </label>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-12 ">
                                    <button type="submit" class="btn btn-warning mt-3 btn-lg mr-2 float-right">Editar</button>
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

