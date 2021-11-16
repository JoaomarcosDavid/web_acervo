<?php  
      
  $dataInicial = '';
  $dataFinal   = '';

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $dataInicial    = $_POST['dataInicial'];
    $dataFinal      = $_POST['dataFinal'];
    $saida_pathIni  = explode('/',$dataInicial);
    $saida_path2Fim = explode('/',$dataFinal);
    //datainicial
    $dataInicialDia = $saida_pathIni[0];
    $dataInicialMes = $saida_pathIni[1];
    $dataInicialAno = $saida_pathIni[2];
    //datafinal
    $dataFinalDia  = $saida_path2Fim[0];
    $dataFinalMes  = $saida_path2Fim[1];
    $dataFinalAno  = $saida_path2Fim[2];
  }
?>


<?php

    $valor_page = '';

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $valor_page = $_POST['valor_page'];

      $valor_novo = $valor_page + 12;


              $cont = 0;
              foreach (glob('../anos/*') as $path_ANO){
                $partes_ano = explode('/',$path_ANO);
                $array_ano[]  = $partes_ano[2];
              }
              rsort($array_ano);


              foreach( $array_ano as $chave => $valor_ano)
              { 
                  foreach (glob("../anos/$valor_ano/*/*/*/*/assets") as $path)
                  { 
                    //   13        12          13          24
                    if($cont > $valor_page && $cont <= $valor_novo)
                    {     
                  
                    $path2 = explode('../',$path);
                    $path2 = $path2[1];

                    $saida_path = explode('/',$path2);
                    $clasdif    = $saida_path[4];
                    $dia        = $saida_path[3];
                    $mes        = $saida_path[2];
                    $mes        = explode('_',$mes);
                    $mes        = $mes[1];
                    $ano        = $saida_path[1];
                    
                    
                    $data1 = "$ano-$mes-$dia"; //data inicial
                    $data2 = "$dataInicialAno-$dataInicialMes-$dataInicialDia"; //arquivos



                    // Comparando as Datas
                    if(strtotime($data1) > strtotime($data2))
                    {
                      echo 'A data 1 é maior que a data 2.';
                    }
                    elseif(strtotime($data1) == strtotime($data2))
                    {
                      echo 'A data 1 é igual a data 2.';
                    }
                    else
                    {
                      echo 'A data 1 é menor a data 2.';
                    }




                    }
                    $cont = $cont + 1; 
                    
                 } 
              } 
    }
?>
   