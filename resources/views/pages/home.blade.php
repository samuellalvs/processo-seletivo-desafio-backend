@extends('layouts.master')

@section('title', 'Home')

@section('styles')

<link rel="stylesheet" href={{asset('/assets/css/pages/home.css')}}>

@endsection

@section('content')

<div class="container">
    <div class="header">
        <h1>Olá, <b id="name">Samuel</b></h1>

        <button onCLick="signOut()">Sair</button>
    </div>

    <div id="content" class="content">
        <div class="bank-balance-wrapper">
            <p>Seu saldo é de</p>
            <h2 id="bankBalance">R$10.000,00</h2>
        </div>

        <h2 class="title">Serviços disponiveis</h2>

    </div>
</div>

@endsection

@section('scripts')

<script src={{asset('/assets/js/middleware/checkAuth.js')}}></script>
<script src={{asset('/assets/js/pages/home.js')}}></script>


@endsection