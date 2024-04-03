<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Dados</title>
</head>
<body>
    <h1>Formulário de Envio</h1>
    <form action="/enviar-dados" method="post">
        @csrf
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome"><br>
        <label for="">Email:</label><br>
        <input type="" id="email" name="email"><br><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
