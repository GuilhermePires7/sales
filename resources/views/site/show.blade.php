@extends('site.layouts.partials.basic')
@section('title', 'Vendas')
@section('content')
<div class="container">
    <h1 id="main-title">MINHA AGENDA</h1>
    @if($contacts->count() > 0)
        <table class="table" id="contacts-table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <td scope="row" class="col-id">{{ $contact->id }}</td>
                        <td scope="row">{{ $contact->name }}</td>
                        <td scope="row">{{ $contact->phone }}</td>
                        <td class="actions">
                            <a href="{{ route('contacts.show', $contact->id) }}"><i class="fas fa-eye check-icon"></i></a>
                            <a href="{{ route('contacts.edit', $contact->id) }}"><i class="far fa-edit edit-icon"></i></a>
                            <form class="delete-form" action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
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
        <p id="empty-list-text">Ainda não há contatos na sua agenda,
            <a href="{{ route('contacts.create') }}">Clique aqui para adicionar</a>
        </p>
    @endif
</div>


@endsection
