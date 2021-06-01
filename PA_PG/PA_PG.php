<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Progressão Aritmética e Progressão Geométrica</title>
    </head>
    <body style="background-color: yellow"> 
        <form action="progressao.php" method="post">
            <h3>Primeiro Termo:</h3>
            <input type="text" name="a1" id="a1">
            <h3>Razão:</h3>
            <input type="text" name="razao" id="razao">
            <h3>Quantidade:</h3>
            <input type="text" name="quantidade" id="quantidade"><br><br>
            <hr>
            <h3>Escolha a sua progressão para calcular e gerar o arquivo JSON:</h3>
            <input type="radio" name="progresso" id="progresso" value="PA">Progressão Aritmética<br><br>
            <input type="radio" name="progresso" id="progresso" value="PG">Progressão Geométrica<br>
            <h3>Nome do Arquivo:</h3>
            <input type="text" name="text" id="text"><br><br>
            <input type="submit" name="btnSubmit" id="btnSubmit" value="Enviar">
        </form>
    </body>
</html> 
    


