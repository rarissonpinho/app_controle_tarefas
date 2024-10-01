<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefaController;
use App\Mail\MensagemTesteMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('tarefa/exportacao/{extensao}', 'App\Http\Controllers\TarefaController@exportacao')
    ->name('tarefa.exportacao');

Route::get('tarefa/exportar', 'App\Http\Controllers\TarefaController@exportar')
    ->name('tarefa.exportar');

Route::resource('tarefa', 'App\Http\Controllers\TarefaController')
    ->middleware('auth');

Route::get('/mensagem-teste', function () {
    return new MensagemTesteMail();
    //Mail::to('laravelcurso84@gmail.com')->send(new MensagemTesteMail());
    //return 'E-mail enviado com sucesso!';
});



require __DIR__ . '/auth.php';
