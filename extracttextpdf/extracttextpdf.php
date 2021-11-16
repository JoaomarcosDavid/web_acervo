
<?php
     
    if(empty($_POST['extract_pdf_url'])){

        echo "<h1 style='text-align: center;margin-top: 144px;color: #e9301c;font-size: 23px;'>Esta vazio escolha um PDF</h1>";

    }else{
        
        include '../vendor/autoload.php';

        $parser = new \Smalot\PdfParser\Parser();
        $pdf    = $parser->parseFile($_POST['extract_pdf_url']);

        $text = $pdf->getText();

        echo $text;
        echo PHP_EOL;
        echo PHP_EOL;
    }
     
   

?>