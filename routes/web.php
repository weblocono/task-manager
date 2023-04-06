<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CommentController;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(AuthController::class)->group(function() {

    // Роут на страницы
    Route::get('/signup', 'signup')->name('signup.index');
    Route::get('/signin', 'signin')->name('signin.index');

    // Обработчики форм
    Route::post('/signup', 'register')->name('register');
    Route::post('/signin', 'login')->name('login');

    // Выход из профиля (logout)
    Route::get('/logout', 'logout')->name('logout');
});


Route::controller(TaskController::class)->middleware('auth')->group(function() {
    Route::get('/tasks', 'index')->name('task.index');

    Route::get('/tasks/add', 'add')->name('task.add');
    Route::post('/tasks/add', 'store')->name('task.store');


    Route::get('/tasks/{task}/edit', 'edit')->name('task.edit');
    Route::post('/tasks/{task}/edit', 'update')->name('task.update');

    Route::get('/tasks/{task}', 'show')->name('task.show');

    Route::get('/tasks/{task}/delete', 'delete')->name('task.delete');
});

Route::controller(CommentController::class)->middleware('auth')->group(function() {
    Route::post('/comment/store', 'store')->name('comment.store');
    Route::get('/comment/{comment}/delete', 'delete')->name('comment.delete');
});

Route::get('/email', function() {
    Mail::to('ireklox3@gmail.com')->send(new WelcomeMail);
    return new WelcomeMail();
});