@extends('site.layouts.partials.basic')
@section('title', 'Produtos')
@section('content')

    <div class="content-products">
        <div class="container">
            <h1 class="title">PRODUTOS</h1>
            @if (count($products) > 0)
                <div id="content-table">
                    <div class="button-and-table-container">
                        <a class="btn btn-primary" href="{{ route('products.create') }}" role="button">Criar Novo Produto</a>
                    </div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">NOME</th>
                            <th scope="col">PREÇO</th>
                            <th scope="col">Observações</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->description }}</td>
                                <td>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info edit-btn">
                                        <on-icon name='create-outline'>EDITAR</ion-icon>
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger delete-btn">
                                            <ion-icon name='trash-outline'></ion-icon>DELETAR
                                        </button>
                                    </form>
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            @else
        <a href="{{ route('products.create') }}"><p>Criar novo produto</p></a>
        @endif
    </div>
@endsection
