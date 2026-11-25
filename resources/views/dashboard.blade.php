<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> 
    <title>Dashboard</title>
</head>
<body class="bg-gray-900 text-white min-h-screen p-8 font-sans">
    
    <!-- Header -->
    <header class="max-w-5xl mx-auto flex justify-between items-center bg-gray-800 p-5 rounded-lg shadow-md mb-6">
        <h1 class="text-2xl font-bold">Painel de Controle</h1>
        
        <!-- Formulário de Logout -->
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="text-red-400 hover:text-red-300 font-semibold transition flex items-center gap-2 border border-red-400 px-4 py-2 rounded hover:bg-red-400 hover:text-white">
                Sair <i class='bx bx-log-out'></i>
            </button>
        </form>
    </header>

    <!-- Conteúdo Principal -->
    <main class="max-w-5xl mx-auto bg-gray-800 p-6 rounded-lg shadow-md">
        
        @if(session('sucesso'))
            <div class="bg-green-500/20 text-green-400 p-3 rounded mb-4 text-center">
                {{ session('sucesso') }}
            </div>
        @endif

        <h2 class="text-xl font-semibold mb-4">Usuários Cadastrados</h2>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-700 text-gray-300">
                        <th class="p-3">ID</th>
                        <th class="p-3">Nome</th>
                        <th class="p-3">E-mail</th>
                        <th class="p-3">CPF</th>
                        <th class="p-3">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $user)
                        <tr class="border-b border-gray-700 hover:bg-gray-750 transition">
                            <td class="p-3">{{ $user->id }}</td>
                            <td class="p-3">{{ $user->nome }}</td>
                            <td class="p-3">{{ $user->email }}</td>
                            <td class="p-3">{{ $user->cpf }}</td>
                            <td class="p-3">
                                <!-- Formulário de deletar -->
                                <form action="/usuarios/{{ $user->id }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir {{ $user->nome }}?')">
                                    @csrf
                                    @method('DELETE') <!-- O Laravel precisa disso para simular um DELETE via HTML -->
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm font-medium">
                                        Remover
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>