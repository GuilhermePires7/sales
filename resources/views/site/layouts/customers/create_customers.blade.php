@extends('site.layouts.partials.basic')
@section('title', 'Clientes')
@section('content')
<form action="{{ route('customers.store') }}" method="post" enctype="multipart/form-data" id="form-customers">
    @csrf
    <div id="content-form">
        <div class="form-group">
            <label for="title">Seu nome:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Digite seu nome" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="cpf">Cpf:</label>
            <input type="text" id="cpf" name="cpf" class="form-control" placeholder="Digite seu cpf" value="{{ old('cpf') }}">
        </div>
        <div class="form-group">
            <label for="rg">Rg:</label>
            <input type="text" id="rg" name="rg" class="form-control" placeholder="Digite seu rg" value="{{ old('rg') }}">
        </div>

    </div>
    <input type="submit" class="btn btn-primary" value="Cadastrar">
</form>

@endsection
