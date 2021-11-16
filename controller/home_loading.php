     
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
                  foreach (glob("../anos/$valor_ano/*/*/Primeiro_CG/*/assets") as $path)
                  { 
                    //   13        12          13          24
                    if($cont > $valor_page && $cont <= $valor_novo)
                    {     ?>


                          <div class="capa col-md-2">
                            <?php
                            //--------------------------------------------------
                                  //[1] - PARA ARQUIVO [publication.pdf]
                            //--------------------------------------------------
                              $path2 = explode('../',$path);
                              $path2 = $path2[1];
                            //--------------------------------------------------

                            if (file_exists("$path/downloads/publication.pdf")) {
                              $public = "$path2/downloads/publication.pdf";
                            ?>

                              <?php
                                $saida_path = explode('/',$path2);
                                $clasdif    = $saida_path[4];
                                $dia        = $saida_path[3];
                                $mes        = $saida_path[2];
                                $mes        = explode('_',$mes);
                                $mes        = $mes[1];
                                $ano        = $saida_path[1];
                              ?>
                              <div class="info-caderno">
                              <span><?php echo ($clasdif."</br> ".$dia." ".$mes." ".$ano); ?></span>
                              </div>
                              

                              <a class="infopdf" pdf="<?php echo $public ?>" img="<?php echo $path ?>/pages/page0001.jpg" data="anos/<?php echo $valor_ano ?>/<?php echo $saida_path[2]; ?>/<?php echo $dia; ?>" href="javascript:void(0)">
                              <?php
                              
                            }elseif(file_exists("$path/common/downloads/publication.pdf")){
                              $public = "$path2/common/downloads/publication.pdf";
                              ?>


                              <?php
                                $saida_path = explode('/',$path2);
                                $clasdif    = $saida_path[4];
                                $dia        = $saida_path[3];
                                $mes        = $saida_path[2];
                                $mes        = explode('_',$mes);
                                $mes        = $mes[1];
                                $ano        = $saida_path[1];
                              ?>
                              <div class="info-caderno">
                              <span><?php echo ($clasdif."</br> ".$dia." ".$mes." ".$ano); ?></span>
                              </div>


                              <a class="infopdf" pdf="<?php echo $public ?>" img="<?php echo $path ?>/mobile/pages/page0001_i1.jpg" data="anos/<?php echo $valor_ano ?>/<?php echo $saida_path[2]; ?>/<?php echo $dia; ?>" href="javascript:void(0)">
                              <?php
                              
                            }else{
                              echo "PDF Não localizado!";
                            }
                                        //-------------------------------------------
                                            //[2] - PARA ARQUIVO [THUMB]
                                        //-------------------------------------------
                                        if (file_exists("$path/pages/page0001.jpg")) {
                                        $thumb = "$path2/pages/page0001.jpg";
                                        ?>
                                          <img src="<?php echo $thumb ?>">
                                        <?php
                                        }elseif(file_exists("$path/mobile/pages/page0001_i1.jpg")) {
                                          $thumb = "$path2/mobile/pages/page0001_i1.jpg";
                                          ?>
                                            <img src="<?php echo $thumb ?>">
                                          <?php
                                        }else{
                                          ?>
                                            <img src="images/img_indisponivel.jpeg">
                                          <?php
                                        }
                                        ?>
                              </a>
                          </div>
   
                          
                    <?php   
                    }
                    $cont = $cont + 1; 
                    
                 } 
              } 
    }
?>


   

    