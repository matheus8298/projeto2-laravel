<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function cadastrar(Request $request)
    {
        // 1. Validação dos dados
        $request->validate([
            'nome' => 'required|string|min:3',
            'cpf' => 'required|string|unique:users,cpf',
            'email' => 'required|email|unique:users,email',
            'senha' => 'required|string|min:6|confirmed', 
        ], [
            'cpf.unique' => 'Este CPF já está cadastrado.',
            'email.unique' => 'Este E-mail já está cadastrado.',
            'senha.confirmed' => 'As senhas não coincidem.',
        ]);

        // 2. Salvar no banco (A senha será criptografada pelo Model)
        User::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'senha' => $request->senha, 
        ]);

        // 3. Redirecionar de volta com mensagem de sucesso
        return redirect('/')->with('sucesso', 'Usuário cadastrado com sucesso!');
    }
    
        public function login(Request $request)
    {
        // 1. Valida se o usuário preencheu os campos
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ]);

        // 2. Tenta encontrar o usuário pelo e-mail
        $user = User::where('email', $request->email)->first();

        // 3. Verifica se o usuário existe E se a senha está correta
        if ($user && \Illuminate\Support\Facades\Hash::check($request->senha, $user->senha)) {
            
            // Loga o usuário no sistema (cria a sessão)
            \Illuminate\Support\Facades\Auth::login($user);
            
            // Redireciona para o Dashboard
            return redirect('/dashboard');
        }

        // 4. Se falhar, volta para a tela com erro
        return back()->withErrors([
            'email' => 'E-mail ou senha incorretos.',
        ]);
    }
    
    // Mostra a tela do Dashboard com a lista de usuários
    public function dashboard()
    {
        $usuarios = User::all(); // Pega todos os usuários do banco
        return view('dashboard', compact('usuarios')); // Envia para a tela
    }

    // Faz o logout do usuário
    public function logout(\Illuminate\Http\Request $request)
    {
        \Illuminate\Support\Facades\Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }

    // Deleta um usuário
    public function deletar($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/dashboard')->with('sucesso', 'Usuário deletado com sucesso!');
    }
        
}