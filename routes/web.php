<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/', function () {
    Auth::logout();
    return view('auth.login'); 
});

Route::get('/dashboard', function () {
    $posts = Note::latest()->paginate(10);
    return view('dashboard', compact('posts'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //FOR NOTE CRUD
    Route::get('/posts', [NoteController::class, 'index'])->name('note.index');
    Route::get('/posts/create', [NoteController::class, 'create'])->name('note.create');
    Route::post('/posts', [NoteController::class, 'store'])->name('note.store');
    Route::get('/posts/{post}', [NoteController::class, 'show'])->name('note.show');
    Route::get('/posts/{post}/edit', [NoteController::class, 'edit'])->name('note.edit');
    Route::put('/posts/{post}', [NoteController::class, 'update'])->name('note.update');
    Route::delete('/posts/{post}', [NoteController::class, 'destroy'])->name('note.destroy');

});

require __DIR__.'/auth.php';
