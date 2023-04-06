@extends('layout.layout')

@section('title', 'Edit Task Page')

@section('content')
    <section class="add_section">
        <div class="container">

            @include('components.alerts.error')

            <div class="form_wrapper">
                <h2>Редактирование записи</h2>

                <form id="add_task" action="{{ route('task.update', $task->id) }}" method="post">
                    @csrf

                    <div class="inp_wrapper">
                        <input value="{{ $task->title }}" type="text" name="title" placeholder="Заголовок">
                    </div>
                    <div class="inp_wrapper">
                        <input value="{{ $task->theme }}" type="text" name="theme" placeholder="Задайте тему">
                    </div>

                    <button type="submit" class="submit_btn">Добавить задачу</button>

                </form>

            </div>
        </div>
    </section>
@endsection
