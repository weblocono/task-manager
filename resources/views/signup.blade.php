@extends('layout.layout')

@section('title', 'Sign Un Page')

@section('content')
    <section class="signup_section">
        <div class="container">
            <div class="signin_wrapper">

                @include('components.alerts.error')

                <h1>Регистрация</h1>
                <form id="signup" action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input value="{{ old('email') }}" name="email" type="email" placeholder="E-mail" required><br/>
                    <input value="{{ old('username') }}" name="username" type="text" placeholder="Имя пользователя" required><br/>
                    <input name="password" type="password" placeholder="Пароль" required><br/>
                    <input name="re_password" type="password" placeholder="Повторите пароль" required><br/>

                    <label>Загрузите свой аватар</label><br/>
                    <input class="inp_file" name="avatar" type="file"><br/>

                    <span class="policy">
                        <input style="width: auto; height: auto; margin: 0 10px;" type="checkbox" name="policy">Я согласен на обработку персональных данных</span>
                    <button type="submit" class="submit_btn">Отправить</button>
                </form>
            </div>
        </div>
    </section>
@endsection
