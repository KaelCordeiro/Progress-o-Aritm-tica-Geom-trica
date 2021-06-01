<html>
    <head>
        <meta charset="UTF-8">
        <title>Progressão Aritmética e Progressão Geométrica</title>
    </head>
    <body style="background-color: yellow"> 
<?php
    
    $dados = isset($_POST['upload']) ? $_POST['upload'] : " ";
    
    $string = explode('|', $dados);
    $texto = $string[0];
    $tipo = $string[1];
    $razao = $string[2];
    
    function leituraJSON(string $texto, string $tipo, int $razao){
        
        $p = $texto.'.json';
        
        $arquivo = file_get_contents($p);
        $json = json_decode($arquivo);
        
        $valores = array();
        
        echo 'Números da progressão:';
        
        foreach ($json as $valor) {
            for ($i = 0; $i < count($valor); $i++) {
                echo $valor[$i]." ";
                $valores[] = $valor[$i];
            }
        }
        echo '<br>';
        echo '<br>';
        
        PA_PG($valores);
        verificacao($valores, $tipo, $razao);
    }
    leituraJSON($texto, $tipo, $razao);
    
    function PA_PG(array $valores){
        echo 'a1 = '.$valores[0].'<br>';
        echo '<br>';
        echo 'Quantidade de elementos: '.count($valores).'<br>';
        echo '<br>';
        if($valores[1] - $valores[0] == $valores[2] - $valores[1]){
            echo 'É uma PA<br><br>';
            echo 'Razão = '.$valores[1] - $valores[0];
            echo '<br>';
            echo '<br>';
        }
        elseif ($valores[1] / $valores[0] == $valores[2] / $valores[1]) {
            echo 'É uma PG<br><br>';
            echo 'Razão = '.$valores[1] / $valores[0];
            echo '<br>';
            echo '<br>';
        }
        
        $somaTotal = array_sum($valores);
        $media = $somaTotal/count($valores);
        $meio = count($valores)/2;
        
        if(count($valores) % 2 == 0){
            $mediana = ($valores[$meio] + $valores[$meio - 1])/2;
        }
        else{
            $mediana = $valores[$meio];
        }
        
        echo 'Somatória = '.$somaTotal.'<br><br>';
        echo 'Média = '.$media.'<br><br>';
        echo 'Mediana = '.$mediana;
        
    }
    
        function verificacao(array $valores, string $tipo, int $razao){
            $alteracoes = 0;
            $alterados = 0;
            
            if ($tipo == 'PA') {
                for($i = 0; $i < count($valores) - 1; $i++) {
                    if ($valores[$i + 1] - $valores[$i] != $razao) {
                        $alteracoes++;
                    }
                }
            }
            else {
                for($i = 0; $i < count($valores) - 1; $i++) {
                    if ($valores[$i + 1] / $valores[$i] != $razao) {
                        $alteracoes++;
                    }
                }
            }
            
            if($alteracoes > 0){
                $alterados = ($alteracoes * 100) / (count($valores) - 1);
                echo '<p>O arquivo foi alterado! '.(100 - $alterados). '% é do arquivo é uma '.$tipo.'</p>';
            }
                
        }

?>
    </body>
</html>
