<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Ícones do Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> 
    <title>Pagina de cadastro</title>
</head>
<body class="auth-body">
    <main class="container">
        <form id="formCadastro" method="POST" action="/cadastro">
            @csrf
            <h1>Cadastro</h1>

            @if(session('sucesso'))
                <div style="color: #4ade80; text-align: center; margin-bottom: 15px; font-size: 14px;">
                {{ session('sucesso') }}
                </div>
            @endif

            @if($errors->any())
                <div style="color: #ff3333; text-align: center; margin-bottom: 15px; font-size: 14px;">
                {{ $errors->first() }}
                </div>
            @endif

            <div class="input-box">
                <input name="nome" placeholder="Nome Completo" type="text" required>
                <i class='bx bxs-user'></i>
            </div>

            <div class="input-box">
                <input name="cpf" id="cpf" placeholder="CPF (Ex: 000.000.000-00)" type="text" required maxlength="14">
                <i class='bx bxs-id-card'></i>
                <p id="cpf-error" style="color: #ff3333; font-size: 12px; margin-top: 5px; display: none;">CPF inválido!</p>
            </div>

            <div class="input-box">
                <input name="email" placeholder="E-mail" type="email" required>
                <i class='bx bxs-envelope'></i>
            </div>

             <div class="input-box">
                <input name="senha" id="senha" placeholder="Senha" type="password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>

              <div class="input-box">
                <input name="senha_confirmation" id="confirmarSenha" placeholder="Confirmar Senha" type="password" required>
                <i class='bx bxs-lock-alt'></i>
                <p id="senha-error" style="color: #ff3333; font-size: 12px; margin-top: 5px; display: none;">As senhas não coincidem!</p>
            </div>

            <div class="remember-forgot">
                <label>
                    <input type="checkbox"> Lembrar-me
                </label>
                <a href="#">Esqueceu a senha?</a>
            </div>

            <button type="submit" class="login">Cadastrar</button>

            <div class="register-link">
                <p>Já tem uma conta? <a href="/login">Faça login</a></p>
            </div>
        </form>
    </main>
</body>
</html>