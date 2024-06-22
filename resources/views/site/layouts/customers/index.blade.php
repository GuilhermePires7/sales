@extends('site.layouts.partials.basic')
@section('title', 'Clientes')
@section('content')
<div class="container">
    @if (count($customers) > 0)
    <a href="{{ route('customers.create') }}"><p>Criar Cliente</p></a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">NOME</th>
            <th scope="col">CPF</th>
            <th scope="col">RG</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($customers as $key => $customer)
            <tr>
                <th scope="row">{{ $customer->id }}</th>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->cpf }}</td>
                <td>{{ $customer->rg }}</td>
              </tr>
            @endforeach
        </tbody>
      </table>
@else
<a href="{{ route('customers.create') }}"><p>Criar Cliente</p></a>
@endif
{{-- <div class="container">
    <h1 id="main-title">MINHA VENDAS</h1>
    @if($sales->count() > 0)
        <table class="table" id="contacts-table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome Do Cliente</th>
                    <th scope="col">Produto Do Cliente</th>
                    <th scope="col">Valor Do Produto</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sales as $sale)
                    <tr>
                        <td scope="row" class="col-id">{{ $sale->id }}</td>
                        <td scope="row">{{ $sale->name }}</td>
                        <td scope="row">{{ $sale->phone }}</td>
                        <td class="actions">
                            <a href="{{ route('', $sale->id) }}"><i class="fas fa-eye check-icon"></i></a>
                            <a href="{{ route('', $sale->id) }}"><i class="far fa-edit edit-icon"></i></a>
                            <form class="delete-form" action="{{ route('contacts.destroy', $sale->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn"><i class="fas fa-times delete-icon"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p id="empty-list-text">Ainda não há vendas,
            <a href="{{ route('contacts.create') }}">Clique aqui para adicionar</a>
        </p>
    @endif --}}
@endsection
