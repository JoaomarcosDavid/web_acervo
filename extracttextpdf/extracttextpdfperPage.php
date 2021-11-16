

<?php


    if(empty($_POST['extracttextpdf_per_Page_url'])){

        echo "<h1 style='text-align: center;margin-top: 144px;color: #e9301c;font-size: 23px;'>Esta vazio escolha um PDF</h1>";

    }else{

        include '../vendor/autoload.php';

        // Parse pdf file and build necessary objects.
        $parser = new \Smalot\PdfParser\Parser();
        $pdf    = $parser->parseFile($_POST['extracttextpdf_per_Page_url']);

        // Retrieve all pages from the pdf file.
        $pages  = $pdf->getPages();

        // Loop over each page to extract text.
        foreach ($pages as $key => $page) {
            echo "-----------------------   Page ". ($key+1)."------------------------";
            echo PHP_EOL; echo "<br>";
            echo $page->getText();
            echo PHP_EOL; echo "<br>";
            echo PHP_EOL;echo "<br>";
        }
            echo PHP_EOL;echo "<br>";
            echo PHP_EOL;echo "<br>";

    }
    



 
