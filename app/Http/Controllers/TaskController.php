<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Comment;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index() {

        if (Auth::user()->role == 'admin') {
            $users = User::all();

            return view('task.index', compact('users'));
        }

        $tasks = Task::query()->where('user_id',  Auth::user()->id)->get();


        return view('task.index', compact('tasks'));
    }

    public function add() {
        return view('task.add');
    }

    public function edit(Task $task) {

        return view('task.edit', compact('task'));
    }

    public function show(Task $task) {

        $comments = Comment::query()->where('task_id', $task->id)->get();

        return view('task.show', compact('task', 'comments'));
    }

    public function store(TaskRequest $request) {
        $validated = $request->validated();

        $validated['user_id'] = Auth::user()->id;

        Task::create($validated);

        return redirect()->route('task.index');
    }

    public function update(TaskRequest $request, Task $task) {
        $validated = $request->validated();

        $task->update($validated);

        return redirect()->route('task.index');
    }

    public function delete(Task $task) {
        $task->delete();

        return back();
    }
}
