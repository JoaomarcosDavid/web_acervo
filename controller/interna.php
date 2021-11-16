<?php 

  $tit   = $_POST['tit'];
  $taman = $_POST['taman'];
  $dia   = $_POST['dia'];
  $mes   = $_POST['mes'];
  $mes1  = $_POST['mes1'];
  $ano   = $_POST['ano'];
  $data  = ("anos/".$ano."/".$mes1."/".$dia);
  $thum  = $_POST['thum'];
  //=======================================
                //PDF
  //=======================================
  $pdf   = $_POST['pdf'];
  $pdf  = ($data."/".$tit.$pdf);
  $PDF_principal =  base64_encode(file_get_contents("../$pdf"));
?>

  <!-------------------------------------------->
  <?php require('../js/custom/viewspdf_one.php'); ?>
  <!--------------------------------------------->

<!-- Navbar -->
<!-- <nav class="navbar navbar-expand-lg navbar-light bg-white2 fixed-top shadow-sm">
<a class="navbar-brand" href="index.php">
  <img src="images/logo-branco.svg" alt="KPK LOGO" width="150">
</a>
</nav> -->
<!-- End Of Navbar -->

<!------------------------------------------------------------------------------>
                <!-- [ 1 ] TRAZER O PRIMEIRO PDF EM DESTAQUE-->
<!------------------------------------------------------------------------------>

<!-- PDF INFORMATION -->
<section class="info" id="info">
<div class="container">
  <div class="card shadow">
    <div class="row">
      <div class="col-md-3">
        <img src="<?php echo $thum; ?>" class="book-1 principal">
      </div>
      <div class="col-md-7 mt-3">
        <!-- Info -->
        <h3 id="title"><?php echo $tit; ?></h3>
        <!-- <p id="author" class="d-inline">Bilkis Ismail</p> -->
        <p id="date" class="d-inline"><?php echo ($dia." ".$mes." ".$ano); ?></p>
        <p id="size"><i class="fas fa-file "></i> Tamanho do arquivo <b><?php echo $taman; ?></b></p>
        <!-- Button -->
        <div class="button">
          
          <a id="read" class="btn btn-primary mt-2 text-white" >Abrir PDF <i class="fas fa-book-reader fa-lg"></i></a>
          <!-- <a href="pdf/pdf.pdf" class="btn btn-primary mt-2 text-white" download>Unduh PDF <i class="fas fa-download fa-lg"></i></a> -->
          <a id="pdfDow" href="data:application/pdf;base64,<?php echo $PDF_principal; ?>" class="btn btn-primary mt-2 text-white" download>Baixar PDF <i class="fas fa-download fa-lg"></i></a>
        </div>

        <!-- Description -->
        <p id="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi quo velit consequuntur, iste, impedit dignissimos vitae nesciunt et commodi quos quis iusto est iure tenetur eum amet quas temporibus esse praesentium incidunt sequi ratione. Fuga ab quas itaque enim, molestiae, totam, necessitatibus magni dolores eligendi obcaecati libero omnis iste. Facilis.</p>
      </div>
    </div>
  </div>
</div>
</section>
<!-- END OF PDF INFORMATION -->



<!------------------------------------------------------------------------------>
                    <!-- [ 2 ] TRAZER OS PDF INDIVIDUAIS-->
<!------------------------------------------------------------------------------>


<div class="container">
<div class="covers row secund">
<?php   
  $cont = 0;
  $arr_pdf_url=[];
    foreach (glob("../$data/*/*/assets") as $path){ ?>
          <?php if($cont < 50){ ?>
              <div class="capa col-md-2">
                <?php

                if (file_exists("$path/downloads/publication.pdf")) {
                  $saida_path = explode('../',$path);
                  $saida_path    = $saida_path[1];
                  $public = "$saida_path/downloads/publication.pdf";
                ?>

                  <?php
                    $saida_path = explode('/',$saida_path);
                    $clasdif    = $saida_path[4];
                    $dia        = $saida_path[3];
                    $mes        = $saida_path[2];
                    $mes        = explode('_',$mes);
                    $mes        = $mes[1];
                    $ano        = $saida_path[1];
                  ?>
                  <div class="info-caderno">
                      <h5 class="secundarios"><?php echo $clasdif; ?></h5>
                  </div>

                  <?php
                  
                }elseif(file_exists("$path/common/downloads/publication.pdf")){
                  $saida_path = explode('../',$path);
                  $saida_path    = $saida_path[1];
                  $public = "$saida_path/common/downloads/publication.pdf";
                  ?>

                  <?php
                      $saida_path = explode('/',$saida_path);
                      $clasdif    = $saida_path[4];
                      $dia        = $saida_path[3];
                      $mes        = $saida_path[2];
                      $mes        = explode('_',$mes);
                      $mes        = $mes[1];
                      $ano        = $saida_path[1];
                    ?>
                    <div class="info-caderno">
                      <h5 class="secundarios" ><?php echo $clasdif; ?></h5>
                    </div>
                  <?php
                  
                }else{
                  echo "PDF Não localizado!";
                }
                      //-------------------------------------------
                          //[2] - PARA ARQUIVO [THUMB]
                      //-------------------------------------------
                      if (file_exists("$path/pages/page0001.jpg")) {
                        $thumb2 =  base64_encode(file_get_contents("$path/pages/page0001.jpg"));
                      ?>
                        <img src="data:image/jpeg;base64,<?php echo $thumb2; ?>">
                      <?php

                      }elseif(file_exists("$path/mobile/pages/page0001_i1.jpg")) {
                        $thumb2 =  base64_encode(file_get_contents("$path/mobile/pages/page0001_i1.jpg"));
                        ?>
                          <img src="data:image/jpeg;base64,<?php echo $thumb2; ?>">
                        <?php
                      }else{
                        ?>
                          <img src="images/img_indisponivel.jpeg">
                        <?php
                      }
                      ?>
                <div class="info-caderno2">
                  

                  <?php $url =  base64_encode(file_get_contents("$path/common/downloads/publication.pdf")); ?>
                  <a class="btn btn-primary mt-2 text-white ref" id="ref_<?php echo $cont; ?>" inforead="data:application/pdf;base64,<?php echo $url; ?>" >Abrir<i class="fas fa-book-reader fa-lg"></i></a>
                  <!-- <a href="pdf/pdf.pdf" class="btn btn-primary mt-2 text-white" download>Unduh PDF <i class="fas fa-download fa-lg"></i></a> -->
                  <a href="data:application/pdf;base64,<?php echo $url; ?>" class="btn btn-primary mt-2 text-white" download>Baixar<i class="fas fa-download fa-lg"></i></a>
                </div>

                <!-------------------------------------------->
                <?php require('../js/custom/viewspdf.php'); ?>
                <!--------------------------------------------->

              </div>
              <?php $arr_pdf_url[$cont] =  $public; ?>
          <?php $cont = $cont + 1; } ?>
    <?php } ?>

</div>    
</div>










            










            
           




