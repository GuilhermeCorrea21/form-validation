<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>
    <div id="main">
        <form action="/create/newuser" method="POST">
            <a href="/enter" id="back">Voltar</a>
            <div id="logo">
                <img src="/img/new_user.png" alt="logo">
            </div>
            <h2>Novo Usuário</h2>
            {{ csrf_field() }}
            <div id="email">
                <input type="name" name="name" placeholder="Nome completo">
            </div>
            <div id="password">
                <input type="email" name="email" placeholder="E-mail">
            </div>
            <div id="password">
                <input type="password" name="password" placeholder="Senha">
            </div>
            <div id="button">
                <button type="submit" value="Register" id="register">Cadastrar</button>
            </div>
        </form>
    </div>
</body>
</html>