@extends('layouts.master')

@section('title', 'Home')

@section('styles')

<link rel="stylesheet" href={{asset('/assets/css/pages/home.css')}}>

@endsection

@section('content')

<div class="container">
    <div class="header">
        <h1>Olá, <b>Samuel</b></h1>

        <button>Sair</button>
    </div>

    <div class="content">
        <div class="bank-balance-wrapper">
            <p>Seu saldo é de</p>
            <h2>R$10.000,00</h2>
        </div>

        <h2 class="title">Serviços disponiveis</h2>
        <div class="services-wrapper">
            <a href={{route('transfer')}}>
                Fazer transferência
            </a>
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection