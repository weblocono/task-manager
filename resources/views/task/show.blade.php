@extends('layout.layout')


@section('title', 'Task Page')

@section('content')
    <section class="task_section">
        <div class="container">
            <div class="task_wrap">
                <div class="info_row">
                    <div class="info_item show">
                        <img src="assets/images/menu-boxed-2.svg" alt="icon">
                        <span class="show">{{ $task->id }}</span>
                    </div>
                    <div class="info_item show">
                        <img src="assets/images/comment-2.svg" alt="icon">
                        <span class="show">{{ count($comments) }}</span>
                    </div>
                    <div class="info_item">
                        <img src="assets/images/calendar-2.svg" alt="icon">
                        <span class="show">{{ $task->updated_at->format('d.m.Y') }}</span>
                    </div>
                </div>
                <h2>{{ $task->title }}</h2>
                <div class="card_action_row">
                    <div class="card_action_item">
                        <div class="theme show">
                            <a href="#theme">{{ $task->theme }}</a>
                        </div>
                    </div>
                    <div class="card_action_item">
                        <img src="assets/images/next.svg" alt="next_icon">
                    </div>
                </div>
            </div>
            <h2 class="task_h2">Комментарии</h2>
            <div class="comments_column">
                @if(count($comments) !== 0)
                    @foreach($comments as $comment)
                        <div class="comment_item">
                            <div style="display: flex;">
                                <img src="{{ $comment->author->image_url  }}"  alt="avatar" class="avatar">
                                <div class="comment_info">
                                    <div class="comment_author">{{ $comment->author->username }}</div>
                                    <div class="comment_text">{{ $comment->text }}</div>
                                </div>
                            </div>

                            @if($comment->user_id == $task->user_id || \Illuminate\Support\Facades\Auth::user()->role == 'admin')
                                <a href="{{ route('comment.delete', $comment->id) }}" style="color: white">Удалить</a>
                            @endif

                        </div>
                    @endforeach
                @else
                    <h2 class="task_h2">Комментариев пока нет!</h2>
                @endif
            </div>
            <h2 class="task_h2">Добавить комментарий</h2>

            @include('components.alerts.error')

            <form action="{{ route('comment.store') }}" name="comments" method="post">
                @csrf
                <input type="hidden" name="task_id" value="{{ $task->id }}">

                <textarea placeholder="Добавьте комментарий" name="text" id="comment"
                          style="width: 100%; height: 98px;">{{ old('comment') }}</textarea>
                <button type="submit" class="add_comment_btn">Добавить комментарий</button>
            </form>
            <div class="btn auth" style="margin: 0 auto; margin-top: 20px;">
                <a href="{{ route('task.index') }}">Назад к задачам</a>
            </div>
        </div>
    </section>
@endsection
