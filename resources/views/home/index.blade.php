@extends('layouts.app')



@section('title', 'XML to EXCEL')


@section('content')
    <form action="{{url('/store')}}" method="POST" enctype="multipart/form-data">
        @csrf()

        <div class="form-group">
            <label for="xml">Arquivo XML</label>
            <input type="file" class="form-control-file" name="file" id="xml">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection
