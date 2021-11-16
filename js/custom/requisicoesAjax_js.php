
<script type="text/javascript" >

    //-------------------------------------------------
        //1 - REQUIZIÇÃO AJAX - loading page scrooll
    //--------------------------------------------------
    function loadPage(){
        console.log("loading page...");
        var qtd = $(".capa").length;
        $.ajax({
            method: "POST",
            url: "controller/home_loading.php",
            data: {valor_page: qtd},
            cache: false,
            success : function(resultado){
                $(".covers").append(resultado); 
                var qtd = $(".capa").length;
                document.getElementById("total").innerHTML= qtd;
            }
        })
    }




    //-------------------------------------------------
        //2 - REQUIZIÇÃO AJAX - Filtro Data
    //--------------------------------------------------
    function filtrar(){
        var dataInicial; var dataFinal;
        dataInicial = document.getElementById("datepicker").value;
        dataFinal   = document.getElementById("datepicker2").value;
        $.ajax({
            method: "POST",
            url: "controller/home_filtros.php",
            data: {
                   dataInicial: dataInicial,
                   dataFinal: dataFinal
                  },
            cache: false,
            success : function(resultado){
                // $(".covers").append(resultado); 
                console.log(resultado);
                // var qtd = $(".capa").length;
                // document.getElementById("total").innerHTML= qtd;
            }
        })
    }




</script>
