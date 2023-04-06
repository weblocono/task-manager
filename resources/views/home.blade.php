@extends('layout.layout')

@section('title', 'Home Page')

@section('content')
    <section class="home_section">
        <div class="container">
            <div class="home_section_wrapper">
                <h1>Добро пожаловать в Task Manage!</h1>
                <div class="btn to_tasks">
                    <a href="{{ route('task.index') }}">Перейти к задачам</a>
                </div>
            </div>
        </div>
    </section>
@endsection
