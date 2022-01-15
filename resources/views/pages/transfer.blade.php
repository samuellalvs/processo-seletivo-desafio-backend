@extends('layouts.master')

@section('title', 'Home')

@section('styles')
<link rel="stylesheet" href={{asset('/assets/css/pages/transfer.css')}}>
@endsection

@section('content')

<div class="container">
    <div class="header">
        <button onCLick="handleBack()">
            Voltar
        </button>
        <h1>Nova transferência</h1>
    </div>

    <div class="content">
        <form class="transfer-form" onSubmit="(e) => { e.preventDefault(); }">
            @csrf

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

            <button type="submit">Confirmar transferência</button>
        </form>

    </div>
</div>

@endsection

@section('scripts')

<script src={{asset('/assets/js/pages/transfer.js')}}></script>

@endsection