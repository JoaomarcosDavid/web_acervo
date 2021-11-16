

<?php   $bt_views_pdf_BD = 1;  //adicione "1" para ver html de enviar ao banco. 
                               //Outro numero para ficar oculto. OBS! nao deixe sem numero! ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>EXTRAÇÃO DE PDF</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/style.css">

</head>
<body id="extract">
<div class="container">
    </br>
    <h1 style="text-align: center;">Extração de Textos em PDF</h1></br>
        <h3>1) Opções de extração "exemplos de teste":</h3>
    <div class="list-group" style="box-shadow:none;">
        
        <a href="javascript:void(0)"class="list-group-item"  style="overflow: hidden;">
            <input type='file' accept='file/*' onchange='openFile(event)'>
        </a>

        <a href="javascript:void(0)"          id="test_all_page"  class="list-group-item"  style="overflow: hidden;"><b>A)</b> Extrair texto do PDF. <button type="button" class="btn btn-primary" style="float: right;">Exibir Extração</button></a>
        <a href="javascript:void(0)"   id="test_per_page"  class="list-group-item"  style="overflow: hidden;"><b>B)</b> Extrair texto do PDF e separar por página. <button type="button" class="btn btn-primary" style="float: right;">Exibir Extração</button></a>
        
        </br></br>
        <?php
        if($bt_views_pdf_BD == 1){
        ?>
            <h3 style="color: #c12e2a;">2) Armazenar no banco de dados "Extrair textos de todos os pdf da pasta: anos/":</h3>
            <a href="javascript:void(0)"   id="slv_bd"         class="list-group-item"  style="overflow: hidden;"><b>A)</b> Extrair texto de <b>"todos os PDFs e armazenar no banco de dados."</b> Obs! todos que ja foram baixados na pasta anos.<button type="button" class="btn btn-danger" style="float: right;">Salvar Extração</button></a>
        <?php
        }else{

        }
       
        ?>
    </div>
    <div style="display:none;">
        <h3>3- Extrair imagens</h3>
        <div class="list-group">
            <a href="javascript:void(0)" class="list-group-item">Extrair texto do PDF (Indisponivel)</a>
            <a href="javascript:void(0)" class="list-group-item">Extrair texto do PDF por página (Indisponivel)</a>
        </div>
    </div>
    <h2 style="text-align: center;">Resultado da operação.</h2>
    

    <!--aqui sai os resultados das operações-->
    <div id="result" contentEditable="true" style="border: solid 1px #d9d9d9;height: 350px;overflow: hidden;overflow-y: scroll;position: relative;">
    </div>


    <button type="button" class="btn btn-primary" id="lp_extração" style="float: right;margin: 8px 10px 5px 5px;">Limpar Extração</button>
</div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" >


        
        
        //--------------------------------------------------------------
         //limpar campo text area
        //---------------------------------------------------------------
        $('#lp_extração').on('click', function(){$('#result').empty();});


        //--------------------------------------------------------------
          //Pegar src do pdf
        //--------------------------------------------------------------
        var dataURL;
        var openFile = function(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function() {
            dataURL = reader.result;
            };
            reader.readAsDataURL(input.files[0]);
        };














        //-----------------------------------------------------------
        //1 - REQUIZIÇÃO AJAX -  1 - Extrair texto do PDF de Unico. 
        //-----------------------------------------------------------
        $('#test_all_page').on('click', function(){extract_pdf()});
        function extract_pdf(){
            $("#result").append("<div class='lds-roller'><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>");
            
            $.ajax({
                method: "POST",
                url: "extracttextpdf.php",
                data: {extract_pdf_url: dataURL},
                cache: false,
                success : function(resultado){
                    if ($('#result').html() == ''){
                        $("#result").append(resultado);
                    }else{
                        $('#result').empty();
                        $("#result").append(resultado);
                    }
                }
            })
        }





        //--------------------------------------------------------------
        //2 - REQUIZIÇÃO AJAX -  2 -  Extrair texto do PDF por página.  
        //--------------------------------------------------------------
        $('#test_per_page').on('click', function(){extracttextpdfperPage()});
        function extracttextpdfperPage(){
            $("#result").append("<div class='lds-roller'><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>");
            $.ajax({
                method: "POST",
                url: "extracttextpdfperPage.php",
                data: {extracttextpdf_per_Page_url: dataURL},
                cache: false,
                success : function(resultado){
                    if ($('#result').html() == ''){
                        $("#result").append(resultado);
                    }else{
                        $('#result').empty();
                        $("#result").append(resultado);
                    } 
                }
            })
        }






        //---------------------------------------------------------------------------------
        //3 - REQUIZIÇÃO AJAX -  3 -  "ENVIAR TODOS OS PDF(TEXTO) PARA O BANCO DE DADOS".  
        //---------------------------------------------------------------------------------
        $('#slv_bd').on('click', function(){extracttextpdf_all_anos_BD()});
        function extracttextpdf_all_anos_BD(){
            $("#result").append("<div class='lds-roller'><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>");
            $.ajax({
                method: "POST",
                url: "extracttextpdf_all_anos_BD.php",
                data: {valor_page: "peguei o besta"},
                cache: false,
                success : function(resultado){
                    if ($('#result').html() == ''){
                        $("#result").append("<h1 style='text-align: center;margin-top: 144px;color: #288f3a;font-size: 23px;'>"+resultado+"</h1>");
                    }else{
                        $('#result').empty();
                        $("#result").append("<h1 style='text-align: center;margin-top: 144px;color: #288f3a;font-size: 23px;'>"+resultado+"</h1>");
                    } 
                }
            })
        }


        
      







        


        
        






    </script>

</body>
</html>