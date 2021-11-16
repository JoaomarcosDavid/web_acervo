<?php

    include("../conn/connection.php");
    include '../vendor/autoload.php';


    // Parse pdf file and build necessary objects.
    $parser = new \Smalot\PdfParser\Parser();
    $pdf    = $parser->parseFile("../pdf/pdf.pdf");
    $text = $pdf->getText();
    // echo $text;
    // echo PHP_EOL;
    // echo PHP_EOL;


    //------------------------------------------------
             //enviar dados para o banco
    //------------------------------------------------
    $sql = "INSERT INTO search_pdf (url, text) VALUES ('url.exemplo', '$text')";
    if (mysqli_query($conn, $sql)){
    echo "Textos extraido de todos os PDFs e enviados ao Banco com sucesso! </br> Agora volte ao site e faça pesquisas.";
    }else{echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
?>