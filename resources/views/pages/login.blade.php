@extends('layouts.master')

@section('title', 'Login')

@section('styles')

<link rel="stylesheet" href={{asset('/assets/css/pages/login.css')}}>

@endsection

@section('content')

<div class="container">
    <div class="login-card">
        <div class="login-card-header">
            <img src={{asset('/assets/images/picpay-logo.png')}} alt="Logo PicPay">
        </div>
        <div class="login-card-body">
            <form class="login-form" action="">
                @csrf

                <div class="login-form-header">
                    <h1>Login</h1>
                    <p>Insira suas credenciais de login para acessar o aplicativo.</p>
                </div>

                <div class="login-form-body">
                    <div class="input-wrapper">
                        <label for="email">Email</label>
                        <input type="email" id="email">
                    </div>

                    <div class="input-wrapper">
                        <label for="password">Senha</label>
                        <input type="password" id="password">
                    </div>
                </div>

                <div class="login-form-footer">
                    <button type="submit">Login</button>
                </div>

            </form>

        </div>
    </div>

</div>




@endsection