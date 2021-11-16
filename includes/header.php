<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8"/>

<?php 
 header('Content-type: text/html; charset=utf-8'); 
//  header("Content-type: application/pdf");

?>


<!-- ajax -->
<script type="text/javascript" src="js/jquery/jquery-1.9.1.min.js"></script>
<!-- Costume CSS -->
<link rel="stylesheet" type="text/css" href="css/flipbook.style.css">
<link rel="stylesheet" type="text/css" href="css/footer.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
<!-- Bootstrap Css -->
<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
<script src="js/flipbook.min.js"></script>
<link rel="shortcut icon" href="images/KPK_Logo.svg">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
<!---datapicker-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.pt-BR.min.js"></script>


<title>Home</title>

</head>
  <body>
  <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white2 fixed-top shadow-sm">
      <a class="navbar-brand" href="index.php">
        <img src="images/logo-branco.svg" alt="KPK LOGO" width="150">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </nav>

    <?php
      //--------------------------------------------------------------
                  //pegar valor do pdf e thumb na url
      //--------------------------------------------------------------
      $URL_ATUAL= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
      
   ?>
    
    <?php if (mb_strpos($URL_ATUAL, 'index') !== false) { ?>
        <div id="filtros" class="container">
          <div class="col-md-6">
            <div class="form-group row"> 
                <div class="col-md-12">
                  <a href="javascript:void(0)" id="home" ><span><i class="fas fa-home"></i> Home</span></a>
                </div>
          </div>
        </div>
        </div>
        <br><br>
    <?php } ?>

     
    <!-- End Of Navbar -->



      <?php
          //--------------------------------------------------
                  //INFORMA O TAMANHO DO ARQUIVO PDF
          //--------------------------------------------------
          function tamanho_arquivo($arquivo) {
          $tamanhoarquivo = filesize($arquivo);
          /* Medidas */
          $medidas = array('KB', 'MB', 'GB', 'TB');
          /* Se for menor que 1KB arredonda para 1KB */
          if($tamanhoarquivo < 999){
            $tamanhoarquivo = 1000;
          }
          for ($i = 0; $tamanhoarquivo > 999; $i++){
            $tamanhoarquivo /= 1024;
          }
          return round($tamanhoarquivo) . $medidas[$i - 1];
          }
      ?>
    
