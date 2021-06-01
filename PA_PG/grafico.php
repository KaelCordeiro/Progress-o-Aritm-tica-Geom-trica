<html>
  <head>
    <style>
        body {
          background-color:yellow;
        }
    </style>    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(desenharGrafico);

      function desenharGrafico() {
        var dados = google.visualization.arrayToDataTable([
          ['Termo', 'Progressão'],
            <?php
                $texto = isset($_POST['arquivo']) ? $_POST['arquivo'] : " ";
                $p = $texto.'.json';
                $arquivo = file_get_contents($p);
                $json = json_decode($arquivo);

                foreach ($json as $valor) {
                    for ($i = 0; $i < count($valor); $i++) {
                       echo '['.$i.', '.$valor[$i].'],';
                    }
                }
            ?>
          ]);

        var opcoes = {
          title: 'Progressão Aritmética/Geométrica',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var grafico = new google.visualization.LineChart(document.getElementById('curve_chart'));

        grafico.draw(dados, opcoes);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
  </body>
</html>