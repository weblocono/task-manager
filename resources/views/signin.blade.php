@extends('layout.layout')

@section('title', 'Sign In Page')

@section('content')
    <section class="signin_section">
        <div class="container">
            <div class="signin_wrapper">

                @include('components.alerts.error')

                <h1>Авторизация</h1>
                <form id="signin" action="{{ route('login') }}" method="post">
                    @csrf

                    <input value="{{ old('username') }}" name="username" type="text" placeholder="Имя пользователя" required><br/>
                    <input name="password" type="password" placeholder="Пароль" required><br/>
                    <button type="submit" class="submit_btn">Войти</button>

                    <a href="{{ route('signup.index') }}" class="reg_link">Вы еще не зарегистрированы?</a>
                </form>
            </div>
        </div>
    </section>
@endsection
