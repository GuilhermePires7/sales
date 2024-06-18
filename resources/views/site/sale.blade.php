@extends('site.layouts.partials.basic')
@section('title', 'Vendas')
@section('content')

<p>Clientes</p>

     <select class="form-select" id="form-select" aria-label="Default select example" name="sale">
        <option value="0" >SELECIONE O CLIENTE</option>
        @foreach ($sales as $key => $sale )
            <option value="{{ $sale->id }}" {{ old('sale') == $sale->id ? 'selected' : '' }}>{{ $sale->id  }} - {{ $sale->name  }}</option>
        @endforeach
    </select>
    @isset($sales)
        @foreach ($sales as $key => $sale )
        <div id="dataDiv" >
            <p id="dataContent">
                ID: {{ $sale->id }} <br>
                Name: {{ $sale->name }} <br>
                Rg: {{ $sale->rg }} <br>
                Cpf: {{ $sale->cpf }} <br>
            </p>
        </div>
        @endforeach



    @endisset


    <script>
        document.getElementById('form-select').addEventListener('change', function() {
            var selectedValue = this.value;
            var dataDiv = document.getElementById('dataDiv');
            var dataContent = document.getElementById('dataContent');

            //REQUISIÇÃO DO AJAX
            fetch('/get-data/' + selectedValue)
            .then(response => response.json())
            .then(data => {
                dataContent.textContent = "Dados da opção selecionada: " + data.info;

                // Exibe a div
                dataDiv.style.display = 'block';
            })
            .catch(error => {
                console.error('Erro ao buscar dados:', error);
            });


            // Aqui você pode adicionar lógica para buscar dados adicionais se necessário
            // Por simplicidade, estamos apenas exibindo o valor selecionado
            /*if(selectedValue == 0) {
                dataContent.textContent = "";
            } else {
                dataContent.textContent =
                 "Dados da opção selecionada: " + selectedValue;
            }

            // Exibe a div
            dataDiv.style.display = 'block';*/


        });
    </script>

@endsection
