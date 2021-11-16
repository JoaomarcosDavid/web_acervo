
      <?php   
        $cont = 0;
        foreach (glob('anos/*') as $path_ANO){
           $partes_ano = explode('/',$path_ANO);
           $array_ano[]  = $partes_ano[1];
        } 
        rsort($array_ano);
        foreach( $array_ano as $chave => $valor_ano ){ ?>
          <?php 
          foreach (glob("anos/$valor_ano/*/*/Primeiro_CG/*/assets") as $path){ ?>

                <?php if($cont < 12){ ?>
                    <div class="capa col-md-2">
                      <?php
                      //--------------------------------------------------
                            //[1] - PARA ARQUIVO [publication.pdf]
                      //--------------------------------------------------
                      if (file_exists("$path/downloads/publication.pdf")) {
                        $public = "$path/downloads/publication.pdf";
                      ?>

                        <?php
                          $saida_path = explode('/',$path);
                          $clasdif    = $saida_path[4];
                          $dia        = $saida_path[3];
                          $mes        = $saida_path[2];
                          $mes1       = $mes;
                          $mes        = explode('_',$mes);
                          $mes        = $mes[1];
                          $ano        = $saida_path[1];

                          $pdf        = explode($clasdif,$public);
                          $pdf        = $pdf[1];

                        ?>
                        <div class="info-caderno">
                        <span><?php echo ($clasdif."</br> ".$dia." ".$mes." ".$ano); ?></span>
                        </div>

                        <a class="infopdf" 
                           taman="<?php echo tamanho_arquivo($public); ?>" 
                             dia="<?php echo $dia; ?>" 
                             mes="<?php echo $mes; ?>" 
                            mes1="<?php echo $mes1; ?>" 
                             ano="<?php echo $ano; ?>" 
                             pdf="<?php echo $pdf; ?>" 
                             tit="<?php echo $clasdif; ?>" 
                            href="javascript:void(0)">
                        <?php
                        
                      }elseif(file_exists("$path/common/downloads/publication.pdf")){
                        $public = "$path/common/downloads/publication.pdf";
                        ?>

                        <?php
                          $saida_path = explode('/',$path);
                          $clasdif    = $saida_path[4];
                          $dia        = $saida_path[3];
                          $mes        = $saida_path[2];
                          $mes1       = $mes;
                          $mes        = explode('_',$mes);
                          $mes        = $mes[1];
                          $ano        = $saida_path[1];
                          $pdf        = explode($clasdif,$public);
                          $pdf        = $pdf[1];
                        ?>
                        <div class="info-caderno">
                        <span><?php echo ($clasdif."</br> ".$dia." ".$mes." ".$ano); ?></span>
                        </div>

                        <a class="infopdf" 
                          taman="<?php echo tamanho_arquivo($public); ?>" 
                            dia="<?php echo $dia; ?>" 
                            mes="<?php echo $mes; ?>" 
                           mes1="<?php echo $mes1; ?>" 
                            ano="<?php echo $ano; ?>" 
                            pdf="<?php echo $pdf; ?>" 
                            tit="<?php echo $clasdif; ?>" 
                           href="javascript:void(0)"
                        <?php
                         
                        
                      }else{
                        echo "PDF Não localizado!";
                      }
                                  //-------------------------------------------
                                      //[2] - PARA ARQUIVO [THUMB]
                                  //-------------------------------------------
                                  if (file_exists("$path/pages/page0001.jpg")) {
                                    $thumb = "$path/pages/page0001.jpg"; 
                                    $thumb =  base64_encode(file_get_contents($thumb));
                                    ?>
                                    img2="data:image/jpeg;base64,<?php echo $thumb; ?>"><img src="data:image/jpeg;base64,<?php echo $thumb; ?>">
                                  <?php
                                  }elseif(file_exists("$path/mobile/pages/page0001_i1.jpg")) {
                                    $thumb = "$path/mobile/pages/page0001_i1.jpg";
                                    $thumb =  base64_encode(file_get_contents($thumb));
                                    ?>
                                    img2="data:image/jpeg;base64,<?php echo $thumb; ?>" ><img src="data:image/jpeg;base64,<?php echo $thumb; ?>">
                                  <?php
                                  }else{
                                    ?>
                                      thumb="<?php echo $thumb; ?>">
                                      <img src="images/img_indisponivel.jpeg">
                                    <?php
                                  }
                                  ?>
                        </a>
                    </div>
                <?php $cont = $cont + 1;
              } ?>
          <?php } ?>

  <?php } 
?>
   