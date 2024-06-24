@extends('site.layouts.partials.basic')
@section('title', 'Sales index')
@section('content')

<div id="content-sales">
    <h1 class="title">VENDAS</h1>
    @if (count($sales) > 0)
    <div id="content-table">
        <div class="button-and-table-container">
            <a class="btn btn-primary" href="{{ route('sales.create') }}" role="button">Criar Nova Venda</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NOME</th>
                    <th scope="col">PRODUTO</th>
                    <th scope="col">QUANTIDADE</th>
                    <th scope="col">PARCELAS</th>
                    <th scope="col">SUBTOTAL</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $key => $sale)
                <tr>
                    <th scope="row">{{ $sale->id }}</th>
                    <td>{{ $sale->customer->name }}</td>
                    <td>{{ $sale->product->name }}</td>
                    <td>{{ $sale->amount }}x</td>
                    <td>{{ $sale->installments }}</td>
                    <td>{{ $sale->subtotal }}</td>
                    <td>
                        <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-info edit-btn">
                            <on-icon name='create-outline'>EDITAR</ion-icon>
                        </a>
                        <form action="{{ route('sales.destroy', $sale->id) }}" method="POST">
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
    <a href="{{ route('sales.create') }}">
        <p>Criar nova venda</p>
    </a>

    @endif

</div>

@endsection
