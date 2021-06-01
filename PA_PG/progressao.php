<html>
    <head>
        <meta charset="UTF-8">
        <title>Progressão Aritmética e Progressão Geométrica</title>
    </head>
    <body style="background-color: yellow"> 
        
<?php
        $a1 = isset($_POST['a1']) ? $_POST['a1'] : 0;
        $razao = isset($_POST['razao']) ? $_POST['razao'] : 0;
        $qtdElementos = isset($_POST['quantidade']) ? $_POST['quantidade'] : 0;
        $pag = isset($_POST['progresso']) ? $_POST['progresso'] : "PA";
        $texto = isset($_POST['text']) ? $_POST['text'] : " ";
        
        $dados = $texto.'|'.$pag.'|'.$razao;
        
        function gerarProgressão(int $a1, int $razao, int $qtdElementos, string $pag, string $texto){
            
            $arrayProgressao = array();
            
            if($pag == "PA"){
                for ($i = 0; $i < $qtdElementos; $i++) {
                    if($i == 0){
                       $arrayProgressao[] = $a1;
                    }else{
                       $arrayProgressao[] = $a1 + ($i * $razao); 
                    }
                }
                
                echo 'É uma progressão aritmética: ';
                for ($i = 0; $i < $qtdElementos; $i++) {
                    echo $arrayProgressao[$i].' ';
                } 
                echo '<br>';
                echo '<br>';
            }
            elseif ($pag == "PG") {
                for ($j = 0; $j < $qtdElementos; $j++) {
                    if($j == 0){
                       $arrayProgressao[] = $a1;
                    }else{
                       $arrayProgressao[] = $arrayProgressao[$j - 1] * $razao; 
                    }
                }
                echo 'É uma progressão geométrica: '; 
                for ($i = 0; $i < $qtdElementos; $i++) {
                    echo $arrayProgressao[$i].' ';
                } 
                echo '<br>';
                echo '<br>';
            }  
            gerarJSON($texto, $arrayProgressao);
        }
            
        gerarProgressão($a1, $razao, $qtdElementos, $pag, $texto);
        
            function gerarJSON(string $texto, array $arrayProgressao){
                $dados = array($arrayProgressao);
                $dados_json = json_encode($dados);
                $fp = fopen($texto.'.json', "w");
                fwrite($fp, $dados_json);
                fclose($fp);

            }
            
    ?>
        <form action="leitura.php" method="post">
            <h3>Clique no botão abaixo para fazer o upload e a leitura/análise do arquivo:</h3>
            <button type="submit" name="upload" value="<?php echo $dados; ?>">Upload</button>
        </form>
        
        <form action="grafico.php" method="post">
            <h3>Clique no botão abaixo para gerar o gráfico com os dados do JSON:</h3>
            <button type="submit" name="arquivo" value="<?php echo $texto; ?>">Gerar Gráfico</button>
        </form>
    </body>
</html>
