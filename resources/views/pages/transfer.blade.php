@extends('layouts.master')

@section('title', 'Home')

@section('styles')
<link rel="stylesheet" href={{asset('/assets/css/pages/transfer.css')}}>
@endsection

@section('content')

<div class="container">
    <div class="header">
        <button>
            Voltar
        </button>
        <h1>Nova transferência</h1>
    </div>

    <div class="content">
        <form class="transfer-form" action="">

            <div class="input-wrapper">
                <label for="registryNumber">CPF/CNPJ</label>
                <input type="registryNumber" id="registryNumber">
            </div>

            <div class="input-wrapper">
                <label for="name">Nome</label>
                <input type="name" id="name">
            </div>

            <div class="input-wrapper">
                <label for="amount">Valor</label>
                <input type="amount" id="amount">
            </div>

        </form>

    </div>
</div>

@endsection

@section('scripts')

@endsection