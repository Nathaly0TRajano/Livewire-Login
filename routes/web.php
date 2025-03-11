<?php

use App\Livewire\Auth\Login;
use Illuminate\Support\Facades\Route;

Route::get('/', Login::class);

// Route::get('/admin/faturamento/epinox/lançamentos/contas/pagar', Login::class); - em vez disso podemos usar o name, assim podemos 
// simplificar o nome da rota, e assim não digitar toda essa jóra monga.

Route::get('/admin',function(){
    return 'login admin';
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::get('/user',function(){
    return 'login user';
})->middleware(['auth', 'role:user'])->name('user.dashboard');

// dashboard é padrão, mas podemos colocar tipo, por exemplo "início".

