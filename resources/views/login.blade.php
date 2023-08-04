<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>
@if (session('msg'))
    <p class="msg">{{ session('msg') }}</p>
@endif
    <div id="main">
        <form action="{{ route('login.auth') }}" method="POST">
            <div id="logo">
                <img src="img/logo2.png" alt="logo">
            </div>
            <h2>Login</h2>
            {{ csrf_field() }}
            <div id="email">
                <input type="email" name="email" placeholder="E-mail">
            </div>
            <div id="password">
                <input type="password" name="password" placeholder="Senha">
            </div>
            <div id="button">
                <button type="submit" value="Enter" id="enter">Entrar</button>
                <a href="/create/user" id="btn-register">Cadastrar</a>
            </div>
        </form>
    </div>
</body>
</html>