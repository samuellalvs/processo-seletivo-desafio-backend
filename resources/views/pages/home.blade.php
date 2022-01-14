@extends('layouts.master')

@section('title', 'Home')

@section('styles')

<link rel="stylesheet" href={{asset('/assets/css/pages/home.css')}}>

@endsection

@section('content')

<div class="container">
    <div class="header">
        <h1>Olá, Samuel</h1>

        <button>Sair</button>
    </div>

    <div class="content">
        <div class="bank-balance-wrapper">
            <p>Seu saldo é de</p>
            <h3>R$10.000,00</h3>
        </div>

        <div class="actions-wrapper">
            <button>
                Fazer transferencia
            </button>
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection