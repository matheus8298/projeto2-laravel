<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// --- Rotas Públicas (Acesso Livre)

// Tela de Cadastro (Página Inicial)
Route::get('/', function () {
    return view('cadastro');
});

// Tela de Login
Route::get('/login', function () {
    return view('login');
});

// Ações de envio de formulário
Route::post('/cadastro', [AuthController::class, 'cadastrar']);
Route::post('/login', [AuthController::class, 'login']);


// --- Rotas Protegidas (Autenticadas)
Route::middleware('auth')->group(function () {
    
    // Tela do Dashboard
    Route::get('/dashboard', [AuthController::class, 'dashboard']);
    
    // Ação de deslogar
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Ação de deletar usuário (usando o ID da URL)
    Route::delete('/usuarios/{id}', [AuthController::class, 'deletar']);
    
});