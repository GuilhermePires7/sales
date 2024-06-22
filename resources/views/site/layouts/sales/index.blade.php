@extends('site.layouts.partials.basic')
@section('title', 'Sales index')
@section('content')
<h1>Sales index</h1>
@if (count($sales) > 0)
    <p>Tabela</p>
@else
<a href="{{ route('sales.create') }}"><p>Criar nova venda</p></a>
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
    @endif
    --}}
@endsection
