<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> 
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Página de Login</title>
</head>
<body class="auth-body">
    <main class="container">
        <form id="formLogin" method="POST" action="/login">
            @csrf
            <h1>Login</h1>

            <!-- Bloco para mostrar erros de validação (ex: senha incorreta) -->
            @if($errors->any())
                <div style="color: #ff3333; text-align: center; margin-bottom: 15px; font-size: 14px;">
                    {{ $errors->first() }}
                </div>
            @endif
            
            <div class="input-box">
                <!-- name="email" é o que o Laravel precisa -->
                <input name="email" id="login-email" placeholder="E-mail" type="email" required>
                <i class='bx bxs-envelope'></i>
            </div>

             <div class="input-box">
                <!-- name="senha" é o que o Laravel precisa -->
                <input name="senha" id="login-senha" placeholder="Senha" type="password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="remember-forgot">
                <label>
                    <input type="checkbox"> Lembrar-me
                </label>
                <a href="#">Esqueceu a senha?</a>
            </div>

            <button type="submit" class="login">Entrar</button>

            <div class="register-link">
                <!-- Link apontando para o cadastro - Rota do laravel -->
                <p>Não tem uma conta? <a href="/">Cadastre-se</a></p>
            </div>
        </form>
    </main>
</body>
</html>