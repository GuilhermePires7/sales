@extends('site.layouts.partials.basic')
@section('title', 'Sales index')
@section('content')
<h1>Sales index</h1>
@if (count($sales) > 0)
<a href="{{ route('sales.create') }}"><p>Criar Nova Venda</p></a>
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
                <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-info edit-btn"><on-icon name='create-outline'>EDITAR</ion-icon> </a>
                    <form action="{{ route('sales.destroy', $sale->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn"><ion-icon name='trash-outline'></ion-icon>DELETAR</button>
                    </form>
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
@else
<a href="{{ route('sales.create') }}"><p>Criar nova venda</p></a>

@endif

{{-- <td>
    <a href="{{ route('sales.edit', $customers->id) }}" class="btn btn-info edit-btn"><on-icon name='create-outline'></ion-icon> </a>
        <form action="{{ route('sales.edit', $customers->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger delete-btn"><ion-icon name='trash-outline'></ion-icon>Delete</button>
        </form>
</td>--}}
@endsection
