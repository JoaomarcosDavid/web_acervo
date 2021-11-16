       
       
    <?php  
    
        //-----------------------------------------------
            //1- DEIXAR ILIMITADO O PROCESSO
        //-----------------------------------------------
        set_time_limit(0);
        ini_set('memory_limit', '9999999999');
        ini_set('max_execution_time', 0);
        


        //-----------------------------------------------
            //2 - INCLUIR CONEXAO BD E API DE EXTRACAO
        //-----------------------------------------------
        include("../conn/connection.php");
        include '../vendor/autoload.php';



                //----------------------------------------------
                    //3 - LOCALIZA OS TODOS CAMINHOS DOS PDF
                //----------------------------------------------
                $array_pdf = [];
                $cont_caminho = 0;
                foreach (glob("../anos/*/*/*/*/*/assets") as $path)
                { 
                    if (file_exists("$path/downloads/publication.pdf")) 
                    {
                        $path2 = explode('../',$path); $path2 = $path2[1];
                        $public = "$path2/downloads/publication.pdf";

                    }elseif(file_exists("$path/common/downloads/publication.pdf")){
                        $path2 = explode('../',$path); $path2 = $path2[1];
                        $public = "$path2/common/downloads/publication.pdf";
                    }
                    //---------------------------------------------
                     $array_pdf[$cont_caminho] = $public;
                    //---------------------------------------------
                    $cont_caminho = $cont_caminho + 1; 
                } 



                //-------------------------------------------------------------
                    //4 - PERCORRE ESTES CAMINHOS EXTRAINDO
                //-------------------------------------------------------------
                $array_pdf_txt = [];
                $count = 0;
                foreach ($array_pdf as $array_pdf_url)
                { 
                    $parser  = new \Smalot\PdfParser\Parser();
                    $pdf     = $parser->parseFile("../".$public);
                    $array_pdf_txt[$count] = (string)($pdf->getText());
                    $count = $count+1;
                } 




                echo $array_pdf_txt[700];







                //-------------------------------------------------------------
                    //5 - GRAVA NO BANCO A EXTRAÇÃO
                //-------------------------------------------------------------
                $count = 0;
                foreach ($array_pdf as $array_pdf_url)
                { 
                    $query = mysqli_query($conn, "INSERT INTO search_pdf(url, text) VALUES ('$array_pdf_url', '$array_pdf_txt[$count]')");
                    if ($query)
                    {
                        echo "Sucesso";
                    }else
                    {
                        echo "[ERRO]: ".mysqli_connect_error($conn);
                    }
                    $count = $count+1;
                } 






                echo "</br></br>";
                echo date('h:i:s');
                mysqli_close($conn);


    ?>