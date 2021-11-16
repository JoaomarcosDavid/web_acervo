<!------------------------------------------------------------------------------>
<?php include_once 'includes/header.php'; ?>
<!------------------------------------------------------------------------------>

<!-- Teste Pull Request -->
<!-- Teste Pull Request2 -->
    <!----------------------------------------------------------->
                    <!--TRAS CONTEUDO HOME-->
    <!----------------------------------------------------------->
    <div id="conteudo_home">
      <div id="content">
         <!-- PDF HERE -->
         <div class="container">
            <div class="covers row">
                <?php include_once 'controller/home.php'; ?>
             </div>    
         </div>
      </div>
      <span class="total">Registros: <span id="total"><?php echo $cont; ?></span></span>
      <a id="loadmore"  onclick="loadPage()"  href="javascript:void(0);" >Carregar mais...</a>
      <span class="page_top"><i class="fas fa-arrow-circle-up"></i></span>
    </div>

<!-------------------------------------------------------------------------------->
<?php include_once 'includes/footer.php'; ?>
<!-------------------------------------------------------------------------------->


