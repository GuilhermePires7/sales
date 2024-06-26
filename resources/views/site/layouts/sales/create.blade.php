@extends('site.layouts.partials.basic')
@section('title', 'Crie sua venda')
@section('content')

<form action="{{ route('sales.store') }}" method="POST" class="sales-form">
    @csrf
    <label for="customer_id">Cliente:</label>
    <select name="customer_id" id="customer_id">
        <option value="0">Selecione o cliente:</option>
        @foreach($customers as $key => $customer)
            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
        @endforeach
    </select>

    <label for="product_id">Produto:</label>
    <select name="product_id" id="product_id">
        <option value="0">Selecione seu produto:</option>
        @foreach($products as $product)
            <option value="{{ $product->id }}" data-product="{{ json_encode($product) }}">{{ $product->name }}</option>
        @endforeach
    </select>

    <label for="amount">Qntd:</label>
    <input type="number" name="amount" id="amount" required>

    <label for="unitary_value">Valor Unitário:</label>
    <input type="number" name="unitary_value" id="unitary_value" readonly>

    <label for="subtotal">Valor Total:</label>
    <input type="number" name="subtotal" id="subtotal" readonly>

    <button type="button" id="openModal">Adicionar</button>
    <div id="replied" style="display: none">
        <p></p>
    </div>


<!-- Modal -->
<div id="paymentModal" style="display:none;">
    <span class="close" id="closeModal">&times;</span>
    <h2>Detalhes do Pagamento</h2>
    <label for="payment_method">Método de Pagamento:</label>
    <select name="payment_method" id="payment_method">
        <option value="credit_card">Cartão de Crédito</option>
        <option value="debit_card">Cartão de Débito</option>
        <option value="cash">Dinheiro</option>
    </select>

    <label for="installments">Parcelas:</label>
    <input type="number" name="installments" id="installments" required>

    <label for="expiration_date">Data de Expiração:</label>
    <input type="date" name="expiration_date" id="expiration_date" required>

    <label for="installment_value">Valor da Parcela:</label>
    <input type="number" name="installment_value" id="installment_value" required>

    <label for="payment_subtotal">Subtotal:</label>
    <input type="number" name="payment_subtotal" id="payment_subtotal" readonly>

    <button type="submit" id="savePayment">Salvar Pagamento</button>
</form>
</div>

<script>
    document.getElementById('product_id').onchange = (event) => {
    let selectedOption = event.target.options[event.target.selectedIndex];

    if (selectedOption.value != "0") {
        let product = JSON.parse(selectedOption.dataset.product);
        let subtotal = document.getElementById('subtotal');
        let uni = document.getElementById('unitary_value');
        let amount = document.getElementById('amount');

        uni.value = product.price;
        if (amount.value == '') {
            amount.value = 1;
        }

        subtotal.value = amount.value * product.price;
    } else {
        document.getElementById('unitary_value').value = '';
        document.getElementById('subtotal').value = '';
        document.getElementById('amount').value = '';
    }
};


    document.getElementById('amount').addEventListener('input', subTotal);

    function subTotal() {
        const amount = document.getElementById('amount').value;
        const unitaryValue = document.getElementById('unitary_value').value;
        document.getElementById('subtotal').value = amount * unitaryValue;
    }

    // Modal
    document.getElementById('openModal').addEventListener('click', function () {
        let subtotal = document.getElementById('subtotal');
        let payment_subtotal = document.getElementById('payment_subtotal');
        let installments = document.getElementById('installments');
        let installment_value = document.getElementById('installment_value');


        payment_subtotal.value = subtotal.value;
        installment_value.value = subtotal.value;
        if (installments.value == '') {
            installments.value = 1;
        }

        installments.onchange = function () {
            installment_value.value = subtotal.value/installments.value;
         }

        document.getElementById('paymentModal').style.display = 'block';

        if(document.getElementById('installments').value == '') {
            document.getElementById('installments').value == 1;
        }
        document.getElementById('closeModal').addEventListener('click', function() {
             document.getElementById('paymentModal').style.display = 'none';
});


    });

</script>

@endsection
