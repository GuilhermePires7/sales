@extends('site.layouts.partials.basic')
@section('title', 'Produtos')
@section('content')
<form action="{{ route('site.products') }}" method="post" enctype="multipart/form-data" id="form-customers">
    @csrf
    <div id="content-form">
        <div class="form-group">
            <label for="title">Nome do produto:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Digite seu nome" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="price">Preço:</label>
            <input type="float" id="price" name="price" class="form-control" placeholder="Digite o preço do seu produto" value="{{ old('price') }}" required>
        </div>
        <div class="form-group">
            <label for="description">Preço:</label>
            <textarea name="description" class="form-control" required>{{ (old('description') != '') ? old('description') : 'Deixe sua observação:'}} </textarea>
        </div>
    </div>
    <input type="submit" class="btn btn-primary" value="Cadastrar">
</form>
@endsection
