@extends('layout.layout')

@section('title', 'Tasks Page')

@section('content')
    <section>
        <div class="container">
            @if (isset($users))
                {{-- For Admin--}}
                @foreach($users as $user)
                    @if (count($user->tasks) !== 0)
                        <h4 class="card_author">{{$user->username}}</h4>
                        <div class="tasks_grid">
                            @foreach($user->tasks as $task)
                                <div class="task_card">
                                    <h3 class="task_title">{{ $task->title }}</h3>
                                    <div class="info_row">
                                        <div class="info_item">
                                            <img src="assets/images/menu-boxed.svg" alt="ico">
                                            <span>{{ $task->id }}</span>
                                        </div>
                                        <div class="info_item">
                                            <img src="assets/images/comment.svg" alt="ico">
                                            <span>{{ count($task->comments) }}</span>
                                        </div>
                                        <div class="info_item">
                                            <img src="assets/images/calendar.svg" alt="ico">
                                            <span>{{ $task->updated_at->format('d.m.Y') }}</span>
                                        </div>
                                    </div>
                                    <div class="card_action_row">
                                        <div class="card_action_item">
                                            <div class="more_wrapper">
                                                <a href="{{ route('task.show', $task->id) }}">Подробнее</a>
                                            </div>
                                        </div>
                                        <div class="card_action_item">
                                            <a href="{{ route('task.edit', $task->id) }}">
                                                <img class="action_ico" src="assets/images/edit.svg" alt="ico">
                                            </a>
                                            <a class="delete_btn" href="{{ route('task.delete', $task->id) }}">
                                                <img src="assets/images/delete.svg" alt="ico">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            @else
                {{-- For User--}}
                <div class="tasks_grid">
                    @foreach($tasks as $task)
                        <div class="task_card">
                            <h3 class="task_title">{{ $task->title }}</h3>
                            <div class="info_row">
                                <div class="info_item">
                                    <img src="/assets/images/menu-boxed.svg" alt="ico">
                                    <span>{{ $task->id }}</span>
                                </div>
                                <div class="info_item">
                                    <img src="/assets/images/comment.svg" alt="ico">
                                    <span>{{ count($task->comments) }}</span>
                                </div>
                                <div class="info_item">
                                    <img src="/assets/images/calendar.svg" alt="ico">
                                    <span>{{ $task->updated_at->format('d.m.Y') }}</span>
                                </div>
                            </div>
                            <div class="card_action_row">
                                <div class="card_action_item">
                                    <div class="more_wrapper">
                                        <a href="{{ route('task.show', $task->id) }}">Подробнее</a>
                                    </div>
                                </div>
                                <div class="card_action_item">
                                    <a href="{{ route('task.edit', $task->id) }}">
                                        <img class="action_ico" src="/assets/images/edit.svg" alt="ico">
                                    </a>
                                    <a class="delete_btn"  href="{{ route('task.delete', $task->id) }}">
                                        <img src="/assets/images/delete.svg" alt="ico">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
