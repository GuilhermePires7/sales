@extends('site.layouts.partials.basic')
@section('title', 'Vendas')
@section('content')

<form action="{{ route('payments.show') }}" method="POST">
    @csrf
    <label for="payment_method">Método de Pagamento:</label>
    <select name="payment_method" id="payment_method">
        <option value="zero">Defina o método</option>
        <option value="pix">Pix</option>
        <option value="cartão">Cartão</option>
        <!-- Outros métodos -->
    </select>

    <label for="installments">Quantidade de parcelas:</label>
    <input type="number" name="installments" id="installments" required>

    <label for="expiration_date">Data de expiration_date:</label>
    <input type="date" name="expiration_date" id="expiration_date" required>

    <label for="installment_value">valor da Parcela:</label>
    <input type="number" name="installment_value" id="installment_value" step="0.01" required>

    <button type="submit">Adicionar Pagamento</button>
</form>
<script>

    const sale = {!! $sale !!}
    console.log(sale);

    let subtotal = document.getElementById('installment_value');

    document.getElementById('installments').onchange = function() {
    var newValue = this.value;
    subtotal.value = sale.subtotal/newValue;

};

    if(installments.value == '') {
        installments.value = 1;
    }


    console.log(subtotal.value)
    console.log(installments.value)

</script>
@endsection
